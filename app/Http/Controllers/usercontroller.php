<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Blogs;
use App\Models\BlogComments;
use App\Models\PaymentMethod;
use App\Models\FeedBack;
use App\Models\Setting;
use App\Models\BlogViews;
use DB;
use App\Models\Subcategory;
use App\Models\FaqsCategories;
use App\Models\AboutUs ;
use App\Models\AboutUsMainBanners ;
class UserController extends Controller
{
   public $countryModel     = Country::class ;
   public $productModel     = Product::class;
   public $categoryModel    = Category::class;
   public $subCategoryModel = Subcategory::class;
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
     $data['blogs']      = Blogs::where('status' , 1)->orderBy('id' , 'desc')->paginate(3);
     $data['brands']     = $this->brandModel::withoutTrashed()->orderBy('id' , 'desc')->paginate(10);
      return view("user.about_us")->with('data' , $data);
     }
   public function accordion($id = null){
      $data['product']  = Product::where('id' , $id)->first();
      $data['random']   = Product::where('category_id' , $data['product']->category_id)->where('id', '!=', $data['product']->id)->inRandomOrder()->take(10)->get();
      $data['payment']  = PaymentMethod::where('status' , 1)->get();
      $data['feedback'] = FeedBack::orderBy('id' , 'desc')->limit(5)->get();
      return view("user.accordion")->with('data' , $data);
     }
   public function blog_details($id= null){
      $data['blogs']         = Blogs::where('id' , $id)->first();
      $data['category']      = Category::all();
      $data['recentBlogs']   = Blogs::orderBy('id' , 'desc')->limit(5)->get();
      $data['blogscomments'] = BlogComments::where('blog_id' , $id)->orderBy('id' , 'desc')->limit(5)->get();
      $countViews = BlogViews::where('blog_id', $id)->first();
      if ($countViews) {
        $countViews->count += 1;
        $countViews->save();
       } else {
       BlogViews::create(['blog_id' => $id, 'count' => 1]);
      }

      return view("user.blog_details")->with('data' , $data);
     }
   public function blog(){
      $data['blogs'] = Blogs::orderBy('id' , 'desc')->paginate(10);
      return view("user.blog")->with('data' , $data);
     }
    public function blog_comments ($id = null){
        $data['blogscomments'] = BlogComments::where('blog_id' , $id)->orderBy('id' , 'desc')->paginate(1);
        return view("user.blog_comments")->with('data' , $data);
    }
   public function category(){
      return view("user.category");
     }
   public function contact(){
     $data['settings'] = Setting::where('status'  , 1)->first();
      return view("user.contact")->with('data' , $data);
     }
   public function error(){
      return view("user.error");
     }
   public function faq(){
      $data['faqs'] = FaqsCategories::where('status' , 1)->paginate(5);
      return view("user.faq")->with('data' , $data);
     }
   public function gift_card(){
      return view("user.gift_card");
     }

   public function our_brand(){
      $data['brand']     = $this->brandModel::paginate(25);
      return view("user.our_brand")->with('data' , $data);
     }
   public function quick_view(){
    $data['product']   = $this->productModel::withoutTrashed()->where('is_published' , 1)->paginate(25);
    $data['title']     = "All Products";
      return view("user.quick_view")->with('data',$data);
    }

   public function search_category($id = null){
      $data['product']   = $this->productModel::withoutTrashed()->where(['category_id' => $id , 'is_published' => 1])->paginate(25);
      $category          = $this->categoryModel::where('id' , $id)->first();
      $data['title']     = $category->name;
      return view("user.quick_view")->with('data' , $data);
   }
   public function search_brand($id = null){
      $data['product']   = $this->productModel::withoutTrashed()->where(['brand_id' => $id , 'is_published' => 1])->paginate(25);
      $category          = $this->categoryModel::where('id' , $id)->first();
      $data['title']     = $category->name;
      return view("user.quick_view")->with('data' , $data);
   }
   public function search_subcategory($id = null){
      $data['product']   = $this->productModel::withoutTrashed()->where(['subcategory_id' => $id , 'is_published' => 1])->paginate(25);
      $category          = $this->subCategoryModel::where('id' , $id)->first();
      $data['title']     = $category->name;
      return view("user.quick_view")->with('data' , $data);
   }
   public function search(Request $request){
    $searchInput     = $request->search;
    $data['product'] = $this->productModel::withoutTrashed()
    ->where('is_published', 1)
    ->where(function ($query) use ($searchInput) {
        $query->where('name', 'LIKE', '%' . $searchInput . '%')
            ->orWhereHas('brand', function ($subquery) use ($searchInput) {
                $subquery->where('name', 'LIKE', '%' . $searchInput . '%');
            })
            ->orWhereHas('category', function ($subquery) use ($searchInput) {
                $subquery->where('name', 'LIKE', '%' . $searchInput . '%');
            })
            ->orWhereHas('subcategory', function ($subquery) use ($searchInput) {
                $subquery->where('name', 'LIKE', '%' . $searchInput . '%');
            });
    })
    ->paginate(25);

      $data['title']     = "Searched Product";
      return view("user.quick_view")->with('data' , $data);
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
     public function blog_search($tagId = null){
        $data['blogs']     = Blogs::whereJsonContains('tags' , $tagId)->paginate(10);
        return redirect()->route('blog')->with('data' , $data);
     }
}





// Route::controller(userController::class)->group(function () {
//     Route::get('/', 'index');
//     Route::post('/aboutus', 'about-us');
// });

