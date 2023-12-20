@extends('Admin.layout')
@if($data['action'] == "create")
@section('title')
Website Settings Create
@endsection
@else
@section('title')
Website Settings Edit
@endsection
@endif
@section('content')
<?php
$action = $data['action'] ;
if($action == "create")
{
    $parentRoute  = Route('admin.setting.store');
    $parentButton = "Create" ;
}
if($action == "edit")
{
 $setting           =  $data['setting'] ;
 $parentRoute    =  Route('admin.setting.store' , $setting->id);
 $parentButton   =  "Update" ;
}
?>
{{-- If Condition --}}
<form action="{{ $parentRoute }}" id="settingForm" method="Post" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
         <div class="row">
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-camera"></div> Main Logo Image</label>
                    <input name="logo" type="file" class="form-control"  aria-describedby="defaultFormControlHelp"/>
                </div>
            </div>
            <div class="col-md-6 mb-2" >
                <div class="form-group">
                    <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-camera"></div> X-Icon Logo</label>
                    <input name="x_icon" type="file" class="form-control"  aria-describedby="defaultFormControlHelp"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-tag"></div> Website Title</label>
                    <input name="title" type="text" class="form-control" placeholder="Enter Website Title" aria-describedby="defaultFormControlHelp"/>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-phone"></div> Contact Number</label>
                    <input name="contact" type="text" class="form-control" placeholder="Enter Website Contact Number" aria-describedby="defaultFormControlHelp"/>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-envelope"></div> Website Email</label>
                    <input name="email" type="text" class="form-control" placeholder="Enter Website Email" aria-describedby="defaultFormControlHelp"/>
                </div>
            </div>

            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-map"></div> Contact Address</label>
                    <input name="address" type="text" class="form-control" placeholder="Enter Contact Address" aria-describedby="defaultFormControlHelp"/>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-globe"></div> Map Link</label>
                    <input name="map_link" type="text" class="form-control" placeholder="Enter Website Map Link" aria-describedby="defaultFormControlHelp"/>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-user"></div> Designed By</label>
                    <input name="designed_by" type="text" class="form-control" placeholder="Enter Website Designer" aria-describedby="defaultFormControlHelp"/>
                </div>
            </div>  <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-calendar"></div> Designed Year</label>
                    <input name="designed_year" type="text" class="form-control" placeholder="Enter Website Designing Year" aria-describedby="defaultFormControlHelp"/>
                </div>
            </div>
         </div>
         <button type="submit" class="btn-primary btn mt-3"> {{ $parentButton }}</button>
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
<script src="{{ asset('assets/css/custom/setting.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    let action = '{{ $action }}' ;
    let setting = <?php echo isset($data['setting']) && $data['setting'] ? json_encode($data['setting']) : 0 ?>

</script>
@endsection
