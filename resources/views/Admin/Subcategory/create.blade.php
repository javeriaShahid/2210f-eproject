@extends('Admin.layout')
@if($data['action'] == "create")
@section('title')
Sub Category Create
@endsection
@else
@section('title')
Sub Category Edit
@endsection
@endif
@section('content')
<?php
$action = $data['action'] ;
if($action == "create")
{
    $parentRoute  = Route('subcategory.store');
    $parentButton = "Create" ;
}
if($action == "edit")
{
 $book           =  $data['subcategory'] ;
 $parentRoute    =  Route('subcategory.update' , $book->id);
 $parentButton   =  "Update" ;
}
?>
{{-- If Condition --}}
<form action="{{ $parentRoute }}" id="categoryForm" method="Post">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
        <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Sub Category Name</label>
        <select name="category" id="" class="form-control">
            <option value="">Select Category</option>
            @foreach ($data['category'] as $category )
             <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
          <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-book"></div>Sub Category Name</label>
          <div id="moreSub">
          <div  class="d-flex ">
            <input name="name[]" type="text" class=" name form-control" placeholder="Enter Category name" aria-describedby="defaultFormControlHelp"/>
            <button id="plus-button" style="margin-left:10px;" class="btn btn-success"><div class="bx bx-plus"></div></button>
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

<script src="{{ asset('assets/css/custom/subcategory.js') }}"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    let action = '{{ $action }}' ;
    let subcategory = <?php echo isset($data['subcategory']) && $data['subcategory'] ? json_encode($data['subcategory']) : 0 ?>;

</script>
@endsection
