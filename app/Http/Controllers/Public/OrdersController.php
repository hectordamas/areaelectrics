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

    public function loginToOrder(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);
    
        // Verificar las credenciales
        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            // Autenticación exitosa, redirigir a la página de orden o al carrito
            return redirect('checkout');
            //->with('message', 'Has iniciado sesión exitosamente. Ya puedes finalizar tu compra!');
        } else {
            // Autenticación fallida, redirigir de vuelta con un mensaje de error
            return back()->withErrors(['email' => 'Usuario o clave inválidos.']);
        }
    }

    public function registerToOrder(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'address' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
        ]);

        // Crear un nuevo usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'address' => $validated['address'],
            'telephone' => $validated['telephone'],
        ]);

        // Iniciar sesión automáticamente después del registro
        Auth::login($user);

        // Redirigir al checkout o página de finalización de compra
        return redirect('checkout');
    }
}
