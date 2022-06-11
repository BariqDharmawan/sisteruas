@extends('layouts.admin_master')
@section('title', 'Company Product')
@section('css')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('page-name', 'our_career')
@section('page-header')
  Available Career
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCareer">Add Career</button>
@endsection
@section('content')
  @if (session('success_message'))
    <div class="alert alert-success">{{ session('success_message') }}</div>
  @endif
  <div class="row">
    <div class="col-12">
      <div id="accordion" class="accordion-wrapper mb-3">
        @foreach ($careers as $career)
          <div class="card mb-3">
              <div id="heading{{ $career->id }}" class="card-header">
                <button type="button" data-toggle="collapse" data-target="#collapse{{ $career->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                  aria-controls="collapse{{ $career->id }}" class="text-left m-0 p-0 btn btn-link btn-block">
                  <h5 class="m-0 p-0 d-inline">{{ $career->title }}</h5>
                  <i class='bx bx-caret-down'></i>
                </button>
                <button type="button" class="btn btn-link" data-toggle="modal" data-career="{{ $career->id }}"
                data-target="#detailCareer{{ $career->id }}"><i class='bx bx-edit-alt' ></i></button>
              </div>
              <div data-parent="#accordion" id="collapse{{ $career->id }}" aria-labelledby="heading{{ $career->id }}"
                class="collapse {{ $loop->first ? 'show' : '' }}">
                <div class="card-body">
                  <div class="job_desc">
                    {!! $career->job_desc !!}
                  </div>
                  <div class="job_detail">
                    {!! $career->job_detail !!}
                  </div>
                </div>
                <div class="card-footer justify-content-between">
                  <address class="mb-0">{{ $career->location }}</address>
                  <button type="button" class="btn btn-link text-danger" data-toggle="modal" data-target="#removeCareer{{ $career->id }}">Remove Career</button>
                </div>
              </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
@section('script')
  <div class="modal fade" id="addCareer" tabindex="-1" role="dialog" aria-labelledby="addCareerLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Add new career</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('admin.company.career.store') }}" id="formAddCareer" method="post">
                  @csrf
                  <input type="hidden" name="career_id">
                  <div class="position-relative form-group">
                    <label for="title">Change Title Carer</label>
                    <input name="title" id="title" placeholder="Title Career" type="text" class="form-control" value="{{ old('title') }}">
                    @error('title')
                      <span class="message-required">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="position-relative form-group">
                    <label for="location">Change Location</label>
                    <input name="location" id="location" placeholder="Career Location" type="text" class="form-control" value="{{ old('location') }}">
                    @error('location')
                      <span class="message-required">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="position-relative form-group">
                    <label for="job_desc">Job Desc</label>
                    <textarea name="job_desc" id="job_desc" rows="8"  placeholder="Describe the job desc here" class="form-control">{{ old('job_desc') }}</textarea>
                    @error('job_desc')
                      <span class="message-required">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="position-relative form-group">
                    <label for="job_detail">Job Detail</label>
                    <textarea name="job_detail" id="job_detail" placeholder="Describe the job detail here">{{ old('job_detail') }}</textarea>
                    @error('job_detail')
                      <span class="message-required">{{ $message }}</span>
                    @enderror
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" form="formAddCareer">Add new career</button>
              </div>
          </div>
      </div>
  </div>
  @foreach ($careers as $career)
  <div class="modal fade" id="removeCareer{{ $career->id }}" tabindex="-1" role="dialog" aria-labelledby="removeCareerLabel{{ $career->id }}" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove {{ $career->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <p>Are you sure wanna remove career {{ $career->title }}?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <form action="{{ route('admin.company.career.destroy', $career->id) }}" method="post">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">Remove</button>
              </form>
            </div>
        </div>
    </div>
  </div>
  <div class="modal fade" id="detailCareer{{ $career->id }}" tabindex="-1" role="dialog" aria-labelledby="detailCareerLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Career Title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('admin.company.career.store') }}" id="formUpdateCareer{{ $career->id }}" method="post">
                  @csrf
                  <input type="hidden" name="career_id" value="{{ $career->id }}">
                  <div class="position-relative form-group">
                    <label for="title{{ $career->id }}">Change Title Carer</label>
                    <input name="title" id="title{{ $career->id }}" placeholder="Title Career" type="text" class="form-control" value="{{ $career->title }}">
                  </div>
                  <div class="position-relative form-group">
                    <label for="location{{ $career->id }}">Change Location</label>
                    <input name="location" id="location{{ $career->id }}" placeholder="Career Location" type="text" class="form-control"
                    value="{{ $career->location }}">
                  </div>
                  <div class="position-relative form-group">
                    <label for="job_desc{{ $career->id }}">Job Desc</label>
                    <textarea name="job_desc" id="job_desc{{ $career->id }}" rows="8" class="form-control">{{ $career->job_desc }}</textarea>
                  </div>
                  <div class="position-relative form-group">
                    <label for="job_detail{{ $career->id }}">Job Detail</label>
                    <textarea name="job_detail" id="job_detail{{ $career->id }}">{{ $career->job_detail }}</textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" form="formUpdateCareer{{ $career->id }}">Update Career Details</button>
              </div>
          </div>
      </div>
  </div>
  @endforeach
  <script>
    $(document).ready(function() {
      $(".alert").delay(700).hide();
      var countError = $(".message-required").length;
      if (countError > 0) {
        $("button[data-target='#addCareer']").click();
      }
    });
  </script>
@endsection
