<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TwilioService
{
    public static function sendSms(string $to, string $message): bool
    {
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $from = config('services.twilio.number');

        // Clean phone number format
        $to = trim($to);
        if (!str_starts_with($to, '+')) {
            $to = '+' . $to;
        }

        Log::info("SMS Verification Sent via Twilio", [
            'to' => $to,
            'from' => $from,
            'message' => $message,
        ]);

        if (empty($sid) || str_contains($sid, '0000000000')) {
            Log::warning("Twilio SID is placeholder. Simulated SMS output in logs.");
            return true;
        }

        try {
            $response = Http::withBasicAuth($sid, $token)
                ->asForm()
                ->post("https://api.twilio.com/2010-04-01/Accounts/{$sid}/Messages.json", [
                    'From' => $from,
                    'To' => $to,
                    'Body' => $message,
                ]);

            if ($response->successful()) {
                Log::info("Twilio SMS sent successfully to {$to}");
                return true;
            } else {
                Log::error("Twilio SMS failed to {$to}: " . $response->body());
                return false;
            }
        } catch (\Exception $e) {
            Log::error("Twilio SMS Exception: " . $e->getMessage());
            return false;
        }
    }
}
