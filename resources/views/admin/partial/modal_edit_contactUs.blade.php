<div class="modal fade" id="contact_us_header" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Header page contact us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.page.contact-us.update', $dynamicText->id) }}" id="updateContactHeading" method="post">
        @csrf @method('PUT')
        <div class="form-group">
          <label for="contact_us_header">Heading text</label>
          <input id="contact_us_header" name="contact_us_header" placeholder="Update button free sample text" type="text"
          class="form-control" value="{{ $dynamicText->contact_us_heading }}">
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" form="updateContactHeading">Update Text</button>
      </div>
    </div>
  </div>
</div>
