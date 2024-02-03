<div class="modal fade bd-example-modal-xl" id="admin_r_update" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <b>Update Data</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="id_a" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
    
         <div class="col-3">
                 <span><b>Employee Name :</b></span>
                 <input  type="text" id="employee_name_a" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
            </div>
        <div class="col-3">
                 <span><b>Authorization No. :</b></span>
                 <input type="text" id="auth_no_a" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
            </div>
        <div class="col-3">
            <span><b>Department :</b></span>
            <select id="dept_a" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
                <option value="PD">PD</option>
                <option value="QA">QA</option>
            </select>
            </div>
            <!-- <div class="col-3">
                 <span><b>Batch No. :</b></span>
                 <input type="text" id="batch_a" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
            </div> -->
             <div class="col-3">
                 <span><b>Authorization Year:</b></span>
                 <input type="text" id="auth_year_a" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
            </div>          
             <div class="col-3">
                 <span><b>Date Authorized :</b></span>
                 <input type="date" id="date_authorized_a" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
            </div>
             <div class="col-3">
                 <span><b>Expire Date :</b></span>
                 <input type="date" id="expire_date_a" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
            </div>
            <div class="col-3">
                 <span><b>Remarks : </b></span>
                 <input type="text" id="remarks_a" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
            </div>
<!--         
          
                <div class="col-6">
                 <span><b>Reason Of Cancellation:</b></span>
                 <input type="text" id="r_of_cancellation_a" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
            </div>
            <div class="col-3">
                 <span><b>Date Of Cancellation:</b></span>
                 <input type="date" id="d_of_cancellation_a" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" disabled>
            </div> -->
            <div class="col-3">
                 <span><b>Updated By:</b></span> 
                 <input type="text" id="updated_by_a" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" disabled>
           </div> 
          
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
            <div class="col-12">
                <div class="float-right">
                    <a href="#" class="btn btn-primary" onclick="save_admin_data()">Save</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>