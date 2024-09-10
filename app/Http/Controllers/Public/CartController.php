<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Mail\CartMail;
use Mail;
use Cart;
use Auth;

class CartController extends Controller
{
    private function add($id, $name, $quantity, $price, $image){
        Cart::add([
            'id' => $id, 
            'name' => $name, 
            'qty' =>  $quantity, 
            'price' => $price,
            'weight' => 0, 
            'options' => [
                'image' => $image
            ]
        ]);
    }

    public function index(){
        return view('cart.index');
    }

    public function addToCart(Request $request){
        if($request->name && $request->price && $request->image){
            $this->add($request->id, $request->name, $request->quantity, $request->price, $request->image);
        }else{
            $product = Product::find($request->id);
            $image = $product->images()->count() > 0 ? $product->images()->first()->url : null;
            $this->add($request->id, $product->name, $request->quantity, $product->price, $image);
        }

        $count = Cart::count();
        $cart_subtotal = Cart::subtotal();
        $items = Cart::content()->reverse()->take(2)->reverse();

        return response()->json([
            'success' => 'Has añadido este producto al carrito',
            'count' => $count,
            'cart_subtotal' => $cart_subtotal,
            'items' => $items,
        ]);
    }

    public function updateCartItem(Request $request){
        Cart::update($request->rowId, $request->quantity); 

        $count = Cart::count();
        $cart_subtotal = Cart::subtotal();
        $cart_total = Cart::total();
        $cart_tax = Cart::tax();
        $item = Cart::get($request->rowId);

        $items = Cart::content()->reverse()->take(2)->reverse();

        return response()->json([
            'success' => 'Has añadido este producto al carrito',
            'count' => $count,
            'cart_subtotal' => $cart_subtotal,
            'cart_total' => $cart_total,
            'cart_tax' => $cart_tax,
            'items' => $items,
            'updatedItemQuantity' => $item->qty,
            'updatedItemPrice' => $item->qty * $item->price,
        ]);
    }

    public function removeCartItem(Request $request){
        Cart::remove($request->rowId);

        $count = Cart::count();
        $cart_subtotal = Cart::subtotal();
        $cart_total = Cart::total();
        $cart_tax = Cart::tax();

        $items = Cart::content()->reverse()->take(2)->reverse();

        return response()->json([
            'success' => 'Has añadido este producto al carrito',
            'count' => $count,
            'cart_subtotal' => $cart_subtotal,
            'cart_total' => $cart_total,
            'cart_tax' => $cart_tax,
            'items' => $items
        ]);
    }

    public function checkout(){
        $cartItems = Cart::content();

        $order = new Order();
        $order->user_id = Auth::id();
        $order->save();

        foreach($cartItems as $item){
            $order->products()->attach($item->id, [
                'quantity' => $item->qty
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
