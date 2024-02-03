<div class="modal fade bd-example-modal-xl" id="add_emp" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <b>Add Data</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4">
                 <span><b>Employee Name:</b></span>
                 <input type="text" id="fullname" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" placeholder="(LName,FName,M.I.)" autocomplete="off">
            </div>
             <div class="col-4">
                 <span><b>Maiden Name:</b></span>
                 <input type="text" id="m_name_get" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" placeholder="(LName,FName,M.I.)" autocomplete="off">
            </div>
               <div class="col-4">
                 <span><b>Employee No.</b></span>
                 <input type="text" id="emp_id" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
             </div>
              <div class="col-2 mr-4">
                 <span><b>Provider:</b></span><br>
                 <select class="btn btn-outline-dark" id="agency_get">  
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
             <div class="col-4">
                 <span><b>Batch No.:</b></span>
                 <input type="number" id="batch_get" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
            <div class="col-12">
                <div class="float-right">
                    <a href="#" class="btn btn-primary" onclick="save_emp_data()">Save</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>