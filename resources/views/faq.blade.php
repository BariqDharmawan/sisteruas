@extends('layouts.customer_master')
@section('meta-title'){{ $metaMain->title }}@endsection
@section('meta-desc'){{ $metaMain->description }}@endsection
@section('meta-img'){{ Storage::url( $metaMain->thumbnail) }}@endsection
@section('meta-keyword')
@foreach($metaMain->keywords as $keyword)@if($loop->last){{ $keyword->keyword }}@else{{ $keyword->keyword . ', ' }}@endif @endforeach
@endsection
@section('title', 'Best Solution Protect your Product Cargo')
@section('page-name', 'faq')
@section('css')
  <link rel="stylesheet" href="{{ asset('external/vertical-tabs/dist/jquery.tabs.min.css') }}">
@endsection
@section('header')
  <div class="container">
    <h1>
      <small class="secondary-text">Help center</small>
      <span class="heading-text">Need Help or <br class="d-none d-lg-block"> Question?</span>
    </h1>
  </div>
@endsection
@section('content')
  <section class="top mb-4">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2>
            <small class="secondary-text">Have a question?</small>
            <span class="heading-text">FAQ</span>
          </h2>
        </div>
      </div>
      <hr class="top__divider">
      <div class="row py-3 py-lg-5">
        <div class="col">
          <div class="jq-tab-wrapper faqTab">
            <div class="jq-tab-menu faqTab__menu">
              @foreach ($faqCategory as $category)
                <div class="jq-tab-title faqTab__title {{ $loop->first ? 'active' : '' }}" data-tab="{{ $category->category }}">
                  <p>{{ $category->category }}</p>
                </div>
              @endforeach
            </div>
            <div class="jq-tab-content-wrapper faqContent">
              @foreach ($faqCategory as $category)
                <div class="jq-tab-content {{ $loop->first ? 'active' : '' }}" data-tab="{{ $category->category }}">
                  @foreach ($category->faqVisible as $faq)
                    <details class="faqContent__item">
                      <summary>{{ $faq->question }} <i class='bx bxs-down-arrow'></i></summary>
                      {{ $faq->answer }}
                    </details>
                  @endforeach
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p class="mb-3">Can't find what you're <br class="d-lg-none"> looking for?</p>
          <p class="mb-3">Email your questions to <a href="mailto:info@dicksonsynergy.com" class="text-orange">info@dicksonsynergy.com</a></p>
        </div>
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
