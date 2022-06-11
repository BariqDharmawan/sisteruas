@extends('layouts.admin_master')
@section('title')
  Product {{ $product->title }}
@endsection
@section('page-name', 'product_detail')
@section('page-header')
  <h1>{{ $product->title }}</h1>
  <a href="{{ route('admin.company.product.edit', $product->slug) }}"><i class='bx bx-md bxs-edit' ></i></a>
@endsection
@section('content')
  <div class="row justify-content-center">
    <header class="col-12">
      <div id="carouselProduct" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach ($product->productImage as $image)
            <div class="carousel-item @if($loop->first)active @endif">
              <img class="d-block w-100" src="{{ Storage::url($image->image) }}" alt="First slide">
            </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselProduct" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true">
            <i class='bx bx-chevron-left'></i>
          </span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselProduct" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true">
            <i class='bx bx-chevron-right' ></i>
          </span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>
    <main class="col-12 my-5">
      <div class="main-card mb-3 card">
        <div class="card-body">
          <h2 class="card-title">{{ $product->subtitle }}</h2>
          <p>{{ $product->short_desc }}</p>
          {!! $product->content !!}
          <div class="mt-2">
            Document(s) :
            <ul class="mb-0">
              @foreach ($product->productDocument as $document)
                <li class="mt-2"><a href="{{ Storage::url($document->document) }}" target="_blank">{{ $document->name }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="card-footer">
          <a href="{{ Storage::url($product->video) }}" target="_blank">Click to see video</video>
        </div>
      </div>
    </main>
  </div>
@endsection
