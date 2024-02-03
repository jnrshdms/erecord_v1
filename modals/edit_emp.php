<div class="modal fade bd-example-modal-xl" id="edit_emp" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <b>Update Data</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="id_edit" class="form-control" >
            <div class="col-4">
                 <span><b>Employee Name:</b></span>
                 <input type="text" id="fullname_edit" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" placeholder="(LName,FName,M.I.)" autocomplete="off">
            </div>
            <div class="col-4">
                 <span><b>Maiden Name:</b></span>
                 <input type="text" id="m_name_edit" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" placeholder="(LName,FName,M.I.)" autocomplete="off">
            </div>
               <div class="col-4">
                 <span><b>Employee No.</b></span>
                 <input type="text" id="emp_id_edit" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
             </div>
             <div class="col-2 mr-4">
                 <span><b>Provider:</b></span><br>
                 <select class="btn btn-outline-dark " id="agency_edit">  
                <option></option>
                <option >ADDEVEN</option>
                <option >FAS</option>
                <option >GOLDENHAND</option>
                <option >MAXIM</option>
                <option >MEGATREND</option>
                <option >ONESOURCE</option>
                <option >PKMT</option>
            </select>
            </div>

             <div class="col-3">
                 <span><b>Batch No.:</b></span>
                 <input type="number" id="batch_edit" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
            </div>
            <div class="col-3">
                <span><b>STATUS:</b></span><br>
            <select class="btn btn-outline-primary" id="emp_status_edit">
                <option></option>
                <option value="Resigned">Resigned</option>
                <option value="Retired">Retired</option>
                <option value="Dismiss">Dismiss</option>
            </select>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
            <div class="col-12">
                <div class="float-right">
                    <a href="#" class="btn btn-primary" onclick="save_emp_update()">Save</a>
                    <a href="#" class="btn btn-danger" onclick="delete_emp()">Delete</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>