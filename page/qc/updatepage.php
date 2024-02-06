<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/updatebar.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>Update Data </b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Update Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
<div class="container-fluid">
  <div class="row d-flex justify-content-end">

      <div class="col-0">
        <select class="  btn bg-teal" recquired name="category" id="category" onchange="search_data(1)">
                <option value="">Category</option>
                <option >Initial</option>
                <option >Final</option>
      </select>
      </div>

        <div class="col-4">
            <select class="btn"  name="pro" recquired id="pro" onchange="search_data(1)" style="width: 100%; border: 2px solid black;background-color: white;color: black;font-size: 16px;cursor: pointer; border-color: #7ADFB5;">  
                <option>Please select a process.....</option>
                <option></option>
            </select>
        </div>
        <div class="col-0">
          <input class="form-control" placeholder="Employee Name" type="text" id="fullname_search" >
        </div>
        <div class="col-0">
          <input class="form-control" placeholder="Employee ID" type="text" id="emp_id_search" >
        </div>
               <div class="float-left" >
                 <a href="#" class="btn bg-teal" onclick="search_data(1)">Search</a>
               </div>
        </div>
</div>



<div class="row" >
  <div class="col-12">
    <div class="card-body table-responsive p-0" style="height: 450px;">
      <table class="table table-head-fixed text-nowrap"  id="employee_data">
   
      <thead>

        <tr>
          <!-- <th>Process Name</th>
          <th>Expire&nbsp;Date</th> -->
          <th>#</th>
          <th>Authorization No.</th>
          <th>Employee Name</th>
          <th>Maiden Name</th>
          <th>Employee No.</th>
          <th>Batch No.</th>
          <th>Department</th>
          <!-- <th>Uploader/Date/Time</th> -->
          <!-- <th>Remarks</th>
          <th>Reason of Cancellation</th>
          <th>Date of Cancellation</th> -->
        </tr>
      </thead>
      <tbody id="process_details">
         
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
</div>
</section>

    <!-- /.content -->
  </div>


<?php include 'plugins/footer.php';?>

<?php include 'plugins/js/update_script.php';?>

