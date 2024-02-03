<?php
 include 'conn.php';
 session_start();
 if (isset($_POST['login_btn'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   if (empty($username)) {
      echo 'Please Enter Email Address';
   }else if(empty($password)){
      echo 'Please Enter Password';
   }
    else{

      $check = "SELECT id, fname, role FROM accounts WHERE BINARY username = '$username' AND BINARY password = '$password'";
      $stmt = $conn->prepare($check);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        foreach($stmt->fetchAll() as $e){
            $role = $e['role'];
            $fname = $e['fname'];
        }
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        $_SESSION['fname'] = $fname;
        if($role =='admin_reviewer'){
            header('location: page/admin_reviewer/list_of_req.php');
        }elseif($role =='admin'){
            header('location: page/admin/dashboard.php');
        }elseif($role =='qc'){
            header('location: page/qc/viewpage.php');
        }elseif($role =='hrd_approver'){
            header('location: page/hrd_approver/list_of_req.php');
        }
    }else{
            echo '<script>alert("Wrong Username or Password !!!")</script>';
      }
   }
 }
 if (isset($_POST['Logout'])) {
   session_unset();
   session_destroy();
   header('location: ../index.php');
 }

?>