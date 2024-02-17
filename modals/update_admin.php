<div class="modal fade bd-example-modal-xl" id="update_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background:#fff;">
            <div class="modal-header" style="background:#1e96fc;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: normal;color: #000;">
                    Update Account Details
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <!-- id -->
                        <input type="hidden" id="id_update" class="form-control">
                        <!-- employee id -->
                        <label style="font-weight: normal;color: #000;">Full Name</label>
                        <input type="text" id="fname_update" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- full name -->
                        <label style="font-weight: normal;color: #000;">Username</label>
                        <input type="text" id="username_update" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- department -->
                        <label style="font-weight: normal;color: #000;">Role</label>
                        <input type="text" id="role_update" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #e5e5e5;height:34px; width:100%;" disabled>
                    </div>
                
                    <div class="col-sm-3">
                        <!-- password -->
                        <label style="font-weight: normal;color: #000;">Password</label>
                        <input type="password" id="password_update" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
            
                   
                </div>


            </div>

            <div class="modal-footer" style="background:#fff;">
                <div class="col-sm-3">
                    <button class="btn btn-block" onclick="delete_account()" style="color:#fff;height:34px;border-radius:.25rem;background: #CA3F3F;font-size:15px;font-weight:normal;">Delete Account</button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block" onclick="update_account()" style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;">Update Account</button>
                </div>
            </div>
            <!-- end -->
        </div>
    </div>
</div>