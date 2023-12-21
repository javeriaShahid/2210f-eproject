@extends('Admin.layout')
@if($data['action'] == "create")
@section('title')
Payment Getways Create
@endsection
@else
@section('title')
Payment Getways Edit
@endsection
@endif
@section('content')
<?php
$action = $data['action'] ;
if($action == "create")
{
    $parentRoute  = Route('admin.paymentsettings.store');
    $parentButton = "Create" ;
}
if($action == "edit")
{
 $paymentsettings           =  $data['payments'] ;
 $parentRoute               =  Route('admin.paymentsettings.store' , $paymentsettings->id);
 $parentButton              =  "Update" ;
}
?>
{{-- If Condition --}}
<form action="{{ $parentRoute }}" id="paymentsettingsForm" method="Post" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
        <div class="row">
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-camera"></div> Getway Logo </label>
                <input name="image" type="file" class="form-control" placeholder="Second title" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div> Getway Title </label>
                <input name="name" type="text" class="form-control mb-2" placeholder="Enter Get Away title" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mt-3"><div class="bx bx-book"></div> Getway Type </label>
                <select name="getway_type" id="" class="form-control  ">
                    <option value="">Select Getway Type</option>
                    <option value="Mobile">Mobile Banking</option>
                    <option value="Debit">Debit Card</option>
                    <option value="Credit">Credit Card</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mt-3"><div class="bx bx-lock"></div> Api Key</label>
                <input name="api_key" type="text" class="form-control" placeholder="Api Key" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6 mb-3">
                <label for="defaultFormControlInput" class="form-label mt-3"><div class="bx bx-lock"></div> Secret Key </label>
                <input name="secret_key" type="text" class="form-control" placeholder="Secret Key" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6 mb-3">
                <label for="defaultFormControlInput" class="form-label mt-3"><div class="bx bx-globe"></div> Callback Url </label>
                <input name="callback_url" type="text" placeholder="Callback Url" class="form-control" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-12 mb-3">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-camera"></div> Additional Settings | <small> ( must be in Json Format Optional If Required )</small></label>
                <textarea name="additional_settings"  class="form-control" placeholder="Additional Settings" aria-describedby="defaultFormControlHelp" ></textarea>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn-primary btn mt-3"> {{ $parentButton }}</button>
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
<script src="{{ asset('assets/css/custom/payments.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    let action = '{{ $action }}' ;
    let payments = <?php echo isset($data['payments']) && $data['payments'] ? json_encode($data['payments']) : 0 ?>

</script>
@endsection
