<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Mail\CartMail;
use Mail;
use Cart;
use Auth;

class CartController extends Controller
{
    private function add($id, $name, $quantity, $price, $image, $color, $size, $priceDetal = null){
        Cart::add([
            'id' => $id, 
            'name' => $name, 
            'qty' =>  $quantity, 
            'price' => $price,
            'weight' => 0, 
            'options' => [
                'image' => $image,
                'color' => $color ?: null,
                'size' => $size ?: null,
                'price_detal' => $priceDetal ?: 0
            ]
        ]);
    }

    public function index(){
        $cartItems = Cart::content();
    
        $subtotalDetal = $cartItems->sum(fn($item) => $item->options['price_detal'] * $item->qty);
        $taxDetal = $cartItems->sum(fn($item) => ($item->options['price_detal'] * $item->qty) * ($item->taxRate / 100));
        $totalDetal = $subtotalDetal + $taxDetal;
    
        return view('cart.index', [
            'subtotalDetal' => number_format($subtotalDetal, 2),
            'taxDetal' => number_format($taxDetal, 2),
            'totalDetal' => number_format($totalDetal, 2),
        ]);
    }

    public function addToCart(Request $request){
        if($request->name && $request->price && $request->image){
            $this->add($request->id, $request->name, $request->quantity, $request->price, $request->image, $request->color, $request->size, $request->price_detal);
        } else {
            $product = Product::find($request->id);
            $image = $product->images()->count() ? $product->images()->first()->url : null;
            $this->add($request->id, $product->name, $request->quantity, $product->price, $image, $request->color, $request->size, $product->priceDetal);
        }

        $items = Cart::content();
        $detalSubtotal = $items->sum(fn($item) => $item->options['price_detal'] * $item->qty);
        $taxDetal = $items->sum(fn($item) => ($item->options['price_detal'] * $item->qty) * ($item->taxRate / 100));
        $totalDetal = $detalSubtotal + $taxDetal;

        return response()->json([
            'success' => 'Has añadido este producto al carrito',
            'count' => Cart::count(),
            'cart_subtotal' => Cart::subtotal(),
            'items' => $items->reverse()->take(2)->reverse(),
            'subtotalDetal' => number_format($detalSubtotal, 2),
            'taxDetal' => number_format($taxDetal, 2),
            'totalDetal' => number_format($totalDetal, 2),
        ]);
    }

    public function updateCartItem(Request $request){
        Cart::update($request->rowId, $request->quantity); 

        $items = Cart::content();
        $detalSubtotal = $items->sum(fn($item) => $item->options['price_detal'] * $item->qty);
        $taxDetal = $items->sum(fn($item) => ($item->options['price_detal'] * $item->qty) * ($item->taxRate / 100));
        $totalDetal = $detalSubtotal + $taxDetal;

        $item = Cart::get($request->rowId);

        return response()->json([
            'success' => 'Producto actualizado en el carrito',
            'count' => Cart::count(),
            'cart_subtotal' => Cart::subtotal(),
            'cart_total' => Cart::total(),
            'cart_tax' => Cart::tax(),
            'subtotalDetal' => number_format($detalSubtotal, 2),
            'taxDetal' => number_format($taxDetal, 2),
            'totalDetal' => number_format($totalDetal, 2),
            'items' => $items->reverse()->take(2)->reverse(),
            'updatedItemQuantity' => $item->qty,
            'updatedItemPrice' => $item->qty * $item->price,    
            'updatedItemPriceDetal' => $item->qty * ($item->options->price_detal ?? $item->price),
        ]);
    }

    public function removeCartItem(Request $request){
        Cart::remove($request->rowId);

        $items = Cart::content();
        $detalSubtotal = $items->sum(fn($item) => $item->options['price_detal'] * $item->qty);
        $taxDetal = $items->sum(fn($item) => ($item->options['price_detal'] * $item->qty) * ($item->taxRate / 100));
        $totalDetal = $detalSubtotal + $taxDetal;

        return response()->json([
            'success' => 'Producto eliminado del carrito',
            'count' => Cart::count(),
            'cart_subtotal' => Cart::subtotal(),
            'cart_total' => Cart::total(),
            'cart_tax' => Cart::tax(),
            'subtotalDetal' => number_format($detalSubtotal, 2),
            'taxDetal' => number_format($taxDetal, 2),
            'totalDetal' => number_format($totalDetal, 2),
            'items' => $items->reverse()->take(2)->reverse()
        ]);
    }

    public function finalizarCompra(){
        return view('cart.checkout');
    }

    public function checkout(){
        $cartItems = Cart::content();

        $order = new Order();
        $order->user_id = Auth::id();
        $order->save();

        foreach($cartItems as $item){
            $order->products()->attach($item->id, [
                'quantity' => $item->qty,
                'color' => isset($item->options['color']) ? $item->options['color'] : null,
                'size' => isset($item->options['size']) ? $item->options['size'] : null
            ]);
        }

        try {
            Mail::to(env('MAIL_TO_ADDRESS'))->send(new CartMail($order));
        } catch (\Exception $e) {
            // Aquí podrías registrar el error si es necesario, pero el proceso continuará
            Log::error('Error enviando correo: ' . $e->getMessage());
        }
        
        Cart::destroy();

        return redirect('completed');
    }

    public function destroy(){
        Cart::destroy();
        
        return redirect()->back()->with('message', 'Carrito Vaciado con éxito!');
    }
}
