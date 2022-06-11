@extends('layouts.admin_master')
@section('title', 'Company Product')
@section('page-name', 'customer_message')
@section('page-header', 'Message From Customer')
@section('content')
  <div class="row">
    <div id="accordion" class="accordion-wrapper col mb-3">
      @foreach ($messages as $message)
        <div class="card mb-2">
          <div id="heading{{ $message->id }}" class="card-header">
            <button type="button" data-toggle="collapse" data-target="#collapse{{ $message->id }}" aria-expanded="true" aria-controls="{{ $message->id }}"
            class="text-left m-0 p-0 btn btn-link btn-block collapsed">
              <h5 class="m-0 p-0">{{ $message->email }}</h5>
            </button>
          </div>
          <div data-parent="#accordion" id="collapse{{ $message->id }}" aria-labelledby="heading{{ $message->id }}" class="collapse show">
            <div class="card-body">
              {{ $message->message }}
            </div>
            <div class="card-footer d-flex justify-content-between">
              <span>{{ $message->company_name }}</span>
              <span>{{ $message->created_at->format('d-M-Y H:m') }}</span>
            </div>
          </div>
        </div>
      @endforeach
      {{ $messages->links() }}
    </div>
  </div>
@endsection
