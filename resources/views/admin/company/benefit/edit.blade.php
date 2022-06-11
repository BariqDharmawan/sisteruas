@extends('layouts.admin_master')
@section('title', 'Company Client')
@section('page-name', 'company_client')
@section('page-header')
  Edit {{ $benefit->title }} Details
  <form action="{{ route('admin.company.benefit.destroy', $benefit->id) }}" method="post">
    @csrf @method("DELETE")
    <button type="submit" class="btn btn-link text-danger"><i class='bx bxs-trash-alt'></i></button>
  </form>
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <img src="{{ Storage::url($benefit->icon) }}" class="mb-4 d-block mx-auto img-preview" height="100" data-preview="benefitIcon">
      <div class="card">
        <form action="{{ route('admin.company.benefit.update', $benefit->id) }}" class="card-body" method="post" enctype="multipart/form-data">
          @csrf @method("PUT")
          <input type="hidden" name="id" value="{{ $benefit->id }}">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" name="title" placeholder="Eg: Maintain long shelf lives" value="{{ $benefit->title }}">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="8" class="form-control"
            placeholder="Eg: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, rem.">{{ $benefit->description }}</textarea>
          </div>
          <div class="form-group">
            <div class="custom-file col">
              <input type="file" class="custom-file-input" name="icon" id="icon" data-img="benefitIcon" accept="image/*">
              <label class="custom-file-label" for="icon">Change Icon</label>
            </div>
          </div>
          <button type="submit" class="btn btn-success btn-block btn-lg">Change Detail</button>
        </form>
      </div>
    </div>
  </div>
@endsection
