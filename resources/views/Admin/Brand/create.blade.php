@extends('Admin.layout')
@if($data['action'] == "create")
@section('title')
Brand Create
@endsection
@else
@section('title')
Brand Edit
@endsection
@endif
@section('content')
<?php
$action = $data['action'] ;
if($action == "create")
{
    $parentRoute  = Route('brand.store');
    $parentButton = "Create" ;
}
if($action == "edit")
{
 $book           =  $data['brand'] ;
 $parentRoute    =  Route('brand.update' , $book->id);
 $parentButton   =  "Update" ;
}
?>
{{-- If Condition --}}
<form action="{{ $parentRoute }}" id="brandForm" method="Post" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
          <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-camera"></div> Brand Image</label>
          <input name="image" type="file" class="form-control"  aria-describedby="defaultFormControlHelp"/>
          <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-book"></div>Brand Name</label>
          <input name="name" type="text" class="form-control" placeholder="Enter Brand name" aria-describedby="defaultFormControlHelp"/>
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
<script src="{{ asset('assets/css/custom/brand.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    let action = '{{ $action }}' ;
    let brand = <?php echo isset($data['brand']) && $data['brand'] ? json_encode($data['brand']) : 0 ?>

</script>
@endsection
