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
@php
$settings = \App\Models\Setting::where('status' , 1)->first();
@endphp
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
    @if($settings != null)
    <link rel="icon" href="{{asset('settings_x_Icons/' . $settings->x_icon)}}" type="image/gif">
    @else
    <link rel="icon" href="{{asset('assets/img/sm-logo.svg')}}" type="image/gif">
    @endif
    <title>@if($settings != null){{ $settings->title }} @endif  Admin | @yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    @if($settings != null)
    <link rel="icon" href="{{asset('settings_x_Icons/' . $settings->x_icon)}}" type="image/gif">
    @else
    <link rel="icon" href="{{asset('assets/img/sm-logo.svg')}}" type="image/gif">
    @endif
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
    <link rel="stylesheet" href="{{asset("dashboardassets/css/tag.css")}}">
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('dashboardassets/js/richtext.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <a href="{{ route('user.index') }}" class="app-brand-link" style="display: flex; justify-content:center">
                @if($settings != null)
                <img src="{{ asset('settingsLogo/' . $settings->logo) }}" style="height: 50px" alt>
                @else
                <img src="{{ asset('assets/img/logo.png') }}" style="height: 50px" alt>
                @endif
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="{{route('admin.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            {{-- Product Brands --}}
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Home Links </span></li>
            <!-- Forms -->
            <li class="menu-item">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-home"></i>
                    <div data-i18n="Layouts">Home Links </div>
                  </a>

                  <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('admin.homelinks.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">All</div>
                          </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.homelinks.create') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-plus"></i>
                            <div data-i18n="Basic">Create</div>
                          </a>
                    </li>

                  </ul>
                </li>
              </li>
              <li class="menu-item">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-info-circle"></i>
                    <div data-i18n="Layouts">About Us </div>
                  </a>

                  <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('admin.aboutussettings.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">All</div>
                          </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.aboutussettings.create') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-plus"></i>
                            <div data-i18n="Basic">Create</div>
                          </a>
                    </li>

                  </ul>
                </li>
              </li>
              <li class="menu-item">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-image"></i>
                    <div data-i18n="Layouts">About Us Banners </div>
                  </a>

                  <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('admin.aboutusbanner.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">All</div>
                          </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.aboutusbanner.create') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-plus"></i>
                            <div data-i18n="Basic">Create</div>
                          </a>
                    </li>

                  </ul>
                </li>
              </li>
              <li class="menu-item">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-camera"></i>
                    <div data-i18n="Layouts">Blogs </div>
                  </a>

                  <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('admin.blogs.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">All</div>
                          </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.blogs.create') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-plus"></i>
                            <div data-i18n="Basic">Create</div>
                          </a>
                    </li>

                  </ul>
                </li>
              </li>


            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Product Managment</span></li>

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
              {{-- categories --}}
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
              {{-- subcategories --}}
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
              {{-- end of subcategories --}}
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


              {{-- Users Managment --}}

              <li class="menu-header small text-uppercase"><span class="menu-header-text">Settings</span></li>
              {{-- carousel --}}
              <li class="menu-item">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-camera"></i>
                    <div data-i18n="Layouts">Carousel Management</div>
                  </a>

                  <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('admin.carouselsetting.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">All</div>
                          </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.carouselsetting.create') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-plus"></i>
                            <div data-i18n="Basic">Create</div>
                          </a>
                    </li>

                  </ul>
                </li>
              </li>
              {{-- Category Banners --}}
                <!-- Forms -->
                <li class="menu-item">
                    <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-camera"></i>
                        <div data-i18n="Layouts">Category Banners</div>
                      </a>

                      <ul class="menu-sub">

                        <li class="menu-item">
                            <a href="{{ route('admin.categorybanner.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-collection"></i>
                                <div data-i18n="Basic">All</div>
                              </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.categorybanner.create') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-plus"></i>
                                <div data-i18n="Basic">Create</div>
                              </a>
                        </li>

                      </ul>
                    </li>
                  </li>
              {{-- Email setting --}}
                <!-- Forms -->
            <li class="menu-item">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-envelope"></i>
                    <div data-i18n="Layouts">Emails Management</div>
                  </a>

                  <ul class="menu-sub">

                    <li class="menu-item">
                        <a href="{{ route('admin.mailsetting.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">All</div>
                          </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.mailsetting.create') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-envelope"></i>
                            <div data-i18n="Basic">Create</div>
                          </a>
                    </li>

                  </ul>
                </li>
              </li>
             {{-- <!-- Forms --> --}}
              <li class="menu-item">
                  <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-cog"></i>
                      <div data-i18n="Layouts">Settings</div>
                    </a>

                    <ul class="menu-sub">

                      <li class="menu-item">
                          <a href="{{ route('admin.setting.index') }}" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-collection"></i>
                              <div data-i18n="Basic">All</div>
                            </a>
                      </li>
                      <li class="menu-item">
                          <a href="{{ route('admin.setting.create') }}" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-plus"></i>
                              <div data-i18n="Basic">Create</div>
                            </a>
                      </li>

                    </ul>
                  </li>
                </li>
              {{-- End  --}}
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Payment Management </span></li>
              <!-- Forms -->
              <li class="menu-item">
                  <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-money"></i>
                      <div data-i18n="Layouts">Payment Management </div>
                    </a>

                    <ul class="menu-sub">

                      <li class="menu-item">
                          <a href="{{ route('admin.paymentsettings.index') }}" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-collection"></i>
                              <div data-i18n="Basic">All</div>
                            </a>
                      </li>
                      <li class="menu-item">
                          <a href="{{ route('admin.paymentsettings.create') }}" class="menu-link">
                              <i class="menu-icon tf-icons bx bx-plus"></i>
                              <div data-i18n="Basic">Create</div>
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
                <li class="nav-item navbar-dropdown dropdown me-2 mt-1">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <button type="button" class="btn btn-primary position-relative">
                       <i class="bx bx-bell"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="notificationCount">


                            </span>
                          </button>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-header">Notifications</div>
                        <div class="dropdown-divider"></div>
                        <div id="notificationData">


                        </div>


                    </ul>
                  </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img style="height: 40px!important ; object-fit:cover" src="{{ asset('assets/UserImages/'. session()->get('admin')['profile_image']) }}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img style="height: 40px!important ; object-fit:cover"  src="{{ asset('assets/UserImages/'. session()->get('admin')['profile_image'])}}" alt class="w-px-40 h-auto rounded-circle" />
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
                         @if($settings != null)
                           {{ $settings->designed_year }}
                         @else
                          document.write(new Date().getFullYear());
                         @endif
                        </script>
                        , made with ❤️ by
                        <a href="{{ route('user.index') }}" target="_blank" class="footer-link fw-bolder">@if($settings != null){{ $settings->designed_by }}@else Dazzle. @endif</a>
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

      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <script>
        let notificationUrl = "{{route('notification.get')}}";
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
        let removeNotification = "{{ route('remove.notification') }}";
      setInterval(() => {
        $(document).ready(function(){
            $.ajax({
            url     : notificationUrl ,
            type    : 'get' ,
            success:function(response){
                $("#notificationCount").html(response.count);
              table= "";
              $(response.data).each(function(index , value){
                  table +=`   </li>
                <input  type="hidden" name="notificationId" value='${value.id}'/>
                <a class="dropdown-item removeNotification"  href='${value.route}'>
                <span><b>${value.subject}</b></span> <br>
                <small class="align-middle">${value.message}</small>
                </a>
                </li>`
              });
              $('#notificationData').html(table);
            }
        })
        })
      }, 1000);
      $(document).on('click' , '.removeNotification' , function(){
        let id = $(this).closest('li').find('input[name="notificationId"]').val();
        $.ajax({
            url : removeNotification + '/' + id ,
            type: 'Get' ,
            success:function(){

            }
        })
      })
      // Redirected Error ends here
    </script>
