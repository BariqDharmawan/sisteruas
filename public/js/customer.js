$(document).ready(function() {
  $.ajaxSetup({ //make all page ajax-able
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var path = window.location.href;
  $('.nav__link').each(function() {
    if (this.href === path) {
      $(this).addClass('nav__link--active');
    }
  });
  $(".form__label").parent().find(".form__input").prop('required', true);
  $(".form__label").parent().find(".form__input").change(function() {
    if ($(this).val().length != 0 || $(this).is(":valid")) {
      $(this).parents(".form__box").css('border', '1px solid #113F59');
      $(this).parents(".form__box").find('.message-required').remove();
    }
    else {
      if ($(this).val().length != 0) {
        if ($(this).siblings('.message-required').length == 0) {
          $(this).parents(".form__box").append('<span class="message-required">Format was wrong!</span>');
        }
        else {
          $(this).parents(".form__box").find('.message-required').text('Format was wrong!');
        }
      }
      else {
        if ($(this).siblings('.message-required').length == 0) {
          $(this).parents(".form__box").append('<span class="message-required">This field required!</span>');
        }
        else {
          $(this).parents(".form__box").find('.message-required').text('This field required!');
        }
      }
      $(this).parents(".form__box").css('border', '1px solid #D73737');
    }
  });
  $(".close-alert").click(function() {
    $(this).parents("[class*='alert']").hide('slow');
  });
  $("header").css('padding-top', $("nav").outerHeight(true));
  $(".nav__open").click(function() {
    $(this).parents("nav").toggleClass('nav--opened');
  });
  $(".show-modal").click(function() {
    let modalTarget = $(this).data('modal');
    $(".modal" + modalTarget).addClass('show').parents("body");
  });
  $(".form__removeValue").click(function() {
    $(this).hide().siblings('.form__input--file').val("");
    $(this).prev().find('.file-value').html('<b class="mb-1 mb-md-0 d-inline-block">Upload file</b> <br class="d-md-none"> or drag and drop here');
  });
  $(".form__input--file").on('change dragover drop', function() {
    if ($(this).val().length !== 0) {
      let fileValue = $(this).val().replace(/^C:\\fakepath\\/, "");
      $(this).siblings(".form__label--file").find('.file-value').text(fileValue);
      $(".form__removeValue").show();
      $(".form__removeValue").click(function() {
        $(this).val("");
        $(this).siblings('.form__label--file').find('.file-value').html('<b class="mb-1 mb-md-0 d-inline-block">Upload file</b> <br class="d-md-none"> or drag and drop here');
      });
    }
    else {
      $(this).siblings(".form__label--file").find('.file-value')
      .html('<b class="mb-1 mb-md-0 d-inline-block">Upload file</b> <br class="d-md-none"> here');
      $(this).siblings('.form__removeValue').hide();
    }
  });

  $("#aboutPage .aboutClientSlider").slick({
    slidesToShow: 5,
    slidesToScroll: 5,
    dots: false,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
  $("#landingPage .product__slider").slick({
    infinite: false,
    prevArrow: "<a href='javascript:void(0);' class='slide-prev slide-arrow'><i class='bx bx-chevron-right'></i></a>",
    nextArrow: "<a href='javascript:void(0);' class='slide-next slide-arrow'><i class='bx bx-chevron-left'></i></a>",
    slidesToShow: 3,
    dots: true,
    // centerMode: true,
    slidesToScroll: 3,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          prevArrow: "<a href='javascript:void(0);' class='slide-prev slide-arrow'><i class='bx bx-chevron-left'></i></a>",
          nextArrow: "<a href='javascript:void(0);' class='slide-next slide-arrow'><i class='bx bx-chevron-right'></i></a>",
        }
      },
      {
        breakpoint: 992,
        settings: {
          dots: false,
          centerMode: false,
          prevArrow: "<a href='javascript:void(0);' class='slide-prev slide-arrow'><i class='bx bx-chevron-left'></i></a>",
          nextArrow: "<a href='javascript:void(0);' class='slide-next slide-arrow'><i class='bx bx-chevron-right'></i></a>",
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
  $("#landingPage .header__arrow").css('bottom', $("#landingPage .header__info").height());
  $("#landingPage .product__slider .slide-next").click(function() {
    $("#landingPage .product__slider .slide-prev").addClass('show');
    $("#landingPage .slick-list").addClass('overflow-hide');
    $('#landingPage .product__slider').slick('slickGoTo', 12);
    if ($("#landingPage .product__slider .slick-slide:not([data-slick-index='0'])").hasClass('slick-current')) {
      $("#landingPage .product__slider .slide-prev").addClass('show').removeClass('hide');
    }
  });
  $("#landingPage .product__slider .slide-prev").click(function(){
    $("#landingPage .product__slider .slide-next").removeClass('hide');
    if ($("#landingPage .product__slider .slick-slide[data-slick-index='0']").hasClass('slick-current')) {
      $("#landingPage .slick-list").removeClass('overflow-hide');
      $(this).addClass('hide');
    }
    else {
      $("#landingPage .product__slider .slide-next").removeClass('hide');
      $(this).show();
    }
  });

  $("#singleProductPage .product-image").slick({
    centerMode: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 1500
  });
  $("#singleProductPage .similiarProduct").slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    adaptiveHeight: false,
    nextArrow: "<a href='javascript:void(0);' class='slide-next slide-arrow'><i class='bx bx-chevron-right'></i></a>",
    prevArrow: "<a href='javascript:void(0);' class='slide-prev slide-arrow'><i class='bx bx-chevron-left'></i></a>",
    responsive: [
      {
        breakpoint: 992,
        settings: {
          prevArrow: "<a href='javascript:void(0);' class='slide-prev slide-arrow'><i class='bx bx-chevron-left'></i></a>",
          nextArrow: "<a href='javascript:void(0);' class='slide-next slide-arrow'><i class='bx bx-chevron-right'></i></a>",
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
  $("#singleProductPage .singleProduct h6").addClass('singleProduct__heading');
  $("#singleProductPage .singleProduct p").addClass('singleProduct__text');
  $("#singleProductPage .singleProduct ul").addClass('singleProduct-list');
  $("#singleProductPage .singleProduct .singleProduct-list li").addClass('singleProduct-list__item');
  $("#modal-resume-done .btn-primary, #modal-applicant-done .btn-primary").click(function() {
    $(this).parents(".modal").remove();
  });
  $("#singleProductPage #modal-request-done .btn-primary").click(function() {
    $(this).parents(".modal").removeClass("show");
  });

  $(".modal__close").click(function() {
    $(this).parents('.modal').removeClass('show');
  });
  $("#careerPage .alert-success").delay(1000).hide("slow");
  $("#careerPage .jobs .row:first-of-type .col-12:first-child details").prop('open', true);
  $("#careerPage .jobs details[open] summary small b").text("show fewer");
  $("#careerPage .jobs details summary").click(function() {
    if ($(this).parent().is("[open]")) {
      $(this).find("small b").text("show details");
    }
    else {
      $(this).find("small b").text("show fewer");
    }
  });

  $("#singleCareerPage .form__input[name='phone']").on('input propertychange paste', function(){
    var reg = /^0+/gi;
    if (this.value.match(reg)) {
        this.value = this.value.replace(reg, '');
    }
  });
  $("#singleCareerPage .iti__country").click(function() {
    let countryCode = $(this).find(".iti__dial-code").text();
    $("#singleCareerPage input[name='country_code']").val(countryCode.replace('+', ''));
  });
  var countryCode = $(".iti__country.iti__active").find(".iti__dial-code").text();
  $("#singleCareerPage input[name='country_code']").val(countryCode.replace('+', ''));

  var productVideoWidth = $("#singleProductPage .singleProduct__video video").width();
  $("#singleProductPage .singleProduct__video::before").width(productVideoWidth);
  $("#singleProductPage .singleProduct__videoPlay").click(function() {
    $("#singleProductPage .singleProduct__video video")[0].play();
    $(this).fadeOut();
  });
  $("#singleProductPage .singleProduct__video video").click(function() {
    $("#singleProductPage .singleProduct__videoPlay").fadeIn();
  });
});

$(window).on('load', function() {
  if ($(this).width() >= 992) {
    let labelPhoneWidth = $("#singleCareerPage .form__label--phone").width();
    let countryNumberWidth = $("#singleCareerPage .iti__flag-container").width();
    let aboutHeaderHeight = $("#aboutPage .aboutHeader__caption").height() / 2;
    $(".form__label--phone").width(labelPhoneWidth + countryNumberWidth + 15);
    $(".iti__flag-container").css('width', $("#singleCareerPage .form__label--phone").outerWidth());
    $("#faqPage .faqTab").jqTabs({
      direction: 'vertical'
    });
    $("#faqPage .top .row:last-child .col").css('padding-left', $("#faqPage .faqTab__menu").width() + 45);
    $("#landingPage .getFree_desc").css('padding-top', $("#landingPage .getFree__info h1").outerHeight());
    $("#landingPage .getFree__info h1").css('left', $("#landingPage .getFree__info").width() + 60);
    $("#customerMaster .footer_media").css('width', $(".footer__left a").width());
    $("#careerPage .careerDescription__shadow").css('width', $("#careerPage .careerDescription__img img").width());
  }
  else {
    $("#faqPage .faqTab").jqTabs({
      direction: 'horizontal'
    });
  }
});
