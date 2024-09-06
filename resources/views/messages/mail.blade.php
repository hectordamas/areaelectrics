<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - Nuevo Mensaje</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            padding: 20px;
            border-radius: 5px;
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            color: #007bff;
            font-size: 20px;
            margin-bottom: 15px;
        }
        .content p {
            font-size: 16px;
            margin: 5px 0;
        }
        .content p strong {
            color: #007bff;
        }
        .footer {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #777777;
            border-radius: 0 0 5px 5px;
        }
    </style>
</head>
<body>

<div class="email-container">
    <div class="header">
        <img src="https://i.postimg.cc/3RQFQZ08/logo-light.png" alt="Fiber Solutions">
        <h1>Nuevo Mensaje Recibido</h1>
    </div>

    <div class="content">
        <h2>Detalles del Mensaje</h2>
        <p><strong>Nombre:</strong> {!! $name !!}</p>
        <p><strong>Email:</strong> <a href="mailto:{!! $email !!}">{!! $email !!}</a></p>
        <p><strong>Teléfono:</strong> {!! $telephone !!}</p>
        <p><strong>Asunto:</strong> {!! $subject !!}</p>
        <p><strong>Mensaje:</strong></p>
        <p>{!! $body !!}</p>
    </div>

    <div class="footer">
        <p>Este correo electrónico se generó automáticamente. Por favor, no responda a este mensaje.</p>
        <p>&copy; {!! date('Y') !!} {!! env('APP_NAME') !!}. Todos los derechos reservados.</p>
    </div>
</div>

</body>
</html>
