<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html, body {
            height: 100%; /* Asegura que el body ocupe toda la altura */
            margin: 0; /* Elimina el margen por defecto */
            overflow: hidden; /* Elimina el scroll si no es necesario */
        }

        .hero_area {
            position: relative; /* Permite el posicionamiento absoluto de elementos hijos */
            width: 100%;
            height: 100vh; /* Ocupa toda la altura de la ventana */
        }

        .bg-box {
            position: absolute; /* Posiciona la imagen detrás del contenido */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/images/fondologin.jpg'); /* Cambia la ruta según tu estructura de directorios */
            background-size: cover; /* Asegura que la imagen cubra toda el área */
            background-position: center; /* Centra la imagen */
            z-index: -1; /* Mantiene la imagen detrás del contenido */
        }

        .login-form-container {
            position: relative; /* Asegura que el contenido se posicione por encima */
            z-index: 1; /* Mantiene el contenido por encima de la imagen */
            display: flex;
            justify-content: center; /* Centra horizontalmente */
            align-items: center; /* Centra verticalmente */
            height: 100%; /* Hace que el contenedor de inicio de sesión ocupe toda la altura */
            padding: 20px; /* Ajusta según necesites */
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">

    <div class="hero_area">
        <div class="bg-box"></div> <!-- La imagen de fondo se aplica aquí -->

        <div class="login-form-container">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            {{ $slot }}
        </div>
    </div>

</body>
</html>
