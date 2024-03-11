@extends('Admin.layout')

@section('title')
Product Discount Edit
@endsection

@section('content')

{{-- If Condition --}}
<form action="{{ Route('add.discount' , $data['productId']) }}" id="saleForm" method="Post">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
          <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-money"></div> Discount Price</label>
          <input name="price" type="number" class="form-control" placeholder="Enter Dicount Price" aria-describedby="defaultFormControlHelp"/>
          <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-time"></div> Discount Start</label>
          <input name="startDate" type="date" class="form-control" placeholder="Enter Dicount Price" aria-describedby="defaultFormControlHelp"/>
          <label for="defaultFormControlInput" class="form-label mt-3 mb-3"><div class="bx bx-time"></div> Discount End</label>
          <input name="endDate" type="date" class="form-control" placeholder="Enter Dicount Price" aria-describedby="defaultFormControlHelp"/>
         <button type="submit" class="btn-primary btn mt-3">Add to discount</button>
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
<script src="{{ asset('assets/css/custom/product_sale.js') }}"></script>
{{-- custom --}}
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

@endsection
