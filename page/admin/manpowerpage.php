<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/manpowerbar.php';?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>Manpower</b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Manpower</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
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
    <!-- Main content -->
<section class="content" >
  <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12" >
            <!-- general form elements -->
            <div class="card card-secondary" >
              <div class="card-header" >
                <h3 class="card-title"></h3>
              </div>
              <div class="card-body" style="overflow: auto;">
    <!-- Main content -->

    <div class="d-flex">
      <div class="mr-auto p-2">Resigned:🟪 Retired:🟦 Dismiss:🟧</div>
      <div div class="p-2">
            <select class="btn btn-outline-primary"  id="emp_status" onchange="search_data(1)">  
                <option>STATUS:</option>
                <option value="Resigned">Resigned</option>
                <option value="Retired">Retired</option>
                <option value="Dismiss">Dismiss</option>
            </select>
        </div>
       <div div class="p-2">
            <select class="btn btn-outline-primary"  name="agency" id="agency" onchange="search_data(1)">  
                <option>Provider</option>
                <option></option>
            </select>
        </div>
       <div div class="p-2">
          <input class="form-control" placeholder="Employee ID" type="text" id="emp_id_search" >
        </div> 
        <div div class="p-2">
          <input class="form-control" placeholder="Employee Name" type="text" id="fullname_search" >
        </div> 
        <div div class="p-2">
          <input class="form-control" placeholder="Batch No." type="number" id="batch" >
        </div> 
        <div div class="p-2">
               <div class="float-left" >
                 <a href="#" class="btn bg-primary" onclick="search_data(1)">Search</a>
               </div>
        </div>

        </div>
<div class="row" >
  <div class="col-12">
    <div class="card-body table-responsive p-0" style="height: 450px;">
      <table class="table table-head-fixed text-nowrap" id="employee_data">
   
      <thead>

        <tr>
          <th>#</th>
          <th>Employee Name</th>
          <th>Maiden Name</th>
          <th>Employee ID</th>
          <th>Provider</th>
          <!-- <th>Department</th> -->
          <th>Batch No.</th>

        </tr>
      </thead>
      <tbody id="details_emp">
         
      </tbody>

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
</div>
</div>
</div>
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'plugins/footer.php';?>
<?php include 'plugins/js/notif_ar_script.php'; //every page except dashboard?> 
<?php include 'plugins/js/manpower_script.php';?>