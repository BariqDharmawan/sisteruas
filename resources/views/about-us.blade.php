@extends('layouts.customer_master')
@section('meta-title'){{ $metaMain->title }}@endsection
@section('meta-desc'){{ $metaMain->description }}@endsection
@section('meta-img'){{ Storage::url($metaMain->thumbnail) }}@endsection
@section('meta-keyword')
@foreach($metaMain->keywords as $keyword)@if($loop->last){{ $keyword->keyword }}@else{{ $keyword->keyword . ', ' }}@endif @endforeach
@endsection
@section('title', 'About our company Dicson Synergy')
@section('page-name', 'about')
@section('header')
  <div class="container">
    <h1>
      <small class="secondary-text">About Us</small>
      <span class="heading-text">About our company <br> Dicson Synergy</span>
    </h1>
    <figure class="aboutHeader__figure">
      <img src="{{ asset('img/about_header.webp') }}" class="aboutHeader__img">
      <figcaption class="aboutHeader__caption">
        <p class="aboutHeader__slogan">your happines is our priority</p>
        <p class="aboutHeader__slogan">Give the best <br> Service for you</p>
      </figcaption>
    </figure>
  </div>
  <div class="headerBg"></div>
@endsection
@section('content')
  <section class="aboutBelieve">
    <div class="container">
      <h1>
        <small class="secondary-text">{{ $companyProfile->name }}</small>
        <span class="heading-text">We believe in being professional</span>
      </h1>
      <div class="row justify-content-between">
        <div class="col-12 col-md-6 col-lg-6 mb-4 mb-md-0">
          <p class="mb-4">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut scelerisque eget at interdum vel mollis vitae.
            Tellus ut gravida odio sit tempor. Sed enim sagittis dolor, at nulla sem. Morbi eget porta est enim, sed dui ornare amet.
            Massa venenatis urna nunc, ornare dolor sit tristique volutpat.
          </p>
          <p>
            Tempus, at aliquam, donec euismod lacus, neque commodo et. Mi scelerisque neque fusce nibh. Facilisis felis nulla sit mi ut purus.
            Vestibulum, enim praesent ultrices sed suspendisse donec.
          </p>
        </div>
        <div class="col-12 col-md-4 col-lg-5 pr-5">
          <img src="{{ asset('img/about_believe.webp') }}" width="100%" class="aboutBelieve__img">
        </div>
      </div>
    </div>
  </section>
  <section class="aboutTeam">
    <div class="container">
      <h1>
        <small class="secondary-text">Great Team</small>
        <span class="heading-text">Work at Dickson Synergy</span>
      </h1>
      <div class="row justify-content-between mx-0 align-items-center align-items-lg-stretch flex-column flex-lg-row">
        <div class="col-12 col-lg-7 pl-lg-0">
          <img src="{{ asset('img/about_team1.webp') }}" class="aboutTeam__img">
        </div>
        <div class="col-12 col-lg-5 pl-lg-0">
          <img src="{{ asset('img/about_team2.webp') }}" class="aboutTeam__img aboutTeam__img--modified">
          <img src="{{ asset('img/vector_contact.svg') }}" class="aboutTeam__imgVector">
        </div>
      </div>
    </div>
  </section>
  <section class="aboutClient">
    <div class="container">
      <h1>
        <small class="secondary-text">Our Client</small>
        <span class="heading-text">Through the year we have sell a lot <br> product to our client</span>
      </h1>
      <div class="aboutClientSlider">
        @foreach ($clients as $client)
          <img src="{{ Storage::url($client->logo) }}" class="aboutClientSlider__img">
        @endforeach
      </div>
    </div>
    <img src="{{ asset('img/icon/vector_about.svg') }}" class="aboutClient__vector">
  </section>
@endsection
