<?php 
include '../conn.php';
include '../session.php';
$method = $_POST['method'];


if ($method == 'fetch_agency') {
	$query = "SELECT `agency` FROM `m_agency` ORDER BY agency ASC";
	$stmt = $conn -> prepare($query);
	$stmt -> execute();
	if ($stmt -> rowCount() > 0) {
		echo '<option value="">Provider</option>';
		foreach($stmt -> fetchAll() as $row) {
			echo '<option>'.htmlspecialchars($row['agency']).'</option>';
		}
	} else {
		echo '<option>Provider</option>';
	}
}

function count_data($search_arr, $conn) {
	$agency = $_POST['agency'];
	$emp_id = $_POST['emp_id'];
	$batch = $_POST['batch'];
	$fullname = $_POST['fullname'];
	$emp_status = $_POST['emp_status'];

	$query = "SELECT count(id) as total FROM t_employee_m";

	$query = $query ." WHERE (emp_id LIKE '$emp_id%' OR emp_id_old LIKE '$emp_id%') ";
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
	
	$query = $query ." ORDER BY fullname ASC";

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

if ($method == 'count_data') {
	$agency = $_POST['agency'];
	$emp_id = $_POST['emp_id'];
	$batch = $_POST['batch'];
	$fullname = $_POST['fullname'];
	$emp_status = $_POST['emp_status'];

	$search_arr = array(
		"agency" => $agency, 
		"emp_id" => $emp_id, 
		"batch" => $batch,
		"fullname" => $fullname,
		"emp_status" => $emp_status
	);

	echo count_data($search_arr, $conn);
}

if ($method == 'search_data_pagination') {
	$agency = $_POST['agency'];
	$emp_id = $_POST['emp_id'];
	$batch = $_POST['batch'];
	$fullname = $_POST['fullname'];
	$emp_status = $_POST['emp_status'];

	$search_arr = array(
		"agency" => $agency, 
		"emp_id" => $emp_id, 
		"batch" => $batch,
		"fullname" => $fullname,
		"emp_status" => $emp_status
	);

	$results_per_page = 100;

	$number_of_result = intval(count_data($search_arr, $conn));

	//determine the total number of pages available  
	$number_of_page = ceil($number_of_result / $results_per_page);

	for ($page = 1; $page <= $number_of_page; $page++) {
		echo '<option value="'.$page.'">'.$page.'</option>';
    }

}

if ($method == 'fetch_data') {
	$agency = $_POST['agency'];
	$emp_id = $_POST['emp_id'];
	$batch = $_POST['batch'];
	$fullname = $_POST['fullname'];
	$emp_status = $_POST['emp_status'];
	$current_page = intval($_POST['current_page']);
	$c = 0;

	$results_per_page = 100;

	//determine the sql LIMIT starting number for the results on the displaying page
	$page_first_result = ($current_page-1) * $results_per_page;

	// For row numbering
	$c = $page_first_result;

	$query = "SELECT  * FROM t_employee_m WHERE (emp_id LIKE '$emp_id%' OR emp_id_old LIKE '$emp_id%') ";
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
	
	$query = $query ." ORDER BY fullname ASC  LIMIT ".$page_first_result.", ".$results_per_page;

	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchAll() as $j){
			$c++;
			$row_class = "";
				
				if ($j['emp_status'] == 'Resigned') {
					$row_class = "	bg-purple";
				}elseif ($j['emp_status'] == 'Retired') {
					$row_class = "	bg-primary";
				}
				elseif ($j['emp_status'] == 'Dismiss') {
					$row_class = "	bg-orange";
				}
				echo '<tr style="cursor:pointer;" class="modal-trigger'.$row_class.'" data-toggle="modal" data-target="#edit_emp" onclick="edit_employee(&quot;'.$j['id'].'~!~'.$j['fullname'].'~!~'.$j['emp_id'].'~!~'.$j['agency'].'~!~'.$j['batch'].'~!~'.$j['emp_status'].'~!~'.$j['m_name'].'&quot;)">';
				echo '<td>'.$c.'</td>';				
				echo '<td>'.$j['fullname'].'</td>';
				echo '<td>'.$j['m_name'].'</td>';
				echo '<td>'.$j['emp_id'].'</td>';
				echo '<td>'.$j['emp_id_old'].'</td>';
				echo '<td>'.$j['agency'].'</td>';
				// echo '<td>'.$j['dept'].'</td>';
				echo '<td>'.$j['batch'].'</td>';
				
			echo '</tr>';
	}
	
}else{
		echo '<tr>';
			echo '<td style="text-align:center;" colspan="4">No Result</td>';
		echo '</tr>';
	}
}


if ($method == 'save_acc') {
	
	$fullname = $_POST['fullname'];
	$emp_id = $_POST['emp_id'];
	$agency = $_POST['agency'];
	$batch = $_POST['batch'];
	$m_name = $_POST['m_name'];

	if (is_string($fullname) == true && is_string($emp_id) == true && is_string($agency) == true) {
		try {
			$insert = "INSERT INTO t_employee_m (`fullname`, `emp_id`, `agency`,`batch`,`m_name`) VALUES (:fullname,:emp_id,:agency,:batch,:m_name)";
			$stmt = $conn->prepare($insert);
			$stmt->execute(array(
				':fullname' => $fullname,
				':emp_id' => $emp_id,
				':agency' => $agency,
				':batch' => $batch,
				':m_name'=>$m_name
			));
			echo 'success';
		} catch (Exception $e) {
			echo 'fail';
		}
	}else{
		echo 'fail';
	}
}

if ($method == 'save_up') {
	
	$fullname = $_POST['fullname'];
	$emp_id = $_POST['emp_id'];
	$agency = $_POST['agency'];
	$batch = $_POST['batch'];
	$id = $_POST['id'];
	$emp_status = $_POST['emp_status'];
	$m_name = $_POST['m_name'];

	$check = "SELECT emp_id, batch FROM t_employee_m WHERE id = '$id'";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $x) {
            $emp_id_ref = $x['emp_id'];
            $batch_ref = $x['batch'];
        }
    }

	$query = "UPDATE t_employee_m SET fullname = '$fullname', batch = '$batch'"; 

	if ($emp_id_ref != $emp_id) {
    	$query .= ", emp_id_old = '$emp_id_ref'"; // Corrected concatenation
    }

    $query .= ", emp_id = '$emp_id', agency = '$agency', emp_status = '$emp_status', m_name = '$m_name' WHERE id = '$id' "; 

	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		if ($emp_id_ref != $emp_id || $batch_ref != $batch) {
	    	$query_f = "UPDATE t_f_process SET emp_id_old = '$emp_id_ref', emp_id = '$emp_id', batch = '$batch' WHERE emp_id = '$emp_id_ref'";
	    	$stmt_f = $conn->prepare($query_f);
	    	$stmt_f->execute();
	    	$query_i = "UPDATE t_i_process SET emp_id_old = '$emp_id_ref', emp_id = '$emp_id', batch = '$batch' WHERE emp_id = '$emp_id_ref'";
	    	$stmt_i = $conn->prepare($query_i);
	    	$stmt_i->execute();
	    }
		echo 'success';
	} else {
		echo 'error';
	}
}

if ($method == 'delete_account') {
	$id = $_POST['id'];

	$query = "DELETE FROM t_employee_m WHERE id = '$id'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}

?>