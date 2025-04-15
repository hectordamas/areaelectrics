<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Orden</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #fff;
            color: #232323;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
        table, th, td {
            border: none;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" width="33%">
                <img src="{!! public_path('assets/images/logo_dark.png') !!}" width="150" class="logo"/>
            </td>
            <td align="left" width="33%">
                <strong>E-Mail:</strong> info@airanzasexshop.com.ve <br>
                <strong>Whatsapp: </strong> +58 412 020 6548 <br>
            </td>
            <td align="left" width="30%">
                <strong>Numero de Orden:</strong> #{{ $order->order_number }} <br>
                <strong>Fecha:</strong> {{ date('d-m-Y') }} <br>
                <strong>Cliente:</strong>{{ $order->user->name }}<br>
                <strong>E-Mail:</strong>{{ $order->user->email }}<br>
            </td>
        </tr>

    </table>
</div>


<div class="invoice">
    <h3>Detalles de la Orden</h3>
    <table width="100%">
        <thead style="background: #2d3748;">
            <tr>
                <th style="color: #fff;">Descripción</th>
                <th style="color: #fff;">Talla</th>
                <th style="color: #fff;">Color</th>
                <th style="color: #fff;">Precio</th>
                <th style="color: #fff;">Cantidad</th>
                <th style="color: #fff;">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{!! $product->pivot->size !!}</td>
                    <td>
                        @if($product->pivot->color)
                            <div href="#" class="ml-auto mx-md-auto" style="background-color: {{ $product->pivot->color }}; width: 20px; height: 20px; border-radius: 100%;"></div>
                        @else
                            N/A
                        @endif
                    </td>                    
                    <td>${{ number_format($product->price, 2, '.', ',') }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>${{ number_format($product->pivot->quantity * $product->price, 2, '.', ',') }}</td>
                </tr>
            @endforeach
        </tbody>

        <tfoot style="background: #2d3748;">
            <tr>
                <td colspan="4"></td>
                <td align="left" style="color: #fff;">Subtotal</td>
                <td align="left" style="color: #fff;">$ {{ number_format($order->subtotal, 2, '.', ',') }}</td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td align="left" style="color: #fff;">IVA</td>
                <td align="left" style="color: #fff;">$ {{ number_format($order->tax, 2, '.', ',') }}</td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td align="left" style="color: #fff;">Total</td>
                <td align="left" style="color: #fff;">$ {{ number_format($order->total, 2, '.', ',') }}</td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ env('APP_NAME') }} - Todos los derechos reservados.
            </td>
        </tr>

    </table>
</div>
</body>
</html>