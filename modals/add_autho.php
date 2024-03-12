<div class="modal fade bd-example-modal-xl" id="add_emp_pro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#6c757d;">
        <h5 class="modal-title" id="exampleModalLabel">
          <b>Add Authorization</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-4">
            <span><b>Category:</b></span>
            <input type="text" id="category_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" readonly>
          </div>
          <div class="col-sm-4">
            <span><b>Process:</b></span>
            <input type="text" id="process_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" readonly>
          </div>
          <input type="hidden" id="batch_add" class="form-control" style="height:45px; border: 1px solid black; font-size: 15px;" autocomplete="off" readonly>
          <div class="col-sm-4">
            <span><b>Employee No.:</b></span>
            <input type="text" id="emp_id_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" readonly>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-4">
            <span><b>Authorization No.:</b></span>
            <input type="text" id="auth_no_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" value="N/A">
          </div>
          <div class="col-sm-5">
            <span><b>Employee Name:</b></span>
            <input type="text" id="fullname_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" readonly>
          </div>
          <div class="col-sm-3">
            <span><b>Department:</b></span>
            <input type="text" id="dept_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-3">
            <span><b>Authorization Year:</b></span>
            <input type="text" id="auth_year_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
          <div class="col-sm-3">
            <span><b>Date Authorized:</b></span>
            <input type="date" id="date_authorized_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
          <div class="col-sm-3">
            <span><b>Expire Date:</b></span>
            <input type="date" id="expire_date_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
          <div class="col-sm-3">
            <span><b>Remarks:</b></span>
            <input type="text" id="remarks_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="background:#fff;">
        <div class="col-sm-3">
          <button class="btn btn-block" onclick="add_emp_pro()" style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;">Add Authorization</button>
        </div>
      </div>
    </div>
  </div>
</div>