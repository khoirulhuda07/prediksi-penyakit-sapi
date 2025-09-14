<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Halaman @yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('user4/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('user4/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('user4/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('user4/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('user4/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('user4/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('user4/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('user4/js/config.js')}}"></script>
  </head>

  <body>
  @include('sweetalert::alert')

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="#" class="app-brand-link">
              <span class="app-brand-logo demo">
              <h3 class="app-brand-text demo menu-text fw-bolder my-auto mt-3 mb-3">Sistem Pakar</h3>
              </span>
             
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
  <a href="{{ url('/') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-home-circle"></i>
    <div data-i18n="Analytics">Dashboard</div>
  </a>
</li>
@guest
<li class="menu-item {{ request()->is('penyakit') ? 'active' : '' }}">
  <a href="{{ url('/penyakit') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-table"></i>
    <div data-i18n="Analytics"> Penyakit & Gejala</div>
  </a>
</li>
@else
@endguest

@auth
<li class="menu-item {{ request()->is('gejala') ? 'active' : '' }}">
  <a href="{{ url('/gejala') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-table"></i>
    <div data-i18n="Analytics">Data Gejala</div>
  </a>
</li>
<li class="menu-item {{ request()->is('penyakit') ? 'active' : '' }}">
  <a href="{{ url('/penyakit') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-table"></i>
    <div data-i18n="Analytics">Data Penyakit</div>
  </a>
</li>
<li class="menu-item {{ request()->is('dataset') ? 'active' : '' }}">
  <a href="{{ url('/dataset') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-table"></i>
    <div data-i18n="Analytics">Dataset</div>
  </a>
</li>
<li class="menu-item {{ request()->is('akun') ? 'active' : '' }}">
  <a href="{{ url('/akun') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-table"></i>
    <div data-i18n="Analytics">Data Akun</div>
  </a>
</li>
@endauth
<li class="menu-item {{ request()->is('diagnosa') ? 'active' : '' }}">
  <a href="{{ url('/diagnosa') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-table"></i>
    <div data-i18n="Analytics">Diagnosa Penyakit</div>
  </a>
</li>
<li class="menu-item {{ request()->is('akurasi') ? 'active' : '' }}">
  <a href="{{ url('/akurasi') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-table"></i>
    <div data-i18n="Analytics">Akurasi sistem</div>
  </a>
</li>

<!-- <li class="menu-item {{ request()->is('user') ? 'active' : '' }}">
  <a href="{{ url('/user') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-table"></i>
    <div data-i18n="Analytics">Kelola User</div>
  </a>
</li> -->

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
              

                <!-- User -->
                 
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{asset('user4/img/profile.jfif')}}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    @auth
                  <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{asset('user4/img/profile.jfif')}}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"> @if (empty(Auth::user()->name))
                            {{''}}
                            @else
                            {{Auth::user()->name}}
                            @endif</span>
                            <!-- <small class="text-muted">Admin</small> -->
                          </div>
                        </div>
                      </a>
                    </li>
                  
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                   
                    <li>
                      <a class="dropdown-item"href="{{ route('logout') }}"   onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                    </li>
                    @endauth
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->
          <div class="content-wrapper">