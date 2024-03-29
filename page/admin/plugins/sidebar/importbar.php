<aside class="main-sidebar sidebar-light-primary elevation-2" style="background: #F6F6F6;">
  <!-- Brand Logo -->
  <a href="defect_monitoring_record.php" class="brand-link">
    <img src="../../dist/img/logo.png" alt="Logo" class="brand-image" style="opacity: .8;">
    <span class="brand-text" style="font-size:17px;color:black">E-Record System</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user1.png" class="img-circle" alt="User Image">
      </div>
      <div class="info">
        <a class="d-block" style="font-size:16px; color:black"><?= htmlspecialchars($_SESSION['fname']); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link ">
            <img src="../../dist/img/check-list.png" style="height:25px;">
            <p class="pl-1" style="font-size:16px; color:black">
              Record Status
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="viewpage.php" class="nav-link">
            <img src="../../dist/img/view.png" style="height:25px;">
            <p class="pl-1" style="font-size:16px; color:black">
              View Data
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="import_exportpage.php" class="nav-link active">
            <img src="../../dist/img/add-user.png" style="height:25px;">
            <p class="pl-1" style="font-size:16px; color:black">
              Add Record
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="updatepage.php" class="nav-link">
            <img src="../../dist/img/backup.png" style="height:25px;">
            <p class="pl-1" style="font-size:16px; color:black">
              Update Data
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="manpowerpage.php" class="nav-link">
            <img src="../../dist/img/group.png" style="height:25px;">
            <p class="pl-1" style="font-size:16px; color:black">
              Masterlist 
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="accountpage.php" class="nav-link ">
            <img src="../../dist/img/account.png" style="height:25px;">
            <p class="pl-1" style="font-size:16px; color:black">
              Account Management
            </p>
          </a>
        </li>
        <?php include 'logout.php'; ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>