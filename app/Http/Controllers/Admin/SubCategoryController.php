<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public $parentModel   = Subcategory::class;
    public $categoryModel = Category::class;
    public function index(){

        $data['subcategory'] = $this->parentModel::withoutTrashed()->with('product' , 'category')->paginate(25);
        return view('Admin.Subcategory.index')->with('data' , $data);

    }
    public function create(){
        $data['category'] = $this->categoryModel::withoutTrashed()->get();
        $data['action']   = "create";
        return view('Admin.Subcategory.create')->with('data' , $data);
    }
    public function edit($id = null){
        $data['category'] = $this->categoryModel::withoutTrashed()->get();
        $data['subcategory'] = $this->parentModel::where('id' , $id)->with('product' , 'category')->first();
        $data['action']   = "edit";
        return view('Admin.Subcategory.create')->with('data' , $data);

    }
    public function store(Request $request){
        $name      = $request->name ;
        $category  = $request->category;

        $create    = $this->parentModel::create([
            'category_id' => $category ,
            'name' => $name ,
        ]);

         if($create == true){
            return redirect(Route('subcategory.index'))->with('success' , 'Category Has Been Added');
         }
         else
         {
            return redirect()->back()->with('error'  , 'Failed to add Category');
         }

    }
    public function update(Request $request  , $id = null){
         $name      = $request->name ;
         $category  = $request->category;

        $create    = $this->parentModel::where('id' , $id)->update([
            'category_id' => $category ,
            'name' => $name ,
        ]);

         if($create == true){
            return redirect(Route('subcategory.index'))->with('success' , 'Category Has Been Added');
         }
         else
         {
            return redirect()->back()->with('error'  , 'Failed to add Category');
         }$name   = $request->name ;

        $create = $this->parentModel::where('id' , $id)->update([
            'name' => $name ,
        ]);
         if($create == true){
            return redirect(Route('subcategory.index'))->with('success' , 'Category Has Been Updated');
         }
         else
         {
            return redirect()->back()->with('error'  , 'Failed to update Category');
         }
    }
    public function trash(){
        $data['subcategory']  = $this->parentModel::onlyTrashed()->with('product' ,'category')->paginate(25);
        return view('Admin.Subcategory.trash')->with('data' , $data);
    }
    public function delete($id = null){
        $delete  = $this->parentModel::where('id' , $id)->delete();

        if($delete == true)
        {
            return redirect()->back()->with('success' , 'Category has been Sent To Trash');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to Send  Category To Trash');

        }
    }
    public function destroy($id = null){
        $delete  = $this->parentModel::where('id' , $id)->forceDelete();

        if($delete == true)
        {
            return redirect()->back()->with('success' , 'Category has been Deleted To Trash');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to Delete Category To Trash');

        }
    }
    public function restore($id = null){
        $restore  = $this->parentModel::where('id' , $id)->restore();

        if($restore == true)
        {
            return redirect()->back()->with('success' , 'Category has been Restored To Trash');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to Restore Category To Trash');

        }
    }
}
