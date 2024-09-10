<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(10)->withQueryString();
        
        return view('shop.index', [
            'products' => $products,
        ]);
    }

    public function search(Request $request){
        $query = Product::with('brand', 'categories')
        ->where(function ($q) use ($request) {
            $q
            ->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')
            ->orWhereHas('brand', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            })
            ->orWhereHas('categories', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        })
        ->orderByRaw("CASE 
            WHEN name LIKE ? THEN 1
            WHEN description LIKE ? THEN 2
            WHEN EXISTS (SELECT 1 FROM brands WHERE brands.id = products.brand_id AND brands.name LIKE ?) THEN 3
            WHEN EXISTS (SELECT 1 FROM category_product WHERE category_product.product_id = products.id AND EXISTS (SELECT 1 FROM categories WHERE categories.id = category_product.category_id AND categories.name LIKE ?)) THEN 4
            ELSE 5 END", 
            [
                $request->search . '%',
                $request->search . '%',
                $request->search . '%',
                $request->search . '%'
            ]
        );
    
        $products = $query->paginate(10)->withQueryString();

        return view('shop.index', [
            'products' => $products,
        ]);
    }
}
