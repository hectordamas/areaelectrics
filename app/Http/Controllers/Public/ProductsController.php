<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class ProductsController extends Controller
{
    public function show($slug)
    {
        // Obtener el producto actual
        $product = Product::where('slug', $slug)->first();
    
        // Obtener las categorías del producto actual
        $categoryIds = $product->categories->pluck('id');
    
        // Buscar productos relacionados que pertenezcan a las mismas categorías
        $relatedProducts = Product::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('categories.id', $categoryIds);
        })
        ->where('id', '!=', $product->id) // Excluir el producto actual
        ->inRandomOrder() // Ordenar aleatoriamente
        ->take(8) // Limitar a 4 productos relacionados (puedes ajustar el número)
        ->get();
    
        return view('products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
