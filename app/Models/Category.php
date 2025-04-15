<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    public function products(){
        return $this->belongsToMany(Product::class, 'category_product');
    }

        // Relación con la subcategoría (hijos)
        public function subcategories()
        {
            return $this->hasMany(Category::class, 'parent_id')->orderBy('order');
        }
    
        // Relación con la categoría padre
        public function category()
        {
            return $this->belongsTo(Category::class, 'parent_id');
        }
}
