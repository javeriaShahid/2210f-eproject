<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{FAQS , FaqsCategories};
class FAQController extends Controller
{
    public $parentModel =  FaqsCategories::class;
    public $childModel  =  FAQS::class;
    public $parentView  = 'Admin.FAQS';
    public $parentRoute = 'admin.faqs';
    public function index(){
        $data['faqs'] = $this->childModel::paginate(20);
        return view($this->parentView .'.index')->with('data' , $data);
    }

    public function create(){
        $data['action'] = "create" ;
        $data['faq_categories'] = $this->parentModel::where('status' , 1)->get();
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function edit($id = null){
        $data['action'] = "edit" ;
        $data['faq_categories'] = $this->parentModel::where('status' , 1)->get();
        $data['faqs']   = $this->childModel::where('id' , $id)->first();
        return view($this->parentView.'.create')->with('data' , $data );
    }

    public function store(Request $request, $id = null)
    {
        $data = $request->all();

        $checkAllStatus = $this->childModel::where('status', 1)->count();

        foreach ($data['title'] as $key => $value) {
            $faqData = [
                'title' => $data['title'][$key],
                'answer' => $data['answer'][$key],
                'category' => $data['category'],
            ];


            $storeSmtp = $this->childModel::updateOrCreate(
                ['title' => $faqData['title'], 'category' => $faqData['category']],
                $faqData
            );


            if ($checkAllStatus < 1 && $storeSmtp->wasRecentlyCreated) {
                $this->childModel::where('id', '<>', $storeSmtp->id)->update([
                    'status' => 0 // Set others to inactive
                ]);
            }
        }

        if ($storeSmtp) {
            return redirect()->route($this->parentRoute . '.index')->with('success', "FAQ's information has been saved");
        } else {
            return redirect()->back()->with('error', "Failed To Store FAQ's Information");
        }
    }

    public function destroy($id = null ){
        $delete = $this->childModel::where(['id' => $id ])->delete();
        if($delete){
            return redirect()->back()->with('success' , "FAQ's  Information has been Deleted");
        }
        else{
            return redirect()->back()->with('error' , "Failed To Delete SMTP Server Information");
        }

    }

    public function change_status(Request $request){
        $data         = $request->all();
        $updateStatus = $this->childModel::where('id' , $data['id'])->update([
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
