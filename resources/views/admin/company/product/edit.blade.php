@extends('layouts.admin_master')
@section('title')
  Edit Product {{ $product->title }}
@endsection
@section('css')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('page-name', 'edit_product')
@section('page-header')
  <a href="{{ url()->previous() }}" class="mr-3"><i class="pe-7s-left-arrow"></i></a>
  {{ $product->title }}
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div id="productImageSlider" class="carousel slide mb-5" data-ride="carousel">
        <div class="carousel-inner">
          @foreach ($product->productImage as $image)
            <div class="carousel-item @if ($loop->first) active @endif">
              <img class="d-block w-100" src="{{ Storage::url($image->image) }}">
            </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#productImageSlider" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#productImageSlider" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <form action="{{ route('admin.company.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="position-relative row form-group">
          <label for="exampleEmail" class="col-2 col-form-label">Product Title</label>
          <div class="col">
            <input type="text" name="title" placeholder="Product Title" class="form-control" value="{{ $product->title }}">
          </div>
        </div>
        <div class="position-relative row form-group">
          <label for="exampleEmail" class="col-2 col-form-label">Product Subitle</label>
          <div class="col">
            <input type="text" name="subtitle" placeholder="Product Subtitle" class="form-control" value="{{ $product->subtitle }}">
          </div>
        </div>
        <div class="position-relative row form-group">
          <label for="exampleEmail" class="col-2 col-form-label">Product Description</label>
          <div class="col">
            <textarea name="short_desc" class="form-control" rows="4"
            placeholder="Short Description About This Product">{{ $product->short_desc }}</textarea>
          </div>
        </div>
        <div class="position-relative row form-group">
          <label for="" class="col-2 col-form-label">Product Content</label>
          <div class="col">
            <textarea id="product_content" name="content">{{ $product->content }}</textarea>
          </div>
        </div>
        <div class="position-relative row form-group">
          <label for="video" class="col-2 col-form-label">Video</label>
          <div class="col">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="video" id="video">
              <label class="custom-file-label" for="video">Change the product video</label>
            </div>
            <div class="mt-2">
              Current video(s) before you change :
              <a href="{{ Storage::url($product->video) }}" target="_blank">Click to see</a>
            </div>
          </div>
        </div>
        <div class="position-relative row form-group">
          <label for="exampleEmail" class="col-2 col-form-label">Documents</label>
          <div class="col">
            <div class="custom-file">
              <input type="file" name="document[]" class="custom-file-input" id="document" multiple>
              <label class="custom-file-label" for="document">Change the product document</label>
            </div>
            <div class="mt-2">
              Current document(s) before you change :
              <ul>
                @foreach ($product->productDocument as $document)
                  <li><a href="{{ Storage::url($document->document) }}" target="_blank">{{ $document->name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="position-relative row form-group">
          <label for="exampleEmail" class="col-2 col-form-label">Image</label>
          <div class="col">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image[]" id="image" multiple>
              <label class="custom-file-label" for="image">Change the prouct image</label>
            </div>
          </div>
        </div>
        <div class="position-relative row form-group" id="document_detail">
          <label for="documentDetail" class="col-2 col-form-label">Document Detail(s)</label>
          <div class="col">
            @foreach ($product->ProductProtection as $protection)
              <input type="hidden" name="id[]" value="{{ $protection->id }}">
              <div class="form-group">
                <input type="text" class="form-control" name="text[]" placeholder="Text Detail" value="{{ $protection->text }}" required>
              </div>
              <div class="form-group">
                <textarea name="description[]" rows="6" class="form-control"
                placeholder="Description Detail">{{ $protection->description }}</textarea>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="icon[]" accept="image/*">
                  <label class="custom-file-label">Click To Change the icon</label>
                </div>
              </div>
            @endforeach
            <a href="javascript:void(0)" class="btn btn-light add_documentDetail">+</a>
          </div>
        </div>
        <div class="form-row justify-content-between align-items-center my-5">
          <button class="btn-transition btn btn-lg btn-outline-warning d-flex align-items-center" style="height: 50px">
            <i class='bx bx-sm bx-left-arrow-alt mr-2'></i>
            Cancel update
          </button>
          <button type="submit" class="btn btn-lg btn-success float-right" style="height: 50px">Update Product</button>
        </div>
      </form>
    </div>
  </div>
@endsection
@section('script')
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js" charset="utf-8"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.js"></script>
@endsection
