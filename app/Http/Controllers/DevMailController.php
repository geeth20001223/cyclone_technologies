<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DevMailController extends Controller
{
    public function index()
    {
        if (!config('app.debug')) {
            abort(403, 'Only available in debug mode.');
        }

        $logPath = storage_path('logs/laravel.log');
        $emails = [];

        if (File::exists($logPath)) {
            $content = File::get($logPath);

            // Extract email blocks from log
            preg_match_all('/Message-ID:.*?(?=^\[|\z)/ms', $content, $matches);

            foreach (array_reverse($matches[0]) as $block) {
                // Extract Subject
                preg_match('/^Subject:\s*(.+)$/m', $block, $subjectMatch);
                $subject = $subjectMatch[1] ?? 'No Subject';

                // Extract To
                preg_match('/^To:\s*(.+)$/m', $block, $toMatch);
                $to = $toMatch[1] ?? '';

                // Extract URLs (http links)
                preg_match_all('/https?:\/\/[^\s\]>"]+/', $block, $urlMatches);
                $urls = array_unique($urlMatches[0] ?? []);

                // Filter out irrelevant URLs (keep only app URLs)
                $appUrl = config('app.url');
                $appUrls = array_filter($urls, fn($u) => str_contains($u, '127.0.0.1') || str_contains($u, 'localhost'));

                $emails[] = [
                    'subject' => trim($subject),
                    'to'      => trim($to),
                    'urls'    => array_values($appUrls),
                    'raw'     => substr($block, 0, 800),
                ];

                if (count($emails) >= 20) break;
            }
        }

        return view('dev.emails', compact('emails'));
    }

    public function clear()
    {
        if (!config('app.debug')) {
            abort(403);
        }
        $logPath = storage_path('logs/laravel.log');
        if (File::exists($logPath)) {
            File::put($logPath, '');
        }
        return redirect()->route('dev.emails')->with('cleared', true);
    }
}
