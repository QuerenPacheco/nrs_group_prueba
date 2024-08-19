<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
        }
        .button {
            display: inline-block;
            padding: 20px 40px;
            margin: 10px;
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            background-color: #007bff;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('clientes.index') }}" class="button">Clientes</a>
        <a href="{{ route('proveedores.index') }}" class="button">Proveedores</a>
    </div>
</body>
</html>
