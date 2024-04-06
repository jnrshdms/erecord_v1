<?php
require '../conn.php';

switch (true) {
    case !isset($_GET['emp_id']):
    case !isset($_GET['category']):
    case !isset($_GET['pro']):
    case !isset($_GET['date']):
    case !isset($_GET['date_authorized']):
    case !isset($_GET['fullname']):
        echo 'Query Parameters Not Set';
        exit;
        break;
}

$emp_id = $_GET['emp_id'];
$category = $_GET['category'];
$pro = $_GET['pro'];
$date = $_GET['date'];
$date_authorized = $_GET['date_authorized'];
$fullname = $_GET['fullname'];
$c = 0;

$delimiter = ",";
$datenow = date('Y-m-d');
$filename = "E-Record_Data - " . $datenow . ".csv";

// Create a file pointer 
$f = fopen('php://memory', 'w');

// UTF-8 BOM for special character compatibility
fputs($f, "\xEF\xBB\xBF");

// Set column headers 
$fields = array('#', 'Process Name', 'Authorization No.', 'Authorization Year', 'Date Authorized', 'Expire Date', 'Employee Name', 'Employee No.', 'Batch No.', 'Department', 'Remarks', 'Reason of Cancellation', 'Date of Cancellation');
fputcsv($f, $fields, $delimiter);
$query = "SELECT a.batch, a.process, a.auth_no, a.auth_year, a.date_authorized, a.expire_date, a.r_of_cancellation, a.d_of_cancellation, a.remarks, a.i_status, a.r_status, b.fullname, b.agency, a.dept, b.batch, b.emp_id, c.category";

if ($category == 'Final') {
    $query .= " FROM `t_f_process`";
} else if ($category == 'Initial') {
    $query .= " FROM `t_i_process`";
}

$query .= " a LEFT JOIN t_employee_m b ON a.emp_id = b.emp_id AND a.batch = b.batch
		JOIN `m_process` c ON a.process = c.process
		WHERE a.i_status = 'Approved'
		";

if (!empty($emp_id)) {
    $query .= " AND (b.emp_id = '$emp_id' OR b.emp_id_old = '$emp_id')";
}

if (!empty($fullname)) {
    $query .= " AND b.fullname LIKE '$fullname%'";
}

if (!empty($pro)) {
    $query .= " AND a.process LIKE '$pro'";
}
if (!empty($date)) {
    $query .= " AND a.expire_date = '$date' ";
}
if (!empty($date_authorized)) {
    $query .= " AND a.date_authorized = '$date_authorized' ";
}

$query .= " ORDER BY a.process ASC, b.fullname ASC, a.auth_year DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {

    // Output each row of the data, format line as csv and write to file pointer 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $c++;
        $lineData = array($c, $row['process'], $row['auth_no'], $row['auth_year'], $row['date_authorized'], $row['expire_date'], $row['fullname'], $row['emp_id'], $row['batch'], $row['dept'], $row['remarks'], $row['r_of_cancellation'], $row['d_of_cancellation']);
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
