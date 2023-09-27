<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
class ProductController extends Controller
{
    public  $parentModel = Product::class ;
    public  $imagesModel = Product::class ;
}
