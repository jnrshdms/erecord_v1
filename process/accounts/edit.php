<?php
include '../conn.php';

$method = $_POST['method'];

	if ($method == 'update_acc') {
	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];


	$check = "SELECT id FROM accounts WHERE username = '$username' AND password = '$password' AND fname = '$fname' AND role = '$role' ";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		echo 'existing';
	}else{
		$stmt = NULL;
	$query = "UPDATE accounts SET username = '$username', password = '$password', fname = '$fname', role = '$role' WHERE id = '$id'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
	}
}

if ($method == 'delete_account') {
	$id = $_POST['id'];

	$query = "DELETE FROM accounts WHERE id = '$id'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}

?>