@extends('layouts.admin_master')
@section('title', 'Homepage Content')
@section('css')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('page-name', 'manageCareerpage')
@section('page-header', 'Career Page')
@section('content')
  @if (session('success_message'))
    <div class="alert alert-success">{{ session('success_message') }}</div>
  @endif
  <div class="row mb-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Career Page Text</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="mb-0 table">
              <tbody>
                <tr>
                  <td><a href="{{ url('career#btn_free_sample') }}" class="btn btn-link" target="_blank">Subheading header</a></td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->career_subheading_header }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal"
                    data-target="#career_subheading_header">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td><a href="{{ url('career#benefit_heading') }}" class="btn btn-link" target="_blank">Heading header</td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->career_heading_header }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal"
                    data-target="#career_heading_header">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td><a href="{{ url('career#benefit_secondary') }}" class="btn btn-link" target="_blank">Button Find Jobs</td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->career_btn_job }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal"
                    data-target="#career_btn_job">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="{{ url('career#free_sample_heading') }}" class="btn btn-link" target="_blank">
                      Section <u>our value & benefit</u> subheading
                    </a>
                  </td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->career_section_value_subheading }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal"
                    data-target="#career_section_value_subheading">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="{{ url('career#free_sample_secondary') }}" class="btn btn-link" target="_blank">
                      Section <u>our value & benefit</u> heading
                    </a>
                  </td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->career_section_value_heading }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal"
                    data-target="#career_section_value_heading">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="{{ url('career#product_heading') }}" class="btn btn-link" target="_blank">
                      Section <u>our value & benefit</u> description
                    </a>
                  </td>
                  <td>
                    <span class="text-orange">{!! $dynamicText->career_section_value_description !!}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal"
                    data-target="#career_section_value_description">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="{{ url('career#product_secondary') }}" class="btn btn-link" target="_blank">
                      Section <u>great team</u> subheading
                    </a>
                  </td>
                  <td class="text-orange">
                    {{ $dynamicText->career_team_subheading }}
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal"
                    data-target="#career_team_subheading">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="{{ url('career#product_secondary') }}" class="btn btn-link" target="_blank">
                      Section <u>great team</u> heading
                    </a>
                  </td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->career_team_heading }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal"
                    data-target="#career_team_heading">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="{{ url('career#product_secondary') }}" class="btn btn-link" target="_blank">
                      Section <u>job available</u> subheading
                    </a>
                  </td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->career_job_subheading }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal"
                    data-target="#career_job_subheading">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="{{ url('career#product_secondary') }}" class="btn btn-link" target="_blank">
                      Section <u>job available</u> heading
                    </a>
                  </td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->career_job_heading }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal"
                    data-target="#career_job_heading">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td><a href="{{ url('career#product_secondary') }}" class="btn btn-link" target="_blank">Drop resume subheading</td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->career_resume_subheading }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal"
                    data-target="#career_resume_subheading">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td><a href="{{ url('career#product_secondary') }}" class="btn btn-link" target="_blank">Drop resume heading</td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->career_resume_heading }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal"
                    data-target="#career_resume_heading">
                      <i class='bx bxs-edit-alt'></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td><a href="{{ url('career#product_secondary') }}" class="btn btn-link" target="_blank">Drop resume button text</td>
                  <td>
                    <span class="text-orange">{{ $dynamicText->career_resume_btn }}</span>
                    <button type="button" class="btn btn-link px-0 btn-edit-dynamicText" data-toggle="modal"
                    data-target="#career_resume_btn">
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
    <div class="col-12 mb-3 mb-md-0">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Career page header image</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <img src="{{ Storage::url($imageAsset->header_career) }}" class="img-preview" data-preview="img-preview">
            </div>
            <div class="col-12 col-md-6">
              <form action="{{ route('admin.page.image-asset.update', $imageAsset->id) }}" class="text-center change-page-img"
              method="post" enctype="multipart/form-data">
                @csrf @method('PUT')
                <input type="file" id="change-career-thumbnail" name="change_career_thumbnail" class="upload_image"
                data-img="img-preview" accept="image/*">
                <label for="change-career-thumbnail" class="upload_image_label"><i class='bx bxs-image-add'></i></label>
                <span class="d-block">Change image</span>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-5">
    <div class="col-12 mb-3 mb-md-0">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Career page benefit section image</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <img src="{{ Storage::url($imageAsset->benefit_career) }}" class="img-preview" data-preview="img-preview">
            </div>
            <div class="col-12 col-md-6">
              <form action="{{ route('admin.page.image-asset.update', $imageAsset->id) }}" class="text-center change-page-img"
              method="post" enctype="multipart/form-data">
                @csrf @method('PUT')
                <input type="file" id="change-career-thumbnail" name="change_benefit_career" class="upload_image"
                data-img="img-preview" accept="image/*">
                <label for="change-career-thumbnail" class="upload_image_label"><i class='bx bxs-image-add'></i></label>
                <span class="d-block">Change image</span>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-5">
    <div class="card col-12">
      <div class="card-header">
        <h5 class="card-title mb-0">Career page team section image</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-lg-6 mb-3 mb-md-0">
            <div class="row">
              <div class="col-12 col-md-8">
                <img src="{{ Storage::url($imageAsset->team_career1) }}" class="img-preview" data-preview="img-preview">
              </div>
              <div class="col-12 col-md-4">
                <form action="{{ route('admin.page.image-asset.update', $imageAsset->id) }}" class="text-center change-page-img"
                method="post" enctype="multipart/form-data">
                  @csrf @method('PUT')
                  <input type="file" id="change-career-thumbnail" name="change_team_career1" class="upload_image"
                  data-img="img-preview" accept="image/*">
                  <label for="change-career-thumbnail" class="upload_image_label"><i class='bx bxs-image-add'></i></label>
                  <span class="d-block">Change image</span>
                </form>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 mb-3 mb-md-0">
            <div class="row">
              <div class="col-12 col-lg-9">
                <img src="{{ Storage::url($imageAsset->team_career2) }}" class="img-preview" data-preview="img-preview">
              </div>
              <div class="col-12 col-lg-3">
                <form action="{{ route('admin.page.image-asset.update', $imageAsset->id) }}" class="text-center change-page-img"
                method="post" enctype="multipart/form-data">
                  @csrf @method('PUT')
                  <input type="file" id="change-career-thumbnail" name="change_team_career2" class="upload_image"
                  data-img="img-preview" accept="image/*">
                  <label for="change-career-thumbnail" class="upload_image_label"><i class='bx bxs-image-add'></i></label>
                  <span class="d-block">Change image</span>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  @include('admin.partial.modal_edit_careerText')
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.js"></script>
@endsection
