<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/importbar.php'; ?>
<div class="content-wrapper" style="background: #FFF;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Records</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">E-Record System</a></li>
            <li class="breadcrumb-item active">Add Record</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <!-- Small Box (Stat card) -->
  <section class="content">
    <div class="container-fluid">
      <!--  <h5 class="mb-2 mt-4">Small Box</h5> -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <a href="#" data-toggle="modal" data-target="#add_new_autho">
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>ADD NEW</h4>
                <br>
                <p></p>
              </div>
              <div class="icon">
                <i class="fa fa-plus-circle"></i>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <a href="#" data-toggle="modal" data-target="#add_emp_pro">
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>ADD AUTHORIZATION</h4>
                <br>
                <p></p>
              </div>
              <div class="icon">
                <i class="fa fa-plus-circle"></i>
              </div>
            </div>
        </div>
        </a>
        <!-- ./col -->
        <div class="col-lg-2 col-6">
          <!-- small card -->
          <a href="../../template/import.csv" download>
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>DOWNLOAD</h4>
                <br>
                <p></p>
              </div>
              <div class="icon">
                <i class="fa fa-arrow-circle-down"></i>
              </div>
            </div>
        </div>
        </a>
        <!-- ./col -->
        <div class="col-lg-2 col-6">
          <!-- small card -->
          <a href="#" data-toggle="modal" data-target="#import_data">
            <div class="small-box bg-success">
              <div class="inner">
                <h4>IMPORT</h4>
                <br>
                <p></p>
              </div>
              <div class="icon">
                <i class="fas fa-file-import"></i>
              </div>
            </div>
          </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-6">
          <!-- small card -->
          <a href="#" onclick="export_data('employee_data')">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>EXPORT</h4>
                <br>
                <p></p>
              </div>
              <div class="icon">
                <i class="fas fa-file-export"></i>
              </div>
            </div>
        </div>

        </a>
      </div>
      <!-- ./col -->
    </div>
  </section>

  <section class="content">
    <div class="col-md-12">
      <div class="card card-light" style="background: #fff; border-top: 2px solid #6c757d;">
        <div class="card-header">
          <h3 class="card-title"><img src="../../dist/img/acct-user.png" style="height:28px;">&ensp;Certifications Table</h3>
        </div>
        <div class="card-body" style="overflow: auto;">
          <!-- Main content -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-2">
                <select class="form-control  btn bg-teal" name="category" id="category" required onchange="search_data(1)">
                  <option value="">Category</option>
                  <option>Initial</option>
                  <option>Final</option>
                </select>
              </div>
              <div class="col-sm-3">
                <select class="form-control btn" name="pro" required id="pro" onchange="search_data(1)" style="width: 100%; border: 2px solid black;background-color: white;color: black;font-size: 16px;cursor: pointer; border-color: #7ADFB5;">
                  <option>Please select a process.....</option>
                  <option></option>
                </select>
              </div>
              <div class="col-sm-2">
                <input class="form-control" placeholder="Employee ID" type="text" id="emp_id_search">
              </div>
              <div class="col-sm-2">
                <input class="form-control" type="text" placeholder="Expire Date" onfocus="(this.type='date')" onblur="(this.type='text')" id="expire_date_search">
              </div>
              <div class="col-sm-2">
                <!-- search button -->
                <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="search_data(1)" style="color:#fff;height:38px;border-radius:.25rem;background: #20c997;font-size:15px;font-weight:normal;"><img src="../../dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
              </div>
            </div>
            <br>
            <div class="col-12">
              <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap" id="employee_data">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Code</th>
                      <th>Process Name</th>
                      <th>Expire&nbsp;Date</th>
                      <th>Authorization No.</th>
                      <th>Employee Name</th>
                      <th>Maiden Name</th>
                      <th>Employee No.</th>
                      <th>Batch No.</th>
                      <th>Department</th>
                      <th>Status</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody id="process_details">
                  </tbody>
                </table>
                <br>
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
        </div>
      </div>
    </div>
</section>

<!-- =========================================================== -->
<!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/export_script.php'; ?>
<?php include 'plugins/js/addemp_pro_script.php'; ?>