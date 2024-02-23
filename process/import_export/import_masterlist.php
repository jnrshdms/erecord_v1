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
            //READ FILE
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            // SKIP FIRST LINE
            fgetcsv($csvFile);
            // PARSE
            $error = 0;
            while (($line = fgetcsv($csvFile)) !== false) {

                if (empty(implode('', $line))) {
                    continue;
                }

                $fullname = $line[0];
                $m_name = $line[1];
                $emp_id = $line[2];
                $emp_id_old = $line[3];
                $agency = $line[4];
                $batch = $line[5];
                $emp_status = $line[6];


                // CHECK IF BLANK DATA
                if ($line[0] == '' || $line[1] == '' || $line[2] == '' || $line[3] == '' || $line[4] == '' || $line[5] == '' || $line[6] == '') {
                    // IF BLANK DETECTED ERROR += 1
                    $error = $error + 1;
                } else {
                    // CHECK DATA
                    $prevQuery = "SELECT id, emp_id, emp_id_old FROM t_employee_m WHERE emp_id IN ('$line[2]', '$line[3]')";
                    $res = $conn->prepare($prevQuery);
                    $res->execute();
                    if ($res->rowCount() > 0) {
                        foreach ($res->fetchAll() as $x) {
                            $id = $x['id'];
                            $emp_id_ref = $x['emp_id'];
                            $emp_id_old_ref = $x['emp_id_old'];
                        }

                        $update = "UPDATE t_employee_m SET fullname = '$fullname', emp_id = '$emp_id', batch = '$batch', m_name = '$m_name', agency = '$agency', emp_status ='$emp_status', emp_id_old = '$emp_id_old'";


                        if (!empty($emp_id_old) && empty($emp_id_old_ref)) {
                            $update .= ", emp_id_old = '$emp_id'";
                        } else if (!empty($emp_id_old) && !empty($emp_id_old_ref)) {
                            $update .= ", emp_id_old = '$emp_id_old'";

                        }

                        $update .= " WHERE id = '$id'";

                        $stmt = $conn->prepare($update);
                        if ($stmt->execute()) {

                        } else {
                            $error = $error + 1;
                        }

                        if (!empty($emp_id_old) && empty($emp_id_old_ref)) {
                            $query = "UPDATE t_f_process SET emp_id_old = emp_id, emp_id = '$emp_id' WHERE emp_id = '$emp_id_ref'";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $query = "UPDATE t_i_process SET emp_id_old = emp_id, emp_id = '$emp_id' WHERE emp_id = '$emp_id_ref'";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                        } else {
                            $error = $error + 1;
                        }
                    } else {

                        $insert = "INSERT INTO t_employee_m (`fullname` ,`m_name`,`emp_id`, `agency`, `batch`,`emp_status`) VALUES ('$fullname', '$m_name', '$emp_id', '$agency', '$batch','$emp_status')";
                        $stmt = $conn->prepare($insert);
                        if ($stmt->execute()) {
                        } else {
                            $error = $error + 1;
                        }
                    }
                }
            }

                fclose($csvFile);
               if($error == 0){
                    echo '<script>
                    var x = confirm("SUCCESS! # OF ERRORS '.$error.' ");
                    if(x == true){
                        location.replace("../../../'.$page.'/manpowerpage.php");
                    }else{
                        location.replace("../../age/'.$page.'/manpowerpage.php");
                    }
                </script>'; 
               }else{
                    echo '<script>
                    var x = confirm("WITH ERROR! # OF ERRORS '.$error.' ");
                    if(x == true){
                        location.replace("../../page/'.$page.'/manpowerpage.php");
                    }else{
                        location.replace("../../page/'.$page.'/manpowerpage.php");
                    }
                </script>'; 
               }
            }else{
                echo '<script>
                        var x = confirm("CSV FILE NOT UPLOADED! # OF ERRORS '.$error.' ");
                        if(x == true){
                            location.replace("../../page/'.$page.'/manpowerpage.php");
                        }else{
                            location.replace("../../page/'.$page.'/manpowerpage.php");
                        }
                    </script>';
            }
        }else{
            echo '<script>
                        var x = confirm("INVALID FILE FORMAT! # OF ERRORS '.$error.' ");
                        if(x == true){
                            location.replace("../../page/'.$page.'/manpowerpage.php");
                        }else{
                            location.replace("../../page/'.$page.'/manpowerpage.php");
                        }
                    </script>';
        }
        
    }

?>
 