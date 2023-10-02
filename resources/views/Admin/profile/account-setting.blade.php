@extends('Admin.layout')
@section('title')
Account Setting
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-notifications.html"
              ><i class="bx bx-bell me-1"></i> Notifications</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-connections.html"
              ><i class="bx bx-link-alt me-1"></i> Connections</a
            >
          </li>
        </ul>
        <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <!-- Account -->
          <div class="card-body">
            <form id="formAccountSettings" method="POST" enctype="multipart/form-data" action="{{ route('profile.update' , $data['user']->id) }}">
                @csrf
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img
                src="{{ asset('assets/UserImages/'. $data['user']->profile_image)}}"
                alt="user-avatar"
                class="d-block rounded"
                height="100"
                width="100"
                id="uploadedAvatar"
              />
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                  <span class="d-none d-sm-block">Upload new photo</span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                  <input
                    type="file"
                    name="image"
                    id="upload"
                    class="account-file-input"
                    hidden
                    accept="image/png, image/jpeg"
                  />
                </label>
         

                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <label for="">Full Name</label>
                    <input type="text" name="name" placeholder="Your Name .." value="{{ $data['user']->name }}" class="form-control">
                </div>
                {{-- Name end --}}
                <div class="col-md-6">
                    <label for="">User Name</label>
                    <input type="text" name="username" placeholder="Your User Name .." value="{{ $data['user']->username }}" class="form-control">
                </div>
                {{-- Email --}}
                <div class="col-md-6 mt-3 mb-3">
                    <label for="">Email Address</label>
                    <input type="text" name="email" placeholder="Your Email Address .." value="{{ $data['user']->email }}" class="form-control">
                </div>
                {{-- Contact number --}}
                <div class="col-md-6 mt-3 mb-3">
                    <label for="">Phone Number</label>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" name="phonecode" placeholder="Your Email Address .." value="{{ $data['user']->phone_code }}" class="form-control">
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="contact_number" placeholder="Your Email Address .." value="{{ $data['user']->contact_number }}" class="form-control">
                        </div>
                    </div>
                </div>

              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>
        <div class="card">
          <h5 class="card-header">Delete Account</h5>
          <div class="card-body">
            <div class="mb-3 col-12 mb-0">
              <div class="alert alert-warning">
                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
              </div>
            </div>
          
              <div class="form-check mb-3">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="accountActivation"
                  id="accountActivation"
                />
                <label class="form-check-label" for="accountActivation"
                  >I confirm my account deactivation</label
                >
              </div>
              <a href="{{ route('admin.user.delete' , session()->get('admin')['id']) }}" class="btn btn-danger deactivate-account">Deactivate Account</a>
           
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Scripts --}}
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('dashboardassets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src={{ asset('dashboardassets/js/main.js') }}></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
  @endsection