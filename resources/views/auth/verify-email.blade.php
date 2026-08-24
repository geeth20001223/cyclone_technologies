<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            
        </x-slot>

        <div style="text-align: center; margin-bottom: 20px;">
            <img src="/user/assets/imgs/logo/app_logo.png" alt="Logo" style="max-width: 260px; margin: 0 auto 12px auto; display: block;">
            <h3 style="font-size: 1.25rem; font-weight: 800; color: #1e293b; margin: 0 0 6px 0;">Account Verification Hub</h3>
            <p style="font-size: 0.875rem; color: #64748b; margin: 0; line-height: 1.4;">
                Choose your preferred verification method below to activate your account and enter Cyclone Technologies:
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div style="margin-bottom: 16px; padding: 12px; background-color: #ecfdf5; border: 1px solid #a7f3d0; color: #047857; border-radius: 8px; font-size: 0.85rem; text-align: center; font-weight: 600;">
                ✉️ A fresh verification email link has been sent to your email address!
            </div>
        @endif

        <x-validation-errors class="mb-4" style="color: #dc2626; font-size: 0.85rem;"/>

        <!-- METHOD 1: EMAIL VERIFICATION -->
        <div style="margin-bottom: 16px; padding: 16px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <span style="font-size: 1.5rem; margin-right: 10px;">✉️</span>
                <div>
                    <h4 style="font-size: 0.95rem; font-weight: 700; color: #1e293b; margin: 0;">Method 1: Email Verification Link</h4>
                    <p style="font-size: 0.8rem; color: #64748b; margin: 2px 0 0 0;">Check your inbox for the link we sent, or resend below.</p>
                </div>
            </div>
            <form method="POST" action="{{ route('verification.send') }}" style="margin-top: 12px;">
                @csrf
                <button type="submit" style="display: block; width: 100%; padding: 10px 16px; background-color: #2563eb; color: #ffffff; border-radius: 8px; font-weight: 600; font-size: 0.875rem; text-align: center; border: none; cursor: pointer;">
                    Resend Verification Email
                </button>
            </form>
        </div>

        <!-- METHOD 2: MOBILE SMS OTP (TWILIO) -->
        <div style="margin-bottom: 16px; padding: 16px; background-color: #fffbeb; border: 1px solid #fde68a; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <span style="font-size: 1.5rem; margin-right: 10px;">📱</span>
                <div>
                    <h4 style="font-size: 0.95rem; font-weight: 700; color: #78350f; margin: 0;">Method 2: Mobile SMS OTP Code</h4>
                    <p style="font-size: 0.8rem; color: #92400e; margin: 2px 0 0 0;">Receive a 6-digit SMS code on your phone via Twilio.</p>
                </div>
            </div>
            <div style="margin-top: 12px;">
                <a href="{{ route('sms.verify') }}" style="display: block; width: 100%; padding: 10px 16px; background: linear-gradient(135deg, #d97706, #ea580c); color: #ffffff; border-radius: 8px; font-weight: 700; font-size: 0.875rem; text-align: center; text-decoration: none; border: none; box-sizing: border-box;">
                    Verify via Mobile SMS (Twilio OTP) →
                </a>
            </div>
        </div>

        <!-- METHOD 3: ACCOUNT PASSWORD CREDENTIALS -->
        <div style="margin-bottom: 16px; padding: 16px; background-color: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <span style="font-size: 1.5rem; margin-right: 10px;">🔑</span>
                <div>
                    <h4 style="font-size: 0.95rem; font-weight: 700; color: #065f46; margin: 0;">Method 3: Confirm Password Credentials</h4>
                    <p style="font-size: 0.8rem; color: #047857; margin: 2px 0 0 0;">Enter your account password below to verify instantly.</p>
                </div>
            </div>
            <form method="POST" action="{{ route('verify.password') }}" style="margin-top: 12px;">
                @csrf
                <div style="margin-bottom: 10px; position: relative;">
                    <input type="password" name="password" id="verify_password_input" required autocomplete="current-password" placeholder="Enter Your Password (e.g. 12345678)" 
                           style="display: block; width: 100%; padding: 10px 42px 10px 14px; border: 1.5px solid #a7f3d0; border-radius: 8px; font-size: 0.875rem; color: #1e293b; background-color: #ffffff; box-sizing: border-box;">
                    <button type="button" onclick="toggleVerifyPassword()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #059669; cursor: pointer; font-size: 1.1rem;" title="Show/Hide Password">
                        👁️
                    </button>
                </div>
                <button type="submit" style="display: block; width: 100%; padding: 10px 16px; background-color: #059669; color: #ffffff; border-radius: 8px; font-weight: 700; font-size: 0.875rem; text-align: center; border: none; cursor: pointer;">
                    Verify &amp; Enter System Immediately →
                </button>
            </form>
        </div>

        <script>
        function toggleVerifyPassword() {
            var input = document.getElementById('verify_password_input');
            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        }
        </script>

        <div style="margin-top: 20px; text-align: center; border-top: 1px solid #e2e8f0; padding-top: 12px;">
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #64748b; font-size: 0.8rem; text-decoration: underline; cursor: pointer;">
                    Log Out of Account
                </button>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
