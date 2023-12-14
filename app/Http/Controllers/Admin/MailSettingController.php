<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MailSetting;
class MailSettingController extends Controller
{
    public $parentModel = MailSetting::class;
    public $parentView  = 'Admin.MailSetting';
    public $parentRoute = 'admin.mailsetting';
    public function index(){
        $data['mail'] = $this->parentModel::paginate(20);
        return view($this->parentView .'.index')->with('data' , $data);
    }

    public function create(){
        $data['action'] = "create" ;
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function edit($id = null){
        $data['action'] = "edit" ;
        $data['mail']   = $this->parentModel::where('id' , $id)->first();
        return view($this->parentView.'.create')->with('data' , $data );
    }

    public function store(Request $request , $id = null ){
        $data      = $request->all();
        $checkAllStatus = $this->parentModel::where('status' , 1 )->count();
        $storeSmtp = $this->parentModel::updateOrCreate(['id' => $id ] , $data);
        if($checkAllStatus < 1){
            $unactiveOthers = $this->parentModel::where('id' , $storeSmtp['id'])->update([
                'status' => 1
            ]);
        }
        if($storeSmtp){
            return redirect()->route($this->parentRoute.'.index')->with('success' , 'Smtp Server information has been saved');
        }
        else{
            return redirect()->back()->with('error' , 'Failed To Store Smtp Server Information');
        }
    }
    public function destroy($id = null ){
        $delete = $this->parentModel::where(['id' => $id ])->delete();
        if($delete){
            return redirect()->back()->with('success' , ' Smtp Server Information has been Deleted');
        }
        else{
            return redirect()->back()->with('error' , 'Failed To Delete Smtp Server Information');
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
