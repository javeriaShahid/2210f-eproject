<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\AboutUs ;
use App\Models\AboutUsMainBanners ;
class usercontroller extends Controller
{
   public $countryModel     = Country::class ;
   public $productModel     = Product::class;
   public $categoryModel    = Category::class;
   public $subCategoryModel    = Subcategory::class;
   public $brandModel       = Brand::class;
   public function Auth_register(){
    return view("admin.Auth_register");
   }
   public function Auth_login(){
      return view("admin.Auth_login");
     }
   public function dashboard(){
      return view("user.dashboard");
     }
   public function about_us(){
     $data['aboutUs']    = AboutUs::where("status" , 1)->orderBy('id' , 'desc')->paginate(2);
     $data['a_banners']  = AboutUsMainBanners::where('status' , 1)->first();
     $data['brands']     = $this->brandModel::withoutTrashed()->orderBy('id' , 'desc')->paginate(10);
      return view("user.about_us")->with('data' , $data);
     }
   public function accordion(){
      return view("user.accordion");
     }
   public function blog_details(){
      return view("user.blog_details");
     }
   public function blog(){
      return view("user.blog");
     }

   public function category(){
      return view("user.category");
     }
   public function contact(){
      return view("user.contact");
     }
   public function error(){
      return view("user.error");
     }
   public function faq(){
      return view("user.faq");
     }
   public function gift_card(){
      return view("user.gift_card");
     }

   public function our_brand(){
      $data['brand']     = $this->brandModel::paginate(25);
      return view("user.our_brand")->with('data' , $data);
     }
   public function quick_view(){
      return view("user.quick_view");
     }
   public function slider(){
      $data['product']   = $this->productModel::withoutTrashed()->where('is_published' , 1)->paginate(25);
      $data['title']     = "All Products";
      return view("user.slider")->with('data' , $data);
   }
   public function search_category($id = null){
      $data['product']   = $this->productModel::withoutTrashed()->where(['category_id' => $id , 'is_published' => 1])->paginate(25);
      $category          = $this->categoryModel::where('id' , $id)->first();
      $data['title']     = $category->name;
      return view("user.slider")->with('data' , $data);
   }
   public function search_subcategory($id = null){
      $data['product']   = $this->productModel::withoutTrashed()->where(['subcategory_id' => $id , 'is_published' => 1])->paginate(25);
      $category          = $this->subCategoryModel::where('id' , $id)->first();
      $data['title']     = $category->name;
      return view("user.slider")->with('data' , $data);
   }
   public function search(Request $request){
    $searchInput     = $request->search;
    $data['product'] = $this->productModel::withoutTrashed()
    ->where('is_published', 1)
    ->where('name', 'LIKE', '%' . $searchInput . '%')
    ->paginate(25);
      $data['title']     = "Searched Product";
      return view("user.slider")->with('data' , $data);
   }
   public function standard(){
      return view("user.standard");
     }
    public function wishlist(){
      return view("user.wishlist");
     }
     public function login()
     {
        return view('User.login');
     }
     public function registration(){
      $data['country']    = $this->countryModel::all();
      return view("user.registration")->with('data'  , $data);
     }

}





// Route::controller(userController::class)->group(function () {
//     Route::get('/', 'index');
//     Route::post('/aboutus', 'about-us');
// });

