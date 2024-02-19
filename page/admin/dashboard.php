<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/dashboardbar.php'; ?>
<?php include '../../process/conn.php'; ?>
<div class="content-wrapper" style="background: #FFF;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Status Process</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">E-Record System</a></li>
            <li class="breadcrumb-item active">Status Process</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="col-md-12">
      <div class="card card-light" style="background: #fff; border-top: 2px solid #6c757d;">
        <div class="card-header">
          <h3 class="card-title"><img src="../../dist/img/check-list.png" style="height:28px;">&ensp;Certification Process Table</h3>
        </div>

        <div class="card-body"">
      <div class=" row">
        <div class="col-sm-2"></div>
          <div class="col-sm-2">
            <select class="form-control  btn bg-teal" name="category" id="category_cert" required onchange="search_cert(1)">
              <option value="">Category</option>
              <option>Initial</option>
              <option>Final</option>
            </select>
          </div>
          <div class="col-sm-2">
            <select class="form-control  btn bg-teal" name="stat" id="i_status_cert" required onchange="search_cert(1)">
              <option value="Pending">Pending</option>
              <option value="Reviewed">Reviewed</option>
              <option value="Disapproved">Disapproved</option>
            </select>
          </div>
          <div class="col-sm-2">
            <input placeholder="Employee Name" type="text" id="fullname_cert" class="form-control" autocomplete="off">
          </div>
          <div class="col-sm-2">
            <input placeholder="Employee ID" type="text" id="emp_id_cert" class="form-control" autocomplete="off">
          </div>
          <div class="col-sm-2">
            <!-- search button -->
            <button class="form-control  btn btn-block d-flex justify-content-left" id="search_btn" onclick="search_cert(1)" style="color:#fff;height:38px;border-radius:.25rem;background: #20c997;font-size:15px;font-weight:normal;"><img src="../../dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
          </div>
        </div>
        <br>
        <div class="col-12">
          <div class="card-body table-responsive p-0" style="height: 500px;">
            <table class="table table-head-fixed text-nowrap" id="employee_data">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Process Name</th>
                  <th>Authorization&nbsp;No.</th>
                  <th>Employee&nbsp;Name</th>
                  <th>Employee No</th>
                  <th>Authorization Year</th>
                  <th>Date Authorized</th>
                  <th>Expire&nbsp;Date</th>
                  <th>Reason Of Cancellation</th>
                  <th>Date of Cancellation</th>
                  <th>Prepared By/ Date/ Time</th>
                  <th>Review By/ Date/ Time</th>
                  <th>Status</th>
                  <th>Department</th>
                  <th>Remarks</th>
                </tr>
              </thead>
              <tbody id="cert_list">
              </tbody>
            </table>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-9 col-9">
              <div class="dataTables_info" id="count_rows_display1" role="status1" aria-live="polite"></div>
              <input type="hidden" id="count_rows1">
            </div>
            <div class="col-sm-12 col-md-1 col-1">
              <button type="button" id="btnPrevPage1" class="btn bg-gray-dark btn-block" onclick="get_prev_page1()">Prev</button>
            </div>
            <div class="col-sm-12 col-md-1 col-1">
              <input list="cert_list_paginations1" class="form-control" id="cert_list_pagination1" maxlength="255">
              <datalist id="cert_list_paginations1"></datalist>
            </div>
            <div class="col-sm-12 col-md-1 col-1">
              <button type="button" id="btnNextPage1" class="btn bg-gray-dark btn-block" onclick="get_next_page1()">Next</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/status_script.php'; ?>