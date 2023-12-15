<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarouselSetting;
use App\Models\Category;
class CarouselController extends Controller
{
    public  $parentModel   =  CarouselSetting::class;
    public  $parentView    = 'Admin.CarouselSetting';
    public  $parentRoute   = 'admin.carouselsetting';
    public  $categoryModel =  Category::class ;

    public function index(){
        $data['carousel'] = $this->parentModel::paginate(10);
        return view($this->parentView .'.index')->with('data' , $data );
    }

    public function create(){
        $data['action']   = "create" ;
        $data['category'] = $this->categoryModel::withoutTrashed()->get();
        return view($this->parentView.'.create')->with('data' , $data );
    }
    public function edit($id = null){
        $data['action']   = "edit" ;
        $data['category'] = $this->categoryModel::withoutTrashed()->get();
        $data['carousel'] = $this->parentModel::where('id' , $id) ->first();
        return view($this->parentView.'.create')->with('data' , $data );
    }

    public function store(Request $request , $id = null ){
        $data = $request->all();
        $checkAllStatus = $this->parentModel::where('status' , 1 )->count();

        if ($request->hasFile('image')) {
            $fileName = time().'.'.$data['image']->getClientOriginalExtension();
            $data['image']->move('carouselImages/', $fileName);
            $data['image'] = $fileName;
        }
        if ($id != null) {
            $existingData = $this->parentModel::find($id);
            if (isset($data['image'])) {
            $existingData->image = $data['image'];
            }
            $existingData->update($data);
            if($existingData){
                return redirect()->route($this->parentRoute.'.index')->with('success' , 'Carousel Data has been updated');
            }
            else{
                return redirect()->back()->with('error' , 'Failed to Update Carousel Information');
            }

        } else {
            $storeData = $this->parentModel::create($data);

            if($checkAllStatus < 1){
                $unactiveOthers = $this->parentModel::where('id' , $storeData['id'])->update([
                    'status' => 1
                ]);
            }

            if($storeData){
                return redirect()->route($this->parentRoute.'.index')->with('success' , 'Carousel Data has been stored');
            }
            else{
                return redirect()->back()->with('error' , 'Failed to Store Carousel Information');
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
            return redirect()->back()->with('success' , ' Carousel Information has been Deleted');
        }
        else{
            return redirect()->back()->with('error' , 'Failed To Delete Carousel Information');
        }
    }
}
