<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Orden {{ env('APP_NAME') }}</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            background-color: #2d3748;
            color: #ffffff;
        }
        .header img {
            width: 150px;
            margin-bottom: 20px;
        }
        .order-details {
            padding: 20px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .order-details h3 {
            margin: 0 0 15px;
        }
        .order-details p {
            margin: 5px 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            padding: 12px;
            text-align: left;
        }
        .table th {
            background-color: #2d3748;
            color: #ffffff;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f4f4f4;
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            font-size: 12px;
            color: #666666;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://i.postimg.cc/G2fMfBYG/logo-dark.png" alt="{{ env('APP_NAME') }}">
            <h1>Gracias por tu pedido</h1>
        </div>
        <div class="order-details">
            <h3>Detalles de la Orden</h3>
            <p><strong>Numero de Orden:</strong> #{!! $order->order_number !!}</p>
            <p><strong>Fecha:</strong> {!! date('d-m-Y') !!}</p>
            <p><strong>Cliente:</strong> {!! $order->user->name !!}</p>
            <p><strong>Email:</strong> {!! $order->user->email !!}</p>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Talla</th>
                    <th>Color</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->products as $product)
                <tr>
                    <td>{!! $product->name !!}</td>
                    <td>{!! $product->pivot->size ?: 'N/A' !!}</td>
                    <td>
                        @if($product->pivot->color)
                            <div href="#" class="ml-auto mx-md-auto" style="background-color: {{ $product->pivot->color }}; width: 20px; height: 20px; border-radius: 100%;"></div>
                        @else
                            N/A
                        @endif
                    </td>                    
                    <td>${!! number_format($product->price, 2, '.', ',') !!}</td>
                    <td>{!! $product->pivot->quantity !!}</td>
                    <td>${!! number_format($product->pivot->quantity * $product->price, 2, '.', ',') !!}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td><strong>Subtotal</strong></td>
                    <td>${!! number_format($order->subtotal, 2, '.', ',') !!}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td><strong>IVA</strong></td>
                    <td>${!! number_format($order->tax, 2, '.', ',') !!}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td><strong>Total</strong></td>
                    <td>${!! number_format($order->total, 2, '.', ',') !!}</td>
                </tr>
            </tfoot>
        </table>
        <div class="footer">
            &copy; {!! date('Y') !!} {{ env('APP_NAME') }} - Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
