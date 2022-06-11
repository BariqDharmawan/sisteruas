<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta http-equiv="Content-Language" content="en">
      <title>Admin Dashboard | @yield('title')</title>
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta name="msapplication-tap-highlight" content="no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!--
         =========================================================
         * ArchitectUI HTML Theme Dashboard - v1.0.0
         =========================================================
         * Product Page: https://dashboardpack.com
         * Copyright 2019 DashboardPack (https://dashboardpack.com)
         * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
         =========================================================
         -->
      <link rel="shortcut icon" href="{{ Storage::url($imageAsset->favicon) }}">
      <link rel="icon" type="image/png" href="{{ Storage::url($imageAsset->favicon) }}" sizes="192x192">
      <link rel="apple-touch-icon" sizes="180x180" href="{{ Storage::url($imageAsset->favicon) }}">
      <link href="{{ asset('external/architectui/main.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
      @yield('css')
      <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.4/css/boxicons.min.css' rel='stylesheet'>
   </head>
   <body id="@yield('page-name')">
      <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
         <div class="app-header header-shadow">
            <div class="app-header__logo">
               <div class="logo-src" style="background: none">
                 <img src="{{ Storage::url($imageAsset->logo_menu) }}" height="45" style="transform: translateY(-8px)">
               </div>
               <div class="header__pane ml-auto">
                  <div>
                     <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                     <span class="hamburger-box">
                     <span class="hamburger-inner"></span>
                     </span>
                     </button>
                  </div>
               </div>
            </div>
            <div class="app-header__mobile-menu">
               <div>
                  <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                  <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                  </span>
                  </button>
               </div>
            </div>
            <div class="app-header__menu">
               <span>
               <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
               <span class="btn-icon-wrapper">
               <i class="fa fa-ellipsis-v fa-w-6"></i>
               </span>
               </button>
               </span>
            </div>
            <div class="app-header__content">
               <div class="app-header-right">
                  <div class="header-btn-lg pr-0">
                     <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                           <div class="widget-content-left  ml-3 header-user-info" style="position: relative;padding-right: 50px;">
                              <div class="widget-heading">{{ Auth::user()->username }}</div>
                              <div class="widget-subheading">Admin Manager</div>
                              <div class="btn-group" style="position: absolute;right: 15px;top: 50%;transform: translateY(-50%)">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="p-0 btn">
                                  <i class="fa fa-angle-down ml-2 opacity-8" style="font-size: 1rem"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right"
                                x-placement="bottom-end"
                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-208px, 44px, 0px);">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                  </form>
                                </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
               <div class="app-header__logo">
                  <div class="logo-src"></div>
                  <div class="header__pane ml-auto">
                     <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                        </span>
                        </button>
                     </div>
                  </div>
               </div>
               <div class="app-header__mobile-menu">
                  <div>
                     <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                     <span class="hamburger-box">
                     <span class="hamburger-inner"></span>
                     </span>
                     </button>
                  </div>
               </div>
               <div class="app-header__menu">
                  <span>
                  <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                  <span class="btn-icon-wrapper">
                  <i class="fa fa-ellipsis-v fa-w-6"></i>
                  </span>
                  </button>
                  </span>
               </div>
               <div class="scrollbar-sidebar">
                  <div class="app-sidebar__inner">
                     <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">Dashboards</li>
                        <li class="@if (\Request::is('admin/company/*') OR \Request::is('admin/page/career')) mm-active @endif">
                           <a href="javascript:void(0);">
                             <i class="metismenu-icon pe-7s-rocket"></i> Company Info
                             <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                           </a>
                           <ul>
                             <li>
                               <a href="{{ route('admin.company.profile.index') }}"
                               class="@if (Route::currentRouteName() == 'admin.company.profile.index') mm-active @endif">
                                 Company Profile
                               </a>
                             </li>
                             <li>
                               <a href="{{ route('admin.company.product.index') }}"
                               class="@if (Route::currentRouteName() == 'admin.company.product.index') mm-active @endif">
                                 Product
                               </a>
                             </li>
                             <li>
                               <a href="{{ route('admin.company.faq.index') }}"
                               class="@if (Route::currentRouteName() == 'admin.company.faq.index') mm-active @endif">
                                 FAQ
                               </a>
                             </li>
                             <li>
                               <a href="{{ route('admin.company.career.index') }}"
                               class="@if (Route::currentRouteName() == 'admin.company.career.index') mm-active @endif">
                                 Career
                               </a>
                             </li>
                             <li>
                               <a href="{{ route('admin.company.client.index') }}"
                               class="@if (Route::currentRouteName() == 'admin.company.client.index') mm-active @endif">
                                 Client
                               </a>
                             </li>
                             <li>
                               <a href="{{ route('admin.company.request-product.index') }}"
                               class="@if (Route::currentRouteName() == 'admin.company.product.request-sample') mm-active @endif">
                                 Request Product
                               </a>
                             </li>
                             <li>
                               <a href="{{ route('admin.company.message-customer.index') }}"
                               class="@if (Route::currentRouteName() == 'admin.company.message-customer.index') mm-active @endif">
                                 Message Customer
                               </a>
                             </li>
                             <li>
                               <a href="{{ route('admin.page.career.index') }}"
                               class="@if (Route::currentRouteName() == 'admin.page.career.index') mm-active @endif">
                                 Career submission
                               </a>
                             </li>
                           </ul>
                        </li>
                        <li class="@if (\Request::is('admin/meta-page/*')) mm-active @endif">
                          <a href="#">
                            <i class="metismenu-icon pe-7s-diamond"></i> Meta Page
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                          </a>
                          <ul>
                            <li>
                              <a href="{{ route('admin.meta-page.main') }}"
                              class="@if (Route::currentRouteName() == 'admin.meta-page.main') mm-active @endif">
                                <i class="metismenu-icon"></i> Main meta
                              </a>
                            </li>
                            <li>
                              <a href="{{ route('admin.meta-page.career') }}"
                              class="@if (Route::currentRouteName() == 'admin.meta-page.career') mm-active @endif">
                                <i class="metismenu-icon"></i> Career page meta
                              </a>
                            </li>
                            <li>
                              <a href="{{ route('admin.meta-page.product') }}"
                              class="@if (Route::currentRouteName() == 'admin.meta-page.product') mm-active @endif">
                                <i class="metismenu-icon"></i> Product page meta
                              </a>
                            </li>
                            <li>
                              <a href="{{ route('admin.meta-page.about') }}"
                              class="@if (Route::currentRouteName() == 'admin.meta-page.about') mm-active @endif">
                                <i class="metismenu-icon"></i> About page meta
                              </a>
                            </li>
                            <li>
                              <a href="{{ route('admin.meta-page.faq') }}"
                              class="@if (Route::currentRouteName() == 'admin.meta-page.faq') mm-active @endif">
                                <i class="metismenu-icon"></i> Faq page meta
                              </a>
                            </li>
                            <li>
                              <a href="{{ route('admin.meta-page.contact-us') }}"
                              class="@if (Route::currentRouteName() == 'admin.meta-page.contact-us') mm-active @endif">
                                <i class="metismenu-icon"></i> Contact us page meta
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="app-sidebar__heading">CMS</li>
                        <li>
                          <a href="{{ route('admin.page.home.index') }}">Homepage</a>
                        </li>
                        <li>
                          <a href="{{ route('admin.page.contact-us.index') }}">Contact us page</a>
                        </li>
                        <li>
                          <a href="{{ route('admin.page.product.index') }}">Product page</a>
                        </li>
                        <li>
                          <a href="{{ route('admin.page.career-cms.index') }}">Career page</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="app-main__outer">
               <div class="app-main__inner">
                  <div class="app-page-title">
                     <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            @yield('page-header')
                        </div>
                     </div>
                  </div>
                  @yield('content')
               </div>
               <div class="app-wrapper-footer">
                  <footer class="app-footer">
                     <div class="app-footer__inner">
                        <div class="app-footer-left">
                           <ul class="nav">
                              <li class="nav-item">
                                 <small>{{ $companyProfile->copyright }}</small>
                              </li>
                           </ul>
                        </div>
                        <div class="app-footer-right">
                           <ul class="nav">
                             @foreach ($companySocial as $social)
                               <li class="nav-item">
                                  <a href="https://{{ $social->social_media . '.com/' . $social->username }}" class="nav-link" target="_blank">
                                    <img src="{{ Storage::url($social->icon) }}" alt="{{ $social->social_media }} icon" height="20">
                                    {{ $social->instagram }}
                                  </a>
                               </li>
                             @endforeach
                           </ul>
                        </div>
                     </div>
                  </footer>
               </div>
            </div>
         </div>
      </div>
      <script src="{{ asset('external/architectui/assets/scripts/main.js') }}"></script>
      <script src="{{ asset('js/jquery.min.js') }}" charset="utf-8"></script>
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.js"></script>
      <script src="{{ asset('js/bs-custom-file-input.min.js') }}" charset="utf-8"></script>
      @yield('script')
      <script src="{{ asset('js/admin.js') }}" charset="utf-8"></script>
   </body>
</html>
