@extends('Admin.layout')
@if($data['action'] == "create")
@section('title')
Home Links Create
@endsection
@else
@section('title')
Home Links Edit
@endsection
@endif
@section('content')
<?php
$action = $data['action'] ;
if($action == "create")
{
    $parentRoute  = Route('admin.homelinks.store');
    $parentButton = "Create" ;
}
if($action == "edit")
{
 $book           =  $data['homelinks'] ;
 $parentRoute    =  Route('admin.homelinks.store' , $book->id);
 $parentButton   =  "Update" ;
}
?>
{{-- If Condition --}}
<form action="{{ $parentRoute }}" id="homelinksForm" method="Post" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
          <div class="row" id="homeContainer">
            <div class="divs row col-md-12">
                {{-- <div class="float-end col-md-12" style="display: flex ; justify-content:end"><button id="addButton" class="btn btn-info"><div class="bx bx-plus"></div></button></div> --}}
               <div class="col-md-12 mb-3">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Nav Title </label>
                <input name="title" type="text" class="form-control" placeholder="Enter Nav link Title" aria-describedby="defaultFormControlHelp"/>
              </div>
             <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Route </label>
                <input name="route" type="text" class="form-control" placeholder="Enter Route name" aria-describedby="defaultFormControlHelp"/>
             </div>
             <div class="col-md-6">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Div Id </label>
                <input name="div_id" type="text" class="form-control" placeholder="Enter Div Id " aria-describedby="defaultFormControlHelp"/>
             </div>
            </div>
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
<script src="{{ asset('assets/css/custom/homelinks.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    let action = '{{ $action }}' ;
    let homelinks = <?php echo isset($data['homelinks']) && $data['homelinks'] ? json_encode($data['homelinks']) : 0 ?>

</script>
@endsection
