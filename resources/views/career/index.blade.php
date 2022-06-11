@extends('layouts.customer_master')
@section('meta-title'){{ $metaMain->title }}@endsection
@section('meta-desc'){{ $metaMain->description }}@endsection
@section('meta-img'){{ Storage::url( $metaMain->thumbnail) }}@endsection
@section('title', 'Best Solution Protect your Product Cargo')
@section('page-name', 'career')
@section('header')
  @if ($errors->any())
    <div class="alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
      <a href="javascript:void(0);" class="close-alert"><i class='bx bx-x'></i></a>
    </div>
  @endif
  <div class="container">
    <div class="careerHeader__caption">
      <h1>
        <small class="secondary-text">{{ $dynamicText->career_subheading_header }}</small>
        <span class="heading-text">{{ $dynamicText->career_heading_header }}</span>
      </h1>
      <a href="#job_section" class="btn-primary careerHeader__btn">{{ $dynamicText->career_btn_job }}</a>
    </div>
    <img src="{{ Storage::url($imageAsset->header_career) }}" class="careerHeader__img">
    <div class="headerBg"></div>
  </div>
@endsection
@section('content')
  <section class="careerDescription">
    @if (session('status'))
      <div class="modal" id="modal-resume-done">
        <div class="request-done">
          <h3 class="text-blue text-bold" style="color: #113F59;letter-spacing: 0.5px;font-family: 'Gotham-bold';">
            {{ session('status') }}
          </h3>
          <div class="request-done__img">
            <img src="{{ asset('img/icon/request-done.svg') }}" height="50">
          </div>
          <a href="javascript:void(0)" class="btn-primary mt-3">OK</a>
        </div>
      </div>
    @elseif (session('status-applicant'))
      <div class="modal" id="modal-applicant-done">
        <div class="request-done">
          <h3 class="text-blue text-bold" style="color: #113F59;letter-spacing: 0.5px;font-family: 'Gotham-bold';">
            {{ session('status-applicant') }}
          </h3>
          <div class="request-done__img">
            <img src="{{ asset('img/icon/request-done.svg') }}" height="50">
          </div>
          <a href="javascript:void(0)" class="btn-primary mt-3">OK</a>
        </div>
      </div>
    @endif
    <div class="container">
      <div class="careerDescription__value">
        <figure class="col row flex-column justify-content-center">
          <div class="careerDescription__img col-lg-auto">
            <img src="{{ Storage::url($imageAsset->benefit_career) }}">
            <div class="careerDescription__shadow" style="display: none;"></div>
          </div>
          <img src="{{ asset('img/vector_contact.svg') }}" class="bg-accessories d-none d-lg-block">
          <figcaption class="col-12 col-lg-6">
            <h1 class="careerDescription__heading">
              <small class="secondary-text">{{ $dynamicText->career_section_value_subheading }}</small>
              <span class="heading-text">{{ $dynamicText->career_section_value_heading }}.</span>
            </h1>
            <div class="careerDescription__detail">
              {!! $dynamicText->career_section_value_description !!}
            </div>
          </figcaption>
        </figure>
      </div>
    </div>
  </section>
  <section class="team">
    <div class="container">
      <h1>
        <small class="secondary-text">{{ $dynamicText->career_team_subheading }}</small>
        <span class="heading-text">{{ $dynamicText->career_team_heading }}</span>
      </h1>
      <div class="row">
        <div class="team__img col-12 col-lg-7 mb-4 mb-lg-0">
          <img src="{{ Storage::url($imageAsset->team_career1) }}" alt="Dickson Team">
        </div>
        <div class="team__img team__img--tilted col-12 col-lg-5">
          <img src="{{ Storage::url($imageAsset->team_career2) }}" alt="Dickson Team">
          <img src="{{ asset('img/vector_contact.svg') }}" class="bg-accessories" alt="Dickson Team">
        </div>
      </div>
    </div>
  </section>
  <section class="jobs" id="job_section">
    <div class="container">
      <h1>
        <small class="secondary-text">{{ $dynamicText->career_job_subheading }}</small>
        <span class="heading-text">{{ $dynamicText->career_job_heading }}</span>
      </h1>
      <div class="row my-5">
        @foreach ($careers as $career)
        <div class="col-12 mb-5">
          <details>
            <summary>
              <p class="jobs__title">{{ $career->title }}</p>
              <address class="jobs__address">{{ $career->location }}</address>
              <small>
                <b>show details</b>
                <i class='bx bx-caret-down'></i>
              </small>
            </summary>
            <div class="jobs__desc">
              {!! $career->job_desc !!}
            </div>
            <div class="jobs__detail">
              {!! $career->job_detail !!}
            </div>
            <div class="jobs__action">
              <a href="{{ route('customer.career.show', $career->slug) }}" class="btn-primary">Apply this job</a>
            </div>
          </details>
        </div>
        @endforeach
      </div>
      <div class="row mb-5">
        <div class="col text-center">
          <h1>
            <small class="secondary-text">{{ $dynamicText->career_resume_subheading }}</small>
            <span class="heading-text">{{ $dynamicText->career_resume_heading }}</span>
          </h1>
          <a href="javascript:void(0);" class="btn-primary jobs__btn show-modal" data-modal="#modal-resume">{{ $dynamicText->career_resume_btn }}</a>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('partial')
  @include('career.resume')
@endsection
@section('script')
  <script>
    $(document).on("dragover drop", function(e) {
      e.preventDefault();
    }).on("drop", function(e) {
      $("#drop-resume .form__input--file").prop("files", e.originalEvent.dataTransfer.files);
      $('#drop-resume .file-value').text($("#drop-resume .form__input--file").val().replace(/^C:\\fakepath\\/i, ''));
      if ($("#drop-resume .form__input--file").val().length !== 0) {
        $("#drop-resume .form__removeValue").show();
      }
      else {
        $("#drop-resume .form__input--file").val("");
        $("#drop-resume .file-value").html('<b class="mb-1 mb-md-0 d-inline-block">Upload file</b> <br class="d-md-none"> here');
      }
    });
  </script>
@endsection
