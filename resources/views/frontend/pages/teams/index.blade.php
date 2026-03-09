@extends('frontend.layouts.default')

@section('title', 'Our Team - Bengali Hindu Unity')

@section('stylesheet')
<style>
    /* ── Section title ── */
    .team-section-title {
        text-align: center;
        margin-bottom: 50px;
    }
    .team-section-title .subtitle {
        display: inline-block;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #dc8a45;
        margin-bottom: 10px;
    }
    .team-section-title h2 {
        font-size: 36px;
        font-weight: 800;
        color: #1a1a2e;
        margin-bottom: 15px;
    }
    .team-section-title .title-divider {
        width: 60px;
        height: 3px;
        background: linear-gradient(to right, #dc8a45, #5c5555);
        margin: 0 auto;
        border-radius: 2px;
    }

    /* ── Team card ── */
    .team-member-card {
        position: relative;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 6px 25px rgba(0,0,0,0.09);
        background: #fff;
        transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .team-member-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 45px rgba(0,0,0,0.15);
    }

    /* Photo */
    .team-member-card .card-photo {
        position: relative;
        overflow: hidden;
        height: 290px;
    }
    .team-member-card .card-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        transition: transform 0.5s ease;
        display: block;
    }
    .team-member-card:hover .card-photo img {
        transform: scale(1.07);
    }

    /* Overlay on hover */
    .team-member-card .card-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(28, 28, 28, 0.82) 0%, rgba(28,28,28,0.1) 55%, transparent 100%);
        opacity: 0;
        transition: opacity 0.35s ease;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        padding-bottom: 22px;
    }
    .team-member-card:hover .card-overlay {
        opacity: 1;
    }

    /* Social icons inside overlay */
    .team-member-card .card-socials {
        display: flex;
        gap: 10px;
        list-style: none;
        padding: 0;
        margin: 0;
        transform: translateY(15px);
        transition: transform 0.35s ease;
    }
    .team-member-card:hover .card-socials {
        transform: translateY(0);
    }
    .team-member-card .card-socials li a {
        width: 36px;
        height: 36px;
        background: #fff;
        color: #dc8a45;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        text-decoration: none;
        transition: background 0.25s, color 0.25s;
    }
    .team-member-card .card-socials li a:hover {
        background: #dc8a45;
        color: #fff;
    }

    /* Card body */
    .team-member-card .card-body-info {
        padding: 18px 20px 20px;
        text-align: center;
        border-top: 3px solid transparent;
        background: #fff;
        transition: border-color 0.3s;
    }
    .team-member-card:hover .card-body-info {
        border-top-color: #dc8a45;
    }
    .team-member-card .card-body-info .role-badge {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: #fff;
        background: linear-gradient(to right, #dc8a45, #b85700);
        padding: 3px 12px;
        border-radius: 20px;
        margin-bottom: 10px;
    }
    .team-member-card .card-body-info h5 {
        font-size: 17px;
        font-weight: 700;
        color: #1a1a2e;
        margin: 0;
    }
    .team-member-card .card-body-info h5 a {
        color: #1a1a2e;
        text-decoration: none;
        transition: color 0.2s;
    }
    .team-member-card .card-body-info h5 a:hover {
        color: #dc8a45;
    }

    /* ── Empty state ── */
    .team-empty-state {
        text-align: center;
        padding: 70px 20px;
        width: 100%;
    }
    .team-empty-state i {
        font-size: 64px;
        color: #e0e0e0;
        display: block;
        margin-bottom: 20px;
    }
    .team-empty-state h4 {
        color: #aaa;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .team-empty-state p {
        color: #ccc;
        font-size: 15px;
    }

    /* ── Volunteer form ── */
    .volunteer-section-title {
        margin-bottom: 30px;
    }
    .volunteer-section-title h3 {
        font-size: 28px;
        font-weight: 800;
        color: #fff;
        margin-bottom: 8px;
    }
    .volunteer-section-title p {
        color: rgba(255,255,255,0.8);
        font-size: 15px;
        margin: 0;
    }
    .volunteer-form .form-control.transparent {
        background-color: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.4);
        color: #fff;
        border-radius: 8px;
        transition: background 0.2s, border-color 0.2s;
    }
    .volunteer-form .form-control.transparent::placeholder {
        color: rgba(255,255,255,0.65);
    }
    .volunteer-form .form-control.transparent:focus {
        background-color: rgba(255,255,255,0.25);
        border-color: #fff;
        box-shadow: none;
        color: #fff;
    }
    .volunteer-form .form-group i {
        color: rgba(255,255,255,0.7);
    }
    .volunteer-form .sigma_btn-custom {
        background: #dc8a45;
        color: #fff;
        font-weight: 700;
        border-radius: 8px;
        border: 0;
        outline: none;
    }
    .volunteer-form .sigma_btn-custom::before {
        background-color: #fff;
        border-radius: 8px;
    }
    .volunteer-form .sigma_btn-custom:hover,
    .volunteer-form .sigma_btn-custom:focus {
        color: #dc8a45;
        outline: none;
        box-shadow: none;
    }

    /* =============================================
       RESPONSIVE — TABLET LANDSCAPE (≤1199px)
       ============================================= */
    @media (max-width: 1199.98px) {
        .team-member-card .card-photo {
            height: 260px;
        }

        .team-member-card .card-body-info {
            padding: 14px 16px 16px;
        }

        .team-member-card .card-body-info h5 {
            font-size: 15px;
        }

        .team-member-card .card-body-info .role-badge {
            font-size: 10px;
            padding: 3px 10px;
        }
    }

    /* =============================================
       RESPONSIVE — TABLET PORTRAIT (≤991px)
       ============================================= */
    @media (max-width: 991.98px) {
        .team-section-title h2 {
            font-size: 30px;
        }

        .team-section-title {
            margin-bottom: 35px;
        }

        .team-member-card .card-photo {
            height: 240px;
        }

        .team-member-card .card-body-info h5 {
            font-size: 15px;
        }

        /* Volunteer form */
        .volunteer-section-title h3 {
            font-size: 24px;
        }

        .volunteer-section-title p {
            font-size: 14px;
        }

        .volunteer-form .form-row {
            display: flex;
            flex-wrap: wrap;
        }

        .volunteer-form .form-row .col-lg-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .volunteer-form .form-row .col-lg-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    /* =============================================
       RESPONSIVE — MOBILE LANDSCAPE (≤767px)
       ============================================= */
    @media (max-width: 767.98px) {
        .team-section-title h2 {
            font-size: 26px;
        }

        .team-section-title .subtitle {
            font-size: 12px;
            letter-spacing: 2px;
        }

        .team-section-title {
            margin-bottom: 30px;
        }

        .team-member-card {
            margin-bottom: 20px;
            border-radius: 12px;
        }

        .team-member-card .card-photo {
            height: 260px;
        }

        /* Show overlay on mobile since no hover */
        .team-member-card .card-overlay {
            opacity: 1;
            background: linear-gradient(to top, rgba(28,28,28,0.7) 0%, transparent 50%);
        }

        .team-member-card .card-socials {
            transform: translateY(0);
        }

        .team-member-card .card-body-info {
            padding: 14px 16px 16px;
            border-top-color: #dc8a45;
        }

        .team-member-card .card-body-info h5 {
            font-size: 16px;
        }

        /* Disable hover lift on touch */
        .team-member-card:hover {
            transform: none;
            box-shadow: 0 6px 25px rgba(0,0,0,0.09);
        }

        /* Volunteer form */
        .volunteer-section-title {
            text-align: center;
            margin-bottom: 24px;
        }

        .volunteer-section-title h3 {
            font-size: 22px;
        }

        .volunteer-form .form-row .col-lg-6 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        /* Empty state */
        .team-empty-state {
            padding: 50px 15px;
        }

        .team-empty-state i {
            font-size: 48px;
        }

        .team-empty-state h4 {
            font-size: 18px;
        }

        .team-empty-state p {
            font-size: 13px;
        }
    }

    /* =============================================
       RESPONSIVE — MOBILE PORTRAIT (≤575px)
       ============================================= */
    @media (max-width: 575.98px) {
        .team-section-title h2 {
            font-size: 22px;
        }

        .team-section-title .title-divider {
            width: 45px;
        }

        .team-member-card .card-photo {
            height: 230px;
        }

        .team-member-card .card-socials li a {
            width: 32px;
            height: 32px;
            font-size: 12px;
        }

        .team-member-card .card-body-info .role-badge {
            font-size: 10px;
            padding: 2px 10px;
            letter-spacing: 1px;
        }

        .team-member-card .card-body-info h5 {
            font-size: 15px;
        }

        .volunteer-section-title h3 {
            font-size: 20px;
        }

        .volunteer-section-title p {
            font-size: 13px;
        }

        .volunteer-form .sigma_btn-custom {
            font-size: 14px;
            padding: 10px;
        }
    }

    /* =============================================
       RESPONSIVE — VERY SMALL (≤399px)
       ============================================= */
    @media (max-width: 399.98px) {
        .team-section-title h2 {
            font-size: 20px;
        }

        .team-member-card .card-photo {
            height: 200px;
        }

        .team-member-card .card-body-info {
            padding: 12px 12px 14px;
        }

        .team-member-card .card-body-info h5 {
            font-size: 14px;
        }

        .volunteer-section-title h3 {
            font-size: 18px;
        }

        .volunteer-form .sigma_btn-custom {
            font-size: 13px;
        }
    }

    /* ===== Sub-head banner & breadcrumb — Responsive ===== */

    /* Small Laptop (1024px – 1365px) */
    @media (min-width: 1024px) and (max-width: 1365px) {
        .sub-head-banner {
            height: 260px;
        }
        .header-img-text {
            font-size: 1.3rem;
            line-height: 1.35;
        }
    }

    /* Tablet (768px – 1023px) */
    @media (min-width: 768px) and (max-width: 1023px) {
        .sub-head-banner {
            height: 250px;
        }
        .header-img-text {
            font-size: 1.1rem;
            line-height: 1.3;
        }
    }

    /* Phones – general (≤575px) */
    @media (max-width: 575px) {
        .sub-head-banner {
            height: 200px;
        }
        .header-img-text {
            font-size: 1.15rem;
            padding: 0 12px;
            width: 90%;
        }
        .sigma_subheader .breadcrumb {
            padding: 20px 28px;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 94vw;
        }
        .sigma_subheader .breadcrumb .breadcrumb-item {
            display: inline-flex;
            align-items: center;
            font-size: 12px;
            line-height: 1.2;
        }
        .sigma_subheader .breadcrumb li a,
        .sigma_subheader .breadcrumb-item a.btn-link {
            font-size: 12px !important;
            line-height: 1.2;
        }
        .sigma_subheader .breadcrumb .breadcrumb-item.active {
            font-size: 12px;
            line-height: 1.2;
        }
        .sigma_subheader .breadcrumb-item+.breadcrumb-item::before {
            font-size: 13px;
            line-height: 1.2;
            display: inline-flex;
            align-items: center;
            padding-right: 8px;
        }
        .sigma_subheader .breadcrumb-item+.breadcrumb-item {
            padding-left: 8px;
        }
    }

    /* Mobile M / narrow phones (≤425px) */
    @media (max-width: 425px) {
        .sigma_subheader .breadcrumb {
            padding: 18px 24px;
        }
        .sub-head-banner {
            height: 170px;
        }
        .header-img-text {
            font-size: 1rem;
        }
        .sigma_subheader .breadcrumb .breadcrumb-item {
            font-size: 11px;
        }
        .sigma_subheader .breadcrumb li a,
        .sigma_subheader .breadcrumb-item a.btn-link {
            font-size: 11px !important;
        }
        .sigma_subheader .breadcrumb .breadcrumb-item.active {
            font-size: 11px;
        }
        .sigma_subheader .breadcrumb-item+.breadcrumb-item::before {
            font-size: 12px;
        }
    }

    /* Mobile S (≤375px) */
    @media (max-width: 375px) {
        .sigma_subheader .breadcrumb {
            padding: 16px 20px;
        }
        .sub-head-banner {
            height: 150px;
        }
        .header-img-text {
            font-size: 0.9rem;
        }
        .sigma_subheader .breadcrumb .breadcrumb-item {
            font-size: 10px;
        }
        .sigma_subheader .breadcrumb li a,
        .sigma_subheader .breadcrumb-item a.btn-link {
            font-size: 10px !important;
        }
        .sigma_subheader .breadcrumb .breadcrumb-item.active {
            font-size: 10px;
        }
        .sigma_subheader .breadcrumb-item+.breadcrumb-item::before {
            font-size: 11px;
            padding-right: 6px;
        }
        .sigma_subheader .breadcrumb-item+.breadcrumb-item {
            padding-left: 6px;
        }
    }
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">Our Team</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-normal">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Our Team</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<!-- volunteers Start -->
<div class="section section-padding" style="background: #f8f8f8;">
    <div class="container">

        <div class="team-section-title">
            <span class="subtitle">Meet The People</span>
            <h2>Our Dedicated Team</h2>
            <div class="title-divider"></div>
        </div>

        <div class="row">

            @if(isset($teams) && $teams->count() > 0)
                @foreach($teams as $team)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="team-member-card">
                            <div class="card-photo">
                                @if($team->profile_pic)
                                    <img src="{{ asset('backend/uploads/user/' . $team->profile_pic) }}" alt="{{ $team->name }}">
                                @else
                                    <img src="{{ asset('frontend/assets/img/man-avatar.png') }}" alt="{{ $team->name }}">
                                @endif
                                <div class="card-overlay">
                                    <ul class="card-socials">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body-info">
                                @if($team->role)
                                    <span class="role-badge">{{ $team->role->name }}</span>
                                @endif
                                <h5><a href="#">{{ $team->name }}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="team-empty-state">
                        <i class="fal fa-users"></i>
                        <h4>No Team Members Found</h4>
                        <p>There are currently no team members to display. Please check back later.</p>
                    </div>
                </div>
            @endif

        </div>

    </div>
</div>
<!-- volunteers End -->

<!-- Form Start -->
<div class="section" style="background: linear-gradient(135deg, #dc8a45 0%, #7a4520 60%, #5c5555 100%)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-lg-0 mb-4">
                <div class="volunteer-section-title">
                    <h3>Become a Volunteer</h3>
                    <p>Join our community and make a difference. Fill out the form and we'll get in touch with you shortly.</p>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <form class="volunteer-form" method="post" action="{{ route('volunteer.register') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="far fa-user"></i>
                                <input type="text" class="form-control transparent" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="far fa-user"></i>
                                <input type="text" class="form-control transparent" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="far fa-phone"></i>
                                <input type="text" class="form-control transparent" placeholder="Phone" name="phone" value="{{ old('phone') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="far fa-envelope"></i>
                                <input type="email" class="form-control transparent" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="message" class="form-control transparent" placeholder="Enter Message" rows="4" required>{{ old('message') }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="sigma_btn-custom d-block w-100" name="button"> Register as Volunteer <i class="far fa-arrow-right"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Form End -->
@endsection

@section('custom_scripts')
<script>
    // Custom JavaScript for team page if needed
</script>
@endsection
