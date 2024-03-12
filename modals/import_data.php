<div class="modal" tabindex="-1" role="dialog" id="import_data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Import Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../../process/import_export/import_record.php"  enctype="multipart/form-data" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="file-field input-field">
                <div class="btn teal #00695c teal darken-3">
                    <input type="file" name="file" class="form-control-lg" accept=".csv">
                </div>
            </div>
          </div>
          <div class="row ml-4">
            <div class="col- 0">
            <select class="btn btn-block btn-info" name="category" id="category" required>
              <option value="">Category</option>
              <option value="initial">Initial</option>
              <option value="final">Final</option>
            </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="window.location.href='../../template/import.csv'" download>Download Template</button>
          <button type="submit" value="upload" name="upload" id="import_pro" onclick="import_pro()" class="btn btn-primary">Upload</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        </div>
      </form>
    </div>
  </div>
</div>