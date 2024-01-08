<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productimages;
use App\Models\FirebaseStore;

class ProductImageController extends Controller
{
    public $parentModel   =  Productimages::class ;
    public $firebaseStore    = FirebaseStore::class;
    public function index($id = null)
    {
        $data['id']          = $id;
        $data['product']     = $this->parentModel::where('product_id' , $id)->withoutTrashed()->paginate(25);
        return view('Admin.Subimages.index')->with('data' , $data);
    }
    public function create($id = null)
    {
        $data['id']          = $id;
        $data['action']      = 'create' ;
        return view('Admin.Subimages.create')->with('data' , $data);
    }
    public function edit($id = null)
    {
        $data['action']      = 'edit' ;
        $data['id']      = $id ;
        $data['product']     = $this->parentModel::where('id' , $id)->withoutTrashed()->first();
        return view('Admin.Subimages.create')->with('data' , $data);
    }
    public function store($id = null , Request $request)
    {
        $image         =  $request->file('subimage');
        $subFile  = time().".".$image->getClientOriginalExtension();
        $image->move('ProductSubImages/' , $subFile);

        $createImage       =  $this->parentModel::create([
            'product_id'   => $id ,
            'image'        =>  $subFile
        ]);
        if($createImage == true)
        {
            return redirect(Route('subimage.index' , $id))->with('success' , 'Sub Image has been created');
        }
        if($createImage == true)
        {
            return redirect(Route('subimage.index' , $id))->with('success' , 'Sub Image has been created');
        }
    }
    public function update($id = null , Request $request)
    {
        $subImageData      = $this->parentModel::where('id' , $id)->first();
        $image         =  $request->file('subimage');
        $subFile  = time().".".$image->getClientOriginalExtension();
        $image->move('ProductSubImages/' , $subFile);

        $updateImage       = $this->parentModel::where('id' ,$id)->update([
            'image'        =>  $subFile
        ]);
        $subimageData      = $this->parentModel::where('id' , $id)->first();
        if($updateImage == true)
        {
            return redirect(Route('subimage.index' , $subimageData->product_id))->with('success' , 'Sub Image has been updated');
        }
        if($updateImage == true)
        {
            return redirect(Route('subimage.index' , $id))->with('success' , 'Sub Image has been updated');
        }
    }
    public function trash($id = null)
    {
        $data['id']          = $id;
        $data['product']     = $this->parentModel::where('product_id' , $id)->onlyTrashed()->paginate(25);
        return view('Admin.Subimages.trash')->with('data' , $data);
    }
    public function delete($id = null){
        $delete              = $this->parentModel::where('id' , $id)->delete();
        if($delete  == true)
        {
            return redirect()->back()->with('success' , 'image has been sent to  trash');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to send images to trash');
        }
    }
    public function restore($id = null){
        $restore              = $this->parentModel::where('id' , $id)->restore();
        if($restore  == true)
        {
            return redirect()->back()->with('success' , 'image has been restored');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to restore image');
        }
    }
    public function destroy($id = null){
        $delete              = $this->parentModel::where('id' , $id)->forceDelete();
        if($delete  == true)
        {
            return redirect()->back()->with('success' , 'image has been deleted');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to delete images');
        }
    }
}
