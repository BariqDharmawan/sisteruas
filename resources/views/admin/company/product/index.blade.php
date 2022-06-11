@extends('layouts.admin_master')
@section('title', 'Company Product')
@section('css')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('page-name', 'company_product')
@section('page-header', 'Product')
@section('content')
  @if (Session::has('alert_success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
      {{ Session::get('alert_success') }}
    </div>
  @elseif (session('delete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
      {{ session('delete') }}
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <div class="main-card mb-3 card card-product">
        <div class="card-body">
          <h5 class="card-title">Product list</h5>
          <ul class="list-group list-group-flush product">
            @foreach ($products as $product)
            <li class="justify-content-between d-flex list-group-item product__list">
              {{ $product->title }}
              <input type="hidden" name="title" value="{{ $product->title }}">
              <input type="hidden" name="subtitle" value="{{ $product->subtitle }}">
              <input type="hidden" name="short_desc" value="{{ $product->short_desc }}">
              @foreach ($product->productImage as $productImage)
                <input type="hidden" name="product_image{{ $productImage->id }}" value="{{ $productImage->image }}">
              @endforeach
              <div class="dropleft btn-group">
                <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="btn-wide dropdown-toggle btn btn-link">
                  <i class='bx bx-sm bx-dots-vertical-rounded'></i>
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                  <a href="{{ route('admin.company.product.edit', $product->slug) }}" tabindex="0" class="dropdown-item">Edit product</a>
                  <a class="dropdown-item" tabindex="0" href="{{ route('admin.company.product.show', $product->slug) }}">Show detail</a>
                  <form action="{{ route('admin.company.product.destroy', $product->id) }}" method="post" class="dropdown-item" tabindex="0">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-link text-danger px-0">Remove product</button>
                  </form>
                </div>
              </div>
            </li>
            @endforeach
          </ul>
          <div class="card-footer">
            {{ $products->links() }}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_product">Add new product</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add new product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="modal-body" action="{{ route('admin.company.product.store') }}" id="form_add_product" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="col form-group">
              <input type="text" name="title" placeholder="Product Title" class="form-control">
            </div>
            <div class="col form-group">
              <input type="text" name="subtitle" placeholder="Product Subtitle" class="form-control">
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <textarea name="short_desc" class="form-control" rows="4" placeholder="Short Description About This Product"></textarea>
            </div>
          </div>
          <div class="form-group">
            <textarea id="product_content" name="content"></textarea>
          </div>
          <div class="form-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="cover" id="cover" accept="image/jpeg, image/x-png, image/gif">
              <label class="custom-file-label" for="cover">Choose Product Cover</label>
            </div>
            @error('cover')
                <span class="message-required">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image[]" id="image" accept="image/jpeg, image/x-png, image/gif" multiple>
              <label class="custom-file-label" for="image">Choose Image Product</label>
            </div>
            @error('image')
                <span class="message-required">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="video" id="video" accept="video/*">
              <label class="custom-file-label" for="video">Choose Video</label>
            </div>
            @error('video')
                <span class="message-required">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <div class="custom-file">
              <input type="file" name="document[]" class="custom-file-input" id="document" accept="application/pdf" multiple>
              <label class="custom-file-label" for="document">Choose Product Document</label>
            </div>
            @error('document')
                <span class="message-required">{{ $message }}</span>
            @enderror
          </div>
          <hr>
          <div class="form-row mx-0 mb-3 align-items-center justify-content-between">
            <p class="mb-0">Document Detail</p>
            <a href="javascript:void(0)" class="btn btn-light add_documentDetail">+</a>
          </div>
          <div class="form-group">
            <textarea name="description[]" rows="8" class="form-control" placeholder="Description Detail"></textarea>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="text[]" placeholder="Title Detail">
          </div>
          <div class="form-group" id="pickIconFirst">
            <div class="custom-file">
              <input type="file" name="icon[]" class="custom-file-input" accept="image/*">
              <label class="custom-file-label">Pick Icon</label>
            </div>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" form="form_add_product">Add new product</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js" charset="utf-8"></script>
@endsection
