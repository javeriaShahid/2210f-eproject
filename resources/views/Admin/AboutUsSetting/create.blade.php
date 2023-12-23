@extends('Admin.layout')
@if($data['action'] == "create")
@section('title')
About Us Create
@endsection
@else
@section('title')
About Us Edit
@endsection
@endif
@section('content')
<?php
$action = $data['action'] ;
if($action == "create")
{
    $parentRoute  = Route('admin.aboutussettings.store');
    $parentButton = "Create" ;
}
if($action == "edit")
{
 $about           =  $data['about'] ;
 $parentRoute               =  Route('admin.aboutussettings.store' , $about->id);
 $parentButton              =  "Update" ;
}
?>
{{-- If Condition --}}
<form action="{{ $parentRoute }}" id="aboutusForm" method="Post" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
        <div class="row">
            <div class="col-md-12">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-camera"></div> Image </label>
                <input name="image" type="file" class="form-control" placeholder="Second title" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div> Short Title </label>
                <input name="short_title" type="text" class="form-control mb-2" placeholder="Enter Short title" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div> Main Title </label>
                <input name="title" type="text" class="form-control mb-2" placeholder="Enter Main title" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mt-3"><div class="bx bx-collection"></div> Select Product Category</label>
                <select name="category" type="text" class="form-control" placeholder="Api Key" aria-describedby="defaultFormControlHelp">
                    <option value="">Select Category</option>
                    @foreach($data['category'] as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mt-3"><div class="bx bx-collection"></div> Side Of Image</label>
                <select name="side" type="text" class="form-control" placeholder="Api Key" aria-describedby="defaultFormControlHelp">
                    <option value="">Select Side Of Image</option>
                    <option value="Right">Right</option>
                    <option value="Left">Left</option>
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-camera"></div> About Us Description | <small> ( Must be of 100 - 1000 characters  )</small></label>
                <textarea name="description"  class="form-control" placeholder="Description" aria-describedby="defaultFormControlHelp" ></textarea>
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
<script src="{{ asset('assets/css/custom/about.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    let action = '{{ $action }}' ;
    let aboutus = <?php echo isset($data['about']) && $data['about'] ? json_encode($data['about']) : 0 ?>

</script>
@endsection
