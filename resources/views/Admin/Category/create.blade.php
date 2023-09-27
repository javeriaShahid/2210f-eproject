@extends('Admin.layout')
@section('title')
Category Create
@endsection
@section('content')
<?php
$action = $data['action'] ;
if($action == "create")
{
    $parentRoute  = Route('category.store');
    $parentButton = "Create" ;
}
if($action == "edit")
{
 $book           =  $data['category'] ;
 $parentRoute    =  Route('category.update' , $book->id);
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
          <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Category Name</label>
          <input name="name" type="text" class="form-control" placeholder="Enter Category name" aria-describedby="defaultFormControlHelp"/>
         <button type="submit" class="btn-primary btn mt-3"> {{ $parentButton }}</button>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

</form>
<script>
    let action = '{{ $action }}' ;
    let category = <?php echo isset($data['category']) && $data['category'] ? json_encode($data['category']) : 0 ?>
    
</script>
@endsection