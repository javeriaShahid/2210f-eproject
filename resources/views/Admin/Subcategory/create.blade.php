@extends('Admin.layout')
@section('title')
Sub Category Create
@endsection
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
          <label for="defaultFormControlInput" class="form-label mb-3"><div class="bx bx-book"></div>Sub Category Name</label>
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
    let subcategory = <?php echo isset($data['subcategory']) && $data['subcategory'] ? json_encode($data['subcategory']) : 0 ?>
    
</script>
@endsection