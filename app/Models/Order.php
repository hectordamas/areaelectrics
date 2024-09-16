<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            // Obtener el último número de pedido directamente desde la base de datos
            $lastOrderNumber = DB::table('orders')->max('order_number');
            
            // Si no hay ningún pedido, comienza desde el número preestablecido
            if ($lastOrderNumber) {
                // Eliminar los ceros a la izquierda y sumar 1
                $nextOrderNumber = intval($lastOrderNumber + 1);
            } else {
                // Si no hay un último número de pedido, comienza desde 123
                $nextOrderNumber = 123;
            }
        
            // Formatear el número como '0000123'
            $order->order_number = str_pad($nextOrderNumber, 7, '0', STR_PAD_LEFT);
        });
        
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity', 'color', 'size');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getTotalAttribute()
    {
        return ($this->products->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        })) * 1.16;
    }

    public function getSubtotalAttribute(){
        return $this->products->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        });
    }

    public function getTaxAttribute(){
        return $this->products->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        }) * 0.16;
    }
}
