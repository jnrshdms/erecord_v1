<?php
include '../conn.php';

$method = $_POST['method'];

if ($method == 'save_acc') {
	
	$fname = $_POST['fname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];

	if (is_string($fname) == true && is_string($username) == true && is_string($password) == true) {
		try {
			$insert = "INSERT INTO accounts (`username`, `password`, `role`, `fname`) VALUES (:username,:password,:role,:fname)";
			$stmt = $conn->prepare($insert);
			$stmt->execute(array(
				':username' => $username,
				':password' => $password,
				':role' => $role,
				'fname' => $fname));
			echo 'success';
		} catch (Exception $e) {
			echo 'fail';
		}
	}else{
		echo 'fail';
	}
}

if ($method == 'fetch_account') {
	$name = $_POST['name'];
	$c = 0;
	$query = "SELECT * FROM accounts WHERE username LIKE '$name%' AND role != 'admin_reviewer' AND role !='hrd_approver'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchAll() as $j){
			$c++;
			
			echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#upacc_admin" onclick="account_details(&quot;'.$j['id'].'~!~'.$j['fname'].'~!~'.$j['role'].'~!~'.$j['password'].'~!~'.$j['username'].'&quot;)">';
			echo '<td style="display:none;" >'.$j['id'].'</td>';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['fname'].'</td>';
				echo '<td>'.$j['role'].'</td>';
				echo '<td>'.$j['username'].'</td>';
				echo '<td>'.$j['password'].'</td>';
			
			echo '</tr>';
		}
	}else{
		echo '<tr>';
			echo '<td style="text-align:center;" colspan="4">No Result</td>';
		echo '</tr>';
	}
}



?>