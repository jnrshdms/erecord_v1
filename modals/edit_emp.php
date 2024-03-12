<div class="modal fade bd-example-modal-xl" id="edit_emp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#6c757d;">
        <h5 class="modal-title" id="exampleModalLabel">
          <b>Update Masterlist</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <input type="hidden" id="id_edit" class="form-control">
          <div class="col-sm-4">
            <span><b>Employee Name:</b></span>
            <input type="text" id="fullname_edit" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" placeholder="(LName,FName,M.I.)" autocomplete="off">
          </div>
          <div class="col-sm-4">
            <span><b>Maiden Name:</b></span>
            <input type="text" id="m_name_edit" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" placeholder="(LName,FName,M.I.)" autocomplete="off">
          </div>
          <div class="col-sm-4">
            <span><b>Employee No.</b></span>
            <input type="text" id="emp_id_edit" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
        </div>
        <br>
        <div class="row">
        <!-- <div class="col-sm-3">
            <span><b>Employee No. Old</b></span>
            <input type="text" id="id_old_edit" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div> -->
          <div class="col-sm-4">
            <span><b>Provider:</b></span><br>
            <select class="form-control" id="agency_edit" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
              <option></option>
              <option>ADDEVEN</option>
              <option>FAS</option>
              <option>GOLDENHAND</option>
              <option>MAXIM</option>
              <option>MEGATREND</option>
              <option>ONESOURCE</option>
              <option>PKMT</option>
            </select>
          </div>
          <div class="col-sm-4">
            <span><b>Batch No.:</b></span>
            <input type="number" id="batch_edit" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
          </div>
          <div class="col-sm-4">
            <span><b>STATUS:</b></span><br>
            <select class="form-control" id="emp_status_edit" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
              <option value="Resigned">Resigned</option>
              <option value="Retired">Retired</option>
              <option value="Dismiss">Dismiss</option>
            </select>
          </div>
        </div>
      </div>

      <div class="modal-footer" style="background:#fff;">
        <div class="col-sm-3">
          <button class="btn btn-block" onclick="delete_emp()" style="color:#fff;height:34px;border-radius:.25rem;background: #CA3F3F;font-size:15px;font-weight:normal;">Delete Masterlist</button>
        </div>
        <div class="col-sm-3">
          <button class="btn btn-block" onclick="save_emp_update()" style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;">Update Masterlist</button>
        </div>
      </div>
    </div>
  </div>
</div>