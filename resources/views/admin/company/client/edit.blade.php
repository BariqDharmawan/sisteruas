@extends('layouts.admin_master')
@section('title', 'Company Client')
@section('page-name', 'company_client')
@section('page-header')
  Edit {{ $client->name }} Details
@endsection
@section('content')
  <div class="row">
    <div class="col-12 card">
      <form action="{{ route('admin.company.client.store') }}" method="post">
        <input type="hidden" name="id" value="{{ $client->id }}">
        <div class="form-group">
          <label for="">Company Name</label>
          <input type="text" class="form-control" placeholder="Eg: PT Definite Maji Arsana">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" id="description" rows="8" class="form-control"
          placeholder="Eg: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, rem."></textarea>
        </div>
        <div class="form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="logo">
            <label class="custom-file-label" for="logo">Company Logo</label>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
