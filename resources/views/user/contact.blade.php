<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>CYCLONE TECHNOLOGIES | Contact Us</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Get in touch with Cyclone Technologies — we're here to help with your tech needs.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/user/assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="/user/assets/css/main.css">
    <link rel="stylesheet" href="/user/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ── Contact Page Exclusive Styles ── */

        /* Hero banner */
        .contact-hero {
            background: linear-gradient(135deg, #0f0c29 0%, #1e3a8a 50%, #0f172a 100%);
            padding: 70px 0 80px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .contact-hero::before {
            content: '';
            position: absolute;
            top: -100px; left: -100px;
            width: 420px; height: 420px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(99,102,241,0.2) 0%, transparent 70%);
            animation: heroPulse 8s ease-in-out infinite;
        }

        .contact-hero::after {
            content: '';
            position: absolute;
            bottom: -80px; right: -80px;
            width: 340px; height: 340px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(59,130,246,0.18) 0%, transparent 70%);
            animation: heroPulse 10s ease-in-out 2s infinite;
        }

        @keyframes heroPulse {
            0%, 100% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.15); opacity: 1; }
        }

        .contact-hero-badge {
            display: inline-block;
            background: rgba(99,102,241,0.2);
            border: 1px solid rgba(99,102,241,0.5);
            color: #a5b4fc;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 6px 18px;
            border-radius: 50px;
            margin-bottom: 20px;
        }

        .contact-hero h1 {
            color: #ffffff;
            font-size: clamp(32px, 5vw, 52px);
            font-weight: 800;
            letter-spacing: -0.02em;
            margin-bottom: 16px;
            position: relative;
            z-index: 1;
        }

        .contact-hero h1 span {
            background: linear-gradient(90deg, #60a5fa, #a5b4fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .contact-hero p {
            color: #94a3b8;
            font-size: 17px;
            max-width: 520px;
            margin: 0 auto;
            line-height: 1.7;
            position: relative;
            z-index: 1;
        }

        /* Info cards row */
        .contact-info-section {
            background: #f8fafc;
            padding: 60px 0 40px;
        }

        .contact-info-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 32px 24px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            height: 100%;
        }

        .contact-info-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 48px rgba(59,130,246,0.12);
            border-color: #bfdbfe;
        }

        .contact-info-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 26px;
        }

        .icon-blue  { background: linear-gradient(135deg, #dbeafe, #eff6ff); color: #2563eb; }
        .icon-indigo{ background: linear-gradient(135deg, #e0e7ff, #f0f4ff); color: #4f46e5; }
        .icon-green { background: linear-gradient(135deg, #dcfce7, #f0fdf4); color: #16a34a; }

        .contact-info-card h5 {
            font-size: 16px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .contact-info-card p,
        .contact-info-card a {
            font-size: 14px;
            color: #64748b;
            line-height: 1.7;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .contact-info-card a:hover { color: #3b82f6; }

        /* Form section */
        .contact-form-section {
            background: #ffffff;
            padding: 70px 0 80px;
        }

        .contact-form-wrapper {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 50px 50px;
            box-shadow: 0 8px 50px rgba(30,58,138,0.06);
            position: relative;
            overflow: hidden;
        }

        .contact-form-wrapper::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #6366f1, #a855f7);
            border-radius: 24px 24px 0 0;
        }

        .contact-form-wrapper h2 {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 6px;
        }

        .contact-form-wrapper .form-subtitle {
            color: #64748b;
            font-size: 15px;
            margin-bottom: 36px;
        }

        /* Form inputs */
        .ct-input-group {
            position: relative;
            margin-bottom: 22px;
        }

        .ct-input-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 7px;
            letter-spacing: 0.02em;
        }

        .ct-input-group input,
        .ct-input-group textarea,
        .ct-input-group select {
            width: 100%;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 13px 18px;
            font-size: 14px;
            color: #1e293b;
            background: #f8fafc;
            transition: border-color 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
            outline: none;
            font-family: 'Inter', sans-serif;
        }

        .ct-input-group input:focus,
        .ct-input-group textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59,130,246,0.1);
            background: #ffffff;
        }

        .ct-input-group input::placeholder,
        .ct-input-group textarea::placeholder {
            color: #a0aec0;
        }

        .ct-input-group textarea {
            min-height: 140px;
            resize: vertical;
        }

        /* Send button */
        .ct-send-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 44px;
            background: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%);
            color: #ffffff;
            font-size: 15px;
            font-weight: 700;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            letter-spacing: 0.04em;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            box-shadow: 0 4px 20px rgba(59,130,246,0.35);
        }

        .ct-send-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 36px rgba(59,130,246,0.45);
        }

        .ct-send-btn svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        /* Side info panel */
        .contact-side-panel {
            padding-left: 30px;
        }

        .contact-side-title {
            font-size: 22px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 6px;
        }

        .contact-side-sub {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .side-info-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 26px;
        }

        .side-info-item .side-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .side-info-item .side-text strong {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 3px;
        }

        .side-info-item .side-text span,
        .side-info-item .side-text a {
            font-size: 13.5px;
            color: #64748b;
            text-decoration: none;
        }

        .side-info-item .side-text a:hover { color: #3b82f6; }

        /* Working hours card */
        .hours-card {
            background: linear-gradient(135deg, #eff6ff, #f0f4ff);
            border: 1px solid #bfdbfe;
            border-radius: 16px;
            padding: 22px 24px;
            margin-top: 10px;
        }

        .hours-card h6 {
            font-size: 13px;
            font-weight: 700;
            color: #1e3a8a;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 14px;
        }

        .hours-row {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: #475569;
            margin-bottom: 8px;
        }

        .hours-row span:last-child {
            color: #2563eb;
            font-weight: 600;
        }

        /* Map section */
        .contact-map-section {
            background: #f1f5f9;
            padding: 60px 0;
        }

        .map-header {
            text-align: center;
            margin-bottom: 36px;
        }

        .map-header h3 {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
        }

        .map-header p {
            color: #64748b;
            font-size: 15px;
            margin-top: 8px;
        }

        .map-wrapper {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 40px rgba(0,0,0,0.12);
            border: 3px solid #ffffff;
        }

        .map-wrapper iframe {
            width: 100%;
            height: 420px;
            border: 0;
            display: block;
        }

        /* Success toast */
        #ct-toast {
            display: none;
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: #fff;
            padding: 14px 24px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 8px 30px rgba(34,197,94,0.4);
            z-index: 9999;
            animation: slideInToast 0.4s ease;
        }

        @keyframes slideInToast {
            from { transform: translateY(30px); opacity: 0; }
            to   { transform: translateY(0);    opacity: 1; }
        }

        @media (max-width: 768px) {
            .contact-form-wrapper { padding: 30px 20px; }
            .contact-side-panel  { padding-left: 0; margin-top: 40px; }
        }
    </style>
</head>

<body>
    @include('user.header')
    @include('user.mobile_header')

    <main class="main">

        <!-- ══ HERO BANNER ══ -->
        <div class="contact-hero">
            <div class="container" style="position:relative;z-index:1;">
                <div class="contact-hero-badge">📡 We're Here For You</div>
                <h1>Get In <span>Touch</span> With Us</h1>
                <p>Have a question, a big idea, or need tech support? We'd love to hear from you. Our team is ready to respond.</p>
            </div>
        </div>

        <!-- ══ INFO CARDS ══ -->
        <div class="contact-info-section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info-card">
                            <div class="contact-info-icon icon-blue">📍</div>
                            <h5>Our Location</h5>
                            <p>Kurunegala, Wariyapola<br>Sri Lanka 🇱🇰</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info-card">
                            <div class="contact-info-icon icon-indigo">📞</div>
                            <h5>Call Us Anytime</h5>
                            <p><a href="tel:+94715356253">+94 715 356 253</a><br>
                            <span>Mon – Sat, 9am – 6pm</span></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="contact-info-card">
                            <div class="contact-info-icon icon-green">✉️</div>
                            <h5>Email Support</h5>
                            <p><a href="mailto:shamal.geethanjanpathirana@gmail.com">shamal.geethanjanpathirana<br>@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ══ FORM + SIDE INFO ══ -->
        <div class="contact-form-section">
            <div class="container">
                <div class="row align-items-start">

                    <!-- Form -->
                    <div class="col-lg-7">
                        <div class="contact-form-wrapper">
                            <h2>Send Us a Message ✉️</h2>
                            <p class="form-subtitle">Fill in the form below and we'll get back to you within 24 hours.</p>

                            <form id="ct-contact-form" novalidate>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="ct-input-group">
                                            <label for="ct-name">👤 Full Name</label>
                                            <input id="ct-name" type="text" placeholder="e.g. John Doe" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ct-input-group">
                                            <label for="ct-email">📧 Email Address</label>
                                            <input id="ct-email" type="email" placeholder="you@example.com" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ct-input-group">
                                            <label for="ct-phone">📱 Phone Number</label>
                                            <input id="ct-phone" type="tel" placeholder="+94 7XX XXX XXX">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ct-input-group">
                                            <label for="ct-subject">📌 Subject</label>
                                            <input id="ct-subject" type="text" placeholder="How can we help?" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ct-input-group">
                                            <label for="ct-message">💬 Your Message</label>
                                            <textarea id="ct-message" placeholder="Write your message here…" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-2">
                                        <button type="submit" class="ct-send-btn">
                                            <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Side info panel -->
                    <div class="col-lg-5">
                        <div class="contact-side-panel">
                            <p class="contact-side-title">Why Contact Us?</p>
                            <p class="contact-side-sub">We're passionate about technology and excellent customer service.</p>

                            <div class="side-info-item">
                                <div class="side-icon icon-blue">🛒</div>
                                <div class="side-text">
                                    <strong>Order & Shipping Queries</strong>
                                    <span>Track orders, modify, or report delivery issues.</span>
                                </div>
                            </div>
                            <div class="side-info-item">
                                <div class="side-icon icon-indigo">🔧</div>
                                <div class="side-text">
                                    <strong>Technical Support</strong>
                                    <span>Help with products, setup, or troubleshooting.</span>
                                </div>
                            </div>
                            <div class="side-info-item">
                                <div class="side-icon icon-green">🤝</div>
                                <div class="side-text">
                                    <strong>Business Partnerships</strong>
                                    <span>Looking to partner or wholesale with us?</span>
                                </div>
                            </div>
                            <div class="side-info-item">
                                <div class="side-icon icon-blue">💡</div>
                                <div class="side-text">
                                    <strong>General Enquiries</strong>
                                    <span>Any other question — we're just a message away.</span>
                                </div>
                            </div>

                            <!-- Working hours -->
                            <div class="hours-card">
                                <h6>🕐 Working Hours</h6>
                                <div class="hours-row"><span>Monday – Friday</span><span>9:00am – 6:00pm</span></div>
                                <div class="hours-row"><span>Saturday</span><span>10:00am – 4:00pm</span></div>
                                <div class="hours-row"><span>Sunday</span><span>Closed</span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ══ MAP ══ -->
        <div class="contact-map-section">
            <div class="container">
                <div class="map-header">
                    <h3>📍 Find Us On The Map</h3>
                    <p>Visit our store or tech hub in Wariyapola, Sri Lanka.</p>
                </div>
                <div class="map-wrapper">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.8456789012345!2d80.25!3d7.58!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae33c0000000001%3A0x1!2sWariyapola%2C+Sri+Lanka!5e0!3m2!1sen!2slk!4v1680000000000!5m2!1sen!2slk"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

    </main>

    <!-- Toast notification -->
    <div id="ct-toast">✅ Message sent successfully! We'll reply soon.</div>

    @include('user.footer')

    <script src="user/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="user/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="user/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="user/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="user/assets/js/plugins/slick.js"></script>
    <script src="user/assets/js/plugins/wow.js"></script>
    <script src="user/assets/js/plugins/scrollup.js"></script>
    <script src="user/assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="user/assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="user/assets/js/main.js?v=3.3"></script>
    <script src="user/assets/js/shop.js?v=3.3"></script>

    <script>
        document.getElementById('ct-contact-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const name    = document.getElementById('ct-name').value.trim();
            const email   = document.getElementById('ct-email').value.trim();
            const phone   = document.getElementById('ct-phone').value.trim();
            const subject = document.getElementById('ct-subject').value.trim();
            const message = document.getElementById('ct-message').value.trim();

            if (!name || !email || !subject || !message) {
                alert('⚠️ Please fill in all required fields.');
                return;
            }

            const btn = document.querySelector('.ct-send-btn');
            btn.disabled = true;
            btn.innerHTML = '<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" style="animation:spin 1s linear infinite"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" opacity=".3"/><path d="M12 2v4a8 8 0 0 1 0 16v4A12 12 0 0 0 12 2z"/></svg> Sending…';

            const formData = new FormData();
            formData.append('name',    name);
            formData.append('email',   email);
            formData.append('phone',   phone);
            formData.append('subject', subject);
            formData.append('message', message);
            formData.append('_token',  '{{ csrf_token() }}');

            fetch('{{ route("user.contact.send") }}', {
                method: 'POST',
                body: formData,
                headers: { 'Accept': 'application/json' }
            })
            .then(res => res.json().then(data => ({ status: res.status, data: data })))
            .then(res => {
                btn.disabled = false;
                btn.innerHTML = '<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg> Send Message';

                if (res.data.success) {
                    const toast = document.getElementById('ct-toast');
                    toast.style.display = 'block';
                    setTimeout(() => { toast.style.display = 'none'; }, 5000);
                    document.getElementById('ct-contact-form').reset();
                } else if (res.data.errors) {
                    const firstErrorMsg = Object.values(res.data.errors)[0][0];
                    alert('⚠️ ' + firstErrorMsg);
                } else if (res.data.message) {
                    alert('⚠️ ' + res.data.message);
                } else {
                    alert('❌ Something went wrong. Please check your inputs and try again.');
                }
            })
            .catch(() => {
                btn.disabled = false;
                btn.innerHTML = '<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg> Send Message';
                alert('❌ Failed to send message. Please check your connection and try again.');
            });
        });
    </script>
</body>
</html>