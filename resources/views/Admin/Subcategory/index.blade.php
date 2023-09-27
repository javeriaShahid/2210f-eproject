@extends('Admin.layout')
@section('title')
All Sub Category
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
                <div class="col-md-6">  <h5 class="card-header">Sub Categories Management</h5></div>
                <div class="col-md-6">
                    <div class="row justify-content-end mt-3">
                        <div class="col-md-3"><a class="btn btn-success" href="{{ route('subcategory.create') }}"><i class="bx bx-plus"></i></a></div>
                        <div class="col-md-3"><a class="btn btn-danger" href="{{ route('subcategory.trash') }}"><i class="bx bx-trash"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Name of Category</th>
                    <th>Name of Subcategory</th>
                    <th>Number of Products</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0" >
                    @foreach ($data['subcategory'] as $category )
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $category->category->name }}</td>
                             <td>{{ $category->name}}</td>
                            
                             @if($category->product)
                             <td>{{ $category->product->count() }}</td>
                             @endif
                    
                            {{-- Modal button ends --}}
                            <td><a href="{{ route('subcategory.edit' , $category->id) }}" class="btn btn-success"><i class="bx bx-pencil"></i></a></td>
                            <td><a href="{{ route('subcategory.delete' , $category->id) }}" class="btn btn-danger"><i class="bx bx-trash"></i></a></td>
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
@endsection
