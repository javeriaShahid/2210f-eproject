@extends('Admin.layout')
@if($data['action'] == "create")
@section('title')
FAQ's Category Create
@endsection
@else
@section('title')
FAQ's Category Edit
@endsection
@endif
@section('content')
<?php
$action = $data['action'] ;
if($action == "create")
{
    $parentRoute  = Route('admin.faqscategories.store');
    $parentButton = "Create" ;
}
if($action == "edit")
{
 $mail           =  $data['faqs'] ;
 $parentRoute    =  Route('admin.faqscategories.store' , $mail->id);
 $parentButton   =  "Update" ;
}
?>
{{-- If Condition --}}
<form action="{{ $parentRoute }}" id="faqscategoriesForm" method="Post">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
         <div class="row">


            <div class="col-md-12">
                <div class="form-group">
                    <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div> Title </label>
                    <input name="name" type="text" class="form-control" placeholder="Faq's Name" aria-describedby="defaultFormControlHelp"/>
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
<script src="{{ asset('assets/css/custom/faqcategory.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    let action = '{{ $action }}' ;
    let faqs = <?php echo isset($data['faqs']) && $data['faqs'] ? json_encode($data['faqs']) : 0 ?>

</script>
@endsection
