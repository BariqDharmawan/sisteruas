<div class="modal fade" id="modalAddBenefit" tabindex="-1" role="dialog" aria-labelledby="modalAddBenefitLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="{{ route('admin.company.benefit.store') }}"  id="formAddBenefit" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="benefit_title">Title</label>
          <input type="text" class="form-control" id="benefit_title" name="title" placeholder="Benefit Title">
        </div>
        <div class="form-group">
          <label for="benefit_description">Description</label>
          <textarea name="description" rows="8" class="form-control" id="benefit_description" placeholder="Benefit Description"></textarea>
        </div>
        <div class="form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="icon" data-img="iconPreview" id="icon" accept="image/*">
            <label class="custom-file-label" for="icon">Benefit Icon</label>
          </div>
        </div>
        <img src="" class="img-preview" data-preview="iconPreview" height="50">
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" form="formAddBenefit">Add New Benefit</button>
      </div>
    </div>
  </div>
</div>
