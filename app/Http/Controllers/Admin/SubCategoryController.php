<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public $parentModel   = Subcategory::class;
    public $categoryModel = Category::class;
    public $productModel  = Product::class;

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

        foreach($name as $key => $value)
        {
            $create    = $this->parentModel::create([
                'category_id' => $category ,
                'name' => $name[$key] ,
            ]);
        }
         if($create == true){
            return redirect(Route('subcategory.index'))->with('success' , 'Subcategory Has Been Added');
         }
         else
         {
            return redirect()->back()->with('error'  , 'Failed to add Subcategory');
         }

    }
    public function update(Request $request  , $id = null){
         $name      = $request->name ;
         $category  = $request->category;

         foreach($name as $key => $value)
         {
             $create    = $this->parentModel::updateOrcreate(['id' => $id],[
                 'category_id' => $category ,
                 'name' => $name[$key] ,
             ]);
         }

         if($create == true){
            return redirect(Route('subcategory.index'))->with('success' , 'Subcategory Has Been Added');
         }
         else
         {
            return redirect()->back()->with('error'  , 'Failed to add Subcategory');
         }$name   = $request->name ;

        $create = $this->parentModel::where('id' , $id)->update([
            'name' => $name ,
        ]);
         if($create == true){
            return redirect(Route('subcategory.index'))->with('success' , 'Subcategory Has Been Updated');
         }
         else
         {
            return redirect()->back()->with('error'  , 'Failed to update Subcategory');
         }
    }
    public function trash(){
        $data['subcategory']  = $this->parentModel::onlyTrashed()->with('product' ,'category')->paginate(25);
        return view('Admin.Subcategory.trash')->with('data' , $data);
    }
    public function delete($id = null){
        $Product    = $this->productModel::where('subcategory_id' , $id)->count();
        $trashed    = $this->productModel::onlyTrashed('subcategory_id' , $id)->count();
        if($trashed >= 1)
        {
            return redirect()->back()->with('error' , 'This Subcategory has products in trash in products section delete them first');
        }
        if($Product < 1){
        $delete  = $this->parentModel::where('id' , $id)->delete();

        if($delete == true)
        {
            return redirect()->back()->with('success' , 'Subcategory has been Sent To Trash');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to Send  Subcategory To Trash');

        }
       }
       else
       {
        return redirect()->back()->with("error" , 'This Subcategory Has products must delete them first to delete the Subcategory');
       }

    }
    public function destroy($id = null){
        $delete  = $this->parentModel::where('id' , $id)->forceDelete();

        if($delete == true)
        {
            return redirect()->back()->with('success' , 'Subcategory has been Deleted To Trash');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to Delete Subcategory To Trash');

        }
    }
    public function restore($id = null){
        $restore  = $this->parentModel::where('id' , $id)->restore();

        if($restore == true)
        {
            return redirect()->back()->with('success' , 'Subcategory has been Restored To Trash');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to Restore Subcategory To Trash');

        }
    }
}
