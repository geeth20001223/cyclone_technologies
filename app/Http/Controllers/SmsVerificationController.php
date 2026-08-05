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
}
