<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Message;
use App\Models\Product;
use Carbon\Carbon;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'Administrador'){

            $unreadOrders = Order::where('is_read', false)->count();
            $unreadMessages = Message::where('is_read', false)->count();

            $totalSalesThisMonth = Order::where('status', 'Finalizada')
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->get()
            ->sum('total'); // Asume que tienes un campo 'total' en Order
    
            // Obtener el total de órdenes finalizadas del año actual
            $totalSalesThisYear = Order::where('status', 'Finalizada')
            ->whereYear('created_at', date('Y'))
            ->get()
            ->sum('total'); // Asume que tienes un campo 'total' en Order

            $now = Carbon::now();
            $months = [];
            $salesData = [];

            for ($i = 0; $i < 12; $i++) {
                // Retroceder mes por mes
                $month = $now->copy()->subMonths($i);
                $months[] = $month->format('M Y'); // Ejemplo: "Aug 2023"
            
                // Sumar las ventas totales de las órdenes finalizadas para el mes
                $total = Order::whereYear('created_at', $month->year)
                    ->whereMonth('created_at', $month->month)
                    ->where('status', 'Finalizada')
                    ->get()
                    ->sum('total');
            
                $salesData[] = $total;
            }

            // Invertir los arrays para que los datos estén en orden cronológico
            $months = array_reverse($months);
            $salesData = array_reverse($salesData);

            $topProducts = DB::table('order_product')
                ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
                ->groupBy('product_id')
                ->orderBy('total_quantity', 'desc')
                ->limit(10) // Limita a los 10 productos más vendidos
                ->get();

            // Obtener los nombres de los productos directamente en una colección asociativa
            $products = Product::whereIn('id', $topProducts->pluck('product_id'))
                ->pluck('name', 'id');

            // Crear arrays para labels y valores
            $labelsTopProducts = [];
            $valuesTopProducts = [];

            foreach ($topProducts as $item) {
                $labelsTopProducts[] = $products->get($item->product_id);
                $valuesTopProducts[] = $item->total_quantity;
            }

            $orders = Order::orderBy('id', 'desc')
            ->get()
            ->take(3);

            $messages = Message::where('id', 'desc')
            ->get()
            ->take(3);


            return view('admin.index', [
                'orders' => $orders,
                'messages' => $messages,

                'unreadOrders' => $unreadOrders,
                'unreadMessages' => $unreadMessages,

                'totalSalesThisMonth' => $totalSalesThisMonth,
                'totalSalesThisYear' => $totalSalesThisYear,

                'months' => $months,
                'salesData' => $salesData,


                'labelsTopProducts' => $labelsTopProducts,
                'valuesTopProducts' => $valuesTopProducts
            ]);
        }

        return redirect('/');

    }
}
