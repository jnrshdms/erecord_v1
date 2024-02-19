<?php include 'process/conn.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Record System</title>
  <link rel="icon" href="dist/img/logo.png" type="image/x-icon" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="dist/css/font.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>

<body>
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-11">
            <div class="flex-column justify-content-center align-items-center">
              <img src="dist/img/logo.png" alt="logo" class="logo" height="50" width="45">
              <span class="h2 logo-text">Employee Record</span>
            </div>
          </div>
          <div class="col-1">
            <div class="float-right">
              <a href="login.php" class="btn btn-primary">LOGIN</a>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-md-12 m-0 p-0">
        <div class="card" style="border-top: 2px solid #1e96fc;">
          <div class="card-header">
            <h3 class="card-title"><img src="dist/img/view1.png" style="height:28px;">&ensp;Viewer Table</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-1">
                <select class="form-control btn bg-teal" recquired name="category" id="category" onchange="search_data(1)">
                  <option value="">Category</option>
                  <option>Initial</option>
                  <option>Final</option>
                </select>
              </div>
              <div class="col-sm-3">
                <select class="form-control btn" name="pro" recquired id="pro" style="width: 100%; border: 2px solid black;background-color: white;color: black;font-size: 16px;cursor: pointer; border-color: #7ADFB5;" onchange="search_data(1)">
                  <option>Please select a process.....</option>
                  <option></option>
                </select>
              </div>
              <div class="col-sm-2">
                <input class="form-control" placeholder="Employee ID" type="text" id="emp_id_search">
              </div>
              <div class="col-sm-2">
                <input class="form-control" placeholder="Employee Name" type="text" id="fullname_search">
              </div>
              <div class="col-sm-2">
                <input class="form-control" type="text" placeholder="Date Authorized" onfocus="(this.type='date')" onblur="(this.type='text')" id="date_authorized_search">
              </div>
              <div class="col-sm-2">
                <input class="form-control" type="text" placeholder="Expire Date" onfocus="(this.type='date')" onblur="(this.type='text')" id="expire_date_search">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-8">
              </div>
              <div class="col-sm-2">
                <!-- search button -->
                <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="search_data(1)" style="color:#fff;height:34px;border-radius:.25rem;background: #20c997;font-size:15px;font-weight:normal;"><img src="dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
              </div>
              <div class="col-sm-2">
                <!-- exportt button -->
                <a class="btn btn-block d-flex justify-content-left" onclick="export_data('employee_data')" style="color:#fff;height:34px;border-radius:.25rem;background: #F29A35;font-size:15px;font-weight:normal;"><img src="dist/img/export.png" style="height:19px;">&nbsp;&nbsp;Export</a>
              </div>
            </div>

            <br>
            <div class="col-12">
              <div class="card-body table-responsive p-0" style="height: 550px;">
                <table class="table table-head-fixed text-nowrap" id="employee_data">
                  <thead style="text-align: center;">
                    <th>#</th>
                    <th>Process Name</th>
                    <th>Authorization No.</th>
                    <th>Authorization Year</th>
                    <th>Date Authorized</th>
                    <th>Expire&nbsp;Date</th>
                    <th>Employee Name</th>
                    <th>Employee No.</th>
                    <th>Batch No.</th>
                    <th>Department</th>
                    <th>Remarks</th>
                    <th>Reason of Cancellation</th>
                    <th>Date of Cancellation</th>
                  </thead>
                  <tbody id="process_details"></tbody>
                </table>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-9 col-9">
                  <div class="dataTables_info" id="count_rows_display" role="status" aria-live="polite"></div>
                  <input type="hidden" id="count_rows">
                </div>
                <div class="col-sm-12 col-md-1 col-1">
                  <button type="button" id="btnPrevPage" class="btn bg-gray-dark btn-block" onclick="get_prev_page()">Prev</button>
                </div>
                <div class="col-sm-12 col-md-1 col-1">
                  <input list="process_details_paginations" class="form-control" id="process_details_pagination" maxlength="255">
                  <datalist id="process_details_paginations"></datalist>
                </div>
                <div class="col-sm-12 col-md-1 col-1">
                  <button type="button" id="btnNextPage" class="btn bg-gray-dark btn-block" onclick="get_next_page()">Next</button>
                </div>
              </div>
       
            </div>
          </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div style="text-align: center;">
    <footer class="content-fluid">
      <strong>Copyright &copy; 2023. Developed by: EJ Montañano </strong>
      All rights reserved.
      <div class=" d-none d-sm-inline-block">
        <b>Version</b> 1.0.1
      </div>
    </footer>
  </div>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
  <?php include 'index_script.php'; ?>
</body>

</html>