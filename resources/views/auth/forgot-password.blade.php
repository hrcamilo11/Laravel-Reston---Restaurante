<x-guest-layout>
    <!-- Agregar el archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/forgot.css') }}">

    <div class="hero_area"> <!-- Área del héroe para centrar el contenido -->
        <div class="form-background"> <!-- Fondo para el formulario -->
            <div class="mb-4 text-lg text-gray-600 dark:text-gray-400 flex justify-center"> <!-- Cambiar flex-col a justify-center -->
            <p class="text-center">
    {{ __('¿Olvidaste tu contraseña?') }}<br>
    {{ __('No hay problema. Solo indícanos tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña que te permitirá elegir una nueva.') }}
</p>

            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
