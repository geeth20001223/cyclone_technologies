<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\TwilioService;
use RealRashid\SweetAlert\Facades\Alert;

class SmsVerificationController extends Controller
{
    public function showVerifyForm()
    {
        $user = Auth::user();

        if ($user && $user->sms_verified_at) {
            return redirect('/');
        }

        return view('auth.verify-sms', compact('user'));
    }

    public function verifySms(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:10',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect('login');
        }

        if (trim($request->code) == trim($user->sms_code)) {
            $user->sms_verified_at = now();
            $user->save();

            Alert::success('Verified!', 'Mobile number verified successfully.');
            return redirect('/');
        }

        Alert::error('Verification Failed', 'Invalid SMS code. Please check your phone and try again.');
        return redirect()->back()->withErrors(['code' => 'Invalid SMS code.']);
    }

    public function resendSms()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('login');
        }

        $newCode = (string) rand(100000, 999999);
        $user->sms_code = $newCode;
        $user->save();

        $message = "Your new Cyclone Technologies verification code is: {$newCode}";
        TwilioService::sendSms($user->phone ?? '', $message);

        Alert::success('Code Sent!', 'A new SMS verification code has been sent to your mobile number.');
        return redirect()->back();
    }

    // ----------------------------------------------------
    // SMS OTP LOGIN (For users whose email is not working)
    // ----------------------------------------------------

    public function showSmsLoginForm()
    {
        return view('auth.login-sms');
    }

    public function sendSmsLoginOtp(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
        ]);

        $search = trim($request->login);
        $user = \App\Models\User::where('phone', $search)
            ->orWhere('email', $search)
            ->first();

        if (!$user) {
            Alert::error('User Not Found', 'No account found with this phone number or email.');
            return redirect()->back()->withErrors(['login' => 'No account found with this phone number or email.']);
        }

        $otp = (string) rand(100000, 999999);
        $user->sms_code = $otp;
        $user->save();

        $message = "Your Cyclone Technologies login OTP is: {$otp}";
        TwilioService::sendSms($user->phone ?? '', $message);

        session(['sms_login_user_id' => $user->id]);

        Alert::success('OTP Sent!', 'Login OTP sent to mobile number: ' . ($user->phone ?? 'your phone'));
        return redirect()->route('sms.login.verify');
    }

    public function showSmsLoginVerifyForm()
    {
        $userId = session('sms_login_user_id');
        if (!$userId) {
            return redirect()->route('sms.login');
        }

        $user = \App\Models\User::find($userId);
        if (!$user) {
            return redirect()->route('sms.login');
        }

        return view('auth.verify-sms-login', compact('user'));
    }

    public function verifySmsLoginOtp(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:10',
        ]);

        $userId = session('sms_login_user_id');
        if (!$userId) {
            return redirect()->route('sms.login');
        }

        $user = \App\Models\User::find($userId);
        if (!$user) {
            return redirect()->route('sms.login');
        }

        if (trim($request->code) == trim($user->sms_code)) {
            $user->sms_verified_at = now();
            if (!$user->email_verified_at) {
                $user->email_verified_at = now();
            }
            $user->save();

            Auth::login($user);
            session()->forget('sms_login_user_id');

            Alert::success('Welcome Back!', 'Logged in successfully via Mobile SMS OTP.');

            if ($user->usertype == '1') {
                return redirect()->route('admin.show_product');
            }

            return redirect('/');
        }

        Alert::error('Invalid OTP', 'Invalid SMS code. Please check your phone and try again.');
        return redirect()->back()->withErrors(['code' => 'Invalid SMS OTP code.']);
    }
}
