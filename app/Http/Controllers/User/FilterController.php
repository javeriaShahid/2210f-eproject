<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product};
class FilterController extends Controller
{
    public $parentModel = Product::class;
    public function price_range(Request $request){

        $min_price = str_replace(['PKR' , ',' ,''],'', $request->mmin_price);
        $max_price = str_replace(['PKR' , ',' ,''],'', $request->max_price);
        $data      = $this->parentModel::where('is_published' , 1)->with('subimage' , 'brand' , 'feedbacks')->whereBetween('price' , [$min_price , $max_price])->get();
        return response()->json($data);
    }
    public function category(Request $request){
        $category_id = $request->category_id ;
        $data        = $this->parentModel::where(['is_published' => 1])->with('subimage' , 'brand' , 'feedbacks')->get();
        if($category_id > 0){
            $data        = $this->parentModel::where(['category_id' => $category_id , 'is_published' => 1])->with('subimage' , 'brand' , 'feedbacks')->get();
        }

        return response()->json($data);
    }
    public function brand(Request $request){
        $brand_id    = $request->brand_id;
        $data        = $this->parentModel::where(['brand_id' => $brand_id , 'is_published' => 1])->with('subimage' , 'brand' , 'feedbacks')->get();
        return response()->json($data);
    }
    public function sort(Request $request){
        $order    = $request->order;
        $data        = $this->parentModel::where(['is_published' => 1])->with('subimage' , 'brand' , 'feedbacks')->orderBy('price' , $order)->get();
        return response()->json($data);
    }
}
