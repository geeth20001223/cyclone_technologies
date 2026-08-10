<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>CYCLONE TECHNOLOGIES | SMS Verification</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/user/assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="/user/assets/css/main.css">
    <link rel="stylesheet" href="/user/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    <span></span> SMS Verification
                </div>
            </div>
        </div>

        <section class="pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 m-auto">
                        <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 shadow-lg">
                            <div class="padding_eight_all bg-white text-center">
                                <div class="mb-4">
                                    <span style="font-size: 56px;">📱</span>
                                    <h3 class="mb-10 font-weight-bold text-dark">Verify Mobile Number</h3>
                                    <p class="text-muted" style="font-size: 14px;">
                                        We sent a 6-digit SMS verification code to:
                                        <br><strong class="text-primary">{{ $user->phone ?? 'your phone' }}</strong>
                                    </p>
                                </div>

                                <x-validation-errors class="mb-4 text-danger"/>

                                <form method="POST" action="{{ route('sms.verify.post') }}" class="mb-4">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <input type="text" name="code" required autofocus 
                                               placeholder="Enter 6-Digit SMS Code" 
                                               maxlength="6" 
                                               style="text-align: center; font-size: 22px; letter-spacing: 6px; font-weight: 700; height: 55px; border-radius: 12px; border: 2px solid #cbd5e1;">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up" style="background: linear-gradient(135deg, #f59e0b, #f97316); color: #0a0a0f; font-weight: 700; border: none; height: 50px; border-radius: 50px; font-size: 16px;">
                                            Verify Code &amp; Continue →
                                        </button>
                                    </div>
                                </form>

                                <form method="POST" action="{{ route('sms.verify.resend') }}">
                                    @csrf
                                    <p class="text-muted small">
                                        Didn't receive the SMS code? 
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-warning font-weight-bold" style="text-decoration: underline;">
                                            Resend SMS Code
                                        </button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('user.footer')

    <!-- Vendor JS-->
    <script src="user/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="user/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="user/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="user/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="user/assets/js/plugins/slick.js"></script>
    <script src="user/assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="user/assets/js/plugins/wow.js"></script>
    <script src="user/assets/js/plugins/jquery-ui.js"></script>
    <script src="user/assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="user/assets/js/plugins/magnific-popup.js"></script>
    <script src="user/assets/js/plugins/select2.min.js"></script>
    <script src="user/assets/js/plugins/waypoints.js"></script>
    <script src="user/assets/js/plugins/counterup.js"></script>
    <script src="user/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="user/assets/js/plugins/images-loaded.js"></script>
    <script src="user/assets/js/plugins/isotope.js"></script>
    <script src="user/assets/js/plugins/scrollup.js"></script>
    <script src="user/assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="user/assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="user/assets/js/plugins/jquery.elevatezoom.js"></script>
    <!-- Template JS -->
    <script src="user/assets/js/main.js?v=3.3"></script>
    <script src="user/assets/js/shop.js?v=3.3"></script>
</body>

</html>
