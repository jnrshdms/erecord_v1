<div class="modal" tabindex="-1" role="dialog" id="admin_view">
  <div class="modal-dialog modal-xl " role="document">
    <div class="modal-content" style="width:100%;">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        
        <!-- <input type="hidden" id="category" disabled> -->
            <label>Name:<input type="text" id="employee_name_view" disabled></label>
            <label>Authorization No.<input type="text" id="auth_no_view" disabled></label>
            <div class="card-body table-responsive p-0" style="height: 420px;">

            <table class="table table-head-fixed text-nowrap table-hover" id="view_master">
            <thead style="text-align:center;">

          <th>Authorization Year</th>
          <th>Date Authorized</th>
          <th>Expire Date.</th>
          <th>Remarks</th>
          <th>Reason Of Cancellation</th>
          <th>Date of Cancellation</th>
          <th>Department</th>
     
            </thead>
            <tbody id="details" style="text-align:center;" ></tbody>
                </table>
                 <div class="row">
                  <div class="col-6">


                    
                  </div>
                  <div class="col-6">
                      <input type="hidden" name="" id="stocks">
   
                    <div class="spinner" id="spinner" style="display:none;">
                        
                        <div class="loader float-sm-center"></div>    
                    </div>
             
                  </div>

              </div>
              <!-- /.card-body -->
            </div>


    </div>
  </div>
</div>
</div>