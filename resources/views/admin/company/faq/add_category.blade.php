<div class="modal fade" id="modalAddCategory" tabindex="-1" role="dialog" aria-labelledby="modalAddCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Category for FAQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="formAddCategory">
                <div class="form-group">
                  <p>current category</p>
                  @foreach ($faqCategory as $category)
                    <div class="mr-2 badge badge-success">
                      <span>{{ $category->category }}</span>
                      <a href="javascript:void(0);" class="btn-remove" data-id="{{ $category->id }}"><i class='bx bx-x'></i></a>
                    </div>
                  @endforeach
                  </ul>
                </div>
                <div class="position-relative form-group">
                  <label for="addCategory">Add new category</label>
                  <input name="category" id="addCategory" placeholder="Place your category here" type="text" class="form-control">
                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="formAddCategory">Create new category</button>
            </div>
        </div>
    </div>
</div>
