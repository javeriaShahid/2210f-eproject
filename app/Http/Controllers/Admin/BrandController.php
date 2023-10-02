<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    public $parentModel  = Brand::class;

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
            $fileName   = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('assets/BrandImages/' , $fileName);
            $addBrand     = $this->parentModel::create([
                'name'    => $name ,
                'image'   => $fileName
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
        if($request->hasFile('image'))
        {
            $fileName   = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('assets/BrandImages/' , $fileName);
            $updateImage   = $this->parentModel::where('id' , $id)->update([
            'image'   => $fileName
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
        $delete   = $this->parentModel::where('id' , $id)->delete();
        if($delete == true)
        {
            return redirect(Route('brand.index'))->with('success' , 'Brand has been deleted check the trash');
        }
        else
        {
            return redirect(Route('brand.index'))->with('error' , 'Failed to delete Brand');
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
