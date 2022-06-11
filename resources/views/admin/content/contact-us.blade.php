@extends('layouts.admin_master')
@section('title', 'Contact Us Content')
@section('page-name', 'manageContactus')
@section('page-header', 'Contact us page')
@section('content')
  <div class="row mb-5">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="mb-0 table">
              <thead>
                <tr>
                  <th>Area</th>
                  <th>Element text</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="{{ url('contact-us#contact_us_header') }}" class="btn btn-link" target="_blank">Header page contact us</a></td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->contact_us_heading }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal" data-target="#contact_us_header">
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
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Image Primary</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <img src="{{ Storage::url($imageAsset->img_contact) }}" class="img-preview" data-preview="img-preview">
            </div>
            <div class="col-12 col-md-6">
              <form action="{{ route('admin.page.image-asset.update', $imageAsset->id) }}" class="text-center change-page-img" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')
                <input type="file" id="change-contact-thumbnail" name="change_contact_thumbnail" class="upload_image" data-img="img-preview" accept="image/*">
                <label for="change-contact-thumbnail" class="upload_image_label"><i class='bx bxs-image-add'></i></label>
                <span class="d-block">Change image</span>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  @include('admin.partial.modal_edit_contactUs')
@endsection
