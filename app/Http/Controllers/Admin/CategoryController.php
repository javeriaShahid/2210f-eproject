<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;

class CategoryController extends Controller
{
    public $parentModel   = Category::class;
    public $productModel  = Product::class;
    public $subcategories = Subcategory::class;
    public function index(){

        $data['category'] = $this->parentModel::with('product','subcategory')->withoutTrashed()->paginate(25);

        return view('Admin.Category.index')->with('data' , $data);

    }
    public function create(){

        $data['action'] = "create";
        return view('Admin.Category.create')->with('data' , $data);

    }
    public function edit($id = null){

        $data['category'] = $this->parentModel::where('id' , $id)->first();
        $data['action']   = "edit";
        return view('Admin.Category.create')->with('data' , $data);

    }
    public function store(Request $request){
        $name   = $request->name ;

        $create = $this->parentModel::create([
            'name' => $name ,
        ]);
         if($create == true){
            return redirect(Route('category.index'))->with('success' , 'Category Has Been Added');
         }
         else
         {
            return redirect()->back()->with('error'  , 'Failed to add Category');
         }
    }
    public function update(Request $request  , $id = null){
        $name   = $request->name ;

        $create = $this->parentModel::where('id' , $id)->update([
            'name' => $name ,
        ]);
         if($create == true){
            return redirect(Route('category.index'))->with('success' , 'Category Has Been Updated');
         }
         else
         {
            return redirect()->back()->with('error'  , 'Failed to update Category');
         }
    }
    public function trash(){
        $data['category'] = $this->parentModel::with('product','subcategory')->onlyTrashed()->paginate(25);
        return view('Admin.Category.trash')->with('data' , $data);
    }
    public function delete($id = null){
        $Product              = $this->productModel::where('category_id' , $id)->count();
        $trashedPro           = $this->productModel::onlyTrashed('category_id' , $id)->count();
        $SubCategory          = $this->subcategories::where('category_id' , $id)->count();
        $SubCategoryTrash     = $this->subcategories::onlyTrashed('category_id' , $id)->count();
        if($Product >= 1){
            return redirect()->back()->with('error' , 'Category has Products Delete them first');
        }
       else if($trashedPro >= 1){
            return redirect()->back()->with('error' , 'Category has Products in Products Trash section Delete them first');
        }
       else if($SubCategory >= 1){
            return redirect()->back()->with('error' , 'Category has Subcategories Delete them first');
        }
        else if($SubCategoryTrash >= 1){
            return redirect()->back()->with('error' , 'Category has Subcategories in Subcategories Trash section Delete them first');
        }
        else
        {
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
