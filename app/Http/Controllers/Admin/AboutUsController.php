<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Category;
class AboutUsController extends Controller
{
    public  $parentModel   =  AboutUs::class;
    public  $parentView    = 'Admin.AboutUsSetting';
    public  $parentRoute   = 'admin.aboutussettings';
    public  $categoryModel = Category::class;
    public function index(){
        $data['about'] = $this->parentModel::paginate(10);
        return view($this->parentView .'.index')->with('data' , $data );
    }

    public function create(){
        $data['action']   = "create" ;
        $data['category'] = $this->categoryModel::withoutTrashed()->get();
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function edit($id = null){
        $data['action']   = "edit" ;
        $data['about'] = $this->parentModel::where('id' , $id) ->first();
        $data['category'] = $this->categoryModel::withoutTrashed()->get();
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function store(Request $request , $id = null ){
        $data = $request->all();
        $checkAllStatus = $this->parentModel::where('status' , 1 )->count();

        if ($request->hasFile('image')) {
            $fileName = time().'.'.$data['image']->getClientOriginalExtension();
            $data['image']->move('aboutusImages/', $fileName);
            $data['image'] = $fileName;
        }
        if ($id != null) {
            $existingData = $this->parentModel::find($id);
            if (isset($data['image'])) {
            $existingData->image = $data['image'];
            }
            $existingData->update($data);
            if($existingData){
                return redirect()->route($this->parentRoute.'.index')->with('success' , 'About Us has been updated');
            }
            else{
                return redirect()->back()->with('error' , 'Failed to Update About us Information');
            }

        } else {
            $storeData = $this->parentModel::create($data);

            if($checkAllStatus < 1){
                $unactiveOthers = $this->parentModel::where('id' , $storeData['id'])->update([
                    'status' => 1
                ]);
            }

            if($storeData){
                return redirect()->route($this->parentRoute.'.index')->with('success' , 'About us information has been stored');
            }
            else{
                return redirect()->back()->with('error' , 'Failed to Store About us Information');
            }
        }


    }
    public function change_status(Request $request){
        $data         = $request->all();
        $checkAllStatus = $this->parentModel::where('status' , 1 )->count();

        $updateStatus = $this->parentModel::where('id' , $data['id'])->update([
            'status' => $data['status']
        ]);

        if ($checkAllStatus <= 1 && $data['status'] == 0) {

            $updateStatus = $this->parentModel::where('id' , $data['id'])->update([
                'status' =>1
            ]);
            return response()->json(['status' => 'required']);
        }
        else {
            if ($updateStatus) {
                return response()->json(['status' => true]);
            }
             else {
                return response()->json(['status' => false]);
            }
        }

    }
    public function destroy($id = null ){
        $delete = $this->parentModel::where(['id' => $id ])->delete();
        if($delete){
            return redirect()->back()->with('success' , ' About Us Information has been Deleted');
        }
        else{
            return redirect()->back()->with('error' , 'Failed To Delete About Us Information');
        }
    }
}
