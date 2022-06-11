@extends('layouts.admin_master')
@section('title', 'Homepage Content')
@section('css')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('page-name', 'manageHomepage')
@section('page-header', 'Homepage')
@section('content')
  @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif
  <div class="row mb-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Homepage Text</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="mb-0 table">
              <tbody>
                <tr>
                  <td><a href="{{ url('homepage#btn_free_sample') }}" class="btn btn-link" target="_blank">Button browse product now</a></td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->btn_free_sample }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal" data-target="#btn_free_sample">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td><a href="{{ url('homepage#benefit_heading') }}" class="btn btn-link" target="_blank">Section <u>benefit</u> heading</a></td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->benefit_heading }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal" data-target="#benefit_heading">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td><a href="{{ url('homepage#benefit_secondary') }}" class="btn btn-link" target="_blank">Section <u>benefit</u> subheading</a></td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->benefit_secondary }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal" data-target="#benefit_secondary">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td><a href="{{ url('homepage#free_sample_heading') }}" class="btn btn-link" target="_blank">Section <u>get free sample</u> heading</a></td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->free_sample_heading }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal" data-target="#free_sample_heading">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="{{ url('homepage#free_sample_secondary') }}" class="btn btn-link" target="_blank">Section <u>get free sample</u> subheading</a>
                  </td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->free_sample_secondary }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal" data-target="#free_sample_secondary">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td><a href="{{ url('homepage#product_heading') }}" class="btn btn-link" target="_blank">Section <u>the product</u> heading</a></td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->product_heading }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal" data-target="#product_heading">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td><a href="{{ url('homepage#product_secondary') }}" class="btn btn-link" target="_blank">Section <u>the product</u> subheading</a></td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->product_secondary }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal" data-target="#product_secondary">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-5">
    <div class="col-12 col-md-6 mb-3 mb-md-0">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Homepage Header</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <img src="{{ Storage::url($imageAsset->header_home) }}" class="img-preview" data-preview="img-preview">
            </div>
            <div class="col-12 col-md-6">
              <form action="{{ route('admin.page.image-asset.update', $imageAsset->id) }}" class="text-center change-page-img" method="post"
              enctype="multipart/form-data">
                @csrf @method('PUT')
                <input type="file" id="change-home-thumbnail" name="change_home_thumbnail" class="upload_image" data-img="img-preview" accept="image/*">
                <label for="change-home-thumbnail" class="upload_image_label"><i class='bx bxs-image-add'></i></label>
                <span class="d-block">Change image</span>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 mb-3 mb-0">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Homepage Section Free Sample</h5>
        </div>
        <div class="card-body p-0">
          <div id="freeSampleSection" class="carousel slide pointer-event">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ Storage::url($freeSample->cover) }}" class="card-img-top">
                <div class="carousel-caption d-none d-md-block">
                  <h5>
                    {{ $freeSample->heading }}
                    <button type="button" class="btn btn-link p-0 ml-2" data-toggle="modal" data-target="#modalFreeSample" style="color: #ffeb5b;">
                      <i class='bx bx-sm bxs-edit-alt'></i>
                    </button>
                  </h5>
                  <p>{{ $freeSample->subheading }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-6 mb-3 mb-md-0">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Slider Section Product (same as recommended / best product)</h5>
          <a href="{{ route('admin.page.product.index') }}"><i class="pe-7s-pen ml-2"></i></a>
        </div>
        <div class="card-body p-0">
          <div id="productSlider" class="carousel slide pointer-event" data-ride="carousel">
            <div class="carousel-inner">
              @foreach ($productRecommend as $recomended)
                <div class="carousel-item" data-slider="slider{{ $recomended->id }}" data-product-id="{{ $recomended->product->id }}">
                  <img class="d-block w-100" src="{{ Storage::url($recomended->image) }}" title="{{ $recomended->product->title }}">
                </div>
              @endforeach
            </div>
            <a class="carousel-control-prev" href="#productSlider" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#productSlider" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    @include('admin.company.benefit.index')
  </div>
@endsection
@section('script')
  @include('admin.partial.modal_add_benefit')
  @include('admin.partial.modal_edit_text')
  @include('admin.partial.modal_edit_freeSample')
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#productSlider .carousel-item:first-of-type").addClass('active');
      $("#modal-update-header .form-check-label input").change(function() {
        let inputName = $(this).attr('name');
        $(this).val("1");
        let sliderId = $(this).data('recommended-id');
        $(this).parents("li").siblings().find('input[name="' + inputName +'"]').val("0");
        $.ajax({
          type: 'PUT',
          url:  "{{ url('admin/page/product-image') }}" + '/' + sliderId,
          data: {
            product_id: $(this).data('product-id'),
            id: sliderId,
            is_slider: $(this).val()
          },
          success: function(){
            $(".alert").text('Succesfully change product recommended status');
            $('.alert').show("fast").delay(700).hide("slow");
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
          }
        });
      });
    });
  </script>
@endsection
