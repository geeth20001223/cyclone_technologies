<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>CYCLONE TECHNOLOGIES | Rewards Hub</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Community Rewards Hub - Share and claim exclusive rewards, promo codes, and deals at Cyclone Technologies.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="user/assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="user/assets/css/main.css">
    <link rel="stylesheet" href="user/assets/css/custom.css">
    <style>
        .rewards-hero {
            background: linear-gradient(135deg, #0d0d1a 0%, #16162a 50%, #0d0d1a 100%);
            border-radius: 20px;
            padding: 45px 30px;
            border: 1px solid rgba(245, 158, 11, 0.25);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }

        .rewards-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .reward-card {
            background: #11111e;
            border: 1px solid rgba(245, 158, 11, 0.2);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.35s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .reward-card:hover {
            transform: translateY(-6px);
            border-color: #f59e0b;
            box-shadow: 0 12px 30px rgba(245, 158, 11, 0.25);
        }

        .reward-card-img-wrap {
            height: 180px;
            background: #1a1a2e;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .reward-card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .reward-card:hover .reward-card-img-wrap img {
            transform: scale(1.06);
        }

        .reward-badge-pts {
            position: absolute;
            top: 12px;
            right: 12px;
            background: linear-gradient(135deg, #f59e0b, #f97316);
            color: #0a0a0f;
            font-weight: 700;
            font-size: 12px;
            padding: 4px 12px;
            border-radius: 50px;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.5);
        }

        .reward-card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .reward-user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .reward-user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f59e0b, #e879f9);
            color: #0a0a0f;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
        }

        .modal-content.reward-modal {
            background: #121222;
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: 20px;
            color: #faf5ff;
        }

        .modal-content.reward-modal .form-control {
            background: #1a1a2e;
            border: 1px solid rgba(245, 158, 11, 0.25);
            color: #faf5ff;
            border-radius: 10px;
        }

        .modal-content.reward-modal .form-control:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 10px rgba(245, 158, 11, 0.3);
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
                    <span></span> Rewards
                </div>
            </div>
        </div>

        <div class="container my-5">
            <!-- HERO BANNER -->
            <div class="rewards-hero mb-5">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <span class="badge" style="background: linear-gradient(135deg, #f59e0b, #f97316); color: #0a0a0f; font-weight: 700; font-size: 12px; padding: 6px 14px; border-radius: 50px;">🎁 COMMUNITY REWARDS</span>
                        <h1 class="text-white mt-3 font-weight-bold" style="font-size: 36px; line-height: 1.2;">Share & Unlock Exclusive Rewards</h1>
                        <p style="color: #b8b8cc; font-size: 15px;" class="mt-2">Logged-in members can create and share custom rewards, discounts, and promo codes with the entire Cyclone Technologies community!</p>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                        @auth
                            <button type="button" class="btn" style="background: linear-gradient(135deg, #f59e0b, #f97316); color: #0a0a0f; font-weight: 700; border: none; padding: 14px 28px; border-radius: 50px; box-shadow: 0 4px 20px rgba(245,158,11,0.5); font-size: 15px;" data-bs-toggle="modal" data-bs-target="#addRewardModal">
                                ➕ Add New Reward
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="btn" style="background: linear-gradient(135deg, #f59e0b, #f97316); color: #0a0a0f; font-weight: 700; border: none; padding: 14px 28px; border-radius: 50px; box-shadow: 0 4px 20px rgba(245,158,11,0.5); font-size: 15px;">
                                🔒 Login to Add Reward
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- REWARDS GRID -->
            <div class="row">
                @forelse ($rewards as $reward)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="reward-card">
                            <div class="reward-card-img-wrap">
                                @if ($reward->image)
                                    <img src="{{ asset('rewards_images/' . $reward->image) }}" alt="{{ $reward->title }}">
                                @else
                                    <div class="text-center p-4">
                                        <span style="font-size: 54px;">🎁</span>
                                    </div>
                                @endif
                                <span class="reward-badge-pts">
                                    @if($reward->points_required > 0)
                                        ⚡ {{ $reward->points_required }} PTS
                                    @else
                                        🔥 FREE REWARD
                                    @endif
                                </span>
                            </div>
                            <div class="reward-card-body">
                                <div class="reward-user-info">
                                    <div class="reward-user-avatar">
                                        {{ strtoupper(substr($reward->user->name ?? 'U', 0, 1)) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-white" style="font-size: 13.5px; font-weight: 600;">{{ $reward->user->name ?? 'Community Member' }}</h6>
                                        <small style="color: #8b8ba7; font-size: 11px;">Posted {{ $reward->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>

                                <h4 class="text-white mb-2" style="font-size: 18px; font-weight: 700;">{{ $reward->title }}</h4>
                                <p style="color: #b8b8cc; font-size: 13.5px; line-height: 1.5;" class="mb-3 flex-grow-1">
                                    {{ Str::limit($reward->description, 130) }}
                                </p>

                                @if ($reward->reward_code)
                                    <div class="mb-3 p-2 text-center" style="background: rgba(245, 158, 11, 0.1); border: 1px dashed #f59e0b; border-radius: 10px;">
                                        <small style="color: #8b8ba7; font-size: 11px; display: block;">PROMO / REWARD CODE</small>
                                        <span style="color: #f59e0b; font-weight: 700; font-size: 16px; letter-spacing: 1px;">{{ $reward->reward_code }}</span>
                                    </div>
                                @endif

                                <div class="d-flex align-items-center justify-content-between pt-2 border-top border-secondary">
                                    <button class="btn btn-sm px-3" style="background: rgba(245, 158, 11, 0.15); color: #f59e0b; border: 1px solid rgba(245, 158, 11, 0.4); border-radius: 30px; font-weight: 600;" onclick="claimReward('{{ $reward->title }}', '{{ $reward->reward_code }}')">
                                        ✨ Claim Reward
                                    </button>

                                    @auth
                                        @if (Auth::id() == $reward->user_id || Auth::user()->usertype == 1)
                                            <a href="{{ route('rewards.delete', $reward->id) }}" onclick="return confirm('Are you sure you want to delete this reward?')" class="text-danger small ms-2" style="font-weight: 600;">
                                                🗑️ Delete
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="p-5" style="background: #11111e; border: 1px dashed rgba(245, 158, 11, 0.3); border-radius: 20px;">
                            <span style="font-size: 64px;">🎁</span>
                            <h3 class="text-white mt-3">No Rewards Posted Yet</h3>
                            <p style="color: #8b8ba7;">Be the first logged-in user to add a community reward!</p>
                            @auth
                                <button type="button" class="btn mt-3" style="background: linear-gradient(135deg, #f59e0b, #f97316); color: #0a0a0f; font-weight: 700; border-radius: 50px; padding: 12px 24px;" data-bs-toggle="modal" data-bs-target="#addRewardModal">
                                    ➕ Create First Reward
                                </button>
                            @endauth
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

    <!-- ADD REWARD MODAL -->
    @auth
        <div class="modal fade" id="addRewardModal" tabindex="-1" aria-labelledby="addRewardModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content reward-modal">
                    <div class="modal-header border-bottom border-secondary">
                        <h5 class="modal-title text-white font-weight-bold" id="addRewardModalLabel">🎁 Add Community Reward</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('rewards.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label text-white fw-bold">Reward Title *</label>
                                <input type="text" name="title" class="form-control" placeholder="e.g. 15% Off Gaming Keyboards" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white fw-bold">Reward Description *</label>
                                <textarea name="description" class="form-control" rows="4" placeholder="Describe the details and instructions to claim this reward..." required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-white fw-bold">Points Required (Optional)</label>
                                    <input type="number" name="points_required" class="form-control" placeholder="0 for Free" min="0" value="0">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-white fw-bold">Reward / Promo Code (Optional)</label>
                                    <input type="text" name="reward_code" class="form-control" placeholder="e.g. CYCLONE15">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white fw-bold">Reward Image (Optional)</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="modal-footer border-top border-secondary">
                            <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn" style="background: linear-gradient(135deg, #f59e0b, #f97316); color: #0a0a0f; font-weight: 700; border-radius: 50px; padding: 10px 24px; border: none;">
                                🚀 Publish Reward
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endauth

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
    <script>
        function claimReward(title, code) {
            let msg = 'You have unlocked reward: ' + title;
            if (code) {
                msg += '\nPromo Code: ' + code;
            }
            alert(msg);
        }
    </script>
</body>

</html>
