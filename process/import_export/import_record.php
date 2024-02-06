<?php
    // error_reporting(0);
    require '../conn.php';
    include '../session.php';

    function fetch_pro($category, $conn) {
        $arr = array();
        $query = "SELECT `process` FROM `m_process` WHERE category = '$category' ORDER BY process ASC";
        $stmt = $conn -> prepare($query);
        $stmt -> execute();
        if ($stmt -> rowCount() > 0) {
            foreach($stmt -> fetchAll() as $row) {
                array_push($arr, $row['process']);
            }
        }
        return $arr;
    }

    

    function check_csv ($file, $category, $conn) {
        // READ FILE
        $csvFile = fopen($file,'r');

        // SKIP FIRST LINE
        fgets($csvFile);

        $pro_arr = fetch_pro($category, $conn);

        $hasError = 0;
        $hasBlankError = 0;
        $isDuplicateOnCsv = 0;

        $hasBlankErrorArr = array();
        $isDuplicateOnCsvArr = array();
        $dup_temp_arr = array();

        $row_valid_arr = array(0,0);

        $notExistsProArr = array();
        $existsAuthNoEmpNoArr = array();
        
        $message = "";
        $check_csv_row = 1;

        while (($line = fgetcsv($csvFile)) !== false) {
            $check_csv_row++;

            if(empty(implode('', $line))){
                continue;
            }

            $pro = $line[0];
            $emp_id = $line[1];
            $auth_no = $line[2];

            if ($line[0] == '' || $line[1] == '' || $line[2] == '' || $line[3] == '' || $line[4] == '' || $line[5] == '') {
                
                $hasBlankError++;
                $hasError = 1;
                array_push($hasBlankErrorArr, $check_csv_row);
            }

            // CHECK ROW VALIDATION
            if (!in_array($pro, $pro_arr)) {
                $hasError = 1;
                $row_valid_arr[0] = 1;
                array_push($notExistsProArr, $check_csv_row);
            }

            $sql = "SELECT `emp_id_old` FROM `t_employee_m` WHERE `emp_id` = '$emp_id'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                foreach($stmt->fetchALL() as $x){
                    $emp_id_old = $x['emp_id_old']; 
                }
            }

            $sql = "SELECT `auth_no`";
            if ($category == 'final') {
                $sql = $sql . " FROM `t_f_process`";
            } else if ($category == 'initial') {
                $sql = $sql . " FROM `t_i_process`";
            }
            $sql = $sql . " WHERE (`emp_id` != '$emp_id' AND `emp_id` != '$emp_id_old') AND `process` = '$pro' AND `auth_no` = '$auth_no'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $hasError = 1;
                $row_valid_arr[1] = 1;
                array_push($existsAuthNoEmpNoArr, $check_csv_row);
            }

            // Joining all row values for checking duplicated rows
            $whole_line = join(',', $line);

            // CHECK ROWS IF IT HAS DUPLICATE ON CSV
            if (isset($dup_temp_arr[$whole_line])) {
                $isDuplicateOnCsv = 1;
                $hasError = 1;
                array_push($isDuplicateOnCsvArr, $check_csv_row);
            } else {
                $dup_temp_arr[$whole_line] = 1;
            }
        }
        
        fclose($csvFile);

        if ($hasError == 1) {
            if ($row_valid_arr[0] == 1) {
                $message = $message . 'Process Name doesn\'t exists on row/s ' . implode(", ", $notExistsProArr) . '. ';
            }
            if ($row_valid_arr[1] == 1) {
                $message = $message . 'Authorization No. exists on different Employee No. on row/s ' . implode(", ", $existsAuthNoEmpNoArr) . '. ';
            }

            if ($hasBlankError >= 1) {
                $message = $message . 'Blank Cell Exists on row/s ' . implode(", ", $hasBlankErrorArr) . '. ';
            }
            if ($isDuplicateOnCsv == 1) {
                $message = $message . 'Duplicated Record/s on row/s ' . implode(", ", $isDuplicateOnCsvArr) . '. ';
            }
        }
        return $message;
    }

    $page = '';
    if ($_SESSION['role'] =='admin_reviewer'){
        $page = 'admin_reviewer';
    } else if ($_SESSION['role'] =='admin'){
        $page = 'admin';
    }

    if(isset($_POST['upload'])){
        $id_number_record = $_POST['id_number_record'];
        $category = $_POST['category'];
        //$pro = $_POST['pro'];
        $pro_arr = fetch_pro($category, $conn);
        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        
        if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
            if(is_uploaded_file($_FILES['file']['tmp_name'])){

                $chkCsvMsg = check_csv($_FILES['file']['tmp_name'], $category, $conn);

                if ($chkCsvMsg == '') {
                    // If no errors found

                    //READ FILE
                    $csvFile = fopen($_FILES['file']['tmp_name'],'r');
                    // SKIP FIRST LINE
                    fgetcsv($csvFile);
                    // PARSE
                    $error = 0;
                    $test = 0;
                    while(($line = fgetcsv($csvFile)) !== false){

                        if(empty(implode('', $line))){
                            continue;
                        }

                        $pro = $line[0];
                        $emp_id = $line[1];
                        $auth_no = $line[2];
                        $auth_year = $line[3];
                        $date_authorized = $line[4];
                        $expire_date = $line[5];
                        $remarks = $line[6];
                        $dept = $line[7];
                        $batch = $line[8];
                        $up_date = $fname.'/ '.$server_date_time;
                      
                        $date_authorized = new DAteTime($date_authorized);
                        $date_authorized = date_format($date_authorized, "Y-m-d");
                        $expire_date = new DAtetime($expire_date);
                        $expire_date = date_format($expire_date, "Y-m-d");
                       
                        // CHECK DATA
                        $prevQuery = "SELECT id";

                        if ($category == 'final') {
                            $prevQuery = $prevQuery . " FROM `t_f_process`";
                        } else if ($category == 'initial') {
                            $prevQuery = $prevQuery . " FROM `t_i_process`";
                        }

                        $prevQuery = $prevQuery . " WHERE emp_id = '$emp_id' AND process = '$pro' AND  auth_year ='$auth_year' AND date_authorized = '$date_authorized' AND expire_date = '$expire_date'";

                        // echo $auth_year;
                        // echo $date_authorized;
                        // echo $expire_date;

                        $res = $conn->prepare($prevQuery);
                        $res->execute();
                        $test = $res->rowCount();
                        if($res->rowCount() > 0){
                            foreach($res->fetchALL() as $x){
                                $id = $x['id']; 
                            }

                            $update = "";

                            if ($category == 'final') {
                                $update = $update . "UPDATE `t_f_process`";
                            } else if ($category == 'initial') {
                                $update = $update . "UPDATE `t_i_process`";
                            }

                            $update = $update . " SET emp_id = '$emp_id', process = '$pro', auth_no = '$auth_no', auth_year ='$auth_year', date_authorized ='$date_authorized', expire_date ='$expire_date', remarks ='$remarks' WHERE id = '$id'";

                            $stmt = $conn->prepare($update);
                            if($stmt->execute()){
                                $error = 0;
                            }else{
                                $error = $error + 1;
                            }
                        
                        }else{

                            $sql = "SELECT `emp_id_old` FROM `t_employee_m` WHERE `emp_id` = '$emp_id'";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) {
                                foreach($stmt->fetchALL() as $x){
                                    $emp_id_old = $x['emp_id_old']; 
                                }
                            }

                            //Revision (Vince)
                            $sql = "SELECT `auth_no`";
                            if ($category == 'final') {
                                $sql = $sql . " FROM `t_f_process`";
                            } else if ($category == 'initial') {
                                $sql = $sql . " FROM `t_i_process`";
                            }
                            $sql = $sql . " WHERE (`emp_id` != '$emp_id' AND `emp_id` != '$emp_id_old') AND `process` = '$pro' AND `auth_no` = '$auth_no'";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            if ($stmt->rowCount() < 1) {

                                $insert = "";

                                $r_status = "";
                                if (!empty($r_of_cancellation)) {
                                    $r_status = "Pending";
                                }

                                if ($category == 'final') {
                                    $insert = $insert . "INSERT INTO `t_f_process`";
                                } else if ($category == 'initial') {
                                    $insert = $insert . "INSERT INTO `t_i_process`";
                                }

                                $insert = $insert . "(`emp_id`, `process`, `auth_no`, `auth_year`, `date_authorized`, `expire_date`, `up_date_time`, `dept`, `batch`";

                                if (!empty($remarks)) {
                                    $insert = $insert . ", `remarks`";
                                }
                                if (!empty($r_of_cancellation)) {
                                    $insert = $insert . ", `r_of_cancellation`";
                                }
                                if (!empty($d_of_cancellation)) {
                                    $insert = $insert . ", `d_of_cancellation`";
                                }
                                if (!empty($r_status)) {
                                    $insert = $insert . ", `r_status`";
                                }

                                $insert = $insert . ") VALUES ('$emp_id', '$pro', '$auth_no', '$auth_year', '$date_authorized', '$expire_date', '$up_date', '$dept', '$batch'";
                                
                                if (!empty($remarks)) {
                                    $insert = $insert . ", '$remarks'";
                                }
                                if (!empty($r_of_cancellation)) {
                                    $insert = $insert . ", '$r_of_cancellation'";
                                }
                                if (!empty($d_of_cancellation)) {
                                    $insert = $insert . ", '$d_of_cancellation'";
                                }
                                if (!empty($r_status)) {
                                    $insert = $insert . ", '$r_status'";
                                }

                                $insert = $insert . ")";

                                $stmt = $conn->prepare($insert);
                                if($stmt->execute()){
                                    
                                    $error = 0;
                                }else{
                                    $error = $error + 1;
                                }
                            }
                        }
                    }
                    
                    fclose($csvFile);
                   if($error == 0){
                        echo $category;
                        echo $test;
                        echo '<script>
                        var x = confirm("SUCCESS!");
                        if(x == true){
                            location.replace("../../page/'.$page.'/import_exportpage.php");
                        }else{
                             location.replace("../../page/'.$page.'/import_exportpage.php");
                        }
                    </script>'; 
                   }else{
                        echo '<script>
                        var x = confirm("WITH ERROR! # OF ERRORS '.$error.' ");
                        if(x == true){
                            location.replace("../../page/'.$page.'/import_exportpage.php");
                        }else{
                             location.replace("../../page/'.$page.'/import_exportpage.php");
                        }
                    </script>'; 
                   }
                } else {
                    // If errors found
                    echo '<script>
                    var x = confirm("'.$chkCsvMsg.'");
                    if(x == true){
                        location.replace("../../page/'.$page.'/import_exportpage.php");
                    }else{
                         location.replace("../../page/'.$page.'/import_exportpage.php");
                    }
                </script>'; 
                }
            }else{
                echo '<script>
                        var x = confirm("CSV FILE NOT UPLOADED!");
                        if(x == true){
                             location.replace("../../page/'.$page.'/import_exportpage.php");
                        }else{
                             location.replace("../../page/'.$page.'/import_exportpage.php");
                        }
                    </script>';
            }
        }else{
            echo '<script>
                        var x = confirm("INVALID FILE FORMAT!");
                        if(x == true){
                             location.replace("../../page/'.$page.'/import_exportpage.php");
                        }else{
                             location.replace("../../page/'.$page.'/import_exportpage.php");
                        }
                    </script>';
        }
        
    }

    // KILL CONNECTION
    $conn = null;
?>