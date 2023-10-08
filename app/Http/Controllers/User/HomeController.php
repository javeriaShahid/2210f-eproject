<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
class HomeController extends Controller
{
        public $parentModel     = Product::class;
        public $brandModel      = Brand::class;
        public function index()
        {
            $data['product']     = $this->parentModel::where('is_published' , 1)->withoutTrashed()->with('category' , 'subcategory' ,'brand')->orderby('id' , 'desc')->limit(6)->get();
            $data['discount']    = $this->parentModel::where(['is_published' => 1 , 'sale_status' => 1])->withoutTrashed()->with('category' , 'subcategory' , 'brand')->orderBy('id' , 'desc')->limit(12)->get();
            $data['popular']     = $this->parentModel::where('is_published' , 1)->withoutTrashed()->with('category' , 'subcategory' , 'brand')->orderby('number_of_sales' ,'desc')->limit(6)->get();
            $data['brand']       = $this->brandModel::withoutTrashed()->orderby('id' , 'desc')->limit(10)->get();
            return view('User.index')->with('data' , $data);
        }



}
