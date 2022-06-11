@extends('layouts.admin_master')
@section('title', 'Company Client')
@section('page-name', 'company_client')
@section('page-header')
  Company Client
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCLient">Add new client</button>
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card mb-3">
        <div id="carouselClient" class="carousel slide carousel-fade pointer-event" data-ride="carousel">
          <div class="carousel-inner">
            @foreach ($clients as $client)
              <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <form action="{{ route('admin.company.client.destroy', $client->id) }}" method="post">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-remove btn-link text-danger"><i class='bx bx-sm bxs-trash-alt' ></i></button>
                </form>
                <img class="d-block w-100" src="{{ Storage::url($client->logo) }}" alt="First slide" height="300">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="text-dark">{{ $client->name }}</h5>
                </div>
              </div>
            @endforeach
          </div>
          <a class="carousel-control-prev text-dark" href="#carouselClient" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class='bx bx-chevron-left'></i></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next text-dark" href="#carouselClient" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class='bx bx-chevron-right' ></i></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <div class="modal fade" id="addCLient" tabindex="-1" role="dialog" aria-labelledby="addCLientLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Add new client</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form class="modal-body" method="post" id="formAddClient" action="{{ route('admin.company.client.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Client Name</label>
                  <input type="text" id="name" class="form-control" name="name" placeholder="Ex: PT Definite">
                </div>
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="icon" data-img="iconPreview" id="icon" accept="image/*">
                    <label class="custom-file-label" for="icon">Client Logo</label>
                  </div>
                </div>
                <div class="form-group">
                  <img src="" class="img-preview" data-preview="iconPreview" height="50">
                </div>
              </form>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" form="formAddClient">Add</button>
              </div>
          </div>
      </div>
  </div>
@endsection
