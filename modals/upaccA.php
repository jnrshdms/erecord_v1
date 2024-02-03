<div class="modal fade" id="upaccA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">EDIT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <label><input type="hidden" name="id_update" id="id_update"> </label>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      
      <div class="modal-body">
       <label>FullName:  <input type="text" id="fname_update" > </label>
       <label>Username:  <input type="text" id="username_update"></label>
       <label>Password:  <input type="text" id="password_update"></label>

       <label style="display:none;">Role:  <input type="text" id="role_update" > </label>
       <label style="display:none;">ID:  <input type="text" id="id_update" disabled></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="update_data()">Update</button>
        <button type="button" class="btn btn-danger"  onclick="delete_data()">Delete</button>
      </div>
    </div>
  </div>
</div>      