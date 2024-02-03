<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'count_notif_admin_reviewer') {
	$notif_new_can_request = 0;
	$notif_approved = 0;
	$notif_disapproved = 0;

	$sql = "SELECT `notif_new_can_request`, `notif_approved`, `notif_disapproved` FROM `t_notif_can` WHERE interface = 'admin_reviewer'";
	$stmt = $conn -> prepare($sql);
	$stmt -> execute();
	if ($stmt -> rowCount() > 0) {
		while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
			$notif_new_can_request = intval($row['notif_new_can_request']);
			$notif_approved = intval($row['notif_approved']);
			$notif_disapproved = intval($row['notif_disapproved']);
		}
	}

	$total = $notif_new_can_request + $notif_approved + $notif_disapproved;

	$response_arr = array(
        'notif_new_can_request' => $notif_new_can_request,
        'notif_approved' => $notif_approved,
        'notif_disapproved' => $notif_disapproved,
        'total' => $total
    );

    echo json_encode($response_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

if ($method == 'update_notif_admin_reviewer') {
	$sql = "UPDATE `t_notif_can` SET `notif_new_can_request`= 0, `notif_approved`= 0, `notif_disapproved`= 0 WHERE interface = 'admin_reviewer'";
	$stmt = $conn -> prepare($sql);
	$stmt -> execute();
}

if ($method == 'count_notif_admin') {
	$notif_new_can_request = 0;
	$notif_approved = 0;
	$notif_disapproved = 0;

	$sql = "SELECT `notif_new_can_request`, `notif_approved`, `notif_disapproved` FROM `t_notif_can` WHERE interface = 'admin'";
	$stmt = $conn -> prepare($sql);
	$stmt -> execute();
	if ($stmt -> rowCount() > 0) {
		while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
			$notif_approved = intval($row['notif_approved']);
			$notif_disapproved = intval($row['notif_disapproved']);
		}
	}

	$total = $notif_new_can_request + $notif_approved + $notif_disapproved;

	$response_arr = array(
        'notif_approved' => $notif_approved,
        'notif_disapproved' => $notif_disapproved,
        'total' => $total
    );

    echo json_encode($response_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

if ($method == 'update_notif_admin') {
	$sql = "UPDATE `t_notif_can` SET  `notif_approved`= 0, `notif_disapproved`= 0 WHERE interface = 'admin'";
	$stmt = $conn -> prepare($sql);
	$stmt -> execute();
}

if ($method == 'count_notif_hrd_approver') {
	$notif_approval = 0;

	$sql = "SELECT `notif_approval` FROM `t_notif_can` WHERE interface = 'hrd_approver'";
	$stmt = $conn -> prepare($sql);
	$stmt -> execute();
	if ($stmt -> rowCount() > 0) {
		while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
			$notif_approval = intval($row['notif_approval']);
		}
	}

	$total = $notif_approval;

	$response_arr = array(
        'notif_approval' => $notif_approval,
        'total' => $total
    );

    echo json_encode($response_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

if ($method == 'update_notif_hrd_approver') {
	$sql = "UPDATE `t_notif_can` SET  `notif_approval`= 0 WHERE interface = 'hrd_approver'";
	$stmt = $conn -> prepare($sql);
	$stmt -> execute();
}

$conn = null;
?>