<!DOCTYPE html>
<html lang="en" dir="ltr" id="customerMaster">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="og:title" content="@yield('meta-title')">
    <meta name="og:description" content='@yield("meta-desc")'>
    <meta name="keywords" content="@yield('meta-keyword')">
    <meta name="og:image" content="@yield('meta-img')">
    <meta name="og:url" content="{{ URL::full() }}">
    <meta name="og:type" content="website">
    <link rel="shortcut icon" href="{{ Storage::url($imageAsset->favicon) }}">
    <link rel="icon" type="image/png" href="{{ Storage::url($imageAsset->favicon) }}" sizes="192x192">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ Storage::url($imageAsset->favicon) }}">
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('external/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('external/slick/slick-theme.css') }}">
    @yield('css')
    <title>Dickson Synergy - @yield('title')</title>
  </head>
  <body id="@yield('page-name')Page">
    <header>
      <nav>
        <div class="container">
          <li class="nav__list">
            <a href="{{ route('customer.landing') }}" class="nav__brand">
              <img src="{{ Storage::url($imageAsset->logo_menu) }}" alt="Dickson Logo">
            </a>
            <a href="javascript:void(0);" class="nav__open">
              <i class='bx bx-menu-alt-right'></i>
            </a>
          </li>
          <li class="nav__list">
            <a class="nav__link" href="{{ route('customer.landing') }}">Home</a>
          </li>
          <li class="nav__list">
            <a class="nav__link" href="{{ route('customer.about-us') }}">About Us</a>
          </li>
          <li class="nav__list">
            <a class="nav__link {{ \Request::is('our-product/*') ? 'nav__link--active' : '' }}"
            href="{{ route('customer.our-product.index') }}">
              Product
            </a>
          </li>
          <li class="nav__list">
            <a class="nav__link {{ \Request::is('career/*') ? 'nav__link--active' : '' }}" href="{{ route('customer.career.index') }}">
              Career
            </a>
          </li>
          <li class="nav__list">
            <a class="nav__link" href="{{ route('customer.frequently-ask-question.index') }}">FAQ</a>
          </li>
          <li class="nav__list">
            <a class="nav__link" href="{{ route('customer.contact-us.index') }}">Contact us</a>
          </li>
        </div>
      </nav>
      @yield('header')
    </header>
    <main>
      @yield('content')
    </main>
    <footer>
      <div class="container">
        <div class="row">
          <div class="footer__left">
            <a href="{{ route('customer.landing') }}">
              <img src="{{ Storage::url($imageAsset->logo_footer) }}" alt="Dickson Logo">
            </a>
            <ul class="footer_media">
              @foreach ($companySocial as $social)
                <li>
                  <a href="https://{{ $social->social_media . '.com/' . $social->username }}" target="_blank" class="footer__link">
                    <img src="{{ Storage::url($social->icon) }}" height="30">
                  </a>
                </li>
              @endforeach
            </ul>
            <small class="footer__legal">&copy; {{ date('Y') . ' '. $companyProfile->copyright }}</small>
          </div>
          <div class="footer__right">
            <ul>
              <li>
                <a href="{{ route('customer.about-us') }}" class="footer__link footer__link--bold">About Us</a>
              </li>
              <li>
                <a href="{{ route('customer.our-product.index') }}" class="footer__link footer__link--bold">Product</a>
              </li>
              <li>
                <a href="{{ route('customer.career.index') }}" class="footer__link footer__link--bold">Career</a>
              </li>
              <li>
                <a href="{{ route('customer.frequently-ask-question.index') }}" class="footer__link footer__link--bold">FAQ</a>
              </li>
              <li>
                <a href="{{ route('customer.contact-us.index') }}" class="footer__link footer__link--bold">Contact us</a>
              </li>
            </ul>
            <ul>
              <li>
                <a href="mailto:{{ $companyContact->email }}" class="footer__link">{{ $companyContact->email }}</a>
              </li>
              <li>
                <a href="tel:{{ $companyContact->telphone }}" class="footer__link">{{ $companyContact->telphone }}</a>
              </li>
              <li>
                <a href="https://www.google.com/maps/search/{{ Str::slug($companyContact->address), '+' }}" class="footer__link">
                  {{ $companyContact->address }}
                </a>
              </li>
              <li>
                <a href="{{ $companyContact->location }}" class="footer__link">{{ $companyContact->location }}</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    @yield('partial')
    <script src="{{ asset('js/jquery.min.js') }}" charset="utf-8" type="text/javascript"></script>
    <script src="{{ asset('external/slick/slick.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('external/vertical-tabs/dist/jquery.tabs.min.js') }}" charset="utf-8"></script>
    @yield('script')
    <script src="{{ asset('js/customer.js') }}" charset="utf-8"></script>
  </body>
</html>
