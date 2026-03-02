@extends('frontend.layouts.default')

@section('title', 'Home - Bengali Hindu Unity')

@section('stylesheet')
<style>
    /* =============================================
       SERVICE ICON STYLING
       ============================================= */
    .sigma_icon-block .icon-wrapper {
        margin-bottom: 20px;
    }

    .sigma_icon-block .icon-wrapper i {
        font-size: 48px;
        color: #dc8a45;
        transition: all 0.3s ease;
    }

    .sigma_icon-block:hover .icon-wrapper i {
        color: #c77835;
        transform: scale(1.1);
    }

    /* =============================================
       BANNER — BASE (Desktop-first, ≥1200px)
       ============================================= */
    .sigma_banner.banner-3 {
        position: relative;
    }

    /* Slider slide
       – Use aspect-ratio so the banner scales proportionally
       – min-height as a safety net, clamp() for fluid scaling          */
    .banner-3.sigma_banner .sigma_banner-slider-inner {
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: center center !important;
        position: relative;
        display: flex;
        align-items: flex-end;
        width: 100%;
        min-height: clamp(320px, 42vw, 707px);   /* fluid: 320px → 707px */
        aspect-ratio: 1920 / 707;                 /* matches the original image ratio */
        padding: 0;
        overflow: hidden;
    }

    /* Text overlay (title / subtitle) */
    .sigma_banner-text {
        width: 100%;
    }

    .sigma_banner-text .title {
        color: #fff;
        font-weight: 700;
        font-size: clamp(1.5rem, 2.5vw + 0.5rem, 3rem);
        line-height: 1.1;
    }

    .sigma_banner-text .blockquote {
        color: #f1f1f1;
        font-size: clamp(0.875rem, 1vw + 0.25rem, 1.125rem);
    }

    /* CTA buttons row — pinned to bottom of the slide */
    .banner-buttons-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 10;
        padding-bottom: clamp(24px, 5vw, 80px);
    }

    .banner-buttons-bottom .section-button {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 12px;
        padding-left: clamp(16px, 3vw, 50px);
    }

    .section-button .sigma_btn-custom {
        white-space: nowrap;
        font-size: clamp(12px, 1vw + 4px, 14px);
        padding: clamp(8px, 1.2vw, 15px) clamp(16px, 2.5vw, 30px);
        border-radius: 30px;
    }

    .section-button .sigma_btn-custom i {
        margin-left: 6px;
        font-size: inherit;
    }

    /* Breadcrumb pill */
    .sigma_banner.banner-3 .breadcrumb {
        position: absolute;
        bottom: -32px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        background: #fff;
        padding: 20px 28px;
        border-radius: 50px;
        margin: 0;
        box-shadow: 0 10px 20px 0 rgb(53 82 99 / 9%);
        justify-content: center;
        align-items: center;
    }

    .sigma_banner.banner-3 .breadcrumb-item + .breadcrumb-item {
        padding-left: 15px;
    }

    .sigma_banner.banner-3 .breadcrumb-item a.btn-link {
        position: relative;
        color: #dc8a45 !important;
        font-weight: 700;
        font-size: 14px;
    }

    .sigma_banner.banner-3 .breadcrumb-item a.btn-link:hover {
        color: #c77835 !important;
    }

    .sigma_banner.banner-3 .breadcrumb .breadcrumb-item.active {
        color: #5c5555 !important;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 14px;
        display: flex;
        align-items: center;
    }

    /* Keep header top section visible when sticky */
    .sigma_header.header-fixed .sigma_header-top,
    .sigma_header.can-sticky .sigma_header-top {
        display: block !important;
    }

    /* =============================================
       BANNER — LARGE DESKTOP OVERRIDE (≥1400px)
       ============================================= */
    @media (min-width: 1400px) {
        .banner-3.sigma_banner .sigma_banner-slider-inner {
            min-height: 707px;
        }
    }

    /* =============================================
       BANNER — TABLET LANDSCAPE (≤1199px)
       ============================================= */
    @media (max-width: 1199.98px) {
        .banner-3.sigma_banner .sigma_banner-slider-inner {
            min-height: 420px;
        }

        .banner-buttons-bottom {
            padding-bottom: 36px;
        }

        .banner-buttons-bottom .section-button {
            padding-left: 30px;
        }
    }

    /* =============================================
       BANNER — TABLET PORTRAIT (≤991px)
       ============================================= */
    @media (max-width: 991.98px) {
        .banner-3.sigma_banner .sigma_banner-slider-inner {
            min-height: 360px;
            aspect-ratio: 16 / 9;
        }

        .sigma_banner-text .title {
            font-size: 1.75rem;
        }

        .banner-buttons-bottom {
            padding-bottom: 28px;
        }

        .banner-buttons-bottom .section-button {
            padding-left: 20px;
            gap: 10px;
        }

        .section-button .sigma_btn-custom {
            font-size: 13px;
            padding: 12px 24px;
        }

        .sigma_banner.banner-3 .breadcrumb {
            padding: 16px 22px;
            bottom: -28px;
        }
    }

    /* =============================================
       BANNER — MOBILE LANDSCAPE (≤767px)
       ============================================= */
    @media (max-width: 767.98px) {
        .banner-3.sigma_banner .sigma_banner-slider-inner {
            min-height: 280px;
            aspect-ratio: 16 / 8;
            align-items: center;
        }

        .sigma_banner-text .title {
            font-size: 1.5rem;
            margin-bottom: 8px;
        }

        .sigma_banner-text .blockquote {
            font-size: 0.875rem;
            margin-bottom: 10px;
        }

        /* Stack buttons vertically and center */
        .banner-buttons-bottom {
            position: absolute;
            padding-bottom: 20px;
        }

        .banner-buttons-bottom .section-button {
            padding-left: 16px;
            padding-right: 16px;
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        .section-button .sigma_btn-custom {
            font-size: 12.5px;
            padding: 10px 20px;
        }

        .section-button .ms-3 {
            margin-left: 0 !important;
        }

        .sigma_banner.banner-3 .breadcrumb {
            bottom: -24px;
            padding: 12px 20px;
            border-radius: 40px;
        }
    }

    /* =============================================
       BANNER — MOBILE PORTRAIT (≤575px)
       ============================================= */
    @media (max-width: 575.98px) {
        .banner-3.sigma_banner .sigma_banner-slider-inner {
            min-height: 220px;
            aspect-ratio: 16 / 9;
        }

        .sigma_banner-text .title {
            font-size: 1.25rem;
        }

        .sigma_banner-text .blockquote {
            font-size: 0.8125rem;
        }

        .banner-buttons-bottom {
            padding-bottom: 14px;
        }

        .banner-buttons-bottom .section-button {
            padding-left: 12px;
            padding-right: 12px;
        }

        .section-button .sigma_btn-custom {
            padding: 8px 16px;
            font-size: 13px;
        }

        .sigma_banner.banner-3 .breadcrumb {
            bottom: -20px;
            padding: 10px 16px;
        }

        .sigma_banner.banner-3 .breadcrumb .breadcrumb-item.active,
        .sigma_banner.banner-3 .breadcrumb-item a.btn-link {
            font-size: 12px;
        }
    }

    /* =============================================
       BANNER — VERY SMALL SCREENS (≤399px)
       ============================================= */
    @media (max-width: 399.98px) {
        .banner-3.sigma_banner .sigma_banner-slider-inner {
            min-height: 180px;
            aspect-ratio: auto;
        }

        .sigma_banner-text .title {
            font-size: 1.1rem;
        }

        .banner-buttons-bottom .section-button {
            gap: 5px;
        }

        .section-button .sigma_btn-custom {
            padding: 6px 12px;
            font-size: 11px;
            border-radius: 24px;
        }

        .section-button .sigma_btn-custom i {
            margin-left: 4px;
        }
    }
</style>
@endsection

@section('content')
    <!-- Banner Start -->
    <div class="sigma_banner banner-3">
        <div class="sigma_banner-slider">

            @forelse($banners as $banner)
            {{-- Resolve image URL once for readability --}}
            @php
                $bannerImg = match(true) {
                    $banner->image_name === 'h1.webp'        => asset('frontend/assets/img/banner/h1.webp'),
                    $banner->image_name === 'placeholder.jpg' => 'https://placehold.co/1920x707',
                    default                                   => asset('backend/uploads/banner/' . $banner->image_name),
                };
            @endphp
            <!-- Banner Item Start -->
            <div class="light-bg sigma_banner-slider-inner" style="background-image: url('{{ $bannerImg }}');">

                <div class="sigma_banner-text">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                {{-- <h1 class="title">{{ $banner->title }}</h1>
                                <p class="blockquote mb-0 bg-transparent">{{ $banner->subtitle }}</p> --}}
                            </div>
                        </div>
                    </div>
                </div>

                @if(($banner->button_text_1 && $banner->button_link_1) || ($banner->button_text_2 && $banner->button_link_2))
                <div class="banner-buttons-bottom">
                    <div class="container">
                        <div class="section-button">
                            @if($banner->button_text_1 && $banner->button_link_1)
                            <a href="{{ url($banner->button_link_1) }}" class="sigma_btn-custom">{{ $banner->button_text_1 }} <i class="far fa-arrow-right"></i></a>
                            @endif
                            @if($banner->button_text_2 && $banner->button_link_2)
                            <a href="{{ url($banner->button_link_2) }}" class="sigma_btn-custom white">{{ $banner->button_text_2 }} <i class="far fa-arrow-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

            </div>
            <!-- Banner Item End -->

            @empty
            <!-- Default Banner Item -->
            <div class="light-bg sigma_banner-slider-inner" style="background-image: url('{{ asset('frontend/assets/img/banner/h1.webp') }}');">

                <div class="sigma_banner-text">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <h1 class="title">BHU (Bengali Hindu Unity) fighting for our rights</h1>
                                <p class="blockquote mb-0 bg-transparent">We are concerned Hindus working to unite 20 million fellow Hindus under a single organization to advocate for our rights.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="banner-buttons-bottom">
                    <div class="container">
                        <div class="section-button">
                            <a href="{{ url('/contact-us') }}" class="sigma_btn-custom">Join Today <i class="far fa-arrow-right"></i></a>
                            <a href="{{ url('/services') }}" class="sigma_btn-custom white">View Services <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            @endforelse

        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>
    </div>
    <!-- Banner End -->

    <!-- Who We Are Section Start -->
    <section class="section section-padding light-bg">
        <div class="container">
            <div class="section-title section-title-2 text-center">
                <h4 class="title">{{ $about?->who_we_are_title ?? 'Who We Are' }}</h4>
            </div>
            @if($about?->who_we_are_content)
                <div class="disc">{!! $about->who_we_are_content !!}</div>
            @endif
        </div>
    </section>
    <!-- Who We Are Section End -->

    <!-- How We Can Help Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="section-title section-title-2 text-center">
                <h4 class="title">How We Can Help</h4>
            </div>

            <div class="row">
                @forelse($services as $service)
                <div class="col-md-4">
                    <div class="sigma_icon-block icon-block-2">
                        @if($service->icon)
                        <div class="icon-wrapper">
                            <i class="fas {{ $service->icon }}"></i>
                        </div>
                        @endif
                        <div class="sigma_icon-block-content">
                            <h5>{{ $service->title }}</h5>
                            <p>{{ Str::limit($service->description, 130) }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>No services available at the moment.</p>
                </div>
                @endforelse
            </div>

            <div class="text-center mt-3">
                <h5 class="text-center">Need Our Support?</h5>
                <a href="{{ url('/register') }}" class="mt-3 sigma_btn-custom dark">Register Today</a>
            </div>
        </div>
    </div>
    <!-- How We Can Help End -->

    <!-- Fun Facts Section Start -->
    <div class="rts-fun-facts-area rts-section-gap bg-dark-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h4 class="title">Empowering Hindus, Securing Our Future</h4>
                        <p class="disc">
                            This platform brings together Hindus across Bangladesh to stand united for our rights, culture, and community. With thousands of members, temples, and organizations connected, we are building a stronger voice and a stronger future. Together, we protect our heritage and empower our people.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-24 mt--40">
                <div class="col-lg-4">
                    <div class="single-facts-three horizontal-fact">
                        <div class="icon-and-number">
                            <div class="icon">
                                <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                            </div>
                            <h3 class="counter title">{{ number_format($statistics['users']) }}</h3>
                        </div>
                        <div class="inner">
                            <span class="bottom">Registered Users</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-facts-three horizontal-fact">
                        <div class="icon-and-number">
                            <div class="icon">
                                <i class="fa fa-building fa-3x" aria-hidden="true"></i>
                            </div>
                            <h3 class="counter title mb-0 ms-3">{{ number_format($statistics['organizations']) }}</h3>
                        </div>
                        <div class="inner">
                            <span class="bottom">Registered Organizations</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-facts-three horizontal-fact">
                        <div class="icon-and-number">
                            <div class="icon">
                                <i class="fa fa-university fa-3x" aria-hidden="true"></i>
                            </div>
                            <h3 class="counter title">{{ number_format($statistics['temples']) }}</h3>
                        </div>
                        <div class="inner">
                            <span class="bottom">Registered Temples</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fun Facts Section End -->

    <!-- Map Start -->
    <div class="section d-none d-lg-block p-0">
        <div id="map" style="width:100%;height:700px;"></div>
    </div>
    <!-- Map End -->

    <!-- Back To Top Start -->
    <div class="sigma_top style-5">
        <i class="far fa-angle-double-up"></i>
    </div>
    <!-- Back To Top End -->
@endsection

@section('custom_scripts')
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
<script>
    function initMap() {
        // Create the map centered on Bangladesh
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 7,
            center: { lat: 23.6850, lng: 90.3563 }, // Bangladesh center
        });

        // Dynamic locations from database
        const locations = @json($mapLocations);

        // Create markers with InfoWindow
        const markers = locations.map((location, i) => {
            const marker = new google.maps.Marker({
                position: { lat: location.lat, lng: location.lng },
                title: location.name
            });

            // Add click listener to show InfoWindow
            const infoWindow = new google.maps.InfoWindow({
                content: `<div style="padding: 5px;">
                            <h6 style="margin: 0 0 5px 0; font-weight: bold;">${location.name}</h6>
                            <p style="margin: 0; font-size: 13px; color: #666;">${location.address || 'No address available'}</p>
                          </div>`
            });

            marker.addListener('click', () => {
                infoWindow.open(map, marker);
            });

            return marker;
        });

        // Add marker clusterer for better performance with many markers
        new markerClusterer.MarkerClusterer({ map, markers });
    }
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTRqyVq5k6iX60e382PGnio2_vWLd2yCg&callback=initMap"
    async
    defer></script>
@endsection

