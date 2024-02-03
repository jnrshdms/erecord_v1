<?php 
include '../conn.php';

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


// if ($method == 'view') {
// 	$c=0;
// 	$query = "SELECT  * FROM t_employee_history ORDER BY fullname ASC ";
// 	$stmt = $conn->prepare($query);
// 	$stmt->execute();
// 	if ($stmt->rowCount() > 0) {
// 		foreach($stmt->fetchAll() as $j){
// 			$c++;
// 			$row_class = "";
				
// 				if ($j['emp_status'] == 'Resigned') {
// 					$row_class = "	bg-purple";
// 				}elseif ($j['emp_status'] == 'Retired') {
// 					$row_class = "	bg-primary";
// 				}
// 				elseif ($j['emp_status'] == 'Suspended') {
// 					$row_class = "	bg-orange";
// 				}
// 				echo '<tr style="cursor:pointer;" class="modal-trigger'.$row_class.'" data-toggle="modal" data-target="#edit_emp" onclick="edit_employee(&quot;'.$j['id'].'~!~'.$j['fullname'].'~!~'.$j['emp_id'].'~!~'.$j['agency'].'~!~'.$j['dept'].'~!~'.$j['batch'].'~!~'.$j['emp_status'].'&quot;)">';
// 				echo '<td>'.$c.'</td>';				
// 				echo '<td>'.$j['fullname'].'</td>';
// 				echo '<td>'.$j['emp_id'].'</td>';
// 				echo '<td>'.$j['agency'].'</td>';
// 				echo '<td>'.$j['dept'].'</td>';
// 				echo '<td>'.$j['batch'].'</td>';
				
// 			echo '</tr>';
// 	}
	
// }else{
// 		echo '<tr>';
// 			echo '<td style="text-align:center;" colspan="4">No Result</td>';
// 		echo '</tr>';
// 	}
// }

function count_data($search_arr, $conn) {
	$agency = $_POST['agency'];
	$emp_id = $_POST['emp_id'];
	$batch = $_POST['batch'];
	$fullname = $_POST['fullname'];
	$emp_status = $_POST['emp_status'];

	$query = "SELECT count(id) as total FROM t_employee_history";

	$query = $query ." WHERE emp_id LIKE '$emp_id%' ";
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

	$query = "SELECT  * FROM t_employee_history WHERE emp_id LIKE '$emp_id%' ";
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
				echo '<tr style="cursor:pointer;" class="modal-trigger'.$row_class.'">';
				echo '<td>'.$c.'</td>';				
				echo '<td>'.$j['fullname'].'</td>';
				echo '<td>'.$j['m_name'].'</td>';
				echo '<td>'.$j['emp_id'].'</td>';
				echo '<td>'.$j['agency'].'</td>';
				// echo '<td>'.$j['dept'].'</td>';
				echo '<td>'.$j['batch'].'</td>';
				echo '<td>'.$j['date_changed'].'</td>';
				
			echo '</tr>';
	}
	
}else{
		echo '<tr>';
			echo '<td style="text-align:center;" colspan="4">No Result</td>';
		echo '</tr>';
	}
}






?>