<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario - RESTON</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body>
<div class="hero_area">
    <div class="form-background">
        <div class="user-container">
            <div class="login-form-container">
                <!-- Aquí van tus formularios -->
                <h2 class="login-title">Actualizar Nombre y Email</h2>
                <form method="POST" action="{{ route('user.updateNameEmail') }}">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name">Nuevo Nombre:</label>
                        <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>
                    </div>
                    <div>
                        <label for="email">Nuevo Email:</label>
                        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
                    </div>
                    <button type="submit" class="x-primary-button">Actualizar Nombre y Email</button>
                </form>

                <!-- Formulario para cambiar la contraseña -->
                <div class="password-form-container">
                    <h2 class="login-title">Cambiar Contraseña</h2>
                    <form method="POST" action="{{ route('user.updatePassword') }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="current_password">Contraseña Actual:</label>
                            <input type="password" id="current_password" name="current_password" required>
                        </div>
                        <div>
                            <label for="new_password">Nueva Contraseña:</label>
                            <input type="password" id="new_password" name="new_password" required>
                        </div>
                        <div>
                            <label for="new_password_confirmation">Confirmar Nueva Contraseña:</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
                        </div>
                        <button type="submit" class="x-primary-button">Actualizar Contraseña</button>
                    </form>
                </div>
            </div>

            <div class="image-form-container">
    <h2 class="login-title">Actualizar Foto de Perfil</h2>
    <img id="profile-image" src="" alt="Foto de Perfil" style="display: none; width: 150px; height: auto; border-radius: 10px; margin-bottom: 10px;">
    <form method="POST" action="{{ route('user.updatePhoto') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="photo">Selecciona una foto:</label>
            <input type="file" name="photo" accept="image/*" required>
        </div>
        <button type="submit" class="x-primary-button">Actualizar Foto</button>
    </form>

    <!-- Botón de Inicio -->
    <div>
        <a href="{{ route('welcome') }}" class="x-primary-button">Inicio</a>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Realiza la petición para obtener la imagen del perfil
        fetch('{{ route("user.profileImage") }}')
            .then(response => response.json())
            .then(data => {
                const profileImage = document.getElementById('profile-image');
                profileImage.src = data.imageUrl; 
                profileImage.style.display = 'block'; 
            })
            .catch(error => {
                console.error('Error al obtener la imagen del perfil:', error);
            });
    });
</script>

</body>
</html>
