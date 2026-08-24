<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            
        </x-slot>

        <div class="text-center mb-4">
            <img src="/user/assets/imgs/logo/app_logo.png" alt="Logo" style="max-width: 320px; margin: 0 auto; display: block;">
            <h3 class="text-xl font-bold text-gray-800 mt-3">Account Verification Hub</h3>
            <p class="text-sm text-gray-600 mt-1">
                Choose your preferred verification method below to activate your account and enter Cyclone Technologies:
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm text-center font-medium">
                ✉️ A fresh verification email link has been sent to your email address!
            </div>
        @endif

        <x-validation-errors class="mb-4 text-red-600 text-sm"/>

        <!-- METHOD 1: EMAIL VERIFICATION -->
        <div class="mb-4 p-4 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow transition">
            <div class="flex items-center mb-2">
                <span class="text-2xl mr-2">✉️</span>
                <div>
                    <h4 class="font-bold text-gray-800 text-base">Method 1: Email Verification Link</h4>
                    <p class="text-xs text-gray-500">Check your inbox for the link we sent, or resend below.</p>
                </div>
            </div>
            <form method="POST" action="{{ route('verification.send') }}" class="mt-3">
                @csrf
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-lg shadow transition flex items-center justify-center">
                    Resend Verification Email
                </button>
            </form>
        </div>

        <!-- METHOD 2: MOBILE SMS OTP (TWILIO) -->
        <div class="mb-4 p-4 bg-amber-50 border border-amber-200 rounded-xl shadow-sm hover:shadow transition">
            <div class="flex items-center mb-2">
                <span class="text-2xl mr-2">📱</span>
                <div>
                    <h4 class="font-bold text-amber-900 text-base">Method 2: Mobile SMS OTP Code</h4>
                    <p class="text-xs text-amber-700">Receive a 6-digit SMS code on your phone via Twilio.</p>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('sms.verify') }}" class="w-full py-2 px-4 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-bold text-sm rounded-lg shadow transition flex items-center justify-center text-center">
                    Verify via Mobile SMS (Twilio OTP) →
                </a>
            </div>
        </div>

        <!-- METHOD 3: ACCOUNT PASSWORD CREDENTIALS -->
        <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 rounded-xl shadow-sm hover:shadow transition">
            <div class="flex items-center mb-2">
                <span class="text-2xl mr-2">🔑</span>
                <div>
                    <h4 class="font-bold text-emerald-900 text-base">Method 3: Confirm Password Credentials</h4>
                    <p class="text-xs text-emerald-700">Enter your account password below to verify instantly.</p>
                </div>
            </div>
            <form method="POST" action="{{ route('verify.password') }}" class="mt-3">
                @csrf
                <div class="mb-3">
                    <input type="password" name="password" required placeholder="Enter Your Account Password" 
                           class="w-full px-3 py-2 border border-emerald-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none text-gray-800">
                </div>
                <button type="submit" class="w-full py-2 px-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm rounded-lg shadow transition">
                    Verify &amp; Enter System Immediately →
                </button>
            </form>
        </div>

        <div class="mt-4 text-center border-t pt-3">
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-xs text-gray-500 hover:text-gray-800 underline">
                    Log Out of Account
                </button>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
