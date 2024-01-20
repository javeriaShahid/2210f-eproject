<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{DealsBanner ,Category};
class DealsBannersController extends Controller
{


    public  $parentModel   =  DealsBanner::class;
    public  $childeModel   =  Category::class;
    public  $parentView    = 'Admin.DealsBanner';
    public  $parentRoute   = 'admin.dealsbanners';
    public function index(){
        $data['dealsbanners'] = $this->parentModel::paginate(20);
        return view($this->parentView .'.index')->with('data' , $data );
    }

    public function create(){
        $data['action']   = "create" ;
        $data['category'] = $this->childeModel::all();
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function edit($id = null){
        $data['action']   = "edit" ;
        $data['dealsbanners'] = $this->parentModel::where('id' , $id) ->first();
        $data['category'] = $this->childeModel::all();
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function store(Request $request , $id = null ){
        $data = $request->except('_token');
        $checkAllStatus = $this->parentModel::where('status' , 1 )->count();

        if ($request->hasFile('image')) {
            $fileName = time().'.'.$data['image']->getClientOriginalExtension();
            $data['image']->move('DealsBannersImages/', $fileName);
            $data['image'] = $fileName;
        }


        if ($id != null) {
            $existingData = $this->parentModel::find($id);
            if (isset($data['image'])) {
            $filePath = public_path('DealsBannersImages/' . $existingData->image) ;
            if (file_exists($filePath)) {
               unlink($filePath); // Delete the file
             }
            $existingData->image = $data['image'];
            }
            $existingData->update($data);
            if($existingData){
                return redirect()->route($this->parentRoute.'.index')->with('success' , 'Deal Banner has been updated');
            }
            else{
                return redirect()->back()->with('error' , 'Failed to Update Deal Banner Information');
            }

        } else {
            $storeData = $this->parentModel::create($data);

            if($checkAllStatus < 1){
                $unactiveOthers = $this->parentModel::where('id' , $storeData['id'])->update([
                    'status' => 1
                ]);
            }

            if($storeData){
                return redirect()->route($this->parentRoute.'.index')->with('success' , 'Deal Bannerinformation has been stored');
            }
            else{
                return redirect()->back()->with('error' , 'Failed to Store Deal Banner Information');
            }
        }
    }
    public function change_status(Request $request){
        $data         = $request->all();
        $updateStatus = $this->parentModel::where('id' , $data['id'])->update([
            'status' => $data['status']
        ]);
        if ($updateStatus) {
            return response()->json(['status' => true]);
        }
            else {
            return response()->json(['status' => false]);
         }

    }
    public function destroy($id = null ){
        $delete = $this->parentModel::where(['id' => $id ])->delete();
        if($delete){
            return redirect()->back()->with('success' , ' Deal Banner Information has been Deleted');
        }
        else{
            return redirect()->back()->with('error' , 'Failed To Delete  Deal Banner  Information');
        }
    }
}
