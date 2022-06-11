@extends('layouts.customer_master')
@section('meta-title'){{ $metaMain->title }}@endsection
@section('meta-desc'){{ $metaMain->description }}@endsection
@section('meta-img'){{ Storage::url( $metaMain->thumbnail) }}@endsection
@section('title', 'Best for you find best product for your need')
@section('page-name', 'product')
@section('header')
  @if (session('status'))
    <div class="alert-success">{{ session('status') }}</div>
  @endif
  <div class="container">
      <div class="productHeader__caption">
        <h1>
          <small class="secondary-text">Best for you</small>
          <span class="heading-text">Find best product for your need</span>
        </h1>
        <a href="#product_section" class="btn-primary productHeader__btn">Explore product</a>
      </div>
      <img src="{{ asset('img/product_header.webp') }}" class="productHeader__img">
      <div class="headerBg"></div>
  </div>
@endsection
@section('content')
  <section id="product_section">
    <div class="container">
      <h2>
        <small class="secondary-text">Our Product</small>
        <span class="heading-text">Recomended Product</span>
      </h2>
      <div class="row mt-5">
        @foreach ($productRecommend as $recomended)
          <div class="col-12 col-md-6 col-lg-4 px-lg-3 mb-5">
            <figure class="product__item">
              <div class="product__image">
                <img src="{{ Storage::url($recomended->image) }}">
              </div>
              <figcaption class="product__caption">
                <p class="product__title">{{ $recomended->product->title }}</p>
                <p class="product__subtitle">{{ $recomended->product->subtitle }}</p>
              </figcaption>
              <div class="product__detail">
                <p class="product__title">{{ $recomended->product->title }}</p>
                <p class="product__subtitle">{{ $recomended->product->short_desc }}</p>
                <a class="product__link" href="{{ route('customer.our-product.show', $recomended->product->slug) }}">see details</a>
              </div>
            </figure>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="questioning-dickson">
    <div class="container">
      <div class="row align-items-center justify-content-center flex-column">
        <div class="col text-center">
          <img src="{{ asset('img/icon/question-mark.svg') }}">
          <p class="questioning-dickson__question">Questions about joining Dickson?</p>
          <p class="questioning-dickson__answer">fell free to <a class="questioning-dickson__contact-link" href="{{ route('customer.contact-us.index') }}">contact us</a></p>
        </div>
      </div>
    </div>
  </section>
@endsection
