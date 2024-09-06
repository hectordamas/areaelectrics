<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
    public function index($slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        $products = $brand->products()->paginate(10)->withQueryString();;
    
        return view('shop.index', [
            'products' => $products,        
            'brand' => $brand
        ]);
    }
}
