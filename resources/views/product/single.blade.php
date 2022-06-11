@extends('layouts.customer_master')
@section('meta-title'){{ $metaMain->title }}@endsection
@section('meta-desc'){{ $metaMain->description }}@endsection
@section('meta-img'){{ Storage::url( $metaMain->thumbnail) }}@endsection
@section('title', 'Best Solution Protect your Product Cargo')
@section('page-name', 'singleProduct')
@section('header')
  <figure class="product-image">
    @foreach ($product->productImage as $image)
      <img class="product-image__item"  src="{{ Storage::url($image->image) }}" height="470" alt="First slide">
    @endforeach
  </figure>
@endsection
@section('content')
  <div class="container">
    <div class="modal" id="modal-request-done">
      <div class="request-done">
        <h3 class="text-bold" style="color: #113F59;letter-spacing: 0.5px;font-family: 'Gotham-bold';">Your Request Has been Send</h3>
        <div class="request-done__img">
          <img src="{{ asset('img/icon/request-done.svg') }}" height="50">
        </div>
        <small style="color: #858585;font-size: 15px;">Make sure to check your email to be in touch.</small>
        <a href="javascript:void(0)" class="btn-primary mt-4">OK</a>
      </div>
    </div>
    <div class="row justify-content-center justify-content-lg-start">
      <div class="singleProduct">
        <h1 class="singleProduct__title">{{ $product->title }}</h1>
        <h4 class="singleProduct__subtitle">{{ $product->subtitle }}</h4>
        <div class="singleProduct__content">
          {!! $product->content !!}
        </div>
        <div class="singleProduct__document">
          <h6>Documents</h6>
          <ul>
            @foreach ($product->ProductDocument as $document)
            <li>
              {{ $document->name }}
              <a href="{{ Storage::url($document->document) }}" target="_blank" class="btn-line d-block d-md-inline-flex mt-2 mt-md-0">Download</a>
            </li>
            @endforeach
          </ul>
        </div>
        <div class="singleProduct__protection">
          <h6>Documents</h6>
          @foreach ($product->ProductProtection as $protection)
            <article class="documentProtection">
              <div class="documentProtection__header">
                <img src="{{ Storage::url($protection->icon) }}" height="30" class="mr-2">
                <p>{{ $protection->text }}</p>
              </div>
              <p>{{ $protection->description }}</p>
            </article>
          @endforeach
        </div>
        <div class="singleProduct__video">
          <div class="singleProduct__videoTitle">How to protect your Product</div>
          <video height="300" src="{{ Storage::url($product->video) }}" controls></video>
          <a href="javascript:void(0);" class="singleProduct__videoPlay">
            <i class='bx bx-play-circle'></i>
          </a>
        </div>
      </div>
      <div class="productRequest">
        <div class="productRequest__wrapper">
          <div class="productRequest__header">
            <img src="{{ asset('img/icon/request.svg') }}" height="35">
            <p class="productRequest__heading">Get Free Sample</p>
            <img src="{{ asset('img/vector.svg') }}" class="bg-accessories" height="75">
          </div>
          <form class="productRequest__form" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}" required readonly>
            <div class="form__box text-left">
              <label for="name" class="form__label">Your name</label>
              <input type="text" name="requester_name" id="name" class="form__input" placeholder="Insert your fullname" required>
            </div>
            <div class="form__box text-left">
              <label for="email" class="form__label">Your Email</label>
              <input type="email" id="email" name="requester_email" class="form__input" placeholder="Insert your email" required>
            </div>
            <div class="form__box text-left">
              <label for="address" class="form__label">Your Address</label>
              <input type="text" id="address" name="requester_address" class="form__input" placeholder="Insert your address" required>
            </div>
            <a href="javascript:void(0);" class="productRequest__link text-blue show-modal" data-modal="#modal-request">
              Always get free sample for you get in contact
            </a>
            <button class="btn-primary" type="submit">Get in contact <i class='bx bx-right-arrow-alt'></i></button>
          </form>
        </div>
      </div>
    </div>
    <div class="row mt-5" id="similiarProduct-container">
      <h2 class="col-12 col-lg-auto">
        <small class="secondary-text">Our Product</small>
        <span class="heading-text">Another Product</span>
      </h2>
      <div class="similiarProduct">
        @foreach ($productRecommend as $recomended)
          <div class="col px-lg-3">
            <figure class="product__item">
              <div class="product__image">
                <img src="{{ Storage::url($recomended->image) }}" height="300">
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
  </div>
@endsection
@section('partial')
  <div class="modal" id="modal-request">
    <div class="modal__content">
      <div class="modal__header">
        <h3 class="modal__heading">Request Product</h3>
        <p class="modal__subheading">
          You can get Free Sample of our product by enter your contact information so we are able to process your request.
          Thank you for your interest.
        </p>
        <a href="javascript:void(0);" class="modal__close"><i class='bx bx-x'></i></a>
      </div>
      <form class="modal__body" id="request-product">
        @csrf
        <div class="row mx-0">
          <div class="col-12 col-lg-6">
            <div class="form__box">
              <label for="name" class="form__label input-required">Name</label>
              <input type="text" class="form__input" name="requester_name" placeholder="your name">
            </div>
            <div class="form__box">
              <label for="address" class="form__label input-required">Address</label>
              <input type="text" class="form__input" name="requester_address" placeholder="your address">
            </div>
            <div class="form__box">
              <label for="email" class="form__label input-required">Email</label>
              <input type="text" class="form__input" name="requester_email" placeholder="your email address">
            </div>
            <div class="form__box">
              <label for="requester_company" class="form__label">Company name</label>
              <input type="text" class="form__input" name="requester_company" id="requester_company" placeholder="your company name">
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="form__box">
              <label for="product_id" class="form__label input-required">Request Type</label>
              <select class="form__input form__input--select" id="product_id" name="product_id">
                @foreach ($products as $item)
                  <option value="{{ $item->id }}" @if ($product->id == $item->id) selected @endif>{{ $item->title }}</option>
                @endforeach
              </select>
            </div>
            <div class="form__box">
              <label for="message" class="form__label input-required">Your message</label>
              <textarea name="your_message" class="form__input" id="message" rows="5" placeholder="Ex: I wanna request sample every 2 weeks"></textarea>
            </div>
          </div>
        </div>
      </form>
      <div class="modal__foter">
        <label class="form-check-label" for="accept">
          <input name="accept" value="accept" id="accept" type="radio" class="form-check-input mr-2">
          I allow to store and process my information for the <br> purpose given in this contact form.
          <span class="radio-circle"></span>
        </label>
        <a href="https://wa.me/{{ Str::slug($companyContact->whatsapp, '') }}" class="btn-primary ml-auto mr-4 contact-fill__btn mb-3 mb-md-0">
          Instant Contact <i class='bx bxl-whatsapp'></i>
        </a>
        <button type="submit" class="btn-primary" form="request-product" disabled>Send message</button>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script>
    $(document).ready(function() {
      $("#request-product + .modal__foter input[name='accept']").change(function() {
        $('#request-product + .modal__foter button[type="submit"]').prop("disabled", false);
      });
      $(".productRequest__form, #request-product").submit(function(e) {
        e.preventDefault();
        $.ajax({
          type: 'POST',
          url: '{{ route('customer.request-product.store') }}',
          data: {
            product_id: $(this).find("[name='product_id']").val(),
            requester_name: $(this).find(".form__input[name='requester_name']").val(),
            requester_email: $(this).find(".form__input[name='requester_email']").val(),
            requester_address: $(this).find(".form__input[name='requester_address']").val(),
            requester_company: $(this).find(".form__input[name='requester_company']").val()
          },
          success: function(result) {
            $('#modal-request-done').addClass('show');
            $("#modal-request").removeClass('show');
            $(".productRequest__form")[0].reset();
            $("#request-product")[0].reset();
          },
          error: function(xhr, textStatus, error) {
            console.log(xhr.responseText);
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
          }
        });
      });
    });
  </script>
@endsection
