@extends('layouts.admin_master')
@section('title', 'Career Contact-us Page Meta')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/amsify.suggestags.css') }}">
@endsection
@section('page-name', 'contact_us_page_meta')
@section('page-header', 'Career Contact-us Page Meta')
@section('content')
  <div class="alert alert-success" role="alert" style="display: none;"></div>
  <div class="row">
    <div class="col-12">
      <div class="mb-3 card">
          <div class="card-header card-header-tab-animation">
            <ul class="nav nav-justified">
              <li class="nav-item">
                <a data-toggle="tab" href="#tab-meta-description" class="active nav-link">description</a>
              </li>
              <li class="nav-item">
                <a data-toggle="tab" href="#tab-meta-thumbnail" class="nav-link">thumbnail</a>
              </li>
              <li class="nav-item">
                <a data-toggle="tab" href="#tab-meta-keyword" class="nav-link">Keyword</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="tab-meta-description" role="tabpanel">
                <div contenteditable="true" id="description-editable">
                  {{ $metaContact->description }}
                </div>
                <div>
                  <a href="javascript:void(0);" class="btn-edit"><i class='bx bxs-edit-alt'></i> <span>Click to edit</span></a>
                  <span>and click anywhere to save it</span>
                </div>
              </div>
              <div class="tab-pane text-center" id="tab-meta-thumbnail" role="tabpanel">
                <img src="{{ Storage::url($metaContact->thumbnail) }}" alt="{{ $metaContact->title }}" height="200">
                <button type="button" class="btn btn-link btn-block mt-2 text-center" data-toggle="modal" data-target="#changeThumbnail">
                  Change Thumbnail
                </button>
              </div>
              <div class="tab-pane" id="tab-meta-keyword" role="tabpanel">
                @foreach ($keywords as $keyword)
                <span class="mr-2 badge badge-pill badge-info d-inline-flex align-items-center" id="keyword-tag{{ $keyword->id }}">
                  {{ $keyword->keyword }}
                  <a href="javascript:void(0);" class="ml-2 btn-delete" data-id="{{ $keyword->id }}"><i class='bx bx-x'></i></a>
                </span>
                @endforeach
                <button type="button" class="btn btn-transition btn-outline-primary" data-toggle="modal" data-target="#addKeyword">Add new keyword</button>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <div class="modal fade" id="changeThumbnail" tabindex="-1" role="dialog" aria-labelledby="changeThumbnailLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Change Thumbnail Page Contact-us</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{ route('admin.meta-page.updateThumbnail', $metaContact->id) }}" id="formChangeThumbnail" enctype="multipart/form-data">
                  @csrf @method('PUT')
                  <input type="hidden" name="page_name" value="product_page">
                  <label for="file-img-favicon" class="upload_image_label">
                    <img src="" height="70" class="thumbnail-preview">
                    <i class='bx bx-upload'></i>
                    <span>Click to upload</span>
                  </label>
                  <input type="file" id="file-img-favicon" class="upload_image" name="thumbnail_contact" accept=".webp, image/jpeg, .svg, .gif">
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" form="formChangeThumbnail">Change Thumbnail</button>
              </div>
          </div>
      </div>
  </div>
  <div class="modal fade" id="addKeyword" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add new keyword for contact-us page</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{ route('admin.meta-page.keyword.store') }}" id="add_keyword">
                  @csrf
                  <input type="hidden" name="meta_page_id" value="{{ $metaContact->id }}">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Insert keyword here">
                      <div class="input-group-append">
                        <a href="javascript:void(0)" class="input-group-text"><i class='bx bx-plus-circle'></i></a>
                      </div>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" form="add_keyword">Add new keyword</button>
              </div>
          </div>
      </div>
  </div>
  <script src="{{ asset('js/jquery.amsify.suggestags.js') }}" charset="utf-8"></script>
  <script>
    $(document).ready(function() {
      var description = $("#tab-meta-description #description-editable").text();
      $('#tab-meta-description #description-editable').focusout(function(){ //update description
        if (description != $(this).text()) {
          $.ajax({
            type: 'put',
            url:  '{{ route('admin.meta-page.update', $metaContact->id) }}',
            data: {
              description: $('#tab-meta-description #description-editable').text()
            },
            success: function(){
              $(".alert").text('Succesfully update description');
              $('.alert').show("fast").delay(700).hide("slow");
            }
          });
        }
      });

      $("input[name='keyword']").amsifySuggestags({
        type: 'bootstrap',
        suggestions: ['company profile','dickson synergy', 'web company']
      });

      $("#tab-meta-keyword .btn-delete").click(function() { //delete keyword
        var keyword_id = $(this).data("id");
        $.ajax({
            type: "DELETE",
            url: "{{ url('admin/meta-page/keyword') }}" + '/' + keyword_id,
            success: function (data) {
                $("#keyword-tag" + keyword_id).remove();
                $(".alert").text('Succesfully delete keyword tag');
                $('.alert').show("fast").delay(700).hide("slow");

            },
            error: function (data) {
              console.log('Error:', data);
            }
        });
      });
    });
  </script>
@endsection
