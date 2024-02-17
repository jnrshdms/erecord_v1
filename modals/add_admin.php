<div class="modal fade bd-example-modal-xl" id="addadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background:#fff;">
      <div class="modal-header" style="background:#6c757d;">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: normal;color: #000;">
          Add New Account
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-3">
            <!-- fullname -->
            <label style="font-weight: normal;color: #000;">Fullname</label>
            <input type="text" id="fname_admin" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
          </div>
          <div class="col-sm-3">
            <!-- username -->
            <label style="font-weight: normal;color: #000;">Username</label>
            <input type="text" id="username_admin" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
          </div>
          <div class="col-sm-3">
            <!-- role -->
            <label style="font-weight: normal;color: #000;">Role</label>
            <input type="text" id="role_admin" class="form-control pl-3" autocomplete="off" value="<?= htmlspecialchars($_SESSION['role']); ?>" style=" color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #e5e5e5;height:34px; width:100%;" >
          </div>
        <div class="col-sm-3">
          <!-- password -->
          <label style="font-weight: normal;color: #000;">Password</label>
          <input type="password" id="password_admin" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
        </div>
      </div>
      </div>
      <div class="modal-footer" style="background:#fff;">
        <div class="col-sm-3">
          <button class="btn btn-block" data-dismiss="modal" style="color:#fff;height:34px;border-radius:.25rem;background: #CA3F3F;font-size:15px;font-weight:normal;">Cancel</button>
        </div>
        <div class="col-sm-3">
          <button class="btn btn-block" onclick="save_acc_admin()" style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;">Add Account</button>
        </div>
      </div>
      <!-- end -->
    </div>
  </div>
</div>
