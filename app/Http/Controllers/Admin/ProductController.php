<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productimages;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Checkout;
use App\Models\FirebaseStore;

class ProductController extends Controller
{
    public  $parentModel      = Product::class ;
    public  $orderModel       = Checkout::class;
    public  $imagesModel      = Productimages::class ;
    public  $categoryModel    = Category::class;
    public  $subcategoryModel = Subcategory::class;
    public  $brandModel       = Brand::class;
    public $firebaseStore    = FirebaseStore::class;
    public function index()
    {
        $data['product']   = $this->parentModel::with('subcategory' ,'category','brand')->withoutTrashed()->paginate(25);
        return view('Admin.Product.index')->with('data' , $data);
    }
    public function published()
    {
        $data['product']   = $this->parentModel::where('is_published'  , 1 )->with('subcategory' ,'category', 'brand')->withoutTrashed()->paginate(25);
        return view('Admin.Product.published')->with('data' , $data);
    }
    public function unpublished()
    {
        $data['product']   = $this->parentModel::where('is_published' , 0 )->with('subcategory' ,'category' , 'brand')->withoutTrashed()->paginate(25);
        return view('Admin.Product.unpublished')->with('data' , $data);
    }
    public function trash()
    {
        $data['product']   = $this->parentModel::with('subcategory' ,'category' ,'brand')->onlyTrashed()->paginate(25);
        return view('Admin.Product.trash')->with('data' , $data);
    }

    public function create()
    {
        $data['brand']        = $this->brandModel::withoutTrashed()->get();
        $data['category']     = $this->categoryModel::withoutTrashed()->get();
        $data['action']       = 'create';
        return view('Admin.Product.create')->with('data' , $data);
    }
    public function edit($id = null)
    {
        $data['brand']        = $this->brandModel::withoutTrashed()->get();
        $data['category']     = $this->categoryModel::withoutTrashed()->get();
        $data['product']      = $this->parentModel::with('category','subcategory' , 'brand')->withoutTrashed()->where('id',$id)->first();
        $data['action']       = 'edit';
        return view('Admin.Product.create')->with('data' , $data);
    }

    public function getSubcategory($id = null)
    {
        $subcategory          = $this->subcategoryModel::where('category_id' , $id)->withoutTrashed()->get();
        if($subcategory->count() >= 1)
        {
            return response()->json($subcategory);
        }
        else
        {
            echo "No Data Found";
        }

    }

    public function store(Request $request)
    {
        $name               = $request->name ;
        $brand              = $request->brand ;
        $quantity           = $request->quantity;
        $price              = $request->price ;
        $sku                = $request->sku;
        $color              = json_encode($request->color);
        $category           = $request->category;
        $subcategory        = $request->subcategory;
        $weight             = $request->weight;
        $short_description  = $request->short_description;
        $weight_type        = $request->weight_type;
        $description        = $request->description;
        $shippingFees       = $request->shipping_fees;
        $delivery_duration  = $request->delivery_duration;
        if($request->hasFile('image') && $request->hasFile('subimage'))
        {
            $fileName  = time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('ProductImages/' , $fileName);

            $createProduct     =  $this->parentModel::create([
                'name'                => $name ,
                'price'               => $price ,
                'stock'               => $quantity ,
                'category_id'         => $category ,
                'subcategory_id'      => $subcategory ,
                'image'               => $fileName ,
                'color_code'          => $color ,
                'sku'                 => $sku ,
                'description'         => $description  ,
                'brand_id'            => $brand ,
                'shipping_fees'       => $shippingFees ,
                'weight'              => $weight ,
                'weight_type'         => $weight_type ,
                'delivery_duration'   => $delivery_duration ,
                'short_description'   => $short_description  ,

            ]);
            if($createProduct == true)
            {

                foreach($request->file('subimage') as $key => $value)
                {
                    $image         =  $request->file('subimage')[$key];
                    $subFile  = time().".".$image->getClientOriginalExtension();
                    $image->move('ProductSubImages/' , $subFile);
                    $createImage   = $this->imagesModel::create([
                        'product_id'    => $createProduct->id ,
                        'image'        =>  $subFile
                    ]);
                }

            }
            if($createProduct == true && $createImage == true)
            {
                return redirect(Route('product.index'))->with('success' , 'Product Has Been created');
            }

            else
            {
                return redirect()->back()->with('error' , 'Failed to add Product');
            }

        }

    }

    public function update(Request $request  , $id = null)
    {
        $name               = $request->name ;
        $brand              = $request->brand ;
        $quantity           = $request->quantity;
        $price              = $request->price ;
        $sku                = $request->sku;
        $color              = json_encode($request->color);
        $category           = $request->category;
        $subcategory        = $request->subcategory;
        $weight             = $request->weight;
        $weight_type        = $request->weight_type;
        $description        = $request->description;
        $short_description  = $request->short_description;
        $shippingFees       = $request->shipping_fees;
        $delivery_duration  = $request->delivery_duration;
        if($request->hasFile('image'))
        {
            $fileName  = time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('ProductImages/' , $fileName);

            $updateImage       = $this->parentModel::where('id' , $id)->update([
                'image'        => $fileName
            ]);
        }
            $updateProduct     =  $this->parentModel::where('id' , $id)->update([
                'name'                => $name ,
                'price'               => $price ,
                'stock'               => $quantity ,
                'category_id'         => $category ,
                'subcategory_id'      => $subcategory,
                'color_code'          => $color ,
                'sku'                 => $sku ,
                'short_description'   => $short_description  ,
                'description'         => $description  ,
                'brand_id'            => $brand ,
                'shipping_fees'       => $shippingFees ,
                'delivery_duration'   => $delivery_duration,
                'weight'              => $weight ,
                'weight_type'         => $weight_type ,

            ]);
            if($request->hasFile('subimage'))
            {

                // $subImageData      = $this->imagesModel::where('product_id' , $id)->first();
                foreach($request->file('subimage') as $key => $value)
                {
                    $image         =  $request->file('subimage')[$key];
                    $subFile  = time().".".$image->getClientOriginalExtension();
                    $image->move('ProductSubImages/' , $subFile);

                    $updateProduct   = $this->imagesModel::create([
                        'product_id'    => $id ,
                        'image'        =>  $subFile
                    ]);
                }

            }
            if($updateProduct == true)
            {
                return redirect(Route('product.index'))->with('success' , 'Product Has Been updated');
            }

            else
            {
                return redirect()->back()->with('error' , 'Failed to update Product');
            }

    }

    public function delete($id = null)
    {
        $Orders       = $this->orderModel::where('product_id' , $id)->count();
        if($Orders >= 1)
        {
            return redirect()->back()->with('error' , 'This Product has orders cancel them first to delete the Product');
        }
        else{
        $delete       = $this->parentModel::where('id' , $id)->delete();
        $deleteImg    = $this->imagesModel::where('product_id' , $id)->delete();
        if($delete)
        {
            return redirect()->back()->with('success' ,'Product has been sent to trash');
        }
        else
        {
            return redirect()->back()->with('error','Failed to delete product');
        }}
    }
    public function restore($id = null)
    {
        $restore       = $this->parentModel::where('id' , $id)->restore();
        $restoreImg    = $this->imagesModel::where('product_id' , $id)->restore();
        if($restore)
        {
            return redirect()->back()->with('success' ,'Product has been Restored');
        }
        else
        {
            return redirect()->back()->with('error','Failed to restore product');
        }
    }
    public function destroy($id = null)
    {
        $destroy       = $this->parentModel::where('id' , $id)->forceDelete();
        $destroyImg    = $this->imagesModel::where('product_id' , $id)->forceDelete();
        if($destroy)
        {
            return redirect()->back()->with('success' ,'Product has been Deleted');
        }
        else
        {
            return redirect()->back()->with('error','Failed to delete product');
        }
    }
    public function published_product($id = null){
        $published       = $this->parentModel::where('id' , $id)->update(['is_published' => 1]);

        if($published)
        {
            return redirect()->back()->with('success' ,'Product has been Published');
        }
        else
        {
            return redirect()->back()->with('error','Failed to publish product');
        }
    }

    public function discount($id = null){
        $data['productId']     = $id ;
        return view('Admin.Product.sale_price')->with('data' , $data);
    }
    public function remove_discount($id = null){
        $published    = $this->parentModel::where('id' , $id)->update([
            'sale_status'       => 0 ,
            'discounted_price'  => null ,
            'discounted_start_time' => null ,
            'discounted_end_time' => null ,
            'discount_percentage' => null
           ]);
        if($published)
        {
            return redirect()->back()->with('success' ,'Product has been removed from Sale');
        }
        else
        {
            return redirect()->back()->with('error','Failed to remove  product on sale');
        }
    }

   public function sale_price($id = null , Request $request)
   {
        $productData   = $this->parentModel::where('id' , $id)->first();
        $price           =   $request->price;
        $orignalPrice    =   $productData->price;
        $discountPercent =   ($orignalPrice - $price) / $orignalPrice * 100 ;
        $discountPercent =   round($discountPercent , 2) ;
        // Calculating number of percentage of discount

       $startDate       =   $request->startDate;
       $endDate         =   $request->endDate;

       $add_discount    = $this->parentModel::where('id' , $id)->update([
        'sale_status'       => 1 ,
        'discounted_price'  => $price ,
        'discounted_start_time' => $startDate ,
        'discounted_end_time' => $endDate ,
        'discount_percentage' => $discountPercent
       ]);
       if($add_discount == true){
       return redirect(Route('product.index'))->with('success' , "Product Added to discount");
       }
       else
       {
       return redirect()->back()->with('success' , "Failed to add product discount");

       }
   }

}
