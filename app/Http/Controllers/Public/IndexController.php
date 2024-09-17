<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class IndexController extends Controller
{
    public function index(){
        $products = Product::where('deleted', false)
        ->inRandomOrder()
        ->get()
        ->take(12);

        $latestProducts = Product::where('deleted', false)
        ->orderBy('id', 'desc')
        ->get()
        ->take(12);

        return view('welcome', [
            'products' => $products,
            'latestProducts' => $latestProducts
        ]);
    }
}
