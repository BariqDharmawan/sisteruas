@extends('layouts.customer_master')
@section('meta-title'){{ $metaMain->title . '-' . $career->title }}@endsection
@section('meta-desc')Unlock your chance, help us by being {{ $career->title }} at {{ $companyProfile->name }}@endsection
@section('meta-thumbnail'){{ Storage::url( $metaMain->thumbnail) }}@endsection
@section('title')
  Our Career - {{ $career->title }}
@endsection
@section('css')
  <link href="{{ asset('external/telphone-international/build/css/intlTelInput.min.css') }}" rel="stylesheet" />
@endsection
@section('page-name', 'singleCareer')
@section('header')
  <h1>
    <small class="secondary-text">Apply job</small>
    <span class="heading-text">{{ $career->title }}</span>
  </h1>
  <address class="headerCareer__location">{{ $career->location . ', ' . $career->type }}</address>
@endsection
@section('content')
  <div class="container">
    <div class="alert-success"></div>
    <div class="row">
      <form class="formSubmit" method="post" enctype="multipart/form-data" action="{{ route('customer.career.submit') }}">
        @csrf
        <input type="hidden" name="career_id" value="{{ $career->id }}" readonly>
        <div class="row form__row">
          <div class="col-12 form__headingText">
            <h2 class="formSubmit__heading">Personal Information</h2>
            <h3 class="formSubmit__message"><span class="text-orange mr-1">*</span>Requied field</h3>
          </div>
          @error ('fullname')
            <span class="message-required mb-3 d-block">{{ $message }}</span>
          @enderror
          <div class="col-12 col-md-6">
            <div class="form__box">
              <label for="first_name" class="form__label input-required">First name</label>
              <input type="text" class="form__input" id="first_name" placeholder="your first name" name="first_name" value="{{ old('first_name') }}" required>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="form__box">
              <label for="last_name" class="form__label input-required">Last name</label>
              <input type="text" class="form__input" id="last_name" placeholder="your last name" name="last_name" value="{{ old('last_name') }}" required>
            </div>
          </div>
          <div class="col-12">
            <div class="form__box">
              <label for="email" class="form__label input-required">Email</label>
              <input type="email" class="form__input" id="email" placeholder="your email address" name="email" value="{{ old('email') }}" required>
            </div>
            @error ('email')
              <span class="message-required mb-3 d-block">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-12">
            <div class="form__box form__box--phone">
              <input type="hidden" name="country_code">
              <label for="phone" class="form__label form__label--prepand form__label--phone input-required">Phone number</label>
              <input type="tel" class="form__input form__input--phone" maxlength="15" id="phone" placeholder="your phone number" name="phone"
              value="{{ old('phone') }}" title="Phone number is required, you haven't include zero, and maximum length is 12" required>
              @error ('phone')
                <span class="message-required mb-3 d-block">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="col-12">
            <div class="form__box">
              <label for="address" class="form__label input-required">
                Address
              </label>
              <input type="text" class="form__input" id="address" placeholder="your address live" name="address" value="{{ old('address') }}" required>
              @error ('address')
                <span class="message-required mb-3 d-block">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="row form__row">
          <div class="col-12 form__headingText">
            <h2 class="formSubmit__heading">Profile</h2>
          </div>
          <div class="col-12">
            <div class="form__box">
              <label for="summary" class="form__label">Summary</label>
              <textarea name="summary" id="summary" class="form__input" rows="8" placeholder="your text here"></textarea>
            </div>
          </div>
          <div class="col-12">
            <div class="form__box form__box--file">
              <label for="resume" class="form__label form__label--file">
                <span class="input-required">Resume</span>
                <span class="file-value"><b class="mb-1 mb-md-0 d-inline-block">Upload file</b> <br class="d-md-none"> or drag and drop here</span>
              </label>
              <a href="javascript:void(0);" class="form__removeValue">
                <i class='bx bx-x'></i>
              </a>
              <input type="file" class="form__input form__input--file" name="resume" id="resume" accept="application/pdf, application/msword"
              title="Please upload a pdf or docs" required>
              @error ('resume')
                <span class="message-required mb-3 d-block">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <button type="submit" class="btn-primary">Submit application</button>
      </form>
    </div>
  </div>
@endsection
@section('script')
  <script src="{{ asset('external/telphone-international/build/js/intlTelInput.min.js') }}" charset="utf-8"></script>
  <script>
    $(document).ready(function() {
      $("#phone").change(function(){
        let countryCode = $(".iti__selected-flag").attr('title').split("+").pop();
        $("input[name='country_code']").val(countryCode);
      });

      var input = document.querySelector("#singleCareerPage #phone");
      window.intlTelInput(input, {
        initialCountry: "ID",
        utilsScript: "{{ asset('external/telphone-international/build/js/utils.js') }}",
      });
      $(".alert-success").hide();
    });

    $(document).on("dragover drop", function(e) {
      e.preventDefault();
    }).on("drop", function(e) {
      $(".formSubmit .form__input--file").prop("files", e.originalEvent.dataTransfer.files);
      $(".formSubmit .form__input--file").siblings('.form__label--file').find('.file-value').text($(".form__input--file").val().replace(/^C:\\fakepath\\/i, ''));
      if ($(".formSubmit .form__input--file").val().length !== 0) {
        $(".formSubmit .form__input--file").prev(".form__removeValue").show();
      }
      else {
        $(".formSubmit .form__input--file").val("");
        $(".formSubmit .form__input--file").siblings('.form__label--file').find('.file-value').html('<b class="mb-1 mb-md-0 d-inline-block">Upload file</b> <br class="d-md-none"> here');
      }
    });
  </script>
@endsection
