<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Message</title>
</head>
<body style="margin:0;padding:0;background-color:#f1f5f9;font-family:'Segoe UI',Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f1f5f9;padding:40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" border="0"
                    style="max-width:600px;width:100%;background:#ffffff;border-radius:20px;overflow:hidden;box-shadow:0 8px 40px rgba(30,58,138,0.10);">

                    <!-- Header -->
                    <tr>
                        <td style="background:linear-gradient(135deg,#1e3a8a 0%,#4f46e5 100%);padding:40px 48px;text-align:center;">
                            <div style="display:inline-block;background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.25);border-radius:50px;padding:6px 20px;color:#c7d2fe;font-size:12px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:18px;">
                                📡 New Contact Message
                            </div>
                            <div style="font-size:28px;font-weight:900;color:#ffffff;letter-spacing:-0.02em;margin-bottom:8px;">
                                ✉️ CYCLONE TECHNOLOGIES
                            </div>
                            <div style="font-size:14px;color:#a5b4fc;letter-spacing:0.06em;">
                                Someone reached out through the contact form
                            </div>
                        </td>
                    </tr>

                    <!-- Accent bar -->
                    <tr>
                        <td style="height:4px;background:linear-gradient(90deg,#3b82f6,#6366f1,#a855f7);"></td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:40px 48px;">

                            <!-- Intro -->
                            <p style="font-size:15px;color:#374151;line-height:1.7;margin:0 0 28px;">
                                Hi <strong>Shamal</strong> 👋, you have a new message from the <strong>Cyclone Technologies</strong> contact form. Details are below:
                            </p>

                            <!-- Info Cards -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:28px;">
                                <tr>
                                    <td width="48%" style="background:#eff6ff;border:1px solid #bfdbfe;border-radius:12px;padding:18px 20px;vertical-align:top;">
                                        <div style="font-size:11px;font-weight:700;color:#1e40af;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:6px;">👤 Name</div>
                                        <div style="font-size:15px;font-weight:600;color:#1e293b;">{{ $senderName }}</div>
                                    </td>
                                    <td width="4%"></td>
                                    <td width="48%" style="background:#f0f4ff;border:1px solid #c7d2fe;border-radius:12px;padding:18px 20px;vertical-align:top;">
                                        <div style="font-size:11px;font-weight:700;color:#4338ca;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:6px;">📧 Email</div>
                                        <div style="font-size:15px;font-weight:600;color:#1e293b;">
                                            <a href="mailto:{{ $senderEmail }}" style="color:#4f46e5;text-decoration:none;">{{ $senderEmail }}</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr><td colspan="3" style="height:12px;"></td></tr>
                                <tr>
                                    <td width="48%" style="background:#ecfdf5;border:1px solid #a7f3d0;border-radius:12px;padding:18px 20px;vertical-align:top;">
                                        <div style="font-size:11px;font-weight:700;color:#065f46;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:6px;">📱 Phone</div>
                                        <div style="font-size:15px;font-weight:600;color:#1e293b;">
                                            @if($senderPhone)
                                                {{ $senderPhone }}
                                            @else
                                                <span style="color:#94a3b8;font-weight:400;">Not provided</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td width="4%"></td>
                                    <td width="48%" style="background:#fff7ed;border:1px solid #fed7aa;border-radius:12px;padding:18px 20px;vertical-align:top;">
                                        <div class="font-size:11px;font-weight:700;color:#c2410c;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:6px;">📌 Subject</div>
                                        <div style="font-size:15px;font-weight:600;color:#1e293b;">{{ $mailSubject }}</div>
                                    </td>
                                </tr>
                            </table>

                            <!-- Message block -->
                            <div style="background:#f8fafc;border-left:4px solid #3b82f6;border-radius:0 12px 12px 0;padding:24px 28px;margin-bottom:32px;">
                                <div style="font-size:11px;font-weight:700;color:#1e40af;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:12px;">💬 Message</div>
                                <p style="font-size:15px;color:#334155;line-height:1.8;margin:0;white-space:pre-line;">{{ $userMessage }}</p>
                            </div>

                            <!-- Reply CTA -->
                            <div style="text-align:center;margin-bottom:32px;">
                                <a href="mailto:{{ $senderEmail }}?subject=Re: {{ $mailSubject }}"
                                   style="display:inline-block;padding:14px 40px;background:linear-gradient(135deg,#2563eb,#4f46e5);color:#ffffff;font-size:14px;font-weight:700;border-radius:50px;text-decoration:none;letter-spacing:0.04em;box-shadow:0 4px 20px rgba(59,130,246,0.35);">
                                    ↩️ Reply to {{ $senderName }}
                                </a>
                            </div>

                            <!-- Divider -->
                            <hr style="border:none;border-top:1px solid #e2e8f0;margin:0 0 24px;">

                            <!-- Footer note -->
                            <p style="font-size:12px;color:#94a3b8;text-align:center;margin:0;line-height:1.6;">
                                This email was automatically sent from the contact form at<br>
                                <strong style="color:#64748b;">Cyclone Technologies</strong> — Wariyapola, Sri Lanka 🇱🇰
                            </p>
                        </td>
                    </tr>

                    <!-- Bottom bar -->
                    <tr>
                        <td style="background:#0f172a;padding:20px 48px;text-align:center;">
                            <p style="margin:0;font-size:12px;color:#475569;">
                                © {{ date('Y') }} <strong style="color:#a5b4fc;">CYCLONE TECHNOLOGIES</strong>. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
