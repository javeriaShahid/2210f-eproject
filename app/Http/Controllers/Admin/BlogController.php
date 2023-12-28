<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\BlogComments;
use App\Models\Category;
class BlogController extends Controller{
     public  $parentModel    =  Blogs::class;
     public  $commentModel   =  BlogComments::class;
     public  $childModel     =  Category::class;
     public  $parentView     = 'Admin.Blog';
     public  $parentRoute    = 'admin.blogs';
    public function index(){
        $data['blog'] = $this->parentModel::paginate(10);
        return view($this->parentView .'.index')->with('data' , $data );
    }
    public function comments(){
        $data['comment'] = $this->commentModel::paginate(10);
        return view($this->parentView .'.comment')->with('data' , $data );
    }
    public function view_comments($id = null){
        $data['comment'] = $this->commentModel::where('id' , $id)->first();
        return view($this->parentView .'.view_comment')->with('data' , $data );
    }
    public function create(){
        $data['action']   = "create" ;
        $data['category'] = $this->childModel::all();
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function edit($id = null){
        $data['action']   = "edit" ;
        $data['category'] = $this->childModel::all();
        $data['blog']    = $this->parentModel::where('id' , $id) ->first();
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function store(Request $request , $id = null ){
        $data = $request->except('_token');
        $data['tags']= json_encode($data['tags']);
        $checkAllStatus = $this->parentModel::where('status' , 1 )->count();
        if ($request->hasFile('image')) {
            $fileName = time().'.'.$data['image']->getClientOriginalExtension();
            $data['image']->move('blogImages/', $fileName);
            $data['image'] = $fileName;
        }

        if ($id != null) {
            $existingData = $this->parentModel::find($id);


            if (isset($data['image'])) {
            $filePath = public_path('blogImages/' . $existingData->image) ;
            if (file_exists($filePath)) {
               unlink($filePath); // Delete the file
             }
            $existingData->image = $data['image'];
            }

            $existingData->update($data);
            if($existingData){
                return redirect()->route($this->parentRoute.'.index')->with('success' , 'Blog has been updated');
            }
            else{
                return redirect()->back()->with('error' , 'Failed to Update Blog Information');
            }

        } else {
            $storeData = $this->parentModel::create($data);

            if($checkAllStatus < 1){
                $unactiveOthers = $this->parentModel::where('id' , $storeData['id'])->update([
                    'status' => 1
                ]);
            }

            if($storeData){
                return redirect()->route($this->parentRoute.'.index')->with('success' , 'Blog information has been stored');
            }
            else{
                return redirect()->back()->with('error' , 'Failed to Store Blog  Information');
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
            return redirect()->back()->with('success' , ' Blog Information has been Deleted');
        }
        else{
            return redirect()->back()->with('error' , 'Failed To Delete  Blog  Information');
        }
    }
    public function destroy_comment($id = null ){
        $delete = $this->commentModel::where(['id' => $id ])->delete();
        if($delete){
            return redirect()->back()->with('success' , ' Blog Comment  has been Deleted');
        }
        else{
            return redirect()->back()->with('error' , 'Failed To Delete  Blog  Comment');
        }
    }
}
