<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            background: #0d6efd;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .content {
            padding: 20px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #aaa;
            padding: 10px 20px;
            background: #f1f1f1;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background: #0d6efd;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="header">
        <h1>@yield('header')</h1>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        <p>Gracias por usar Eventify. Nos vemos pronto.</p>

        <p>Venta de Boletos Eventify S.A. de C.V., Av. Antea 1032, Jurica, 76100 Santiago de Querétaro, Qro. </p>

        <p>Por favor no respondas a este mensaje. Cualquier respuesta a este mensaje no será contestada o leída. Si tienes cualquier duda o comentario, ponte en contacto con nosotros vía email: eventify.contacto@gmail.com.</p>

        <p>© 2024 Eventify. Todos los derechos reservados.</p>
    </div>
</div>
</body>
</html>
