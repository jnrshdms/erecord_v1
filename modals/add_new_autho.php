<div class="modal fade bd-example-modal-xl" id="add_new_autho" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#6c757d;">
        <h5 class="modal-title" id="exampleModalLabel">
          <b>Add New Authorization</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-3">
            <!-- category -->
            <label style="font-weight: normal;color: #000;"></label>
            <select class="form-control  btn bg-teal" recquired name="category_add" id="category_add">
              <option value="">Category</option>
              <option>Initial</option>
              <option>Final</option>
            </select>
          </div>
          <div class="col-sm-5">
            <!-- select process -->
            <label style="font-weight: normal;color: #000;"></label>
            <select class="form-control btn" name="new_pro_add" recquired id="pro_add" style="width: 100%; border: 2px solid black;background-color: white;color: black;font-size: 16px;cursor: pointer; border-color: #7ADFB5;">
              <option>Please select a process.....</option>
              <option></option>
            </select>
          </div>
          <input type="hidden" id="new_batch_add" class="form-control" style="height:45px; border: 1px solid black; font-size: 15px;" autocomplete="off" readonly>
          <div class="col-sm-4">
            <span><b>Employee No.:</b></span>
            <input type="text" id="new_emp_id_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" readonly>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-4">
            <span><b>Authorization No.:</b></span>
            <input type="text" id="new_auth_no_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" value="N/A">
          </div>
          <div class="col-sm-5">
            <span><b>Employee Name:</b></span>
            <input type="text" id="new_fullname_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" readonly>
          </div>
          <div class="col-sm-3">
            <span><b>Department:</b></span>
            <input type="text" id="new_dept_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
            <!-- <select id="dept_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
              <option value="PD">PD</option>
              <option value="QA">QA</option>
            </select> -->
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-3">
            <span><b>Authorization Year:</b></span>
            <input type="text" id="new_auth_year_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
          <div class="col-sm-3">
            <span><b>Date Authorized:</b></span>
            <input type="date" id="new_date_authorized_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
          <div class="col-sm-3">
            <span><b>Expire Date:</b></span>
            <input type="date" id="new_expire_date_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
          <div class="col-sm-3">
            <span><b>Remarks:</b></span>
            <input type="text" id="new_remarks_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="modal-footer" style="background:#fff;">
        <div class="col-sm-3">
          <button class="btn btn-block" onclick="save_emp_pro()" style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;">Add Authorization</button>
        </div>
      </div>
    </div>
  </div>
</div>