<div class="modal fade" id="modalAddFaq" tabindex="-1" role="dialog" aria-labelledby="modalAddFaqLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add FAQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="formAddFaq" method="post" action="{{ route('admin.company.faq.store') }}">
                @csrf
                <div class="position-relative form-group">
                  <label for="question">Question</label>
                  <input name="question" id="question" placeholder="Place your question here" type="text" class="form-control">
                </div>
                <div class="position-relative form-group">
                  <label for="answer">Answer</label>
                  <textarea name="answer" id="answer" rows="8" class="form-control" placeholder="Place your answer here"></textarea>
                </div>
                <div class="position-relative form-group">
                  <label for="addCategory">Add new category</label>
                  <select class="custom-select" name="faq_category">
                    @foreach ($faqCategory as $category)
                      <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="is_visible" value="show" id="show">
                  <label class="custom-control-label" for="show">Show to FAQ page</label>
                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="formAddFaq">Create new faq</button>
            </div>
        </div>
    </div>
</div>
