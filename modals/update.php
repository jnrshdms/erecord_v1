<div class="modal fade bd-example-modal-xl" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <b>Update Data </b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <input type="hidden" id="id_can" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          <div class="col-0 mt-1">
            <span><b>&nbsp;&nbsp;Employee Name :</b></span>
          </div>
          <div class="col-3">
            <input type="text" id="employee_name_can" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" disabled>
          </div>
          <div class="col-0 mt-1">
            <span><b>Authorization No. :</b></span>
          </div>
          <div class="col-3">
            <input type="text" id="auth_no_can" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" disabled>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-3">
            <span><b>Authorization Year:</b></span>
            <input type="text" id="auth_year_can" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" disbled>
          </div>
          <div class="col-3">
            <span><b>Date Authorized:</b></span>
            <input type="date" id="date_authorized_can" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
          <div class="col-3">
            <span><b>Expire Date:</b></span>
            <input type="date" id="expire_date_can" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
          <div class="col-3">
            <span><b>Remarks:</b></span>
            <input type="text" id="remarks_can" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>

          <div class="col-3">
            <span><b>Department:</b></span>
            <input type="text" id="dept_can" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">

          </div>
          <div class="col-3">
            <span><b>Reason Of Cancellation:</b></span>
            <input type="text" id="r_of_cancellation_can" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
          <div class="col-3">
            <span><b>Date Of Cancellation:</b></span>
            <input type="date" id="d_of_cancellation_can" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
          <div class="col-3">
            <span><b>Updated By:</b></span>
            <input type="text" id="up_date_time_can" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" disabled>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="background:#fff;">
        <div class="col-sm-3">
          <button class="btn btn-block" onclick="minor_save_data()" style="color:#fff;height:34px;border-radius:.25rem;background: #CA3F3F;font-size:15px;font-weight:normal;">Minor Update Data</button>
        </div>
        <div class="col-sm-3">
          <button class="btn btn-block" onclick="save_data()" style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;">Update Data</button>
        </div>
      </div>
    </div>
  </div>
</div>