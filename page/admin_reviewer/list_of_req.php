<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/list_of_reqbar.php';?>
<?php include '../../process/conn.php';?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>List of Request</b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">List of Request</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<section class="content" >
  <div class="container-fluid">
    <div class="row">
    <div class="col-12 col-sm-12">
      <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
          <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Request</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">History</a>
          <!-- </li>
           <li class="nav-item">
          <a class="nav-link" id="custom-tabs-one-disapprove-tab" data-toggle="pill" href="#custom-tabs-one-disapprove" role="tab" aria-controls="custom-tabs-one-disapprove" aria-selected="false">Disapproved</a>
          </li> -->
          </ul>
        </div>
          <div class="card-body" style="overflow: auto;">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                <div class="d-flex">
                  <div class="mr-auto p-2">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#i_review">
                      Review
                    </button>
                  </div>
                  <div class="p-2">
                    <select class="  btn bg-teal" name="category" id="category" required onchange="search_pending(1)">
                      <option value="">Category</option>
                      <option >Initial</option>
                      <option >Final</option>
                  </select>
                </div>
                  <div class="p-2"><input placeholder="Employee Name" type="text" id="fullname_p" class="form-control" autocomplete="off"></div>
                  <div class="p-2"><input placeholder="Employee ID" type="text" id="emp_id_p" class="form-control" autocomplete="off"></div>
                  <div class="p-2"><button class="btn btn-primary" onclick="search_pending(1)">Search</button></div>
                </div>


                <div class="row" >
                    <div class="col-12">
                      <div class="card-body table-responsive p-0" style="height: 500px;">
                        <table class="table table-head-fixed text-nowrap" id="employee_data">
                     
                        <thead>

                          <tr>

                            <th style="text-align:center;">
                                        <input type="checkbox" name="" id="check_all_for_auth" onclick="select_all_func()">
                                      </th>
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
                            <th>Department</th>
                            <th>Status</th>
                            <th>Remarks</th>

                          </tr>
                        </thead>
                        <tbody id="pending_list">
                           
                        </tbody>

                      </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-9 col-9">
                          <div class="dataTables_info" id="count_rows_display1" role="status1" aria-live="polite"></div>
                          <input type="hidden" id="count_rows1">
                        </div>
                        <div class="col-sm-12 col-md-1 col-1">
                          <button type="button" id="btnPrevPage1" class="btn bg-gray-dark btn-block" onclick="get_prev_page1()">Prev</button>
                        </div>
                        <div class="col-sm-12 col-md-1 col-1">
                          <input list="pending_list_paginations1" class="form-control" id="pending_list_pagination1" maxlength="255">
                          <datalist id="pending_list_paginations1"></datalist>
                        </div>
                        <div class="col-sm-12 col-md-1 col-1">
                          <button type="button" id="btnNextPage1" class="btn bg-gray-dark btn-block" onclick="get_next_page1()">Next</button>
                        </div>
                      </div>
                    </div>
                  </div>
             
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                  <div class="d-flex">
                  <div class="mr-auto p-2"></div>
                  <div class="p-2">
                    <select class="  btn bg-teal" name="category" id="categoryyy" required onchange="search_history(1)">
                      <option value="">Category</option>
                      <option >Initial</option>
                      <option >Final</option>
                  </select>
                  </div>
                  <div class="p-2"><input placeholder="Employee Name" type="text" id="fullname_h" class="form-control" autocomplete="off"></div>
                  <div class="p-2"><input placeholder="Employee ID" type="text" id="emp_id_h" class="form-control" autocomplete="off"></div>
                  <div class="p-2"><button class="btn btn-primary" onclick="search_history(1)">Search</button></div>
                </div>

                <div class="row" >
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
                            <th>Approved By/ Date/ Time</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            

                          </tr>
                        </thead>
                        <tbody id="history_list">
                           
                        </tbody>

                      </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-9 col-9">
                          <div class="dataTables_info" id="count_rows_display2" role="status" aria-live="polite"></div>
                          <input type="hidden" id="count_rows2">
                        </div>
                        <div class="col-sm-12 col-md-1 col-1">
                          <button type="button" id="btnPrevPage2" class="btn bg-gray-dark btn-block" onclick="get_prev_page2()">Prev</button>
                        </div>
                        <div class="col-sm-12 col-md-1 col-1">
                          <input list="history_list_paginations2" class="form-control" id="history_list_pagination2" maxlength="255">
                          <datalist id="history_list_paginations2"></datalist>
                        </div>
                        <div class="col-sm-12 col-md-1 col-1">
                          <button type="button" id="btnNextPage2" class="btn bg-gray-dark btn-block" onclick="get_next_page2()">Next</button>
                        </div>
                      </div>
                    </div>
                  </div>

              </div>
               <!-- <div class="tab-pane fade" id="custom-tabs-one-disapprove" role="tabpanel" aria-labelledby="custom-tabs-one-disappove-tab">
                <div class="d-flex">
                  <div class="mr-auto p-2"></div>
                  <div class="p-2">
                    <select class="  btn bg-teal" name="category" id="category_d" required onchange="search_dis(1)">
                      <option value="">Category</option>
                      <option >Initial</option>
                      <option >Final</option>
                  </select>
                </div>
                  <div class="p-2"><input placeholder="Employee Name" type="text" id="emp_id_d" class="form-control" autocomplete="off"></div>
                  <div class="p-2"><input placeholder="Employee ID" type="text" id="fullname_d" class="form-control" autocomplete="off"></div>
                  <div class="p-2"><button class="btn btn-primary" onclick="search_dis(1)">Search</button></div>
                </div>


                <div class="row" >
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
                            <th>Disapproved By/ Date/ Time</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Remarks</th>

                          </tr>
                        </thead>
                        <tbody id="dis_list">
                           
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
                          <input list="dis_list_paginations" class="form-control" id="dis_list_pagination" maxlength="255">
                          <datalist id="dis_list_paginations"></datalist>
                        </div>
                        <div class="col-sm-12 col-md-1 col-1">
                          <button type="button" id="btnNextPage" class="btn bg-gray-dark btn-block" onclick="get_next_page()">Next</button>
                        </div>
                      </div>
                    </div>
                  </div>
             
              </div> -->
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
<?php include 'plugins/js/list_of_req_script.php';?>