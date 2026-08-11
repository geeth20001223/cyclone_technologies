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

        <!-- FontAwesome & Custom Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="/user/assets/css/custom.css">

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

<script>
function togglePasswordVisibility(btn) {
    var wrapper = btn.closest('.password-input-wrapper') || btn.parentElement;
    var input = wrapper ? wrapper.querySelector('input') : null;
    var icon = btn.querySelector('i');
    if (input) {
        if (input.type === 'password') {
            input.type = 'text';
            if (icon) {
                icon.className = 'fa-solid fa-eye';
            }
            btn.setAttribute('title', 'Hide password');
        } else {
            input.type = 'password';
            if (icon) {
                icon.className = 'fa-solid fa-eye-slash';
            }
            btn.setAttribute('title', 'View password');
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var pwdInputs = document.querySelectorAll('input[type="password"]');
    pwdInputs.forEach(function(input) {
        if (!input.closest('.password-input-wrapper')) {
            var wrapper = document.createElement('div');
            wrapper.className = 'password-input-wrapper';
            input.parentNode.insertBefore(wrapper, input);
            wrapper.appendChild(input);

            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'password-toggle-btn';
            btn.setAttribute('tabindex', '-1');
            btn.setAttribute('aria-label', 'Toggle password visibility');
            btn.setAttribute('title', 'View password');
            btn.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
            btn.onclick = function() { togglePasswordVisibility(this); };
            wrapper.appendChild(btn);
        }
    });
});
</script>
    </body>
</html>
