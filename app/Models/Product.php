<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Order;
use App\Models\ProductSpecification;
use App\Models\Color;
use App\Models\Size;

class Product extends Model
{
    use HasFactory;

    public function images(){
        return $this->belongsToMany(Image::class, 'image_product')
            ->orderBy('order')
            ->orderBy('id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class, 'order_product')->withPivot('quantity');
    }

    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function colors()
    {
        return $this->hasMany(Color::class);
    }

    // Scope para filtrar por nombre
    public function scopeName($query, $name)
    {
        if ($name) 
            return $query->where('name', 'like', "%{$name}%");
    }
    
    // Scope para filtrar por categorías
    public function scopeFilterByCategories($query, $categoryIds)
    {
        if ($categoryIds && count($categoryIds) > 0) 
            return $query->whereHas('categories', function ($q) use ($categoryIds) {
                $q->whereIn('category_id', $categoryIds);
            });
    }

    // Scope para filtrar por categorías
    public function scopeFilterByBrands($query, $brandsIds)
    {
        if ($brandsIds && count($brandsIds) > 0) 
            return $query->whereHas('brands', function ($q) use ($brandsIds) {
                $q->whereIn('brand_id', $brandsIds);
            });
    }

    // Scope para filtrar por rango de precios
    public function scopePriceRange($query, $minPrice, $maxPrice)
    {
        if ($minPrice && $maxPrice) 
            return $query->whereBetween('price', [$minPrice, $maxPrice]);
    }

    // Scope para filtrar por rango de fechas de creación
    public function scopeCreatedAtRange($query, $startDate, $endDate)
    {
        if ($startDate && $endDate) 
            return $query->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate);    
    }

}
