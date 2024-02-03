<?php 
//SESSION
include '../../process/session.php';

if (!isset($_SESSION['username'])) {
  header('location: ../../index.php');
  exit;
} else if ($_SESSION['role'] =='admin_reviewer'){
  header('location: ../../page/admin_reviewer/dashboard.php');
  exit;
}
else if ($_SESSION['role'] =='admin'){
  header('location: ../../page/admin/dashboard.php');
  exit;
}else if ($_SESSION['role'] =='hrd_approver'){
  header('location: ../../page/hrd_approver/dashboard.php');
  exit;
}


?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-CERT System | QC</title>

  <link rel="icon" href="../../dist/img/logo.png" type="image/x-icon" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../../dist/css/font.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
   <!-- Sweet Alert -->
  <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
   <style>
   .loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #536A6D;
  width: 50px;
  height: 50px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(1080deg); }
} 
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../dist/img/logo.png" alt="logo" height="100" width="100">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" id="notif_badge" aria-expanded="false"><i class="far fa-bell"></i></a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-header" id="notif_title">Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="dashboard.php" class="dropdown-item" id="notif_approved"><i class="fas fa-exclamation-circle mr-2"></i> no new approved <span class="float-right text-muted text-sm"></span></a>
          <a href="dashboard.php" class="dropdown-item" id="notif_disapproved"><i class="fas fa-exclamation-circle mr-2"></i> no new disapproved <span class="float-right text-muted text-sm"></span></a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->