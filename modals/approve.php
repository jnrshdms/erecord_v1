<!-- Modal -->
<div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Approve Cancellation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Are you sure you want to approve this cancellation?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="disapprove()" >Disapprove</button>
        <button type="button" class="btn btn-primary" onclick="approve()">Confirm</button>
      </div>
    </div>
  </div>
</div>