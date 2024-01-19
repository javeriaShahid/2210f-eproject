<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqsCategories;
class FaqsCategoryController extends Controller
{
    public $parentModel =  FaqsCategories::class;
    public $parentView  = 'Admin.FAQSCategories';
    public $parentRoute = 'admin.faqscategories';
    public function index(){
        $data['faqs'] = $this->parentModel::paginate(20);
        return view($this->parentView .'.index')->with('data' , $data);
    }

    public function create(){
        $data['action'] = "create" ;
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function edit($id = null){
        $data['action'] = "edit" ;
        $data['faqs']   = $this->parentModel::where('id' , $id)->first();
        return view($this->parentView.'.create')->with('data' , $data );
    }

    public function store(Request $request , $id = null ){
        $data           = $request->all();
        $checkAllStatus = $this->parentModel::where('status' , 1 )->count();
        $storeSmtp = $this->parentModel::updateOrCreate(['id' => $id ] , $data);
        if($checkAllStatus < 1){
            $unactiveOthers = $this->parentModel::where('id' , $storeSmtp['id'])->update([
                'status' => 1
            ]);
        }
        if($storeSmtp){
            return redirect()->route($this->parentRoute.'.index')->with('success' , "FAQ's information has been saved");
        }
        else{
            return redirect()->back()->with('error' , "Failed To Store FAQ's Information");
        }
    }
    public function destroy($id = null ){
        $delete = $this->parentModel::where(['id' => $id ])->delete();
        if($delete){
            return redirect()->back()->with('success' , "FAQ's  Information has been Deleted");
        }
        else{
            return redirect()->back()->with('error' , "Failed To Delete SMTP Server Information");
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
}
