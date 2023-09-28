<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productimages;
use App\Models\Subcategory;

class ProductController extends Controller
{
    public  $parentModel      = Product::class ;
    public  $imagesModel      = Productimages::class ;
    public  $categoryModel    = Category::class;
    public  $subcategoryModel = Subcategory::class;
    public function index()
    {
        $data['product']   = $this->parentModel::with('subcategory' ,'category')->withoutTrashed()->paginate(25);
        return view('Admin.Product.index')->with('data' , $data);
    }
    public function published()
    {
        $data['product']   = $this->parentModel::where('is_published'  , 1 )->with('subcategory' ,'category')->withoutTrashed()->paginate(25);
        return view('Admin.Product.published')->with('data' , $data);
    }
    public function unpublished()
    {
        $data['product']   = $this->parentModel::where('is_published' , 0 )->with('subcategory' ,'category')->withoutTrashed()->paginate(25);
        return view('Admin.Product.unpublished')->with('data' , $data);
    }
    public function trash()
    {
        $data['product']   = $this->parentModel::with('subcategory' ,'category')->onlyTrashed()->paginate(25);
        return view('Admin.Product.trash')->with('data' , $data);
    }

    public function create()
    {
        $data['category']     = $this->categoryModel::withoutTrashed()->get();
        $data['action']       = 'create';
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
        $quantity           = $request->quantity;
        $price              = $request->price ;
        $sku                = $request->sku;
        $color              = $request->color;
        $category           = $request->category;
        $subcategory        = $request->subcategory;
        $description        = $request->description;
        if($request->hasFile('image') && $request->hasFile('subimage'))
        {
            $mainImage           = rand().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('assets/Productimages' , $mainImage);

            $createProduct     =  $this->parentModel::create([
                'name'                => $name ,
                'price'               => $price ,
                'stock'               => $quantity ,
                'category_id'         => $category ,
                'subcategory_id'      => $subcategory ,
                'image'               => $mainImage ,
                'color_code'          => $color ,
                'sku'                 => $sku ,  
                'description'         => $description  
            ]);
            if($createProduct == true)
            {
                
                foreach($request->file('subimage') as $key => $value)
                {
                    $subImages = time().'.'.$request->file('subimage')[$key]->getClientOriginalExtension();
                    $request->file('subimage')[$key]->move('assets/subImages/' , $subImages);
                    $createImage   = $this->imagesModel::create([
                        'product_id'    => $createProduct->id ,
                        'image'        =>  $subImages
                    ]);
                }
    
            }
            if($createProduct == true && $createImage == true)
            {
                return redirect(Route('product.index'))>with('success' , 'Product Has Been created');
            }

            else
            {
                return redirect()->back()->with('error' , 'Failed to add Product');
            }

        }

    }

    public function delete($id = null)
    {
        $delete       = $this->parentModel::where('id' , $id)->delete();
        $deleteImg    = $this->imagesModel::where('product_id' , $id)->delete();
        if($delete)
        {
            return redirect()->back()->with('success' ,'Product has been sent to trash');
        }
        else
        {
            return redirect()->back()->with('error','Failed to delete product');
        }
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
}
