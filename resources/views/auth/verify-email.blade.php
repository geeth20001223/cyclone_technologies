<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            
        </x-slot>
        <img src="/user/assets/imgs/logo/app_logo.png" alt="Logo" style="max-width: 350px; margin: 0 auto; display: block;">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        @if(config('app.debug'))
        <div style="background:#1e3a8a;border:1px solid #3b82f6;border-radius:8px;padding:12px 16px;margin-bottom:16px;">
            <p style="color:#93c5fd;font-size:0.82rem;margin-bottom:8px;">⚡ <strong>Dev Mode:</strong> Email is saved to the log. Click below to view and open your verification link:</p>
            <a href="{{ route('dev.emails') }}" target="_blank"
               style="display:inline-block;background:#2563eb;color:white;padding:7px 14px;border-radius:6px;font-size:0.82rem;text-decoration:none;">
                📬 Open Dev Email Viewer
            </a>
        </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <div>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
