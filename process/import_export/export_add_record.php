<?php
require '../conn.php';

switch (true) {
    case !isset($_GET['emp_id']):
    case !isset($_GET['category']):
    case !isset($_GET['pro']):
    case !isset($_GET['date']):
        echo 'Query Parameters Not Set';
        exit;
        break;
}

$emp_id = $_GET['emp_id'];
$category = $_GET['category'];
$pro = $_GET['pro'];
$date = $_GET['date'];
$c = 0;

$delimiter = ",";
$datenow = date('Y-m-d');
$filename = "E-Record_Authorization  - " . $datenow . ".csv";

// Create a file pointer 
$f = fopen('php://memory', 'w');

// UTF-8 BOM for special character compatibility
fputs($f, "\xEF\xBB\xBF");

// Set column headers 
$fields = array('#', 'Code', 'Process Name', 'Expired Date', 'Authorization No.', 'Employee Name', 'Employee No.', 'Batch No.', 'Status', 'Remarks');
fputcsv($f, $fields, $delimiter);
$query = "SELECT a.batch, a.process,a.auth_no,a.expire_date,a.r_of_cancellation,a.d_of_cancellation,a.remarks,a.code,a.status,a.r_status,a.i_status,b.fullname,b.m_name,b.agency,a.dept,b.batch,b.emp_id,c.category";

if ($category == 'Final') {
    $query = $query . " FROM `t_f_process`";
} else if ($category == 'Initial') {
    $query = $query . " FROM `t_i_process`";
}
$query = $query . " a LEFT JOIN t_employee_m b ON a.emp_id = b.emp_id  JOIN `m_process` c ON a.process = c.process WHERE a.i_status = 'Approved'";

if (!empty($emp_id)) {
    $query = $query . " AND (b.emp_id = '$emp_id' OR b.emp_id_old = '$emp_id')";
}
if (!empty($pro)) {
    $query = $query . " AND a.process LIKE '$pro'";
}

if (!empty($date)) {
    $query = $query . " AND a.expire_date = '$date'";
}
$query = $query . " ORDER BY process ASC, fullname ASC, auth_year DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {

    // Output each row of the data, format line as csv and write to file pointer 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $c++;
        $lineData = array($c, $row['code'], $row['process'], $row['expire_date'], $row['auth_no'], $row['fullname'], $row['emp_id'], $row['batch'], $row['status'], $row['r_of_cancellation']);
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
