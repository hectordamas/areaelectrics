<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = $category->products()
        ->where('deleted', false)
        ->paginate(10)
        ->withQueryString();
    
        return view('shop.index', [
            'products' => $products,
            'category' => $category
        ]);
    }
}
