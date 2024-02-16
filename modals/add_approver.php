<div class="modal fade bd-example-modal-xl" id="addapprover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background:#e9e9e9;">
      <div class="modal-header" style="background:#F29A35;">
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
            <input type="text" id="fname_approver" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
          </div>
          <div class="col-sm-3">
            <!-- username -->
            <label style="font-weight: normal;color: #000;">Username</label>
            <input type="text" id="username_approver" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
          </div>
          <div class="col-sm-3">
            <!-- role -->
            <label style="font-weight: normal;color: #000;">Role</label>
            <input type="text" id="role_approver" class="form-control pl-3" autocomplete="off" value="<?= htmlspecialchars($_SESSION['role']); ?>" style=" color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #e5e5e5;height:34px; width:100%;" disabled>
          </div>
        <div class="col-sm-3">
          <!-- password -->
          <label style="font-weight: normal;color: #000;">Password</label>
          <input type="password" id="password_approver" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
        </div>
      </div>
      </div>
      <div class="modal-footer" style="background:#c2c2c2;">
        <div class="col-sm-3">
          <button class="btn btn-block" data-dismiss="modal" style="color:#fff;height:34px;border-radius:.25rem;background: #CA3F3F;font-size:15px;font-weight:normal;">Cancel</button>
        </div>
        <div class="col-sm-3">
          <button class="btn btn-block" onclick="register_account()" style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;">Add Account</button>
        </div>
      </div>
      <!-- end -->
    </div>
  </div>
</div>

<!-- <div class="modal" tabindex="-1" role="dialog" id="addaccA">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content" style="width:100%;">
      <div class="modal-header">
        <h5 class="modal-title"> Add Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-content">
<div class="modal-body">

<div class="row">
          <div class="col-3">
            <label>Fullname:</label>
            <input type="text" id="fname" class="form-control" autocomplete="off">
          </div>
          <div class="col-3">
            <label>Username:</label>
            <input type="text" id="username" class="form-control" autocomplete="off">
          </div>
           <div class="col-3">
            <label>Role:</label>
             <input type="text" id="role" class="form-control" autocomplete="off" disabled value="<?= htmlspecialchars($_SESSION['role']); ?> ">
            </div>
          <div class="col-3">
            <label>Password:</label>
            <input type="password" id="password" class="form-control" autocomplete="off">
          </div>

</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-primary" onclick="save_data()">Save changes</button>
</div>
</div>


    </div>
  </div>
</div>
</div> -->