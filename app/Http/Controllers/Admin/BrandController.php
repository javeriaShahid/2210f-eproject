<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\FirebaseStore;
use App\Models\Product;
class BrandController extends Controller
{
    public $parentModel      = Brand::class;
    public $productModel     = Product::class;
    public $firebaseStore    = FirebaseStore::class;

    public function index()
    {
        $data['brand']     = $this->parentModel::withoutTrashed()->with('product')->paginate(25);
        return view('Admin.Brand.index')->with('data' , $data);
    }
    public function trash()
    {
        $data['brand']     = $this->parentModel::onlyTrashed()->with('product')->paginate(25);
        return view('Admin.Brand.trash')->with('data' , $data);
    }
    public function create()
    {
        $data['action']   = 'create' ;
        return  view('Admin.Brand.create')->with('data' , $data);
    }
    public function edit($id = null)
    {
        $data['action']  = 'edit';
        $data['brand']   = $this->parentModel::where('id' , $id)->first();
        return view('Admin.Brand.create')->with('data' , $data);
    }
    public function store(Request $request)
    {
        $name    = $request->name ;
        if($request->hasFile('image'))
        {
            $image         =  $request->file('image');
            $folderName    =  "Brandimages/";
            $imagePath     =   $this->firebaseStore::storeFiles($image , $folderName);
            $addBrand     = $this->parentModel::create([
                'name'    => $name ,
                'image'   => $imagePath
            ]);
            if($addBrand == true)
            {
                return redirect(Route('brand.index'))->with('success' , 'Brand has been Added');
            }
            else
            {
                return redirect(Route('brand.index'))->with('error' , 'Failed to add Brand');
            }
        }
    }

    public function update(Request $request , $id = null)
    {
        $name    = $request->name ;
        $brands  = $this->parentModel::where('id' , $id)->first();
        if($request->hasFile('image'))
        {
            $image         =   $request->file('image');
            $folderName    =   "Brandimages/";
            $imagePath     =   $this->firebaseStore::storeFiles($image , $folderName , $brands->image);
            $updateImage   = $this->parentModel::where('id' , $id)->update([
            'image'        => $imagePath
            ]);
        }
        $addBrand     = $this->parentModel::where('id' , $id)->update([
            'name'    => $name ,
        ]);
        if($addBrand == true)
        {
            return redirect(Route('brand.index'))->with('success' , 'Brand has been updated');
        }
        else
        {
            return redirect(Route('brand.index'))->with('error' , 'Failed to update Brand');
        }
    }

    public function delete($id = null)
    {
        $Product    = $this->productModel::where('brand_id' , $id)->count();
        $trashed    = $this->productModel::onlyTrashed('brand_id' , $id)->count();
        if($trashed >= 1)
        {
            return redirect()->back()->with('error' , 'This brand has products in trash in products section delete them first');
        }
        if($Product < 1)
        {
            $delete   = $this->parentModel::where('id' , $id)->delete();
            if($delete == true)
            {   $deleteProduct    = $this->productModel::where('brand_id' , $id)->forceDelete();
                return redirect(Route('brand.index'))->with('success' , 'Brand has been deleted check the trash');
            }
            else
            {
                return redirect(Route('brand.index'))->with('error' , 'Failed to delete Brand');
            }
        }
        else
        {
            return redirect()->back()->with("error" , 'This Brand Has products must delete them first to delete the Brand');
        }
    }
    public function restore($id = null)
    {

        $restore   = $this->parentModel::where('id' , $id)->restore();
        if($restore == true)
        {
            return redirect(Route('brand.index'))->with('success' , 'Brand has been Restored');
        }
        else
        {
            return redirect(Route('brand.index'))->with('error' , 'Failed to restore Brand');
        }
    }
    public function destroy($id = null)
    {

        $destroy   = $this->parentModel::where('id' , $id)->forceDelete();
        if($destroy == true)
        {
            return redirect(Route('brand.index'))->with('success' , 'Brand has been deleted');
        }
        else
        {
            return redirect(Route('brand.index'))->with('error' , 'Failed to delete Brand');
        }
    }

}
