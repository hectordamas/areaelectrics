<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use Cart;
use Auth;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::orderBy('id', 'desc')
        ->where('user_id', Auth::id())
        ->get();

        return view('orders.index', [
            'orders' => $orders
        ]);
    }

    public function show($id){
        $order = Order::find($id);

        return view('orders.show', [
            'order' => $order
        ]);
    } 

    public function downloadInvoice($id){
        $order = Order::find($id);

        $pdf = Pdf::loadView('orders.pdf', [
            'order' => $order
        ]);

        return $pdf->download('fibersolutions_orden_'. $order->order_number .'.pdf');
    }
}
