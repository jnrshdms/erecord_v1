<?php 
session_start();
include '../conn.php';

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
function count_category($search_arr, $conn) {
	if (!empty($search_arr['category'] )) {
	$query = "SELECT count(auth_no) AS total FROM (";

	$query = $query . "SELECT a.auth_no";

	if ($search_arr['category'] == 'Final') {
		$query = $query . " FROM `t_f_process`";
	}else if ($search_arr['category'] == 'Initial') {
		$query = $query . " FROM `t_i_process`";
	}

	$query = $query . " a
						LEFT JOIN t_employee_m b ON a.emp_id = b.emp_id 
						JOIN `m_process` c ON a.process = c.process
						WHERE a.i_status = 'Approved'";

	if (!empty($search_arr['emp_id'])) {
		$query = $query . " AND (b.emp_id = '".$search_arr['emp_id']."' OR b.emp_id_old = '".$search_arr['emp_id']."')";
	}
	if (!empty($search_arr['fullname'])) {
		$query = $query . " AND b.fullname LIKE'".$search_arr['fullname']."%'";
	}

	if (!empty($search_arr['pro'])) {
		$query = $query . " AND a.process LIKE '".$search_arr['pro']."'";
	}
	
	$query = $query . "GROUP BY a.auth_no ORDER BY b.fullname ASC";

	$query = $query . ") AS asub";

	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$total = $j['total'];
		}
	}else{
		$total = 0;
	}
	return $total;
}
}

if ($method == 'count_category') {
	$emp_id = $_POST['emp_id'];
	$pro = $_POST['pro'];
	$category = $_POST['category'];
	$fullname = $_POST['fullname'];
	$c = 0;

	$search_arr = array(
		"emp_id" => $emp_id, 
		"pro" => $pro, 
		"category" => $category,
		"fullname" => $fullname
	);

	echo count_category($search_arr, $conn);
}

if ($method == 'fetch_category_pagination') {
	$emp_id = $_POST['emp_id'];
	$pro = $_POST['pro'];
	$category = $_POST['category'];
	$fullname = $_POST['fullname'];

	$search_arr = array(
		"emp_id" => $emp_id, 
		"pro" => $pro, 
		"category" => $category,
		"fullname" => $fullname
	);

	$results_per_page = 100;

	$number_of_result = intval(count_category($search_arr, $conn));

	//determine the total number of pages available  
	$number_of_page = ceil($number_of_result / $results_per_page);

	for ($page = 1; $page <= $number_of_page; $page++) {
		echo '<option value="'.$page.'">'.$page.'</option>';
    }

}

if ($method == 'fetch_category') {
	$emp_id = $_POST['emp_id'];
	$pro = $_POST['pro'];
	$category = $_POST['category'];
	$fullname = $_POST['fullname'];
	$current_page = intval($_POST['current_page']);
	$c = 0;

	if (!empty($category)) {

		$results_per_page = 100;

		//determine the sql LIMIT starting number for the results on the displaying page
		$page_first_result = ($current_page-1) * $results_per_page;

		// For row numbering
		$c = $page_first_result;
		
		$query = "SELECT b.batch,a.up_date_time,a.id,a.auth_no,a.auth_year,a.date_authorized,a.expire_date,a.r_of_cancellation,a.d_of_cancellation,a.remarks,a.up_date_time,a.r_status,b.fullname,b.m_name,b.agency,a.dept,b.batch,b.emp_id,c.category";

		if ($category == 'Final') {
			$query = $query . " FROM `t_f_process`";
		}else if ($category == 'Initial') {
			$query = $query . " FROM `t_i_process`";
		}
		$query = $query . " a
							LEFT JOIN t_employee_m b ON a.emp_id = b.emp_id AND a.batch = b.batch
							JOIN `m_process` c ON a.process = c.process
							WHERE a.i_status = 'Approved'";

		if (!empty($emp_id)) {
			$query = $query . " AND (b.emp_id = '$emp_id' OR b.emp_id_old = '$emp_id')";
		}
		if (!empty($fullname)) {
			$query = $query . " AND b.fullname LIKE '$fullname%'";
		}
		if (!empty($pro)) {
			$query = $query . " AND a.process LIKE '$pro'";
		}
		$query = $query . "GROUP BY a.auth_no ORDER BY b.fullname ASC LIMIT ".$page_first_result.", ".$results_per_page;
		$stmt = $conn->prepare($query);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			foreach($stmt->fetchAll() as $j){
				$c++;
				$row_class = "";
				if ($j['r_status'] == 'Approved') {
					$row_class = " bg-danger";
				}

				echo '<tr style="cursor:pointer;" class="modal-trigger'.$row_class.'" data-toggle="modal" data-target="#view" onclick="rec_details(&quot;'.$j['id'].'~!~'.$j['auth_year'].'~!~'.$j['date_authorized'].'~!~'.$j['expire_date'].'~!~'.$j['remarks'].'~!~'.$j['r_of_cancellation'].'~!~'.$j['d_of_cancellation'].'~!~'.$j['up_date_time'].'~!~'.$j['fullname'].'~!~'.$j['m_name'].'~!~'.$j['auth_no'].'&quot;)">';
					
					// echo '<td>'.$j['process'].'</td>';
					// echo '<td>'.$j['expire_date'].'</td>';
					echo '<td>'.$c.'</td>';
					echo '<td>'.$j['auth_no'].'</td>';
					echo '<td>'.$j['fullname'].'</td>';
					echo '<td>'.$j['m_name'].'</td>';
					echo '<td>'.$j['emp_id'].'</td>';
					echo '<td>'.$j['batch'].'</td>';
					echo '<td>'.$j['dept'].'</td>';
					// echo '<td>'.$j['up_date_time'].'</td>';
					// echo '<td>'.$j['r_of_cancellation'].'</td>';
					// echo '<td>'.$j['d_of_cancellation'].'</td>';
					
				echo '</tr>';
			}
		}else{
			echo '<tr>';
				echo '<td style="text-align:center;" colspan="4">No Result</td>';
			echo '</tr>';
		}
	} else {
		echo '<script>alert("Please select category and process");</script>';
	}
}

if ($method == 'view') {
	$fullname = $_POST['fullname'];
	$auth_no = $_POST['auth_no'];
	$category = $_POST['category'];

	$c = 0;

		$query = "SELECT a.batch, a.id,a.auth_no,a.auth_year,a.date_authorized,a.expire_date,a.r_of_cancellation,a.d_of_cancellation,a.remarks,a.up_date_time,a.r_status,a.i_status,b.fullname,b.emp_id,a.dept,c.category";

		if ($category == 'Final') {
			$query = $query . " FROM `t_f_process`";
		}else if ($category == 'Initial') {
			$query = $query . " FROM `t_i_process`";
		}
		$query = $query . " a
							LEFT JOIN t_employee_m b ON a.emp_id = b.emp_id AND a.batch = b.batch
							JOIN `m_process` c ON a.process = c.process
							where a.auth_no = '$auth_no'";

	$query = $query . "ORDER BY auth_year DESC";

	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchAll() as $j){
			$c++;
			$row_class = "";
			$i_status = $j['i_status']; 
			if ($j['r_status'] == 'Approved') {
				$row_class = " bg-danger";
			}
			if ($i_status == 'Approved') {
			echo '<tr style="cursor:pointer;" class="modal-trigger'.$row_class.'" data-toggle="modal" data-target="#update" onclick="rec_update(&quot;'.$j['id'].'~!~'.$j['auth_year'].'~!~'.$j['date_authorized'].'~!~'.$j['expire_date'].'~!~'.$j['remarks'].'~!~'.$j['r_of_cancellation'].'~!~'.$j['dept'].'~!~'.$j['d_of_cancellation'].'~!~'.$j['up_date_time'].'~!~'.$j['fullname'].'~!~'.$j['auth_no'].'~!~'.$j['i_status'].'&quot;)">';
				
				echo '<td>'.$j['auth_year'].'</td>';
				echo '<td>'.$j['date_authorized'].'</td>';
				echo '<td>'.$j['expire_date'].'</td>';
				echo '<td>'.$j['remarks'].'</td>';
				echo '<td>'.$j['r_of_cancellation'].'</td>';
				echo '<td>'.$j['d_of_cancellation'].'</td>';
				echo '<td>'.$j['dept'].'</td>';
				echo '<td>'.$j['up_date_time'].'</td>';
				
				
			echo '</tr>';
		}
	}
	}else{
		echo '<tr>';
			echo '<td style="text-align:center;" colspan="4">No Result</td>';
		echo '</tr>';
	}

}




if ($method == 'update') {
    $auth_no = $_POST['auth_no'];
    $auth_year = $_POST['auth_year'];
    $date_authorized = $_POST['date_authorized'];
    $expire_date = $_POST['expire_date'];
    $remarks = $_POST['remarks'];
    $r_of_cancellation = $_POST['r_of_cancellation'];
    $dept = $_POST['dept'];
    $d_of_cancellation = $_POST['d_of_cancellation'];
    $up_date_time = $_POST['up_date_time'];
    $id = $_POST['id'];
    $category = $_POST['category'];
    $c = 0;

    $error = 0;

    $query = "SELECT id FROM ";
    if ($category == 'Final') {
        $query .= "`t_f_process`";
    } else if ($category == 'Initial') {
        $query .= "`t_i_process`";
    }
    $query .= " WHERE id = '$id' AND  auth_no='$auth_no'  AND auth_year = '$auth_year' AND date_authorized = '$date_authorized' AND expire_date = '$expire_date' AND remarks = '$remarks' AND dept = '$dept'";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() < 1) {
        $query = "UPDATE ";
        if ($category == 'Final') {
            $query .= "`t_f_process`";
        } else if ($category == 'Initial') {
            $query .= "`t_i_process`";
        }
        $query .= " SET remarks = '$remarks', auth_year = '$auth_year', date_authorized = '$date_authorized', expire_date = '$expire_date', dept = '$dept', i_status = 'Pending', up_date_time = '".$_SESSION['fname']. "/ " .$server_date_time."' WHERE id = '$id'";
        $stmt = $conn->prepare($query);
        if (!$stmt->execute()) {
            $error++;
        }
    } else {
        $query = "UPDATE ";
        if ($category == 'Final') {
            $query .= "`t_f_process`";
        } else if ($category == 'Initial') {
            $query .= "`t_i_process`";
        }
        $query .= " SET r_of_cancellation = '$r_of_cancellation', d_of_cancellation = '$d_of_cancellation', r_status = 'Pending', dept = '$dept', up_date_time = '".$_SESSION['fname']. "/ " .$server_date_time."' WHERE auth_no = '$auth_no'";
        $stmt = $conn->prepare($query);
        if (!$stmt->execute()) {
            $error++;
        }
    }

    if ($error == 0) {
        echo 'success';
    } else {
        echo 'error';
    }
}

// for QC Cancellation
if ($method == 'qc_fetch_category') {
	$emp_id = $_POST['emp_id'];
	$pro = $_POST['pro'];
	$category = $_POST['category'];
	$fullname = $_POST['fullname'];
	$current_page = intval($_POST['current_page']);
	$c = 0;

	if (!empty($category)) {

		$results_per_page = 100;

		//determine the sql LIMIT starting number for the results on the displaying page
		$page_first_result = ($current_page-1) * $results_per_page;

		// For row numbering
		$c = $page_first_result;
		
		$query = "SELECT b.batch,a.up_date_time,a.id,a.auth_no,a.auth_year,a.date_authorized,a.expire_date,a.r_of_cancellation,a.d_of_cancellation,a.remarks,a.up_date_time,a.r_status,b.fullname,b.m_name,b.agency,a.dept,b.batch,b.emp_id,c.category";

		if ($category == 'Final') {
			$query = $query . " FROM `t_f_process`";
		}else if ($category == 'Initial') {
			$query = $query . " FROM `t_i_process`";
		}
		$query = $query . " a
							LEFT JOIN t_employee_m b ON a.emp_id = b.emp_id AND a.batch = b.batch
							JOIN `m_process` c ON a.process = c.process
							WHERE a.i_status = 'Approved'";

		if (!empty($emp_id)) {
			$query = $query . " AND (b.emp_id = '$emp_id' OR b.emp_id_old = '$emp_id')";
		}
		if (!empty($fullname)) {
			$query = $query . " AND b.fullname LIKE '$fullname%'";
		}
		if (!empty($pro)) {
			$query = $query . " AND a.process LIKE '$pro'";
		}
		$query = $query . "GROUP BY a.auth_no ORDER BY b.fullname ASC LIMIT ".$page_first_result.", ".$results_per_page;
		$stmt = $conn->prepare($query);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			foreach($stmt->fetchAll() as $j){
				$c++;
				$row_class = "";
				if ($j['r_status'] == 'Approved') {
					$row_class = " bg-danger";
				}

				echo '<tr style="cursor:pointer;" class="modal-trigger'.$row_class.'" data-toggle="modal" data-target="#view" onclick="qc_rec_details(&quot;'.$j['id'].'~!~'.$j['auth_year'].'~!~'.$j['date_authorized'].'~!~'.$j['expire_date'].'~!~'.$j['remarks'].'~!~'.$j['r_of_cancellation'].'~!~'.$j['d_of_cancellation'].'~!~'.$j['up_date_time'].'~!~'.$j['fullname'].'~!~'.$j['m_name'].'~!~'.$j['auth_no'].'&quot;)">';
					
					// echo '<td>'.$j['process'].'</td>';
					// echo '<td>'.$j['expire_date'].'</td>';
					echo '<td>'.$c.'</td>';
					echo '<td>'.$j['auth_no'].'</td>';
					echo '<td>'.$j['fullname'].'</td>';
					echo '<td>'.$j['m_name'].'</td>';
					echo '<td>'.$j['emp_id'].'</td>';
					echo '<td>'.$j['batch'].'</td>';
					echo '<td>'.$j['dept'].'</td>';
					// echo '<td>'.$j['up_date_time'].'</td>';
					// echo '<td>'.$j['r_of_cancellation'].'</td>';
					// echo '<td>'.$j['d_of_cancellation'].'</td>';
					
				echo '</tr>';
			}
		}else{
			echo '<tr>';
				echo '<td style="text-align:center;" colspan="4">No Result</td>';
			echo '</tr>';
		}
	} else {
		echo '<script>alert("Please select category and process");</script>';
	}
}

if ($method == 'qc_view') {
	$fullname = $_POST['fullname'];
	$auth_no = $_POST['auth_no'];
	$category = $_POST['category'];

	$c = 0;

		$query = "SELECT a.batch, a.id,a.auth_no,a.auth_year,a.date_authorized,a.expire_date,a.r_of_cancellation,a.d_of_cancellation,a.remarks,a.up_date_time,a.r_status,a.i_status,b.fullname,b.emp_id,a.dept,c.category";

		if ($category == 'Final') {
			$query = $query . " FROM `t_f_process`";
		}else if ($category == 'Initial') {
			$query = $query . " FROM `t_i_process`";
		}
		$query = $query . " a
							LEFT JOIN t_employee_m b ON a.emp_id = b.emp_id AND a.batch = b.batch
							JOIN `m_process` c ON a.process = c.process
							where a.auth_no = '$auth_no'";

	$query = $query . "ORDER BY auth_year DESC";

	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchAll() as $j){
			$c++;
			$row_class = "";
			$i_status = $j['i_status']; 
			if ($j['r_status'] == 'Approved') {
				$row_class = " bg-danger";
			}
			if ($i_status == 'Approved') {
			echo '<tr style="cursor:pointer;" class="modal-trigger'.$row_class.'" data-toggle="modal" data-target="#admine_r_update" onclick="qc_rec_update(&quot;'.$j['id'].'~!~'.$j['auth_year'].'~!~'.$j['date_authorized'].'~!~'.$j['expire_date'].'~!~'.$j['remarks'].'~!~'.$j['r_of_cancellation'].'~!~'.$j['dept'].'~!~'.$j['d_of_cancellation'].'~!~'.$j['up_date_time'].'~!~'.$j['fullname'].'~!~'.$j['auth_no'].'~!~'.$j['i_status'].'&quot;)">';
				
				echo '<td>'.$j['auth_year'].'</td>';
				echo '<td>'.$j['date_authorized'].'</td>';
				echo '<td>'.$j['expire_date'].'</td>';
				echo '<td>'.$j['remarks'].'</td>';
				echo '<td>'.$j['r_of_cancellation'].'</td>';
				echo '<td>'.$j['d_of_cancellation'].'</td>';
				echo '<td>'.$j['dept'].'</td>';
				echo '<td>'.$j['up_date_time'].'</td>';
				
				
			echo '</tr>';
		}
	}
	}else{
		echo '<tr>';
			echo '<td style="text-align:center;" colspan="4">No Result</td>';
		echo '</tr>';
	}

}




if ($method == 'qc_update') {
    $auth_no = $_POST['auth_no'];
    $auth_year = $_POST['auth_year'];
    $date_authorized = $_POST['date_authorized'];
    $expire_date = $_POST['expire_date'];
    $remarks = $_POST['remarks'];
    $r_of_cancellation = $_POST['r_of_cancellation'];
    $dept = $_POST['dept'];
    $d_of_cancellation = $_POST['d_of_cancellation'];
    $id = $_POST['id'];
    $category = $_POST['category'];
    $c = 0;

    $error = 0;

    $query = "SELECT id FROM ";
    if ($category == 'Final') {
        $query .= "`t_f_process`";
    } else if ($category == 'Initial') {
        $query .= "`t_i_process`";
    }
    $query .= " WHERE id = '$id' AND  auth_no='$auth_no'  AND auth_year = '$auth_year' AND date_authorized = '$date_authorized' AND expire_date = '$expire_date' AND remarks = '$remarks' AND dept = '$dept'";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    // if ($stmt->rowCount() < 1) {
    //     $query = "UPDATE ";
    //     if ($category == 'Final') {
    //         $query .= "`t_f_process`";
    //     } else if ($category == 'Initial') {
    //         $query .= "`t_i_process`";
    //     }
    //     $query .= " SET remarks = '$remarks', auth_year = '$auth_year', date_authorized = '$date_authorized', expire_date = '$expire_date', dept = '$dept', r_status = 'Pending', up_date_time = '".$_SESSION['fname']. "/ " .$server_date_time."' WHERE id = '$id'";
    //     $stmt = $conn->prepare($query);
    //     if (!$stmt->execute()) {
    //         $error++;
    //     }
    // } else {
        $query = "UPDATE ";
        if ($category == 'Final') {
            $query .= "`t_f_process`";
        } else if ($category == 'Initial') {
            $query .= "`t_i_process`";
        }
        $query .= " SET r_of_cancellation = '$r_of_cancellation', d_of_cancellation = '$d_of_cancellation', r_status = 'Pending', dept = '$dept', up_date_time = '".$_SESSION['fname']. "/ " .$server_date_time."' WHERE auth_no = '$auth_no'";
        $stmt = $conn->prepare($query);
        if (!$stmt->execute()) {
            $error++;
        }
    // }

    if ($error == 0) {
        echo 'success';
    } else {
        echo 'error';
    }
}

?>