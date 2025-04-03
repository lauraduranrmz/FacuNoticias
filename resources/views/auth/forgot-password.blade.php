<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
        <img src="{{ asset('images/oso_fime.png') }}" alt="Logo" class="w-20 h-20">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidaste tu contraseña? No hay problema. Simplemente escribe tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña') }}
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Enviar correo') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
