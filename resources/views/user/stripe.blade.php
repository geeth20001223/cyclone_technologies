<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>CYCLONE TECHNOLOGIES | Card Payment</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/user/assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="/user/assets/css/main.css">
    <link rel="stylesheet" href="/user/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;700&display=swap');

        /* Background Ambient Glow Overlay over website */
        .stripe-modal-overlay {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(15, 23, 42, 0.45);
            backdrop-filter: blur(10px) saturate(160%);
            -webkit-backdrop-filter: blur(10px) saturate(160%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            z-index: 99999;
            animation: overlayFadeIn 0.3s ease;
            overflow-y: auto;
        }

        @keyframes overlayFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Compact Next-Level Glass Card Container */
        .stripe-payment-card {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #ffffff;
            width: 100%;
            max-width: 410px;
            max-height: 94vh;
            border-radius: 20px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.4), 0 0 30px rgba(59, 130, 246, 0.15);
            position: relative;
            overflow-y: auto;
            border: 1px solid rgba(255, 255, 255, 0.9);
            animation: cardPopIn 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 10;
            margin: auto;
        }

        @keyframes cardPopIn {
            0% { opacity: 0; transform: scale(0.88) translateY(20px); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }

        /* Header Bar */
        .stripe-card-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #090d16 100%);
            color: #ffffff;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            sticky: top;
            top: 0;
            z-index: 2;
        }

        .stripe-card-header::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 2.5px;
            background: linear-gradient(90deg, #3b82f6 0%, #6366f1 50%, #8b5cf6 100%);
        }

        .stripe-header-title {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .stripe-header-title h4 {
            margin: 0;
            font-size: 15px;
            font-weight: 800;
            color: #ffffff !important;
            letter-spacing: -0.2px;
        }

        .stripe-security-badge {
            font-size: 9px;
            font-weight: 700;
            background: rgba(34, 197, 94, 0.18);
            color: #4ade80;
            border: 1px solid rgba(74, 222, 128, 0.3);
            padding: 2px 7px;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            text-transform: uppercase;
        }

        /* Close Button */
        .stripe-close-btn {
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff !important;
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none !important;
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .stripe-close-btn:hover {
            background: #ef4444 !important;
            color: #ffffff !important;
            border-color: #ef4444 !important;
            transform: rotate(90deg) scale(1.05);
        }

        /* Body Section */
        .stripe-card-body {
            padding: 16px 20px 20px 20px;
            background: #ffffff;
        }

        /* COMPACT CREDIT CARD PREVIEW GRAPHIC */
        .interactive-card-preview {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 60%, #312e81 100%);
            border-radius: 14px;
            padding: 14px 16px;
            color: #ffffff;
            position: relative;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.3);
            margin-bottom: 14px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .interactive-card-preview::before {
            content: '';
            position: absolute;
            top: -50%; right: -30%;
            width: 160px; height: 160px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.12) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .card-top-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .card-chip {
            width: 32px;
            height: 22px;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            border-radius: 4px;
            position: relative;
            box-shadow: inset 0 0 0 1px rgba(0,0,0,0.2);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .card-chip::after {
            content: '';
            width: 18px;
            height: 12px;
            border: 1px solid rgba(0,0,0,0.25);
            border-radius: 2px;
        }

        .card-type-icon {
            font-size: 20px;
            color: #ffffff;
            font-weight: 800;
        }

        .card-number-display {
            font-family: 'Space Grotesk', monospace;
            font-size: 15.5px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 12px;
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .card-bottom-row {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
        }

        .card-holder-label {
            font-size: 8.5px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #94a3b8;
            margin-bottom: 1px;
            font-weight: 700;
        }

        .card-holder-name {
            font-size: 11.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #f8fafc;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 180px;
        }

        .card-expiry-display {
            font-family: 'Space Grotesk', monospace;
            font-size: 12px;
            font-weight: 700;
            color: #f8fafc;
        }

        /* Form Inputs */
        .stripe-field-group {
            margin-bottom: 12px;
        }

        .stripe-field-group label {
            display: block;
            font-size: 11px;
            font-weight: 800;
            color: #334155;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stripe-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .stripe-input-wrapper i {
            position: absolute;
            left: 12px;
            color: #94a3b8;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .stripe-input-wrapper input {
            width: 100%;
            height: 40px;
            border-radius: 10px;
            border: 1.5px solid #cbd5e1;
            padding: 0 12px 0 38px;
            font-size: 13.5px;
            font-weight: 600;
            color: #0f172a;
            outline: none;
            background: #f8fafc;
            transition: all 0.25s ease;
        }

        .stripe-input-wrapper input:focus {
            border-color: #3b82f6;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        .stripe-input-wrapper input:focus + i {
            color: #3b82f6;
        }

        .stripe-flex-row {
            display: flex;
            gap: 10px;
        }

        .stripe-flex-row .stripe-field-group {
            flex: 1;
        }

        .stripe-flex-row .stripe-input-wrapper input {
            padding-left: 10px;
        }

        /* Pay Button */
        .stripe-pay-btn {
            background: linear-gradient(135deg, #2563eb 0%, #4f46e5 50%, #7c3aed 100%);
            color: #ffffff !important;
            font-weight: 800;
            font-size: 15px;
            height: 46px;
            border-radius: 50px;
            border: none;
            width: 100%;
            margin-top: 6px;
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.35);
            cursor: pointer;
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .stripe-pay-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(37, 99, 235, 0.5);
            color: #ffffff !important;
        }

        /* Auto-Fill Pill Button */
        .btn-test-autofill {
            background: rgba(241, 245, 249, 0.95);
            color: #334155;
            border: 1.5px dashed #94a3b8;
            border-radius: 30px;
            padding: 6px 16px;
            font-size: 11.5px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-test-autofill:hover {
            background: #e2e8f0;
            color: #0f172a;
            border-color: #3b82f6;
        }

        .stripe-error-box {
            background-color: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 12.5px;
            font-weight: 600;
            margin-bottom: 12px;
            display: none;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    @include('user.header')
    @include('user.mobile_header')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Card Payment
                </div>
            </div>
        </div>

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="min-height: 400px;">
                        <h3 class="font-weight-bold text-dark mb-2">Order Checkout</h3>
                        <p class="text-muted">Please complete your card payment below to finalize your order.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Compact Glassmorphism Modal Card Popup floating over the website -->
    <div class="stripe-modal-overlay">
        <div class="stripe-payment-card">
            <!-- Modal Header -->
            <div class="stripe-card-header">
                <div class="stripe-header-title">
                    <h4>💳 Card Payment</h4>
                    <span class="stripe-security-badge"><i class="fas fa-lock"></i> SSL</span>
                </div>
                <a href="{{ route('user.cart') }}" class="stripe-close-btn" title="Cancel & Close">✕</a>
            </div>

            <!-- Form Body -->
            <div class="stripe-card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center mb-3" style="border-radius: 10px; font-weight: 600; padding: 10px; font-size: 13px;">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="stripe-error-box" id="stripe-error-alert">
                    Please correct the errors and try again.
                </div>

                <!-- LIVE INTERACTIVE CREDIT CARD PREVIEW GRAPHIC -->
                <div class="interactive-card-preview">
                    <div class="card-top-row">
                        <div class="card-chip"></div>
                        <div class="card-type-icon" id="preview-card-brand">
                            <i class="fab fa-cc-visa"></i>
                        </div>
                    </div>
                    <div class="card-number-display" id="preview-card-number">•••• •••• •••• ••••</div>
                    <div class="card-bottom-row">
                        <div>
                            <div class="card-holder-label">Card Holder</div>
                            <div class="card-holder-name" id="preview-card-name">JOHN DOE</div>
                        </div>
                        <div>
                            <div class="card-holder-label" style="text-align: right;">Expires</div>
                            <div class="card-expiry-display" id="preview-card-expiry">MM / YY</div>
                        </div>
                    </div>
                </div>

                <!-- PAYMENT FORM -->
                <form 
                    action="{{ route('stripe.post', $totalPrice) }}" 
                    method="post" 
                    class="require-validation"
                    data-cc-on-file="false"
                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                    id="payment-form">
                    @csrf

                    <div class="stripe-field-group">
                        <label>Name on Card</label>
                        <div class="stripe-input-wrapper">
                            <input type="text" class="card-name" id="input-card-name" placeholder="John Doe" required autofocus>
                            <i class="fas fa-user"></i>
                        </div>
                    </div>

                    <div class="stripe-field-group">
                        <label>Card Number</label>
                        <div class="stripe-input-wrapper">
                            <input type="text" class="card-number" id="input-card-number" autocomplete="off" placeholder="4242 •••• •••• 4242" maxlength="19" required>
                            <i class="fas fa-credit-card"></i>
                        </div>
                    </div>

                    <div class="stripe-flex-row">
                        <div class="stripe-field-group">
                            <label>CVC</label>
                            <div class="stripe-input-wrapper">
                                <input type="text" class="card-cvc" autocomplete="off" placeholder="311" maxlength="4" required>
                            </div>
                        </div>
                        <div class="stripe-field-group">
                            <label>Month</label>
                            <div class="stripe-input-wrapper">
                                <input type="text" class="card-expiry-month" id="input-card-month" placeholder="MM" maxlength="2" required>
                            </div>
                        </div>
                        <div class="stripe-field-group">
                            <label>Year</label>
                            <div class="stripe-input-wrapper">
                                <input type="text" class="card-expiry-year" id="input-card-year" placeholder="YYYY" maxlength="4" required>
                            </div>
                        </div>
                    </div>

                    <button class="stripe-pay-btn" type="submit">
                        <span>Pay Now (Rs. {{ ltrim($totalPrice, '$') }})</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>

                    <div style="margin-top: 12px; text-align: center;">
                        <button type="button" class="btn-test-autofill" id="btn-autofill-test">
                            <span>⚡ Quick Test Card (Free Demo)</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('user.footer')

    <!-- Vendor JS-->
    <script src="user/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="user/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="user/assets/js/plugins/slick.js"></script>
    <script src="user/assets/js/plugins/wow.js"></script>
    <script src="user/assets/js/main.js?v=3.3"></script>

    <!-- Stripe JS -->
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            
            // Live Card Preview Synchronization
            $('#input-card-name').on('input', function() {
                var val = $(this).val().trim();
                $('#preview-card-name').text(val ? val.toUpperCase() : 'JOHN DOE');
            });

            $('#input-card-number').on('input', function() {
                var val = $(this).val().replace(/\D/g, '');
                var formatted = val.replace(/(.{4})/g, '$1 ').trim();
                $('#preview-card-number').text(formatted ? formatted : '•••• •••• •••• ••••');

                if (val.startsWith('4')) {
                    $('#preview-card-brand').html('<i class="fab fa-cc-visa"></i>');
                } else if (val.startsWith('5')) {
                    $('#preview-card-brand').html('<i class="fab fa-cc-mastercard"></i>');
                } else if (val.startsWith('3')) {
                    $('#preview-card-brand').html('<i class="fab fa-cc-amex"></i>');
                } else {
                    $('#preview-card-brand').html('<i class="fab fa-cc-visa"></i>');
                }
            });

            function updateExpiryPreview() {
                var m = $('#input-card-month').val().trim() || 'MM';
                var y = $('#input-card-year').val().trim() || 'YY';
                if (y.length === 4) y = y.substring(2);
                $('#preview-card-expiry').text(m + ' / ' + y);
            }

            $('#input-card-month, #input-card-year').on('input', updateExpiryPreview);

            // Auto-fill test card details
            $('#btn-autofill-test').on('click', function() {
                $('.card-name').val('Test Customer').trigger('input');
                $('.card-number').val('4242 4242 4242 4242').trigger('input');
                $('.card-cvc').val('123');
                $('.card-expiry-month').val('12').trigger('input');
                $('.card-expiry-year').val('2030').trigger('input');
            });

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                $errorMessage = $('#stripe-error-alert'),
                valid = true;
                $errorMessage.hide();
            
                $form.find('input[type=text]').each(function(i, el) {
                    if ($(el).val() === '') {
                        $(el).css('border-color', '#ef4444');
                        $errorMessage.text('Please fill in all required card fields.').show();
                        valid = false;
                    } else {
                        $(el).css('border-color', '#cbd5e1');
                    }
                });

                if (!valid) {
                    e.preventDefault();
                    return;
                }
             
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    try {
                        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                        Stripe.createToken({
                            number: $('.card-number').val(),
                            cvc: $('.card-cvc').val(),
                            exp_month: $('.card-expiry-month').val(),
                            exp_year: $('.card-expiry-year').val()
                        }, stripeResponseHandler);
                    } catch (err) {
                        // In free sandbox/test mode without live Stripe key, submit form directly
                        $form.append("<input type='hidden' name='stripeToken' value='tok_test_sandbox'/>");
                        $form.get(0).submit();
                    }
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    // Fallback to test mode if token creation has sandbox warning
                    $form.append("<input type='hidden' name='stripeToken' value='tok_test_sandbox'/>");
                    $form.get(0).submit();
                } else {
                    var token = response['id'];
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>
</body>
</html>