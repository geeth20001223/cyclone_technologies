<section class="home-slider position-relative">
    <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">

        {{-- Slide 1 --}}
        <div class="single-hero-slider single-animation-wrap" style="background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);">
            <div class="container">
                <div class="row align-items-center slider-animated-1" style="min-height: 380px;">
                    <div class="col-lg-6 col-md-7">
                        <div class="hero-slider-content-2" style="padding: 36px 0;">
                            <h4 class="animated" style="color: #f97316; font-weight: 600; letter-spacing: 2px; text-transform: uppercase;">Upgrade Your Setup</h4>
                            <h2 class="animated fw-900" style="color: #ffffff; font-size: 2.5rem; margin-top: 8px;">Gaming PC Deals</h2>
                            <h1 class="animated fw-900" style="color: #60a5fa; font-size: 3rem; margin-bottom: 16px;">On All Products</h1>
                            <p class="animated" style="color: #cbd5e1; font-size: 1.1rem; margin-bottom: 30px;">Save more with coupons &amp; up to 70% off on laptops, desktops &amp; components</p>
                            <a class="animated btn" href="{{route('user.shop')}}" style="background: #f97316; color: #fff; padding: 14px 36px; border-radius: 30px; font-weight: 700; font-size: 1rem; text-decoration: none; box-shadow: 0 4px 20px rgba(249,115,22,0.4); transition: all 0.3s ease;">
                                Shop Now &rarr;
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 d-none d-md-block text-center">
                        <img src="user/assets/imgs/slider/slider-01.png"
                             alt="Gaming PC Setup"
                             style="max-width: 100%; max-height: 320px; width: auto; height: auto; object-fit: contain; border-radius: 12px; box-shadow: 0 20px 60px rgba(0,0,0,0.5); animation: slideInRight 0.8s ease-out;">
                    </div>
                </div>
            </div>
        </div>

        {{-- Slide 2 --}}
        <div class="single-hero-slider single-animation-wrap" style="background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);">
            <div class="container">
                <div class="row align-items-center slider-animated-1" style="min-height: 380px;">
                    <div class="col-lg-6 col-md-7">
                        <div class="hero-slider-content-2" style="padding: 60px 0;">
                            <h4 class="animated" style="color: #22d3ee; font-weight: 600; letter-spacing: 2px; text-transform: uppercase;">Latest Components</h4>
                            <h2 class="animated fw-900" style="color: #ffffff; font-size: 2.5rem; margin-top: 8px;">PC Hardware</h2>
                            <h1 class="animated fw-900" style="color: #a78bfa; font-size: 3rem; margin-bottom: 16px;">GPUs, CPUs &amp; More</h1>
                            <p class="animated" style="color: #cbd5e1; font-size: 1.1rem; margin-bottom: 30px;">Build your dream rig with up to 20% off on parts</p>
                            <a class="animated btn" href="{{route('user.shop')}}" style="background: #7c3aed; color: #fff; padding: 14px 36px; border-radius: 30px; font-weight: 700; font-size: 1rem; text-decoration: none; box-shadow: 0 4px 20px rgba(124,58,237,0.4); transition: all 0.3s ease;">
                                Discover Now &rarr;
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 d-none d-md-block text-center">
                        <img src="user/assets/imgs/slider/slider-2.png"
                             alt="PC Components"
                             style="max-width: 100%; max-height: 460px; width: auto; height: auto; object-fit: contain; border-radius: 12px; box-shadow: 0 20px 60px rgba(0,0,0,0.5); animation: slideInRight 0.8s ease-out;">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="slider-arrow hero-slider-1-arrow"></div>
</section>

<style>
@keyframes slideInRight {
    from { opacity: 0; transform: translateX(40px); }
    to   { opacity: 1; transform: translateX(0); }
}
.hero-slider-1 .slick-slide { overflow: hidden; }
</style>