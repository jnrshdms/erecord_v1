<?php
require '../conn.php';

switch (true) {
    case !isset($_GET['agency']):
    case !isset($_GET['emp_id']):
    case !isset($_GET['batch']):
    case !isset($_GET['fullname']):
        echo 'Query Parameters Not Set';
        exit;
        break;
}

$agency = $_GET['agency'];
$emp_id = $_GET['emp_id'];
$batch = $_GET['batch'];
$fullname = $_GET['fullname'];
$c = 0;

$delimiter = ",";
$datenow = date('Y-m-d');
$filename = "E-Record_Masterlist  - " . $datenow . ".csv";

// Create a file pointer 
$f = fopen('php://memory', 'w');

// UTF-8 BOM for special character compatibility
fputs($f, "\xEF\xBB\xBF");

// Set column headers 
$fields = array('#', 'Employee Name', 'Maiden Name', 'Employee No.', 'Employee No. Old', 'Batch No.', 'Provider');
fputcsv($f, $fields, $delimiter);
$query = "SELECT fullname, m_name, emp_id, emp_id_old, agency, batch FROM t_employee_m WHERE (emp_id LIKE '$emp_id%' OR emp_id_old LIKE '$emp_id%') ";
if (!empty($emp_status)){
    $query = $query ."AND emp_status = '$emp_status' ";
}
if (!empty($fullname)) {
    $query = $query . "AND  fullname LIKE '$fullname%'";
}
if (!empty($agency)) {
    $query = $query . "AND  agency = '$agency'";
}
if (!empty($batch)){
    $query = $query ."AND batch ='$batch' ";
}

$query = $query . " ORDER BY  fullname ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {

    // Output each row of the data, format line as csv and write to file pointer 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $c++;
        $lineData = array($c, $row['fullname'], $row['m_name'], $row['emp_id'], $row['emp_id_old'], $row['batch'], $row['agency']);
        fputcsv($f, $lineData, $delimiter);
    }
}

// Move back to beginning of file 
fseek($f, 0);

// Set headers to download file rather than displayed 
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '";');

//output all remaining data on a file pointer 
fpassthru($f);

$conn = null;
