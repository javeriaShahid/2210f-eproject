@extends('Admin.layout')
@if($data['action'] == "create")
@section('title')
Blogs Create
@endsection
@else
@section('title')
Blogs Edit
@endsection
@endif
@section('content')
<?php
$action = $data['action'] ;
if($action == "create")
{
    $parentRoute  = Route('admin.blogs.store');
    $parentButton = "Create" ;
}
if($action == "edit")
{
 $blog                      =  $data['blog'] ;
 $parentRoute               =  Route('admin.blogs.store' , $blog->id);
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
        <input type="hidden" value="{{session()->get('admin')['id']}}" name="user_id">

        <div class="row">
            <div class="col-md-12">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-camera"></div> Image </label>
                <input name="image" type="file" class="form-control" placeholder="Second title" aria-describedby="defaultFormControlHelp"/>
            </div>
            <div class="col-md-12">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div> Main Title </label>
                <input name="title" type="text" class="form-control mb-2" placeholder="Enter Main title" aria-describedby="defaultFormControlHelp"/>
            </div>


            <div class="col-md-12 mb-3">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-camera"></div> Blog Qoute | <small> ( Must be of 100 - 1000 characters  )</small></label>
                <textarea  name="blog_qoute" id="qoute"  class="form-control" placeholder="Description"  required></textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-camera"></div> Blog Description | <small> ( Must be of 100 - 1000 characters  )</small></label>
               <textarea  name="description"  cols="30" rows="10" required></textarea>
            </div>
            <div class="col-md-12">
                <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-collection"></div> Select Tags Category</label>
                <select name="tags[]" data-placeholder="Select Tags" multiple id="tags" type="text" placeholder="Select Blog Tag" aria-describedby="defaultFormControlHelp">

                    @foreach($data['category'] as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <button type="submit" id="submitButton" class="btn-primary btn mt-3"> {{ $parentButton }}</button>
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
<script src="{{asset("dashboardassets/js/tags-plugin.js")}}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('dashboardassets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src={{ asset('dashboardassets/js/main.js') }}></script>

<!-- endbuild -->
<!-- endbuild -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{asset('dashboardassets/js/jquery.richtext.js')}}"></script>
<!-- Main JS -->

<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
{{-- custom --}}
<script src="{{ asset('assets/css/custom/blog.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>

    let action = '{{ $action }}' ;
    let blog = <?php echo isset($data['blog']) && $data['blog'] ? json_encode($data['blog']) : 0 ?>


</script>
@endsection
