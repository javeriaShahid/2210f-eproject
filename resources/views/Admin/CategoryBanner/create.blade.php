@extends('Admin.layout')
@if($data['action'] == "create")
@section('title')
Category Banner Create
@endsection
@else
@section('title')
Category Banner Edit
@endsection
@endif
@section('content')
<?php
$action = $data['action'] ;
if($action == "create")
{
    $parentRoute  = Route('admin.categorybanner.store');
    $parentButton = "Create" ;
}
if($action == "edit")
{
 $book           =  $data['categorybanner'] ;
 $parentRoute    =  Route('admin.categorybanner.store' , $book->id);
 $parentButton   =  "Update" ;
}
?>
{{-- If Condition --}}
<form action="{{ $parentRoute }}" id="categoryBannerForm" method="Post" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
        <div class="row">
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>First Title </label>
                <input name="title_1" type="text" class="form-control" placeholder="First title" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Second Title </label>
                <input name="title_2" type="text" class="form-control" placeholder="Second title" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Color Of First Title </label>
                <input name="color_1" type="color" class="form-control" placeholder="First  title Color" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Color Of Second Title </label>
                <input name="color_2" type="color" class="form-control" placeholder="Second title color" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6 mb-3">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-camera"></div> Banner Image </label>
                <input name="image" type="file" class="form-control" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div> Category </label>
                <select name="category_id" id="" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($data['category'] as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
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
<script src="{{ asset('assets/css/custom/categorybanner.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    let action = '{{ $action }}' ;
    let categorybanner = <?php echo isset($data['categorybanner']) && $data['categorybanner'] ? json_encode($data['categorybanner']) : 0 ?>

</script>
@endsection
