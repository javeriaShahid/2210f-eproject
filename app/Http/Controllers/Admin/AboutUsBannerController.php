<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\AboutUsMainBanners;
class AboutUsBannerController extends Controller
{
    public  $parentModel   =  AboutUsMainBanners::class;
    public  $parentView    = 'Admin.AboutUsBanner';
    public  $parentRoute   = 'admin.aboutusbanner';
    public function index(){
        $data['about'] = $this->parentModel::paginate(10);
        return view($this->parentView .'.index')->with('data' , $data );
    }

    public function create(){
        $data['action']   = "create" ;
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function edit($id = null){
        $data['action']   = "edit" ;
        $data['about'] = $this->parentModel::where('id' , $id) ->first();
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function store(Request $request , $id = null ){
        $data = $request->except('_token');
        $checkAllStatus = $this->parentModel::where('status' , 1 )->count();

        if ($request->hasFile('image')) {
            $fileName = time().'.'.$data['image']->getClientOriginalExtension();
            $data['image']->move('aboutusbannerImages/', $fileName);
            $data['image'] = $fileName;
        }
        if ($request->hasFile('video_banner')) {
            $videoBanner = time().'.'.$request->file('video_banner')->getClientOriginalExtension();
            $request->file('video_banner')->move('aboutUsBannerVideos/', $videoBanner);
            $data['video_banner'] = $videoBanner;
        }
        if ($request->hasFile('video')) {
            $videoName = time().'.'.$request->file('video')->getClientOriginalExtension();
            $request->file('video')->move('aboutUsVideos/', $videoName);
            $data['video'] = $videoName;
        }

        if ($id != null) {
            $existingData = $this->parentModel::find($id);


            if (isset($data['image'])) {
            $filePath = public_path('aboutusbannerImages/' . $existingData->image) ;
            if (file_exists($filePath)) {
               unlink($filePath); // Delete the file
             }
            $existingData->image = $data['image'];
            }
            if (isset($data['video'])) {
            $filePath = public_path('aboutUsVideos/' . $existingData->video) ;
            if (file_exists($filePath)) {
               unlink($filePath); // Delete the file
             }
            $existingData->video = $data['video'];
            }
            if (isset($data['video_banner'])) {
             $filePath = public_path('aboutUsBannerVideos/' . $existingData->video_banner) ;
             if (file_exists($filePath)) {
                unlink($filePath); // Delete the file
              }
             $existingData->video_banner = $data['video_banner'];
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
    public function destroy($id = null ){
        $delete = $this->parentModel::where(['id' => $id ])->delete();
        if($delete){
            return redirect()->back()->with('success' , ' About Us Banner Information has been Deleted');
        }
        else{
            return redirect()->back()->with('error' , 'Failed To Delete  About Us Banner  Information');
        }
    }
}
