@extends('layouts.customer_master')
@section('meta-title'){{ $metaMain->title }}@endsection
@section('meta-desc'){{ $metaMain->description }}@endsection
@section('meta-img'){{ Storage::url( $metaMain->thumbnail) }}@endsection
@section('meta-keyword')
@foreach($metaMain->keywords as $keyword)@if($loop->last){{ $keyword->keyword }}@else{{ $keyword->keyword . ', ' }}@endif @endforeach
@endsection
@section('title', 'Best Solution Protect your Product Cargo')
@section('page-name', 'landing')
@section('header')
  <div class="container">
    <figure class="landingHeader">
      <img class="header__img" src="{{ Storage::url($imageAsset->header_home) }}" alt="Dickson synergy header">
      <img src="{{ asset('img/vector_contact.svg') }}" class="bg-accessories">
      <figcaption class="header__info">
        <small class="header__company-name">{{ $companyProfile->name }}</small>
        <h1 class="header__slogan">{{ $companyProfile->title }}</h1>
        <p class="header__description">{{ $companyProfile->description }}</p>
      </figcaption>
    </figure>
    <img src="{{ asset('img/icon/bottom-arrow.svg') }}" class="header__arrow">
  </div>
@endsection
@section('content')
  <section class="product">
    <div class="container">
      <h1>
        <small class="secondary-text">{{ $frontText->product_secondary }}</small>
        <span class="heading-text">{{ $frontText->product_heading }}</span>
      </h1>
      <div class="row product__slider">
          @foreach ($productRecommend as $recomended)
            <a href="{{ route('customer.our-product.show', $recomended->product->slug) }}">
              <div class="col px-lg-3">
                <figure class="product__item">
                  <div class="product__image">
                    <img src="{{ Storage::url($recomended->image) }}">
                  </div>
                  <figcaption class="product__caption">
                    <p class="product__title">{{ $recomended->product->title }}</p>
                    <p class="product__subtitle">{{ $recomended->product->subtitle }}</p>
                  </figcaption>
                </figure>
              </div>
            </a>
          @endforeach
      </div>
    </div>
  </section>
  <section class="getFree">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-7 col-lg-4 getFree__info">
          <h1>
            <small class="secondary-text">{{ $frontText->free_sample_secondary }}</small>
            <span class="heading-text">{{ $frontText->free_sample_heading }}</span>
          </h1>
          <figure class="mb-4 mb-lg-0">
            <img class="getFree__img" src="{{ Storage::url($freeSample->cover) }}">
            <img src="{{ asset('img/vector_contact.svg') }}" class="bg-accessories d-none d-lg-block">
            <figcaption class="getFree__caption">
              <p class="mb-3 getFree__heading">{{ $freeSample->heading }}</p>
              <p class="getFree__subheading">{{ $freeSample->subheading }}</p>
            </figcaption>
          </figure>
        </div>
        <div class="col-12 col-lg-5 getFree_desc">
          {!! $frontText->free_sample_desc !!}
          <a href="{{ route('customer.our-product.index') }}" class="getFree__btn">{{ $frontText->btn_free_sample }}</a>
        </div>
      </div>
    </div>
  </section>
  <section class="benefit">
    <div class="container">
      <h1 class="mb-4">
        <small class="secondary-text">{{ $frontText->benefit_secondary }}</small>
        <span class="heading-text">{{ $frontText->benefit_heading }}</span>
      </h1>
      <div class="row">
        @foreach ($benefits as $benefit)
          <div class="col-12 col-lg-3 px-lg-4">
            <figure class="benefit__item">
              <img class="benefit__img" src="{{ Storage::url($benefit->icon) }}" alt="Benefit When You Trust Dickson">
              <figcaption class="benefit__detail">
                <h2 class="benefit__title">{{ $benefit->title }}</h2>
                <p class="benefit__desc">{{ $benefit->description }}</p>
              </figcaption>
            </figure>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
