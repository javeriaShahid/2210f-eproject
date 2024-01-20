@extends('Admin.layout')
@if($data['action'] == "create")
@section('title')
FAQ's Create
@endsection
@else
@section('title')
FAQ's Edit
@endsection
@endif
@section('content')
<?php
$action = $data['action'] ;
if($action == "create")
{
    $parentRoute  = Route('admin.faqs.store');
    $parentButton = "Create" ;
}
if($action == "edit")
{
 $mail           =  $data['faqs'] ;
 $parentRoute    =  Route('admin.faqs.store' , $mail->id);
 $parentButton   =  "Update" ;
}
?>
{{-- If Condition --}}
<form action="{{ $parentRoute }}" id="faqFrom" method="Post">
@csrf
<div class="row">
<div class="col-md-12">
  <div class="card mb-4">
    <div class="card-body">
      <div>
         <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div> Category </label>
                    <select name="category" id="" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($data['faq_categories'] as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="faqQuestions col-md-12">
                <div class="faq-container row">
                  <div class="button d-flex justify-content-end mt-3"><button id="addMore" class="btn btn-sm btn-success"><i class="bx bx-plus"></i></button></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="defaultFormControlInput" class="form-label mb-3 text-start">Question <div class="bx bx-question-mark"></div> </label>
                        <input name="title[]" type="text" class="form-control title" placeholder="Enter Question" aria-describedby="defaultFormControlHelp"/>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Answer (<small class="text-danger">must be less then 250</small>)</label>
                        <textarea name="answer[]" type="text" class="form-control answer" aria-describedby="defaultFormControlHelp"></textarea>
                    </div>
                </div>
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
<script src="{{ asset('assets/css/custom/faqs.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    let action = '{{ $action }}' ;
    let faqs = <?php echo isset($data['faqs']) && $data['faqs'] ? json_encode($data['faqs']) : 0 ?>

</script>
@endsection
