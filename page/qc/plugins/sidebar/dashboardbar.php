   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../dist/img/logo.png" alt="Logo" class="brand-image img-rounded elevation-3" >
      <span class="brand-text font-weight-light"><b style="font-size:100%;">E-Record | System</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user.png" class="img-circle elevation-2" style="background-color: whitesmoke;" alt="User Image">

        </div>
        <div class="info">
          <a href="#" class="d-block"><b><?=$username;?></b></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
              <i class="fas fa-desktop"></i>
              <p>
                Status
               
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="viewpage.php" class="nav-link">
              <i class="fas fa-eye"></i>
              <p>
                View Data
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="updatepage.php" class="nav-link " >
              <i class="fas fa-edit"></i>
              <p>
               Update Data            
              </p>
            </a>
          </li>
         <?php include 'logout.php' ;?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
