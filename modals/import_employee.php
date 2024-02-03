<div class="modal" tabindex="-1" role="dialog" id="import_employee">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Import Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../../process/viewer/manpower.php"  enctype="multipart/form-data" method="POST">
          <input type="hidden" name="id_number_record1" id="id_number_record1" value="<?=$id_number;?>">
            <div class="file-field input-field">
                <div class="btn teal #00695c teal darken-3">
                    <input type="file" name="file" class="form-control-lg" accept=".csv">
                    <input type="hidden" name="method" value="method">
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" value="upload" name="upload" id="import_emp" onclick="import_emp()" class="btn btn-primary">Upload</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>