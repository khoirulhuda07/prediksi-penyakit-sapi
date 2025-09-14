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
  class="light-style customizer-hide"
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

    <title>Halaman Login</title>

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
    <link rel="stylesheet" href="{{asset('user4/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('user4/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('user4/vendor/css/pages/page-auth.css')}}" />
    <!-- Helpers -->
    <script src="{{asset('user4/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('user4/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
    <div class="container">
  <div class="row justify-content-center align-items-center min-vh-100">
    <!-- Kolom Penjelasan -->
    <div class="col-md-6 mb-4">
      <div class="card shadow">
        <div class="card-body">
          <h4 class="mb-3">Tentang Sistem Pakar Sapi</h4>
          <p>
            <strong>Sistem Pakar Sapi</strong> adalah aplikasi berbasis web yang membantu peternak atau dokter hewan dalam mendiagnosis penyakit sapi berdasarkan gejala. Sistem ini menggunakan metode <em>Naive Bayes</em> untuk mempercepat proses identifikasi penyakit.
          </p>
          <p>
            Fitur utama aplikasi ini meliputi:
          </p>
          <ul>
            <li>Diagnosis otomatis berdasarkan gejala yang dipilih.</li>
            <li>Memberikan solusi atau tindakan awal.</li>
            <li>Data gejala dan penyakit yang lengkap dan terstruktur.</li>
            <!-- <li>Membantu dalam pengambilan keputusan awal peternakan.</li> -->
          </ul>
          <p>
            Dengan sistem ini, diharapkan produktivitas ternak meningkat dan kematian sapi akibat keterlambatan penanganan dapat dikurangi.
          </p>
        </div>
      </div>
    </div>

    <!-- Kolom Login -->
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center mb-3">
            <a href="#" class="app-brand-link gap-2">
              <h3 class="app-brand-text demo text-body fw-bolder">Sistem Pakar Sapi</h3>
            </a>
          </div>

          <h4 class="mb-2">Selamat Datang 👋</h4>
          <p class="mb-4">Silahkan Login Terlebih Dahulu</p>

          <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Masukkan Email Anda"
                required
              />
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Password</label>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  id="password"
                  class="form-control"
                  name="password"
                  placeholder="••••••••••"
                  required
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
            </div>
          </form>

          <!-- <p class="text-center">
            <span>Belum punya akun?</span>
            <a href="{{ url('/register') }}">
              <span>Registrasi</span>
            </a>
          </p> -->
        </div>
      </div>
    </div>
  </div>
</div>

    </div>

    <!-- / Content -->

   

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('user4/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('user4/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('user4/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('user4/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('user4/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{asset('user4/js/main.js')}}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
