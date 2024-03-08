<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/manpowerbar.php'; ?>
<div class="content-wrapper" style="background: #FFF;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Masterlist</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">E-Record System</a></li>
            <li class="breadcrumb-item active">Masterlist</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <!--  <h5 class="mb-2 mt-4">Small Box</h5> -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <a href="#" data-toggle="modal" data-target="#add_emp">
            <div class="small-box 
            bg-danger">
              <div class="inner">
                <h4>ADD</h4>
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
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <a href="../../template/import_employee.csv" download>
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
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <a href="#" data-toggle="modal" data-target="#import_employee">
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
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <a href="#" onclick="export_data_masterlist()">
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
  <!-- Main content -->
  <section class="content">
    <div class="col-md-12">
      <div class="card card-light" style="background: #fff; border-top: 2px solid #6c757d;">
        <div class="card-header">
          <h3 class="card-title"><img src="../../dist/img/files.png" style="height:28px;">&ensp;Masterlist Table</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-2">Resigned:🟪 Retired:🟦 Dismiss:🟧</div>
            <div class="col-sm-1">
              <select class="form-control btn btn-outline-secondary" id="emp_status" onchange="search_data(1)">
                <option>STATUS:</option>
                <option value="Resigned">Resigned</option>
                <option value="Retired">Retired</option>
                <option value="Dismiss">Dismiss</option>
              </select>
            </div>
            <div class="col-sm-1">
              <select class="form-control btn btn-outline-secondary" name="agency" id="agency" onchange="search_data(1)">
                <option>Provider</option>
                <option></option>
              </select>
            </div>
            <div class="col-sm-2">
              <input class="form-control" placeholder="Employee ID" type="text" id="emp_id_search">
            </div>
            <div class="col-sm-2">
              <input class="form-control" placeholder="Batch No." type="number" id="batch">
            </div>
            <div div class="col-sm-2">
              <input class="form-control" placeholder="Employee Name" type="text" id="fullname_search">
            </div>
            <div class="col-sm-2">
              <!-- search button -->
              <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="search_data(1)" style="color:#fff;height:38px;border-radius:.25rem;background: #20c997;font-size:15px;font-weight:normal;"><img src="../../dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
            </div>
          </div>
          <br>
          <div class="col-12">
            <div class="card-body table-responsive p-0" style="height: 600px;">
              <table class="table table-head-fixed text-nowrap" id="employee_data">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Employee Name</th>
                    <th>Maiden Name</th>
                    <th>Employee ID</th>
                    <th>Employee ID Old</th>
                    <th>Provider</th>
                    <th>Batch No.</th>
                  </tr>
                </thead>
                <tbody id="details_emp">
                </tbody>
              </table>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12 col-md-9 col-9">
                <div class="dataTables_info" id="count_rows_display" role="status" aria-live="polite"></div>
                <input type="hidden" id="count_rows">
              </div>
              <div class="col-sm-12 col-md-1 col-1">
                <button type="button" id="btnPrevPage" class="btn bg-gray-dark btn-block" onclick="get_prev_page()">Prev</button>
              </div>
              <div class="col-sm-12 col-md-1 col-1">
                <input list="details_emp_paginations" class="form-control" id="details_emp_pagination" maxlength="255">
                <datalist id="details_emp_paginations"></datalist>
              </div>
              <div class="col-sm-12 col-md-1 col-1">
                <button type="button" id="btnNextPage" class="btn bg-gray-dark btn-block" onclick="get_next_page()">Next</button>
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
<?php include 'plugins/js/manpower_script.php'; ?>