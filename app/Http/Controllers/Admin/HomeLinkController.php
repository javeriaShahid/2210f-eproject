<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeLinks    ;
use Illuminate\Support\Facades\Route;

class HomeLinkController extends Controller
{
    public $parentModel =  HomeLinks::class;
    public $parentView  = 'Admin.HomeLinks';
    public $parentRoute = 'admin.homelinks';

    public function index(){
        $data['homelinks'] = $this->parentModel::paginate(20);
        return view($this->parentView .'.index')->with('data' , $data);
    }

    public function create(){
        $data['action'] = "create" ;
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function edit($id = null){
        $data['action'] = "edit" ;
        $data['homelinks']   = $this->parentModel::where('id' , $id)->first();
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function store(Request $request , $id = null ){
        $data           = $request->all();
        if($data['route'] != null || $data['route'] != ""){
            $checkRoute = Route::has($data['route']);
            if($checkRoute == false){
                return redirect()->back()->with('error' , 'Route does not exists in your web.php file');
            }
        }

        $checkAllStatus = $this->parentModel::where('status' , 1 )->count();
        $homelinksStore = $this->parentModel::updateOrCreate(['id' => $id ] , $data);
        if($checkAllStatus < 1){
            $unactiveOthers = $this->parentModel::where('id' , $homelinksStore['id'])->update([
                'status' => 1
            ]);
        }
        if($homelinksStore){
            return redirect()->route($this->parentRoute.'.index')->with('success' , 'Navbar Link Has Been Created');
        }
        else{
            return redirect()->back()->with('error' , 'Navbar Link Has Been Created');
        }
    }
    public function destroy($id = null ){
        $delete = $this->parentModel::where(['id' => $id ])->delete();
        if($delete){
            return redirect()->back()->with('success' , ' Home Link has been Deleted');
        }
        else{
            return redirect()->back()->with('error' , 'Failed To Delete Home Link Information');
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
}
