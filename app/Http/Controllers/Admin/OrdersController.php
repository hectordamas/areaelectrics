<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();
    
        // Filtrar por número de orden o nombre de usuario
        if ($request->filled('search')) {
            $query->where('order_number', $request->search)
                  ->orWhereHas('user', function($q) use ($request) {
                      $q->where('name', 'like', '%'.$request->search.'%');
                  });
        }
    
        // Filtrar por estado de la orden
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
    
        // Obtener las órdenes para la página actual
        $orders = $query->orderBy('id', 'desc')->paginate(10);
    
        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }
    
    public function show($id, Request $request){

        $order = Order::find($id);
        $order->is_read = true;
        $order->save();

        return view('admin.orders.show', [
            'order' => $order,
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->back()
            ->with('message', 'Estado de la orden actualizado correctamente.');
    }
}
