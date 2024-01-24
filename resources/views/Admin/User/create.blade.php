@extends('Admin.layout')
@if($data['action'] == "create")
@section('title')
Deals Banner Create
@endsection
@else
@section('title')
Deals Banner Edit
@endsection
@endif
@section('content')
<?php
$action = $data['action'] ;
if($action == "create")
{
    $parentRoute  = Route('admin.user.store');
    $parentButton = "Create" ;
}

?>
{{-- If Condition --}}
<form action="{{ $parentRoute }}" id="adminForm" method="Post" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
        <div class="row">
            <div class="col-md-12">
                <label for="defaultFormControlInput" class="form-label mb-2"><div class="bx bx-camera"></div>  Profile Image <small> (optional)</small> </label>
                <input name="profile_image" type="file" class="form-control" placeholder="Second title" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-2 mt-3"><div class="bx bx-user"></div>  User Name </label>
                <input name="username" type="text" class="form-control mb-2" placeholder="Enter Admin User Name" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-2 mt-3"><div class="bx bx-user"></div>  Full Name </label>
                <input name="name" type="text" class="form-control mb-2" placeholder="Enter Admin Full Name" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-12">
                <label for="defaultFormControlInput" class="form-label mb-2 mt-3"><div class="bx bx-envelope"></div> Email</label>
                <input name="email" type="text" class="form-control mb-2" placeholder="Enter Admin Email" aria-describedby="defaultFormControlHelp"/>

            </div>

            <div class="col-md-12">
                <label for="defaultFormControlInput" class="form-label mb-2"><div class="bx bx-phone"></div>  Contact Number  </label>
                <input name="contact_number" type="text" class="form-control mb-2" placeholder="Enter  Short Description"   aria-describedby="defaultFormControlHelp">
            </div>

            <div class="col-md-12">
                <button type="submit" id="submitButton" class="btn-primary btn mt-3"> {{ $parentButton }}</button>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

</form>
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('dashboardassets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src={{ asset('dashboardassets/js/main.js') }}></script>
<!-- endbuild -->
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
{{-- custom --}}
<script src="{{ asset('assets/css/custom/admin.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

@endsection
