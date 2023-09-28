@extends('Admin.layout')
@section('title')
All Products
@endsection

@section('content')
<style>
    .shad_box{
        width:100%!important;
        white-space: normal!important;
    }
</style>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="row">
                <div class="col-md-6">  <h5 class="card-header">Products Management</h5></div>
                <div class="col-md-6">
                    <div class="row justify-content-end mt-3">
                        <div class="col-md-3"><a class="btn btn-success" href="{{ route('product.create') }}"><i class="bx bx-plus"></i></a></div>
                        <div class="col-md-3"><a class="btn btn-danger" href="{{ route('product.trash') }}"><i class="bx bx-trash"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Image</th>
                    <th>View Sub Images</th>
                    <th>Name of Product</th>
                    <th>Name of Category</th>
                    <th>Name of Subcategory</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Stock Status</th>
                    <th>Publish Status</th>
                    <th>Color</th>
                    <th>Sku</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0" >
                    @foreach ($data['product'] as $product )
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td><img src="{{ asset('assets/Productimages/'.$product->image) }}" style="width:40px; height:40px; object-fit:cover;" alt=""></td>
                            <td><a href="{{ route('subimage.view' , $product->id) }}" class="btn btn-warning"><div class="bx bx-undo"></div></a></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->subcategory->name }}</td>
                            <td>Rs,{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            @if($product->stock >= 1)
                            <td><button readonly class="btn btn-success">In Stock</button></td>
                            @else
                            <td><button readonly class="btn btn-danger">Out of Stock</button></td>
                            @endif
                            @if($product->is_published == 1)
                            <td><button readonly class="btn btn-success"><div class="bx bx-check"></div></button></td>
                            @else
                            <td><a href="{{ route('product.published.done' , $product->id) }}" class="btn btn-danger"><div class="bx bx-upload"></div></button></td>
                            @endif
                            <td><button class="btn" style="background-color:{{$product->color_code}}!important"></button></td>
                             <td>{{ $product->sku }}</td>
                            {{-- Modal button ends --}}
                            <td><a href="{{ route('product.edit' , $product->id) }}" class="btn btn-success"><i class="bx bx-pencil"></i></a></td>
                            <td><a href="{{ route('product.delete' , $product->id) }}" class="btn btn-danger"><i class="bx bx-trash"></i></a></td>
                        </tr>

                    <!-- Modal -->
                        <!-- Modal trigger button -->


                    {{-- Modal ends --}}
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
          <!--/ Hoverable Table rows -->
</div>
</div>
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

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
@endsection
