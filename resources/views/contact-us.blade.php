@extends('layouts.customer_master')
@section('meta-title'){{ $metaMain->title }}@endsection
@section('meta-desc'){{ $metaMain->description }}@endsection
@section('meta-img'){{ Storage::url( $metaMain->thumbnail) }}@endsection
@section('meta-keyword')
@foreach($metaMain->keywords as $keyword)@if($loop->last){{ $keyword->keyword }}@else{{ $keyword->keyword . ', ' }}@endif @endforeach
@endsection
@section('title', 'Best Solution Protect your Product Cargo')
@section('page-name', 'contactUs')
@section('header')
  <div class="container">
    <h1>
      <small class="secondary-text">Contact us</small>
      <span class="heading-text">Feel free to <br> contact us</span>
    </h1>
  </div>
@endsection
@section('content')
  <div class="container">
    <div class="alert-success" style="display: none">
      Your message has been sent. We can reply at maximum 24 hours from now!
    </div>

    <div class="showbox" style="display: none">
      <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
          <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-md-6 contact-fill">
        <h2 class="heading-text">Get in contact</h2>
        <form class="form" method="post">
          @csrf
          <div class="form__box">
            <label for="name" class="form__label">name</label>
            <input type="text" class="form__input" name="name" placeholder="your name">
          </div>
          <div class="form__box">
            <label for="country" class="form__label input-required">country</label>
            <input type="text" class="form__input" name="country" value="{{ old('country') }}" placeholder="your country" required>
          </div>
          <div class="form__box">
            <label for="email" class="form__label input-required">email</label>
            <input type="text" class="form__input" name="email" value="{{ old('email') }}" placeholder="your email address" required>
          </div>
          <div class="form__box">
            <label for="company_name" class="form__label">company name</label>
            <input type="text" class="form__input" name="company_name" value="{{ old('company_name') }}" placeholder="your company name">
          </div>
          <div class="form__box">
            <label for="message" class="form__label input-required">Your message</label>
            <textarea name="message" rows="8" class="form__input" placeholder="your text here" required></textarea>
          </div>
          <div class="form__box form__box--no-label">
            <label class="form-check-label" for="accept">
              <input name="accept" id="accept" type="radio" class="form-check-input mr-2">
              I allow to store and process my information for the purpose given in this contact form.
              <span class="radio-circle"></span>
            </label>
          </div>
          <div class="row mx-0 justify-content-end">
            <a href="https://wa.me/{{ Str::slug($companyContact->whatsapp, '') }}" class="btn-primary contact-fill__btn mb-3 mb-md-0">
              Instant Contact <i class='bx bxl-whatsapp'></i>
            </a>
            <button type="submit" class="btn-primary ml-lg-4" disabled>Send Message</button>
          </div>
        </form>
      </div>
      <div class="col-12 col-md-6 contact-info">
        <h2 class="heading-text">Office</h2>
        <p class="contact-info__company-name">PT {{ $companyProfile->name }}</p>
        <address class="contact-info__address">{{ $companyContact->address }}</address>
        <div class="contact-info__direct">
          <a href="mailto:{{ $companyContact->email }}?subject=Message From Customer" class="contact-info__link">
            <img src="{{ asset('img/icon/mail.svg') }}" height="20">
            {{ $companyContact->email }}
          </a>
          <a href="tel:{{ Str::slug($companyContact->telphone, '') }}" class="contact-info__link">
            <img src="{{ asset('img/icon/telphone.svg') }}" height="20">
            {{ $companyContact->telphone }}
          </a>
        </div>
        <div class="contact-info__img">
          <img src="{{ Storage::url($imageAsset->img_contact) }}" class="">
          <img src="{{ asset('img/vector_contact.svg') }}" class="bg-accessories d-none d-lg-block" height="150">
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script>
    $(document).ready(function() {
      $("form").submit(function(e) {
        e.preventDefault();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        $.ajax({
          url: '{{ route('customer.contact-us.store') }}',
          method: 'post',
          data: {
            name: $(".form__input[name='name']").val(),
            country: $(".form__input[name='country']").val(),
            email: $(".form__input[name='email']").val(),
            company_name: $(".form__input[name='company_name']").val(),
            message: $(".form__input[name='message']").val(),
          },
          beforeSend: function(){
            $('.showbox').show();
          },
          complete: function() {
            $(".showbox").hide("slow");
          },
          success: function(result){
            $("form")[0].reset();
            $('.alert-success').show().delay(2000).fadeOut();
          },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.Message);
          }
        });
      });

      $("input[name='accept']").change(function() {
        if ($(this).is(":checked")) {
          $("[type='submit']").prop('disabled', false);
        }
        else {
          $("[type='submit']").prop('disabled', true);
        }
      });
    });
  </script>
@endsection
