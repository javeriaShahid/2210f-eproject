<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
    public  $parentModel   =  Setting::class;
    public  $parentView    = 'Admin.Setting';
    public  $parentRoute   = 'admin.setting';

    public function index(){
        $data['setting'] = $this->parentModel::paginate(10);
        return view($this->parentView .'.index')->with('data' , $data );
    }

    public function create(){
        $data['action']   = "create" ;
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function edit($id = null){
        $data['action']   = "edit" ;
        $data['setting'] = $this->parentModel::where('id' , $id) ->first();
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function store(Request $request , $id = null){
        $data = $request->all();
        $checkAllStatus = $this->parentModel::where('status' , 1 )->count();

        if ($request->hasFile('logo')) {
            $fileName = time().'.'.$data['logo']->getClientOriginalExtension();
            $data['logo']->move('settingsLogo/', $fileName);
            $data['logo'] = $fileName;
        }
        if($request->hasFile('x_icon')){
            $fileName = time().'.'.$data['x_icon']->getClientOriginalExtension();
            $data['x_icon']->move('settings_x_Icons/', $fileName);
            $data['x_icon'] = $fileName;
        }

        if ($id != null) {
            $existingData = $this->parentModel::find($id);
            if (isset($data['logo'])) {
            $existingData->logo = $data['logo'];
            }
            if (isset($data['x_icon'])) {
                $existingData->x_icon = $data['x_icon'];
            }
            $existingData->update($data);
            if($existingData){
                return redirect()->route($this->parentRoute.'.index')->with('success' , 'Settings has been updated');
            }
            else{
                return redirect()->back()->with('error' , 'Failed to Update Settings Information');
            }

        } else {
            $storeData = $this->parentModel::create($data);
            if($checkAllStatus < 1){
                $unactiveOthers = $this->parentModel::where('id' , $storeData['id'])->update([
                    'status' => 1
                ]);
            }

            if($storeData){
                return redirect()->route($this->parentRoute.'.index')->with('success' , 'Setting has been stored');
            }
            else{
                return redirect()->back()->with('error' , 'Failed to Store Settings Information');
            }
         }

    }
    public function destroy($id = null ){
        $delete = $this->parentModel::where(['id' => $id ])->delete();
        if($delete){
            return redirect()->back()->with('success' , ' Settings Information has been Deleted');
        }
        else{
            return redirect()->back()->with('error' , 'Failed To Delete Settings Information');
        }
    }
    public function change_status(Request $request){
        $data         = $request->all();
        $checkAllStatus = $this->parentModel::where('status' , 1 )->count();

        $updateStatus = $this->parentModel::where('id' , $data['id'])->update([
            'status' => $data['status']
        ]);
        $unactiveOthers = $this->parentModel::where('id' , '!=' , $data['id'])->update([
            'status' => 0
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
}
