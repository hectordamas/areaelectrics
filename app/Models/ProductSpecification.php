<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductSpecification extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'item', 'description'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
