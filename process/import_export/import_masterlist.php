<?php
include '../conn.php';
include '../session.php';

$page = '';
if ($_SESSION['role'] == 'admin_reviewer') {
    $page = 'admin_reviewer';
} else if ($_SESSION['role'] == 'admin') {
    $page = 'admin';
}

if (isset($_POST['upload'])) {
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            if (!$csvFile) {
                // Handle file open error
            }

            // Skip the first row
            fgetcsv($csvFile);

            $error = 0;
            while (($line = fgetcsv($csvFile)) !== false) {
                if (empty(array_filter($line))) {
                    continue;
                }

                $fullname = $line[0];
                $m_name = $line[1];
                $emp_id = $line[2];
                $emp_id_old = $line[3];
                $agency = $line[4];
                $batch = $line[5];
                $emp_status = $line[6];

                if (empty($fullname) || empty($emp_id) || empty($agency) || empty($batch)) {
                    $error++;
                    continue;
                }

                $prevQuery = "SELECT id, emp_id, emp_id_old FROM t_employee_m WHERE emp_id IN (?, ?)";
                $res = $conn->prepare($prevQuery);
                if (!$res->execute([$line[2], $line[3]])) {
                    // Handle query execution error
                    $error++;
                    continue;
                }

                if ($res->rowCount() > 0) {
                    foreach ($res->fetchAll() as $x) {
                        $id = $x['id'];
                        $emp_id_ref = $x['emp_id'];
                        $emp_id_old_ref = $x['emp_id_old'];
                    }

                    $updateQuery = "UPDATE t_employee_m SET fullname = ?, emp_id = ?, batch = ?, m_name = ?, agency = ?, emp_status = ?";
                    $params = [$fullname, $emp_id, $batch, $m_name, $agency, $emp_status];

                    if (!empty($emp_id_old)) {
                        if (empty($emp_id_old_ref)) {
                            $updateQuery .= ", emp_id_old = emp_id";
                        } else if ($emp_id_old != $emp_id_old_ref) {
                            $updateQuery .= ", emp_id_old = ?";
                            $params[] = $emp_id_old;
                        }
                    }

                    $updateQuery .= " WHERE id = ?";
                    $params[] = $id;

                    $stmt = $conn->prepare($updateQuery);
                    if (!$stmt->execute($params)) {
                        // Handle update query execution error
                        $error++;
                        continue;
                    }

                    $updateFQuery = "UPDATE t_f_process SET emp_id_old = ?, emp_id = ? WHERE emp_id = ?";
                    $stmt = $conn->prepare($updateFQuery);
                    $stmt->execute([$emp_id_old, $emp_id, $emp_id_ref]);

                    $updateIQuery = "UPDATE t_i_process SET emp_id_old = ?, emp_id = ? WHERE emp_id = ?";
                    $stmt = $conn->prepare($updateIQuery);
                    $stmt->execute([$emp_id_old, $emp_id, $emp_id_ref]);
                } else {
                    $insertQuery = "INSERT INTO t_employee_m (fullname, m_name, emp_id, agency, batch, emp_status) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($insertQuery);
                    if (!$stmt->execute([$fullname, $m_name, $emp_id, $agency, $batch, $emp_status])) {
                        // Handle insert query execution error
                        $error++;
                        continue;
                    }
                }
            }

            fclose($csvFile);
            $message = ($error == 0) ? "SUCCESS! # OF ERRORS: $error" : "WITH ERROR! # OF ERRORS: $error";
            echo '<script>
                    var x = confirm("' . $message . '");
                    location.replace("../../page/' . $page . '/manpowerpage.php");
                  </script>';
        } else {
            // Handle file not uploaded error
            echo '<script>
                    var x = confirm("CSV FILE NOT UPLOADED! # OF ERRORS ' . $error . ' ");
                    location.replace("../../page/' . $page . '/manpowerpage.php");
                  </script>';
        }
    } else {
        // Handle invalid file format error
        echo '<script>
                var x = confirm("INVALID FILE FORMAT! # OF ERRORS ' . $error . ' ");
                location.replace("../../page/' . $page . '/manpowerpage.php");
              </script>';
    }
}
