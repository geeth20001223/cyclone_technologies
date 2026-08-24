<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>CYCLONE TECHNOLOGIES | Login via Mobile SMS</title>
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
                    <span></span> Login via Mobile SMS OTP
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
                                    <span style="font-size: 56px;">💬</span>
                                    <h3 class="mb-10 font-weight-bold text-dark">Login via Mobile SMS</h3>
                                    <p class="text-muted" style="font-size: 14px;">
                                        Email verification not working? Enter your <strong>Mobile Number</strong> or <strong>Email</strong> to receive a 6-digit SMS OTP code.
                                    </p>
                                </div>

                                <x-validation-errors class="mb-4 text-danger"/>

                                <form method="POST" action="{{ route('sms.login.send') }}" class="mb-4">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <input type="text" name="login" required autofocus 
                                               placeholder="Mobile Number (e.g. +94715356253) or Email" 
                                               style="text-align: center; font-size: 16px; font-weight: 600; height: 50px; border-radius: 12px; border: 2px solid #cbd5e1;">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up" style="background: linear-gradient(135deg, #2563eb, #3b82f6); color: white; font-weight: 700; border: none; height: 50px; border-radius: 50px; font-size: 16px;">
                                            Send SMS OTP Code →
                                        </button>
                                    </div>
                                </form>

                                <div class="border-top pt-3">
                                    <a href="{{ route('login') }}" class="text-muted small">
                                        ← Back to standard Password Login
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('user.footer')

    <!-- Vendor JS-->
    <script src="/user/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/user/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/user/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/user/assets/js/main.js?v=3.3"></script>
</body>

</html>
