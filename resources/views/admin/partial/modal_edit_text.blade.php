<div class="modal fade modal-edit-dynamicText" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{-- text from js --}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.home.update', $dynamicText->id) }}" method="post">
        @csrf @method('PUT')
        <div class="form-group">
          <input name="btn_free_sample" id="btn_free_sample" placeholder="Update button free sample text" type="text" class="form-control">
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update Text</button>
      </div>
    </div>
  </div>
</div>
