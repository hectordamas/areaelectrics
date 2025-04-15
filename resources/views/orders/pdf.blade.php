<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Orden</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
    <style>
        * {
            font-family: 'Segoe UI', sans-serif;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-size: 13px;
            color: #2d3748;
            background-color: #ffffff;
        }

        h3 {
            margin: 0 0 10px;
            color: #165c82;
            border-bottom: 2px solid #165c82;
            padding-bottom: 5px;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th, td {
            padding: 10px 8px;
            text-align: left;
            vertical-align: middle;
        }

        thead th {
            background-color: #165c82;
            color: #ffffff;
            font-weight: bold;
            border-bottom: 1px solid #ccc;
        }

        tbody tr:nth-child(even) {
            background-color: #f7fafc;
        }

        tfoot td {
            background-color: #edf2f7;
            font-weight: bold;
            color: #2d3748;
            border-top: 2px solid #cbd5e0;
        }

        .information {
            padding: 20px;
            background-color: #f1f5f9;
            border-bottom: 2px solid #e2e8f0;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 12px 20px;
            background-color: #f7fafc;
            font-size: 12px;
            color: #4a5568;
            border-top: 1px solid #e2e8f0;
            text-align: center;
        }

        .logo {
            margin-bottom: 10px;
        }

        .info-table td {
            vertical-align: top;
            font-size: 13px;
        }

        .totals td {
            text-align: right;
        }
    </style>
</head>
<body>

<div class="information">
    <table class="info-table">
        <tr>
            <td width="33%">
                <img src="{!! public_path('assets/images/logo_dark.png') !!}" width="140" class="logo">
            </td>
            <td width="33%">
                <strong>Email:</strong> info@areaelectric.com.ve<br>
                <strong>Whatsapp:</strong> +58 412 020 6548
            </td>
            <td width="34%">
                <strong>Orden:</strong> #{{ $order->order_number }}<br>
                <strong>Fecha:</strong> {{ date('d-m-Y') }}<br>
                <strong>Cliente:</strong> {{ $order->user->name }}<br>
                <strong>Email:</strong> {{ $order->user->email }}
            </td>
        </tr>
    </table>
</div>

<div class="invoice">
    <h3>Detalles de la Orden</h3>
    <table>
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
                <td colspan="3"></td>
                <td><strong>Subtotal</strong></td>
                <td>${{ number_format($order->subtotal, 2, '.', ',') }}</td>
                <td>${{ number_format($order->subtotalDetal, 2, '.', ',') }}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><strong>IVA</strong></td>
                <td>${{ number_format($order->tax, 2, '.', ',') }}</td>
                <td>${{ number_format($order->taxDetal, 2, '.', ',') }}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><strong>Total</strong></td>
                <td>${{ number_format($order->total, 2, '.', ',') }}</td>
                <td>${{ number_format($order->totalDetal, 2, '.', ',') }}</td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="footer">
    &copy; {{ date('Y') }} {{ env('APP_NAME') }} — Todos los derechos reservados.
</div>

</body>
</html>
