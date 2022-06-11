@extends('layouts.admin_master')
@section('title', 'Company Product')
@section('page-name', 'company_faq')
@section('page-header')
  Frequently Ask Question
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddFaq">Add new FAQ</button>
@endsection
@section('content')
  <div class="alert alert-success" role="alert" style="display: none;"></div>
  <div class="row">
    <div class="mb-3 card col">
      <div class="card-header">
        <ul class="nav nav-justified faq-list">
          @foreach ($faqCategory as $category)
          <li class="nav-item" id="faq-{{ $category->id }}">
            <a data-toggle="tab" href="#tab-{{ $category->id }}" class="@if($loop->first)active @endif nav-link">{{ $category->category }}</a>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          @foreach ($faqCategory as $category)
            <div class="tab-pane @if($loop->first)active @endif" id="tab-{{ $category->id }}" role="tabpanel">
              <ol>
                @foreach ($faqs->where('faq_category_id', $category->id) as $faq)
                  <li>
                    <div id="accordion{{ $faq->id }}" class="accordion-wrapper">
                      <div id="headingFaq{{ $faq->id }}" class="d-flex align-items-center justify-content-between mb-3">
                        <button type="button" data-toggle="collapse" data-target="#collapseFaq{{ $faq->id }}"
                          aria-expanded="true" aria-controls="collapse{{ $faq->id }}"
                          class="text-left m-0 p-0 btn btn-link collapsed">
                          <h5 class="m-0 p-0 d-inline">{{ $faq->question }}</h5>
                        </button>
                        <form>
                          @csrf @method('PUT')
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" name="isVisible" id="isVisible{{ $faq->id }}" class="custom-control-input"
                            @if ($faq->is_visible == 'show') checked @endif value="{{ $faq->is_visible }}">
                            <label class="custom-control-label" data-id="{{ $faq->id }}" for="isVisible{{ $faq->id }}">Show to faq page?</label>
                          </div>
                        </form>
                      </div>
                      <div data-parent="#accordion{{ $faq->id }}" id="collapseFaq{{ $faq->id }}" aria-labelledby="headingFaq{{ $faq->id }}"
                        class="collapse show">
                        <p>{{ $faq->answer }}</p>
                        <form action="{{ route('admin.company.faq.destroy', $faq->id) }}" method="post">
                          @csrf @method('DELETE')
                          <button type="submit" class="btn btn-link text-danger px-0">Remove FAQ</button>
                        </form>
                      </div>
                    </div>
                  </li>
                @endforeach
              </ol>
            </div>
          @endforeach
        </div>
      </div>
      <div class="card-footer justify-content-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddCategory">Add / Remove category</button>
      </div>
    </div>
  </div>
@endsection
@section('script')
  @include('admin.company.faq.add_faq')
  @include('admin.company.faq.add_category')
  <script>
    $(document).ready(function() {
      $("#formAddCategory .badge .btn-remove").click(function() {
        let categoryId = $(this).data('id');
        $(this).parent().remove();
        $.ajax({
            type: "DELETE",
            url: "{{ url('admin/company/faq-category/delete') }}" + '/' + categoryId,
            success: function (data) {
              $(".faq-list #faq-" + categoryId).remove();
              $(".alert").text('Succesfully delete category').show("fast").delay(700).hide("slow");
            },
            error: function (data) {
              console.log('Error:', data);
            }
        });
      });
      $("#company_faq button[form='formAddCategory']").click(function(e) {
        e.preventDefault();
        $.ajax({
          type: 'POST',
          url:  "{{ route('admin.company.faq.store') }}",
          data: {
            category: $("input[name='category']").val()
          },
          success: function(){
            $(".alert").text('Succesfully add new category');
            $('.alert').show("fast").delay(700).hide("slow");
            $("#modalAddCategory").removeClass('show');
            $(".modal-backdrop").remove();
            window.location.href = '{{ route('admin.company.faq.index') }}'
          },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.Message);
          }
        });
      });
      $('input[name="isVisible"]').change(function(){ //update description
        let faqId = $(this).next().data('id');
        if ($(this).val() == 'show') {
          $(this).val("hide");
        }
        else {
          $(this).val("show");
        }
        $.ajax({
          type: 'PUT',
          url:  "{{ url('admin/company/faq') }}" + '/' + faqId,
          data: {
            isVisible: $(this).val()
          },
          success: function(){
            $(".alert").text('Succesfully change faq status');
            $('.alert').show("fast").delay(700).hide("slow");
          },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.Message);
          }
        });
      });
    });
  </script>
@endsection
