<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Orden {{ env('APP_NAME') }}</title>
    <style type="text/css">
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f4f8;
        }
        .container {
            width: 100%;
            max-width: 620px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
        }
        .header {
            background-color: #1a202c;
            color: #ffffff;
            text-align: center;
            padding: 30px 20px 20px;
        }
        .header img {
            width: 140px;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
        }
        .order-details {
            padding: 20px 30px;
            background-color: #f9fafb;
        }
        .order-details h3 {
            margin-top: 0;
            color: #2d3748;
        }
        .order-details p {
            margin: 5px 0;
            color: #4a5568;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto 30px;
        }
        .table th, .table td {
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }
        .table th {
            background-color: #2d3748;
            color: #ffffff;
        }
        .table tr:nth-child(even) {
            background-color: #f7fafc;
        }
        .table tfoot td {
            font-weight: bold;
            background-color: #edf2f7;
            color: #2d3748;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #718096;
            background-color: #f7fafc;
        }
        @media screen and (max-width: 600px) {
            .container {
                border-radius: 0;
            }
            .order-details, .table {
                padding: 15px !important;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{!! asset('assets/images/logo_dark.png') !!}" alt="{{ env('APP_NAME') }}">
            <h1>¡Gracias por tu pedido!</h1>
        </div>
        <div class="order-details">
            <h3>Detalles de la Orden</h3>
            <p><strong>Número de Orden:</strong> #{{ $order->order_number }}</p>
            <p><strong>Fecha:</strong> {{ date('d-m-Y') }}</p>
            <p><strong>Cliente:</strong> {{ $order->user->name }}</p>
            <p><strong>Email:</strong> {{ $order->user->email }}</p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Precio Mayor</th>
                    <th>Precio Detal</th>
                    <th>Cantidad</th>
                    <th>Total Mayor</th>
                    <th>Total Detal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2, '.', ',') }}</td>
                    <td>${{ number_format($product->priceDetal, 2, '.', ',') }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>${{ number_format($product->pivot->quantity * $product->price, 2, '.', ',') }}</td>
                    <td>${{ number_format($product->pivot->quantity * $product->priceDetal, 2, '.', ',') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" align="right">Subtotal</td>
                    <td>${{ number_format($order->subtotal, 2, '.', ',') }}</td>
                    <td>${{ number_format($order->subtotalDetal, 2, '.', ',') }}</td>
                </tr>
                <tr>
                    <td colspan="3" align="right">IVA</td>
                    <td>${{ number_format($order->tax, 2, '.', ',') }}</td>
                    <td>${{ number_format($order->taxDetal, 2, '.', ',') }}</td>
                </tr>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td>${{ number_format($order->total, 2, '.', ',') }}</td>
                    <td>${{ number_format($order->totalDetal, 2, '.', ',') }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="footer">
            &copy; {{ date('Y') }} {{ env('APP_NAME') }} — Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
