<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>CYCLONE TECHNOLOGIES | PayPal Sandbox Express Checkout</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/user/assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="/user/assets/css/main.css">
    <link rel="stylesheet" href="/user/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- PayPal Smart Payment Buttons SDK (Sandbox Environment) -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

    <style>
        .paypal-modal-overlay {
            min-height: 100vh;
            background: linear-gradient(135deg, #001c44 0%, #003087 50%, #0070ba 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 15px;
            font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        .paypal-payment-card {
            background: #ffffff;
            width: 100%;
            max-width: 520px;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
            overflow: hidden;
            position: relative;
            animation: paypalCardSlideUp 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes paypalCardSlideUp {
            from { opacity: 0; transform: translateY(30px) scale(0.96); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .paypal-card-header {
            background: linear-gradient(135deg, #003087 0%, #0070ba 100%);
            color: #ffffff;
            padding: 24px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .paypal-header-title h4 {
            color: #ffffff !important;
            font-size: 20px;
            font-weight: 800;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .paypal-security-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(255, 255, 255, 0.2);
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .paypal-close-btn {
            color: rgba(255, 255, 255, 0.8);
            font-size: 20px;
            text-decoration: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            background: rgba(255, 255, 255, 0.1);
        }

        .paypal-close-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            color: #ffffff;
        }

        .paypal-card-body {
            padding: 28px;
        }

        .paypal-amount-box {
            background: #f0f7ff;
            border: 1.5px solid #bae6fd;
            border-radius: 14px;
            padding: 18px;
            text-align: center;
            margin-bottom: 24px;
        }

        .paypal-amount-label {
            font-size: 12px;
            font-weight: 700;
            color: #0369a1;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .paypal-amount-value {
            font-size: 28px;
            font-weight: 900;
            color: #003087;
            margin-top: 4px;
        }

        .paypal-amount-converted {
            font-size: 13px;
            font-weight: 600;
            color: #0284c7;
            margin-top: 2px;
        }

        .paypal-btn-custom {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #ffc439, #ffb300);
            color: #003087;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(255, 196, 57, 0.4);
            transition: all 0.25s ease;
            margin-top: 15px;
        }

        .paypal-btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 196, 57, 0.6);
            background: linear-gradient(135deg, #ffb300, #ffa000);
        }

        .sandbox-badge {
            display: inline-block;
            background: #fef3c7;
            border: 1px solid #fde047;
            color: #92400e;
            font-size: 11px;
            font-weight: 800;
            padding: 3px 10px;
            border-radius: 50px;
            margin-bottom: 12px;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    @include('user.header')

    <div class="paypal-modal-overlay">
        <div class="paypal-payment-card">
            <!-- Header -->
            <div class="paypal-card-header">
                <div class="paypal-header-title">
                    <h4><i class="fab fa-paypal" style="font-size: 24px; color: #ffc439;"></i> PayPal Express Checkout</h4>
                </div>
                <a href="{{ route('user.cart') }}" class="paypal-close-btn" title="Cancel & Return">✕</a>
            </div>

            <!-- Body -->
            <div class="paypal-card-body">
                <div class="text-center">
                    <span class="sandbox-badge">🧪 PayPal Sandbox Environment (Test Mode)</span>
                </div>

                <!-- Fixed Payment Amount Box -->
                <div class="paypal-amount-box">
                    <div class="paypal-amount-label">Fixed Order Payment Amount</div>
                    @php
                        $rawAmount = floatval(ltrim($totalPrice, '$'));
                        $usdAmount = number_format($rawAmount / 300, 2, '.', '');
                        if ($usdAmount < 1.00) $usdAmount = "1.00";
                    @endphp
                    <div class="paypal-amount-value">Rs. {{ number_format($rawAmount, 2) }}</div>
                    <div class="paypal-amount-converted">≈ ${{ $usdAmount }} USD (PayPal Fixed Amount)</div>
                </div>

                <!-- Official PayPal Smart Payment Buttons Container -->
                <div id="paypal-button-container"></div>

                <!-- Fallback Fast Sandbox Test Button -->
                <form action="{{ route('paypal.post', $totalPrice) }}" method="POST" id="paypal-fast-form">
                    @csrf
                    <button type="submit" class="paypal-btn-custom">
                        <i class="fab fa-paypal"></i>
                        <span>⚡ Complete PayPal Sandbox Test Payment</span>
                    </button>
                </form>

                <p class="text-center text-muted mt-3 mb-0" style="font-size: 12px;">
                    <i class="fas fa-lock text-success"></i> Encrypted with 256-Bit SSL Protection. Safe &amp; Instant Verification.
                </p>
            </div>
        </div>
    </div>

    @include('user.footer')

    <!-- PayPal SDK Buttons Initialization -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof paypal !== 'undefined') {
                paypal.Buttons({
                    style: {
                        layout: 'vertical',
                        color:  'gold',
                        shape:  'rect',
                        label:  'paypal'
                    },
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                description: 'Cyclone Technologies Order Payment',
                                amount: {
                                    currency_code: 'USD',
                                    value: '{{ $usdAmount }}'
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            console.log('PayPal Sandbox Payment Captured:', details);
                            document.getElementById('paypal-fast-form').submit();
                        });
                    },
                    onError: function(err) {
                        console.error('PayPal Payment Error:', err);
                        alert('PayPal Payment encountered an issue. Using Sandbox Express Mode.');
                        document.getElementById('paypal-fast-form').submit();
                    }
                }).render('#paypal-button-container');
            }
        });
    </script>
</body>
</html>
