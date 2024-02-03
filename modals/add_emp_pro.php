<div class="modal fade bd-example-modal-xl" id="add_emp_pro" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <b>Add </b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="javascript:location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
         <div class="row">
            <div class="col-0">
                <select class="  btn bg-teal" recquired name="category_add" id="category_add">
                        <option value="">Category</option>
                        <option >Initial</option>
                        <option >Final</option>
              </select>
          </div>
            <div class="col-3">
                <select class="btn"  name="pro_add" recquired id="pro_add" style="width: 100%; border: 2px solid black;background-color: white;color: black;font-size: 16px;cursor: pointer; border-color: #7ADFB5;">  
                    <option>Please select a process.....</option>
                    <option></option>
                </select>
            </div>
            <input type="hidden" id="batch_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
            <div class="col-3">
                 <span><b>Employee No.:</b></span>
                 <input type="text" id="emp_id_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
             </div>
             <div class="col-4">
                 <span><b>Authorization No.:</b></span>
                 <input type="text" id="auth_no_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" value="N/A">
            </div>
            <div class="col-3">
                 <span><b>Employee Name:</b></span>
                 <input type="text" id="fullname_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off" >
             </div>
            <div class="col-3">
               <span><b>Department:</b></span>
               <select id="dept_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
                    <option value="PD">PD</option>
                    <option value="QA">QA</option>
               </select>
               </div>
             <div class="col-3">
                 <span><b>Authorization Year:</b></span>
                 <input type="text" id="auth_year_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
            </div>
             <div class="col-3">
                 <span><b>Date Authorized:</b></span>
                 <input type="date" id="date_authorized_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
            </div>
             <div class="col-3">
                 <span><b>Expire Date:</b></span>
                 <input type="date" id="expire_date_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
            </div>
            <div class="col-3">
                 <span><b>Remarks:</b></span>
                 <input type="text" id="remarks_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
            </div>
            <!-- <div class="col-3">
                 <span><b>Reason Of Cancellation:</b></span>
                 <input type="text" id="r_of_cancellation_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
            </div> -->
            <!-- <div class="col-3">
                 <span><b>Date Of Cancellation:</b></span>
                 <input type="date" id="d_of_cancellation_add" class="form-control" style="height:35px; border: 1px solid black; font-size: 15px;" autocomplete="off">
            </div> -->
        </div>


      </div>
      <div class="modal-footer">
        <div class="row">
            <div class="col-12">
                <div class="float-right">
                    <a href="#" class="btn btn-primary" onclick="save_emp_pro()">Save</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>