@extends('Admin.layout')

@section('content')
@if($data['action'] == "create")
@section('title')
Product Create
@endsection
@else
@section('title')
Product Edit
@endsection
@endif
<?php
$action = $data['action'] ;
if($action == "create")
{

    $parentRoute  = Route('product.store');
    $parentButton = "Create" ;
}
if($action == "edit")
{
 $book           =  $data['product'] ;
 $parentRoute    =  Route('product.update' , $book->id);
 $parentButton   =  "Update" ;
}
?>
{{-- If Condition --}}
<form action="{{ $parentRoute }}" id="productForm" method="Post" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-camera"></div> Product Main Image</label>
        <input name="image" type="file" class="form-control" placeholder="Enter Product name" aria-describedby="defaultFormControlHelp"/>
        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-camera"></div> Product Sub Images</label>
        <input name="subimage[]" type="file" multiple class="form-control" placeholder="Enter Product name" aria-describedby="defaultFormControlHelp"/>

        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-collection"></div> Product Name</label>
        <input name="name" type="text" class="form-control" placeholder="Enter Product name" aria-describedby="defaultFormControlHelp"/>

        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-money"></div> Product Price</label>
        <input name="price" type="number" class="form-control" placeholder="Enter Product Price" aria-describedby="defaultFormControlHelp"/>

        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-money"></div> Shipping Fees <small>(optional)</small></label>
        <input name="shipping_fees" type="number" class="form-control" placeholder="Enter Shipping Fees" aria-describedby="defaultFormControlHelp"/>

        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-collection"></div> Product Quantity</label>
        <input name="quantity" type="number" class="form-control" placeholder="Enter Product Quantity" aria-describedby="defaultFormControlHelp"/>
        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-collection"></div> Delivery Duration</label>
        <input name="delivery_duration" type="number" class="form-control" placeholder="Enter Product Quantity" aria-describedby="defaultFormControlHelp"/>

        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-collection"></div> Brand Name</label>
        <select name="brand" id="brand" class="form-control">
            <option value="">Select Brand</option>
            @foreach ($data['brand'] as $brand )
             <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>

        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-collection"></div> Category Name</label>
        <select name="category" id="category" class="form-control">
            <option value="">Select Category</option>
            @foreach ($data['category'] as $category )
             <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-collection"></div> Sub Category Name</label>
        <select name="subcategory" id="subcategory" class="form-control">
            <option value="">Select Category First</option>
        </select> <!--Data will be appended from ajax-->
        {{-- color --}}
        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-collection"></div> Product Color</label>
        <div class="colorContainer row">
             <div class="col-md-12 mb-3 d-flex">
                <input name="color[]" type="color" class="form-control " placeholder="Enter Product name" aria-describedby="defaultFormControlHelp"/>
                <button class="btn btn-success addcolor btn-sm" style="margin-left:10px;margin-bottom:5px;"><i class="bx bx-plus"></i></button>
              </div>
        </div>
        {{-- Weight --}}
        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-collection"></div> Product Weight</label>

             <div class=" d-flex">
                <input name="weight" style="margin-right: 10px" type="number" class="form-control" placeholder="Enter Product Weight" aria-describedby="defaultFormControlHelp"/>
                <select name="weight_type" id="" class="form-control ml-2">
                    <option value="">Select Weight Type</option>
                    <option value="gm">Gram (GM)</option>
                    <option value="kg">Kilogram (KG)</option>

                </select>
              </div>

        {{-- Sku --}}
        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-collection"></div> Product Sku</label>
        <input name="sku" type="text" readonly  class="form-control" placeholder="Enter Product Sku" aria-describedby="defaultFormControlHelp"/>

        {{-- Description --}}
        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-collection"></div> Product Short description</label>
        <textarea required name="short_description" type="text" class="form-control" placeholder="Enter Product Short Description" aria-describedby="defaultFormControlHelp"></textarea>

        <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-collection"></div> Product description</label>
        <textarea required name="description" type="text" class="form-control" placeholder="Enter Product Description" aria-describedby="defaultFormControlHelp"></textarea>

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
<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
{{-- custom --}}
<script src="{{ asset('assets/css/custom/product.js') }}"></script>
<script src="{{asset('dashboardassets/js/jquery.richtext.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>

    let action        = '{{ $action }}' ;
    let subCatRoute   = "{{ route('product.subcategory') }}" ;
    let product       = <?php echo isset($data['product']) && $data['product'] ? json_encode($data['product']) : 0 ?>


</script>
@endsection
