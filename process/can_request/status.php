<?php 
session_start();
include '../conn.php';

$method = $_POST['method'];

function count_can($search_arr, $conn) {
	if (!empty($search_arr['category'] )) {
	$emp_id = $_POST['emp_id'];
	$fullname = $_POST['fullname'];
	$category = $_POST['category'];
	$i_status = $_POST['r_status'];
	$query = "SELECT count(a.id) as total";

	if ($category == 'Final') {
			$query = $query . " FROM `t_f_process`";
		}else if ($category == 'Initial') {
			$query = $query . " FROM `t_i_process`";
		}
		$query = $query . " a
							LEFT JOIN t_employee_m b ON a.emp_id = b.emp_id 
							JOIN `m_process` c ON a.process = c.process
							where a.r_status ='".$search_arr['r_status']."'";
		if (!empty($search_arr['emp_id'])) {
				$query = $query . " AND (b.emp_id = '".$search_arr['emp_id']."' OR b.emp_id_old = '".$search_arr['emp_id']."')";
			}

		$query = $query . " AND b.fullname LIKE '".$search_arr['fullname']."%'";
		$query = $query ." ORDER BY a.up_date_time DESC";

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

if ($method == 'count_can') {
	$emp_id = $_POST['emp_id'];
	$fullname = $_POST['fullname'];
	$category = $_POST['category'];
	$r_status = $_POST['r_status'];

	$search_arr = array(
		"emp_id" => $emp_id, 
		"fullname" => $fullname, 
		"category" => $category,
		"r_status" => $r_status
	);

	echo count_can($search_arr, $conn);
}
// function count_can($search_arr, $conn) {
//     if (!empty($search_arr['category'])) {
//         $emp_id = $_POST['emp_id'];
//         $fullname = $_POST['fullname'];
//         $category = $_POST['category'];
//         $r_status = $_POST['r_status'];
//         $query = "SELECT count(a.id) as total";

//         if ($category == 'Final') {
//             $query .= " FROM `t_f_process`";
//         } else if ($category == 'Initial') {
//             $query .= " FROM `t_i_process`";
//         }

//         $query .= " a
//                     LEFT JOIN t_employee_m b ON a.emp_id = b.emp_id 
//                     JOIN `m_process` c ON a.process = c.process
//                     WHERE a.r_status = '".$search_arr['r_status']."'";

//         if (!empty($search_arr['emp_id'])) {
//             $query .= " AND (b.emp_id = '".$search_arr['emp_id']."' OR b.emp_id_old = '".$search_arr['emp_id']."')";
//         }

//         $query .= " AND b.fullname LIKE '".$search_arr['fullname']."%' ";
//         $query .= " ORDER BY a.process ASC, b.fullname ASC, a.auth_year DESC";

//         $stmt = $conn->prepare($query);
//         $stmt->execute();

//         if ($stmt->rowCount() > 0) {
//             foreach ($stmt->fetchAll() as $j) {
//                 $total = $j['total'];
//             }
//         } else {
//             $total = 0;
//         }

//         return $total;
//     }
// }


// if ($method == 'count_can') {
// 	$emp_id = $_POST['emp_id'];
// 	$fullname = $_POST['fullname'];
// 	$category = $_POST['category'];
// 	$r_status = $_POST['r_status'];

// 	$search_arr = array(
// 		"emp_id" => $emp_id, 
// 		"fullname" => $fullname, 
// 		"category" => $category,
// 		"r_status" => $r_status
// 	);
// 	echo count_can($search_arr, $conn);
// }

if ($method == 'fetch_can_pagination') {
	$emp_id = $_POST['emp_id'];
	$fullname = $_POST['fullname'];
	$category = $_POST['category'];
	$r_status = $_POST['r_status'];

	$search_arr = array(
		"emp_id" => $emp_id, 
		"fullname" => $fullname, 
		"category" => $category,
		"r_status" => $r_status
	);

	$results_per_page = 100;

	$number_of_result = intval(count_can($search_arr, $conn));

	//determine the total number of pages available  
	$number_of_page = ceil($number_of_result / $results_per_page);

	for ($page = 1; $page <= $number_of_page; $page++) {
		echo '<option value="'.$page.'">'.$page.'</option>';
    }

}


if ($method == 'fetch_status_can') {
	$emp_id = $_POST['emp_id'];
	$fullname = $_POST['fullname'];
	$category = $_POST['category'];
	$r_status = $_POST['r_status'];
	$current_page = intval($_POST['current_page']);
	$c = 0;

	if (!empty($category)) {

		$results_per_page = 100;
		$page_first_result = ($current_page-1) * $results_per_page;
		$c = $page_first_result;
		$query = "SELECT a.id,a.auth_no,a.auth_year,a.date_authorized,a.expire_date,a.r_of_cancellation,a.d_of_cancellation,a.remarks,a.updated_by,a.r_status,a.r_review_by,a.r_approve_by,b.fullname,b.agency,a.dept,b.batch,b.emp_id,c.category,c.process";

		if ($category == 'Final') {
			$query = $query . " FROM `t_f_process`";
		}else if ($category == 'Initial') {
			$query = $query . " FROM `t_i_process`";
		}
		$query = $query . " a
							LEFT JOIN t_employee_m b ON a.emp_id = b.emp_id  
							JOIN `m_process` c ON a.process = c.process
							where a.r_status = '$r_status'";
		if (!empty($emp_id)) {
			$query = $query . " AND (b.emp_id = '$emp_id' OR b.emp_id_old = '$emp_id')";
		}
		if (!empty($fullname)) {
			$query = $query . " AND b.fullname LIKE'$fullname%'";
		}
		$query = $query . "GROUP BY a.auth_no ASC ORDER BY b.fullname ASC LIMIT ".$page_first_result.", ".$results_per_page;
		$stmt = $conn->prepare($query);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			foreach($stmt->fetchAll() as $j){
				$c++;
				$r_status = $j['r_status'];
				
				echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#qc_disapproved" onclick="rec_qc_disapproved(&quot;' . $j['id'] . '~!~' . $j['auth_year'] . '~!~' . $j['date_authorized'] . '~!~' . $j['expire_date'] . '~!~' . $j['remarks'] . '~!~' . $j['dept'] . '~!~' . $j['updated_by'] . '~!~' . $j['fullname'] . '~!~' . $j['auth_no'] . '~!~' . $j['category'] .'~!~' . $j['r_status'].  '&quot;)">';
				echo '<td>' . $c . '</td>';
					echo '<td>'.$c.'</td>';
					echo '<td>'.$j['process'].'</td>';
					echo '<td>'.$j['auth_no'].'</td>';
					echo '<td>'.$j['fullname'].'</td>';
					echo '<td>'.$j['emp_id'].'</td>';
					echo '<td>'.$j['r_of_cancellation'].'</td>';
					echo '<td>'.$j['d_of_cancellation'].'</td>';
					echo '<td>'.$j['updated_by'].'</td>';
					echo '<td>'.$j['r_review_by'].'</td>';
					echo '<td>'.$j['r_approve_by'].'</td>';
					echo '<td>'.$j['dept'].'</td>';
					echo '<td>'.$j['r_status'].'</td>';
					echo '<td>'.$j['remarks'].'</td>';
					
					
				echo '</tr>';
			}
		}else{
				echo '<tr>';
					echo '<td style="text-align:center;" colspan="4">No Result</td>';
				echo '</tr>';
			}
	}else {
		echo '<script>alert("Please select category ");</script>';
	}
}






?>