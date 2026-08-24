<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>CYCLONE TECHNOLOGIES | Verify SMS Login OTP</title>
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
                    <span></span> Verify Mobile SMS OTP
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
                                    <span style="font-size: 56px;">🔐</span>
                                    <h3 class="mb-10 font-weight-bold text-dark">Enter SMS Login OTP</h3>
                                    <p class="text-muted" style="font-size: 14px;">
                                        Enter the 6-digit code sent to your phone:
                                        <br><strong class="text-primary">{{ $user->phone ?? 'your mobile number' }}</strong>
                                    </p>
                                </div>

                                <x-validation-errors class="mb-4 text-danger"/>

                                <form method="POST" action="{{ route('sms.login.verify.post') }}" class="mb-4">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <input type="text" name="code" required autofocus 
                                               placeholder="Enter 6-Digit OTP" 
                                               maxlength="6" 
                                               style="text-align: center; font-size: 24px; letter-spacing: 6px; font-weight: 700; height: 55px; border-radius: 12px; border: 2px solid #3b82f6;">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up" style="background: linear-gradient(135deg, #10b981, #059669); color: white; font-weight: 700; border: none; height: 50px; border-radius: 50px; font-size: 16px;">
                                            Verify OTP &amp; Login Now →
                                        </button>
                                    </div>
                                </form>

                                <form method="POST" action="{{ route('sms.login.send') }}">
                                    @csrf
                                    <input type="hidden" name="login" value="{{ $user->phone ?? $user->email }}">
                                    <p class="text-muted small">
                                        Didn't receive the SMS OTP code? 
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-primary font-weight-bold" style="text-decoration: underline;">
                                            Resend SMS OTP
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
    <script src="/user/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/user/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/user/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/user/assets/js/main.js?v=3.3"></script>
</body>

</html>
