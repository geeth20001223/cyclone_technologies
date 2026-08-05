<footer class="main">
    <div style="width: 100%; height: 3px; background: rgba(255,255,255,0.85); border-radius: 2px;"></div>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget-about font-md mb-md-5 mb-lg-0">
                        <div class="logo logo-width-1 wow fadeIn animated">
                            <a href="/"><img src="user/assets/imgs/logo/app_logo.png" alt="logo"></a>
                        </div>
                        <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                        <p class="wow fadeIn animated">
                            <strong>Address: </strong>Kurunegala, Wariyapola, Sri Lanka
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Phone: </strong>+94715356253
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Email: </strong>shamal.geethanjanpathirana@gmail.com
                        </p>
                        <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                        <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                            <a href="#"><img src="user/assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                            <a href="#"><img src="user/assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                            <a href="#"><img src="user/assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                            <a href="#"><img src="user/assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                            <a href="#"><img src="user/assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <h5 class="widget-title wow fadeIn animated">About</h5>
                    <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                        <li><a href="javascript:void(0)" onclick="$('#modalAboutUs').modal('show');">About Us</a></li>
                        <li><a href="javascript:void(0)" onclick="$('#modalDeliveryInfo').modal('show');">Delivery Information</a></li>
                        <li><a href="javascript:void(0)" onclick="$('#modalPrivacyPolicy').modal('show');">Privacy Policy</a></li>
                        <li><a href="javascript:void(0)" onclick="$('#modalTermsConditions').modal('show');">Terms &amp; Conditions</a></li>
                        <li><a href="{{ route('user.contact') }}">Contact Us</a></li>                            
                    </ul>
                </div>
                <div class="col-lg-4 mob-center">
                    <h5 class="widget-title wow fadeIn animated">Install App</h5>
                    <div class="row">
                        <div class="col-md-8 col-lg-12">
                            <p class="wow fadeIn animated" style="color: #ffffff !important;">From App Store or Google Play</p>
                            <div class="download-app wow fadeIn animated mob-app">
                                <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="user/assets/imgs/theme/app-store.jpg" alt=""></a>
                                <a href="#" class="hover-up"><img src="user/assets/imgs/theme/google-play.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                            <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                            <img class="wow fadeIn animated" src="user/assets/imgs/theme/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-20 wow fadeIn animated mob-center">
        <div class="row">
            <div class="col-12 mb-20">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-lg-6">
                <p class="float-md-left font-sm text-muted mb-0">
                    <a href="javascript:void(0)" onclick="$('#modalPrivacyPolicy').modal('show');">Privacy Policy</a> | 
                    <a href="javascript:void(0)" onclick="$('#modalTermsConditions').modal('show');">Terms & Conditions</a>
                </p>
            </div>
            <div class="col-lg-6">
                <p class="text-lg-end text-start font-sm text-muted mb-0">
                    &copy; <strong class="text-brand">CYCLONE TECHNOLOGIES</strong> All rights reserved
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- ============================================================
     INTERACTIVE FOOTER MODALS
     ============================================================ -->

<!-- 1. ABOUT US MODAL -->
<div class="modal fade" id="modalAboutUs" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border-radius: 18px; overflow: hidden; border: none; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
            <div class="modal-header" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #fff; padding: 18px 24px; border-bottom: 2px solid #3b82f6;">
                <h5 class="modal-title text-white font-weight-bold" style="margin: 0; display: flex; align-items: center; gap: 8px;">
                    💻 About CYCLONE TECHNOLOGIES
                </h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close" style="background: none; border: none; font-size: 22px; cursor: pointer; opacity: 0.8;">&times;</button>
            </div>
            <div class="modal-body" style="padding: 26px; font-size: 14px; line-height: 1.7; color: #334155;">
                <p class="lead" style="font-weight: 600; color: #0f172a; margin-bottom: 16px;">
                    Welcome to <strong>CYCLONE TECHNOLOGIES</strong> — Sri Lanka's leading hub for premium laptops, gaming rigs, and high-performance hardware!
                </p>
                <p>
                    Based in <strong>Wariyapola, Kurunegala</strong>, Cyclone Technologies delivers cutting-edge laptops, processors, graphics hardware, and tech accessories to gamers, professionals, and students across Sri Lanka.
                </p>
                <div class="row mt-4 mb-3">
                    <div class="col-md-6 mb-3">
                        <div style="background: #f8fafc; padding: 16px; border-radius: 12px; border: 1px solid #e2e8f0;">
                            <h6 style="color: #2563eb; font-weight: 700; margin-bottom: 6px;">🎯 Our Mission</h6>
                            <p style="margin: 0; font-size: 13px;">To provide 100% genuine technology with uncompromised quality, transparent pricing, and dependable islandwide customer support.</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div style="background: #f8fafc; padding: 16px; border-radius: 12px; border: 1px solid #e2e8f0;">
                            <h6 style="color: #2563eb; font-weight: 700; margin-bottom: 6px;">📍 Head Office</h6>
                            <p style="margin: 0; font-size: 13px;">Kurunegala, Wariyapola, Sri Lanka<br><strong>Phone:</strong> +94 71 535 6253<br><strong>Email:</strong> shamal.geethanjanpathirana@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background: #f1f5f9; padding: 12px 24px;">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- 2. DELIVERY INFORMATION MODAL -->
<div class="modal fade" id="modalDeliveryInfo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border-radius: 18px; overflow: hidden; border: none; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
            <div class="modal-header" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #fff; padding: 18px 24px; border-bottom: 2px solid #3b82f6;">
                <h5 class="modal-title text-white font-weight-bold" style="margin: 0; display: flex; align-items: center; gap: 8px;">
                    🚚 Islandwide Delivery Information
                </h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close" style="background: none; border: none; font-size: 22px; cursor: pointer; opacity: 0.8;">&times;</button>
            </div>
            <div class="modal-body" style="padding: 26px; font-size: 14px; line-height: 1.7; color: #334155;">
                <h6 style="font-weight: 700; color: #0f172a; margin-bottom: 12px;">Fast &amp; Secure Shipping Across Sri Lanka</h6>
                <p>We partner with top islandwide courier services to ensure your high-value laptops and electronics arrive safely and swiftly.</p>

                <ul style="padding-left: 20px; margin-bottom: 20px;">
                    <li><strong>Delivery Timeframe:</strong> 1 to 3 Business Days for all districts in Sri Lanka.</li>
                    <li><strong>Real-Time Tracking:</strong> Every order receives a unique Tracking ID (e.g. <code>TRK...</code>) accessible in your <a href="/orders">My Orders</a> dashboard.</li>
                    <li><strong>Payment Methods:</strong> Cash on Delivery (COD) &amp; Secured Online Card Payments (Visa, MasterCard, Amex).</li>
                    <li><strong>Package Safety:</strong> Double-boxed protective packaging with tamper-evident security seals.</li>
                </ul>

                <div class="alert alert-info" style="border-radius: 10px; font-size: 13px; margin: 0;">
                    💡 <strong>Tip:</strong> Please inspect package seals upon courier arrival before signing the receipt.
                </div>
            </div>
            <div class="modal-footer" style="background: #f1f5f9; padding: 12px 24px;">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- 3. PRIVACY POLICY MODAL -->
<div class="modal fade" id="modalPrivacyPolicy" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border-radius: 18px; overflow: hidden; border: none; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
            <div class="modal-header" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #fff; padding: 18px 24px; border-bottom: 2px solid #3b82f6;">
                <h5 class="modal-title text-white font-weight-bold" style="margin: 0; display: flex; align-items: center; gap: 8px;">
                    🔒 Privacy Policy
                </h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close" style="background: none; border: none; font-size: 22px; cursor: pointer; opacity: 0.8;">&times;</button>
            </div>
            <div class="modal-body" style="padding: 26px; font-size: 14px; line-height: 1.7; color: #334155;">
                <h6 style="font-weight: 700; color: #0f172a; margin-bottom: 12px;">Your Data Protection Guarantee</h6>
                <p>At Cyclone Technologies, we strictly protect customer personal data and privacy rights.</p>

                <div class="mb-3">
                    <h6 style="color: #2563eb; font-size: 14px; font-weight: 700;">1. Encryption &amp; SSL Security</h6>
                    <p style="font-size: 13px;">All payment transactions and user credentials are encrypted with 256-Bit SSL encryption technology.</p>
                </div>
                <div class="mb-3">
                    <h6 style="color: #2563eb; font-size: 14px; font-weight: 700;">2. Information Usage</h6>
                    <p style="font-size: 13px;">Your phone number, address, and email are solely used for order dispatch, Twilio SMS notifications, and verification.</p>
                </div>
                <div class="mb-3">
                    <h6 style="color: #2563eb; font-size: 14px; font-weight: 700;">3. No Third-Party Selling</h6>
                    <p style="font-size: 13px;">We never sell, rent, or trade your personal information with external third-party advertisers.</p>
                </div>
            </div>
            <div class="modal-footer" style="background: #f1f5f9; padding: 12px 24px;">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- 4. TERMS & CONDITIONS MODAL -->
<div class="modal fade" id="modalTermsConditions" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="border-radius: 18px; overflow: hidden; border: none; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
            <div class="modal-header" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #fff; padding: 18px 24px; border-bottom: 2px solid #3b82f6;">
                <h5 class="modal-title text-white font-weight-bold" style="margin: 0; display: flex; align-items: center; gap: 8px;">
                    📜 Terms &amp; Conditions
                </h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close" style="background: none; border: none; font-size: 22px; cursor: pointer; opacity: 0.8;">&times;</button>
            </div>
            <div class="modal-body" style="padding: 26px; font-size: 14px; line-height: 1.7; color: #334155;">
                <h6 style="font-weight: 700; color: #0f172a; margin-bottom: 12px;">Customer Terms of Service</h6>

                <ul style="padding-left: 20px;">
                    <li><strong>Product Warranty:</strong> All laptops and hardware include official manufacturer/seller warranty (minimum 1 Year).</li>
                    <li><strong>Returns &amp; Exchanges:</strong> Defective items must be reported within 7 days of delivery for inspection and replacement.</li>
                    <li><strong>Order Cancellations:</strong> Pending orders can be cancelled directly from your Dashboard prior to dispatch.</li>
                    <li><strong>Price Integrity:</strong> All prices are displayed in Sri Lankan Rupees (Rs.).</li>
                </ul>
            </div>
            <div class="modal-footer" style="background: #f1f5f9; padding: 12px 24px;">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>