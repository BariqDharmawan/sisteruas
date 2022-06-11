<div class="modal fade" id="modalFreeSample" tabindex="-1" role="dialog" aria-labelledby="modalFreeSampleLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $freeSample->heading }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('admin.company.free-sample.update', $freeSample->id) }}" id="formEditFreeSample"
              method="post" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" id="title" placeholder="Title Text" name="heading" class="form-control" value="{{ $freeSample->heading }}">
                </div>
                <div class="form-group">
                  <label for="description">Short Description</label>
                  <input type="text" id="description" placeholder="Short Description" name="description"
                  class="form-control" value="{{ $freeSample->subheading }}">
                </div>
                <div class="form-group">
                  <label for="longDescription">Free sample long description</label>
                  <textarea name="longDescription" id="longDescription"
                  rows="8" class="form-control">{{ $dynamicText->free_sample_desc }}</textarea>
                </div>
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="cover" id="cover">
                    <label class="custom-file-label" for="cover">Change Cover</label>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="formEditFreeSample">Update Section Get Free Sample</button>
            </div>
        </div>
    </div>
</div>
