<?php 
include '../conn.php';
include '../session.php';

$method = $_POST['method'];

if ($method == 'fetch_pro') {
	$category = $_POST['category'];
	$query = "SELECT `process` FROM `m_process` WHERE category = '$category' ORDER BY process ASC";
	$stmt = $conn -> prepare($query);
	$stmt -> execute();
	if ($stmt -> rowCount() > 0) {
		echo '<option value="">Please select a process.....</option>';
		foreach($stmt -> fetchAll() as $row) {
			echo '<option>'.htmlspecialchars($row['process']).'</option>';
		}
	} else {
		echo '<option>Please select a process.....</option>';
	}
}

if ($method == 'get_auth_no_by_emp_no') {
	$pro = $_POST['pro'];
	$auth_no = '';
	$auth_no= $_POST['auth_no'];
	$category = $_POST['category'];
	$message = '';

	$is_valid = false;

	if (!empty($category)) {
		if (!empty($pro)) {
			$is_valid = true;
		} else $message = 'Process Not Set';
	} else $message = 'Category Not Set';

	if ($is_valid == true) {
		$query = "SELECT a.emp_id, a.batch, a.dept, b.fullname, b.emp_id";

		if ($category == 'Final') {
			$query = $query . " FROM `t_f_process`";
		}else if ($category == 'Initial') {
			$query = $query . " FROM `t_i_process`";
		}
		$query = $query . "a LEFT JOIN t_employee_m b ON a.emp_id = b.emp_id WHERE process = '$pro' AND auth_no = '$auth_no'";
		$stmt = $conn->prepare($query);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			foreach($stmt -> fetchAll() as $row) {
				$emp_id = $row['emp_id'];
				$dept = $row['dept'];
				$batch = $row['batch'];
				$fullname = $row['fullname'];
			}
			$message = 'success';
		} else {
			$message = 'Not Found';
		}
	}

	$response_arr = array(
        'emp_id' => $emp_id,
		'dept'=> $dept,
		'batch' => $batch,
		'fullname' => $fullname,
        'message' => $message
    );

    echo json_encode($response_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}


if ($method == 'add_emp_pro') {

    $pro = $_POST['pro'];
    $auth_no = $_POST['auth_no'];
    $emp_id = $_POST['emp_id'];
    $auth_year = $_POST['auth_year'];
    $date_authorized = $_POST['date_authorized'];
    $expire_date = $_POST['expire_date'];
    $remarks = $_POST['remarks'];
    $dept = $_POST['dept'];
    $batch = $_POST['batch'];
    $fullname = $_POST['fullname'];
    $category = $_POST['category'];
    $up_date = $fname . '/ ' . $server_date_time;

    $query = "SELECT a.*, b.fullname, b.emp_id ";

    if ($category == 'Final') {
        $query = $query . " FROM `t_f_process`";
    } else if ($category == 'Initial') {
        $query = $query . " FROM `t_i_process`";
    }    
		// $query = $query . " a LEFT JOIN t_employee_m b ON a.emp_id = b.emp_id WHERE process = '$pro' AND auth_no = '$auth_no' AND emp_id = '$emp_id' AND auth_year = '$auth_year' AND date_authorized = '$date_authorized' AND expire_date ='$expire_date' AND remarks = '$remarks' AND dept ='$dept' AND batch ='$batch' ";
		$query = $query . " a LEFT JOIN t_employee_m b ON a.emp_id = b.emp_id WHERE a.process = '$pro' AND a.auth_no = '$auth_no' AND a.emp_id = '$emp_id' AND a.auth_year = '$auth_year' AND a.date_authorized = '$date_authorized' AND a.expire_date ='$expire_date' AND a.remarks = '$remarks' AND a.dept ='$dept' AND a.batch ='$batch' ";

    // if ($stmt->rowCount() > 0) {
    //     // echo 'existing';
    //     $stmt = NULL;
    // } else {
    //     $stmt = NULL;
	$stmt = $conn->prepare($query);
	$stmt->execute();
        $insert = ""; 
        // $r_status = "";
        // if (!empty($r_of_cancellation)) {
        //     $r_status = "Pending";
        // }

        if ($category == 'Final') {
            $insert = $insert . "INSERT INTO `t_f_process`";
        } else if ($category == 'Initial') {
            $insert = $insert . "INSERT INTO `t_i_process`";
        }

        $insert = $insert . "(`process`, `auth_no`, `emp_id`, `auth_year`, `date_authorized`, `expire_date`, `remarks`, `up_date_time`, `i_status`, `dept`, `batch`) VALUES ('$pro', '$auth_no', '$emp_id', '$auth_year', '$date_authorized', '$expire_date', '$remarks', '$up_date', 'Pending', '$dept', '$batch')";
        $stmt = $conn->prepare($insert);
        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
// }


?>