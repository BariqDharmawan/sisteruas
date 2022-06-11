@extends('layouts.admin_master')
@section('title', 'Change Status')
@section('page-name', 'edit_product')
@section('page-header')
  <a href="{{ url()->previous() }}" class="mr-3"><i class="pe-7s-left-arrow"></i></a>
  {{ $requestProduct->product->title }}
@endsection
@section('content')
  <div class="row justify-content-center">
    <div class="col-12">
      <form class="card" action="{{ route('admin.company.request-product.update', $requestProduct->id) }}" method="post">
        @csrf @method('PUT')
        <div class="card-body">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="pending" name="status" class="custom-control-input"
            value="pending" {{ $requestProduct->status == 'pending' ? 'checked' : '' }}>
            <label class="custom-control-label" for="pending">Pending</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="done" name="status" class="custom-control-input"
            value="done" {{ $requestProduct->status == 'done' ? 'checked' : '' }}>
            <label class="custom-control-label" for="done">Done</label>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn-primary p-2">Update Status</button>
        </div>
      </form>
    </div>
  </div>
@endsection
