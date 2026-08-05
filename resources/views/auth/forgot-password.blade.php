<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">

        </x-slot>
        <img src="/user/assets/imgs/logo/app_logo.png" alt="Logo"
            style="max-width: 350px; margin: 0 auto; display: block;">

        <div class="mb-4">
            <p class="text-base font-semibold text-gray-800 mb-2">🔐 Forgot your password?</p>
            <p class="text-sm text-gray-600" style="text-align: justify;">
                😊 No problem! Just let us know your email address and we will email you a password reset link that will allow you to choose a new one. 📧
            </p>
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>