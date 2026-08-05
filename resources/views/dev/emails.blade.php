<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev Email Viewer</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #0f1117; color: #e2e8f0; min-height: 100vh; }
        .header {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            border-bottom: 1px solid #334155;
            padding: 20px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header h1 { font-size: 1.4rem; color: #38bdf8; }
        .header span { font-size: 0.8rem; color: #64748b; }
        .badge { background: #ef4444; color: white; font-size: 0.7rem; padding: 2px 8px; border-radius: 20px; margin-left: 8px; }
        .container { max-width: 900px; margin: 30px auto; padding: 0 20px; }
        .actions { display: flex; gap: 10px; margin-bottom: 20px; }
        .btn { padding: 8px 18px; border-radius: 8px; font-size: 0.85rem; cursor: pointer; border: none; text-decoration: none; display: inline-block; }
        .btn-danger { background: #ef4444; color: white; }
        .btn-info { background: #0284c7; color: white; }
        .alert { background: #15803d; color: #dcfce7; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 0.9rem; }
        .empty { text-align: center; padding: 60px; color: #475569; }
        .empty svg { width: 60px; height: 60px; margin: 0 auto 16px; display: block; opacity: 0.3; }
        .email-card {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            margin-bottom: 16px;
            overflow: hidden;
            transition: border-color 0.2s;
        }
        .email-card:hover { border-color: #38bdf8; }
        .email-header {
            padding: 16px 20px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            cursor: pointer;
        }
        .email-subject { font-size: 1rem; font-weight: 600; color: #f1f5f9; margin-bottom: 4px; }
        .email-to { font-size: 0.8rem; color: #64748b; }
        .expand-btn { color: #38bdf8; font-size: 0.8rem; white-space: nowrap; padding-left: 12px; }
        .email-links { padding: 0 20px 16px; border-top: 1px solid #334155; padding-top: 14px; }
        .link-label { font-size: 0.75rem; color: #94a3b8; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.05em; }
        .action-link {
            display: block;
            background: #0f172a;
            border: 1px solid #1e40af;
            border-radius: 8px;
            padding: 10px 14px;
            color: #60a5fa;
            text-decoration: none;
            font-size: 0.82rem;
            word-break: break-all;
            margin-bottom: 8px;
            transition: all 0.2s;
        }
        .action-link:hover { background: #1e3a8a; color: #93c5fd; border-color: #3b82f6; }
        .action-link-btn {
            display: inline-block;
            background: #16a34a;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.85rem;
            text-decoration: none;
            margin-top: 6px;
            transition: background 0.2s;
        }
        .action-link-btn:hover { background: #15803d; }
        .no-links { font-size: 0.85rem; color: #64748b; font-style: italic; }
    </style>
</head>
<body>
<div class="header">
    <div>
        <h1>📬 Dev Email Viewer <span class="badge">DEBUG ONLY</span></h1>
        <span>Emails sent by the application (stored in logs)</span>
    </div>
    <a href="{{ route('home') }}" style="color:#64748b;font-size:0.85rem;text-decoration:none;">← Back to App</a>
</div>

<div class="container">
    @if(session('cleared'))
    <div class="alert">✅ Log cleared successfully.</div>
    @endif

    <div class="actions">
        <form method="POST" action="{{ route('dev.emails.clear') }}" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('Clear all logs?')">🗑 Clear Log</button>
        </form>
        <a href="{{ route('dev.emails') }}" class="btn btn-info">↻ Refresh</a>
    </div>

    @if(count($emails) === 0)
    <div class="empty">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
        </svg>
        <p style="font-size:1.1rem;margin-bottom:8px;">No emails found</p>
        <p style="font-size:0.85rem;">Try registering or using "Forgot Password" — emails will appear here.</p>
    </div>
    @else
    @foreach($emails as $email)
    <div class="email-card">
        <div class="email-header">
            <div>
                <div class="email-subject">{{ $email['subject'] }}</div>
                <div class="email-to">To: {{ $email['to'] }}</div>
            </div>
            <span class="expand-btn">{{ count($email['urls']) }} link(s)</span>
        </div>
        <div class="email-links">
            @if(count($email['urls']) > 0)
            <div class="link-label">Action Links — Click to use:</div>
            @foreach($email['urls'] as $url)
            <a href="{{ $url }}" class="action-link">{{ $url }}</a>
            <a href="{{ $url }}" class="action-link-btn" target="_blank">→ Open Link</a>
            @endforeach
            @else
            <span class="no-links">No action links found in this email.</span>
            @endif
        </div>
    </div>
    @endforeach
    @endif
</div>
</body>
</html>
