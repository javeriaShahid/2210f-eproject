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
    <link rel="icon" href="{{asset('assets/img/sm-logo.svg')}}" type="image/gif">

    <title>Admin | @yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.css') }}">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="overflow-y: auto; overflow-x:hidden;">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">

              </span>

              <span class="app-brand-text demo menu-text fw-bolder ms-2">
                <img src="{{ asset('assets/img/logo.png') }}" style="height: 50px" alt>              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            {{-- Product Brands --}}
              <!-- Forms & Tables -->
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Brands  Management</span></li>
              <!-- Forms -->
              <li class="menu-item">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div data-i18n="Layouts">Brands</div>
                  </a>

                  <ul class="menu-sub">
                      <li class="menu-item">
                        <a href="{{ route('brand.create') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-plus"></i>
                            <div data-i18n="Basic">Create</div>
                          </a>
                        </li>
                    <li class="menu-item">
                        <a href="{{ route('brand.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">All</div>
                          </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('brand.trash') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-trash"></i>
                            <div data-i18n="Basic">Trashed</div>
                          </a>
                    </li>
                  </ul>
                </li>
              </li>


            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Category Management</span></li>
                         <!-- Forms -->
                         <li class="menu-item">
                            <li class="menu-item">
                              <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-book"></i>
                                <div data-i18n="Layouts">Category</div>
                              </a>

                              <ul class="menu-sub">
                                  <li class="menu-item">
                                    <a href="{{ route('category.create') }}" class="menu-link">
                                        <i class="menu-icon tf-icons bx bx-plus"></i>
                                        <div data-i18n="Basic">Create</div>
                                      </a>
                                    </li>
                                <li class="menu-item">
                                    <a href="{{ route('category.index') }}" class="menu-link">
                                        <i class="menu-icon tf-icons bx bx-collection"></i>
                                        <div data-i18n="Basic">All</div>
                                      </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{ route('category.trash') }}" class="menu-link">
                                        <i class="menu-icon tf-icons bx bx-trash"></i>
                                        <div data-i18n="Basic">Trashed</div>
                                      </a>
                                </li>
                              </ul>
                            </li>
                          </li>




            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Sub Categories  Management</span></li>
            <!-- Forms -->
            <li class="menu-item">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div data-i18n="Layouts">Sub Category</div>
                  </a>

                  <ul class="menu-sub">
                      <li class="menu-item">
                        <a href="{{ route('subcategory.create') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-plus"></i>
                            <div data-i18n="Basic">Create</div>
                          </a>
                        </li>
                    <li class="menu-item">
                        <a href="{{ route('subcategory.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">All</div>
                          </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('subcategory.trash') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-trash"></i>
                            <div data-i18n="Basic">Trashed</div>
                          </a>
                    </li>
                  </ul>
                </li>
              </li>
            {{--  --}}
            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Product Managment</span></li>
            <li class="menu-item">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div data-i18n="Layouts">Products</div>
                  </a>

                  <ul class="menu-sub">
                      <li class="menu-item">
                        <a href="{{ route('product.create') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-plus"></i>
                            <div data-i18n="Basic">Create</div>
                          </a>
                        </li>
                    <li class="menu-item">
                        <a href="{{ route('product.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">All</div>
                          </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('product.published') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Published</div>
                          </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('product.unpublished') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Un Published</div>
                          </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('product.trash') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-trash"></i>
                            <div data-i18n="Basic">Trashed</div>
                          </a>
                    </li>
                  </ul>
                </li>
              </li>
              {{-- Orders Management System --}}
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Orders  Management</span></li>
              <!-- Forms -->
              <li class="menu-item">
                  <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-book"></i>
                      <div data-i18n="Layouts">Orders</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                          <a href="{{ route('admin.order.index') }}" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-plus"></i>
                              <div data-i18n="Basic">All</div>
                            </a>
                          </li>
                      <li class="menu-item">
                          <a href="{{ route('admin.order.delivered') }}" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-mail-send"></i>
                              <div data-i18n="Basic">Delivered</div>
                            </a>
                      </li>

                      <li class="menu-item">
                          <a href="{{ route('admin.order.pending') }}" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-time"></i>
                              <div data-i18n="Basic">Pending</div>
                            </a>
                      </li>

                      <li class="menu-item">
                          <a href="{{ route('admin.order.shipped') }}" class="menu-link">
                              <i class="menu-icon tf-icons bx bxs-ship"></i>
                              <div data-i18n="Basic">Shipped</div>
                            </a>
                      </li>
                      <li class="menu-item">
                          <a href="{{ route('admin.order.sent') }}" class="menu-link">
                              <i class="menu-icon tf-icons bx bxs-truck"></i>
                              <div data-i18n="Basic">Sent</div>
                            </a>
                      </li>
                      <li class="menu-item">
                          <a href="{{ route('admin.order.cancelled') }}" class="menu-link">
                              <i class="menu-icon tf-icons bx bxs-x-circle"></i>
                              <div data-i18n="Basic">Cancelled</div>
                            </a>
                      </li>
                    </ul>
                  </li>
                </li>

              {{-- End of products managemnet --}}

              {{-- Users Managment --}}
                 <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">User Management</span></li>
            <!-- Forms -->
            <li class="menu-item">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Layouts">Users</div>
                  </a>

                  <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('admin.user.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">All</div>
                          </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('admin.user.block') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-trash"></i>
                            <div data-i18n="Basic">Blocked</div>
                          </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.user.active') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Basic">Active</div>
                          </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.user.deactive') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Basic">Deactive</div>
                          </a>
                    </li>
                  </ul>
                </li>
              </li>
              {{-- End  --}}
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
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{ asset('assets/UserImages/'. session()->get('admin')['profile_image']) }}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ asset('assets/UserImages/'. session()->get('admin')['profile_image'])}}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ session()->get('admin')['name'] }}</span>
                            <small class="text-muted">{{ session()->get('admin')['username'] }}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>

                      <a class="dropdown-item" href="{{ route('admin.account.setting') }}">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>

                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('admin.logout') }}">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">

            <!-- Content -->
            @yield('content')
            </div>
            {{-- Content se pehel --}}
                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                      <div class="mb-2 mb-md-0">
                        ©
                        <script>
                          document.write(new Date().getFullYear());
                        </script>
                        , made with ❤️ by
                        <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Dazzle.</a>
                      </div>
                      <div>

                      </div>
                    </div>
                  </footer>
                  <!-- / Footer -->

                  <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
              </div>
              <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
          </div>
          <!-- / Layout wrapper -->




        </body>
      </html>
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
      // Redirected Error ends here
    </script>
