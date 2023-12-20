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
    <link rel="icon" href="{{asset('assets/img/sm-logo.svg')}}" type="image/gif">


    <title>Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset("assets/img/sm-logo.svg") }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.css') }}">

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">

                  </span>


                  <span class="app-brand-text demo text-body fw-bolder">
                    <img src="assets/img/logo.png" height="40px" alt="">
                  </span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-3 text-center ">Welcome to dazzle! 👋</h4>
              <p class="mb-4 text-center" id="titleContainer">Please sign-in to your account and start the adventure</p>

              <form id="formAuthentication" class="mb-3" action="{{ route('auth.login') }}" method="POST">
                @csrf
               <div id="loginContainer" >
                <div class="mb-3">
                    <label for="email" class="form-label">Email or Username</label>
                    <input
                      type="text"
                      class="form-control"
                      id="email"
                      name="email"
                      placeholder="Enter your email or username"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Password</label>
                      <a id="forgetPassword" style="cursor: pointer">
                        <small>Forgot Password?</small>
                      </a>
                    </div>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      <input type="hidden" value="{{csrf_token()}}" id="csrfToken">
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="remember-me" />
                      <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                  </div>
               </div>
               {{-- Verification Code --}}
               <div id="verificationContainer" style="display: none">
                <div class="mb-3">
                    <label for="email" class="form-label">Enter Email Address</label>
                    <input
                      type="text"
                      class="form-control mb-3"
                      id="verification_email"

                      placeholder="Enter your email or username"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 form-password-toggle" id="verificationInput" style="display:none">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Enter Verification Code</label>
                    </div>
                    <div class="input-group input-group-merge">
                      <input
                        type="number"
                        id="verificationCode"
                        class="form-control mb-3"
                        name="verificationCode"
                        placeholder="Enter Verification Code"
                        aria-describedby="password"
                      />

                    </div>
                  </div>
               </div>
               {{-- Reset Password Form --}}
               <div id="passContainer"  style="display:none">
                <div class="mb-3">
                    <label for="email" class="form-label">Enter New Password</label>
                    <input
                      type="text"
                      class="form-control mb-3"
                      id="new_password"
                      name="new_password"
                      placeholder="Enter your new password"
                      autofocus
                    />
                  </div>
                  <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                      <label class="form-label" for="password">Confirm Password</label>
                    </div>
                    <div class="input-group input-group-merge">
                      <input
                        type="text"
                        id="confirm_password"
                        class="form-control mb-3"
                        name="confirm_pass"
                        placeholder="Confirm Password"
                        aria-describedby="password"
                      />

                    </div>
                  </div>
               </div>
               {{-- End of password Reset --}}

                <div class="mb-3">
                  <button class="btn btn-dark d-grid w-100" type="submit" id="submitButton">Login</button>
                </div>
              </form>

              {{-- <p class="text-center">
                <span>New on our platform?</span>
                <a href="Auth_register">
                  <span>Create an account</span>
                </a>
              </p> --}}
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->
{{--
    <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div> --}}

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

          <!-- Core JS -->
          <!-- build:js assets/vendor/js/core.js -->
          <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
          <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
          <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
          <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

          <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
          <!-- endbuild -->

          <!-- Vendors JS -->
          <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

          <!-- Main JS -->
          <script src="{{ asset('assets/js/main.js') }}"></script>
          <script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
          <!-- Page JS -->
          <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

          {{-- custom --}}
          <script src="{{asset('dashboardassets/js/custom/resetpasswordAdmin.js')}}"></script>
<script>
    // To show every error that occure
@if( Session::has('success'))
  toastr['success']("{{ Session::get('success') }}")
  @endif
  // IF error occurs
  @if(Session::has('error'))
  toastr['error']("{{ Session::get('error') }}")
  @endif
  // Redirected Errors
  @if($errors->any())
    @foreach( $errors->all() as $error)
    toastr['error']("{{ $error }}")
    @endforeach
  @endif

      let getVerification       = "{{route('get.verification.code')}}" ;
      let verifyCode            = "{{route('verify.code')}}" ;
      let resetPassword         = "{{route('password.reset')}}";

</script>
