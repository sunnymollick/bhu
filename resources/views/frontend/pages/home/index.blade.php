@extends('frontend.layouts.default')

@section('title', 'Home - Bengali Hindu Unity')

@section('stylesheet')
<style>
    /* Banner breadcrumb positioning */
    .sigma_banner.banner-3 {
        position: relative;
    }

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
        box-shadow: 0px 10px 20px 0px rgb(53 82 99 / 9%);
        justify-content: center;
        align-items: center;
    }

    /* Keep header top section visible when sticky */
    .sigma_header.header-fixed .sigma_header-top,
    .sigma_header.can-sticky .sigma_header-top {
        display: block !important;
    }
</style>
@endsection

@section('content')
    <!-- Banner Start -->
    <div class="sigma_banner banner-3">

        <div class="sigma_banner-slider">

        <!-- Banner Item Start -->
        <div class="light-bg sigma_banner-slider-inner bg-cover bg-center" style="background-image: url('{{ asset('frontend/assets/img/banner/h1.webp') }}');">
            <div class="sigma_banner-text">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="title">BHU (Bengali Hindu Unity) fighting for our rights</h1>
                    <p class="blockquote mb-0 bg-transparent"> We are concerned Hindus working to unite 20 million fellow Hindus under a single organization to advocate for our rights. </p>
                    <div class="section-button d-flex align-items-center">
                    <a href="{{ url('/contact-us') }}" class="sigma_btn-custom">Join Today <i class="far fa-arrow-right"></i> </a>
                    <a href="{{ url('/services') }}" class="ms-3 sigma_btn-custom white">View Services <i class="far fa-arrow-right"></i> </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Banner Item End -->

        <!-- Banner Item Start -->
        <div class="light-bg sigma_banner-slider-inner bg-cover bg-center" style="background-image: url('https://placehold.co/1920x707');">
            <div class="sigma_banner-text">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="title">Get united under one platform</h1>
                    <p class="blockquote mb-0 bg-transparent"> Connecting every voice of Hindu heritage—stronger together, smarter together. </p>
                    <div class="section-button d-flex align-items-center">
                    <a href="{{ url('/contact-us') }}" class="sigma_btn-custom">Join Today <i class="far fa-arrow-right"></i> </a>
                    <a href="{{ url('/services') }}" class="ms-3 sigma_btn-custom white">View Services <i class="far fa-arrow-right"></i> </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Banner Item End -->

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
                <h4 class="title">Who We Are</h4>
            </div>
            <p class="disc">We are Bangladeshi Hindus from all over the world, united by a common purpose — to protect our community, stand against oppression, and raise our collective voice. Our goal is to ensure dignity, equality, and the right to live a peaceful life in our motherland.

Beyond protection, we aim to preserve our culture, strengthen our networks, and empower the next generation. By connecting temples, organizations, and individuals, we are building a stronger foundation for unity, resilience, and hope.

Together, we stand as one community — proud of our heritage, determined in our struggle, and committed to a brighter future.</p>
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
                <div class="col-md-4">
                    <div class="sigma_icon-block icon-block-2">
                        <div class="sigma_icon-block-content">
                            <h5> Promote Business </h5>
                            <p>Showcase and support Hindu-owned businesses. Grow your network, find trusted partners, and strengthen our community economy.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sigma_icon-block icon-block-2">
                        <div class="sigma_icon-block-content">
                            <h5> Study Help </h5>
                            <p>Get access to study materials, tutoring, and peer guidance so Hindu students can achieve their academic goals with confidence.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sigma_icon-block icon-block-2">
                        <div class="sigma_icon-block-content">
                            <h5> Medical Help </h5>
                            <p>Find reliable doctors, clinics, and medical support within the community. Together, we ensure better healthcare access for all.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sigma_icon-block icon-block-2">
                        <div class="sigma_icon-block-content">
                            <h5> Financial Stability </h5>
                            <p>Connect with resources, advice, and support systems that help community members achieve financial security and independence.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sigma_icon-block icon-block-2">
                        <div class="sigma_icon-block-content">
                            <h5> Residential Facility </h5>
                            <p>Discover safe housing options and connect with trusted landlords or facilities that respect and protect our community.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sigma_icon-block icon-block-2">
                        <div class="sigma_icon-block-content">
                            <h5> Counseling </h5>
                            <p>Receive guidance and emotional support in a safe space. Professional and community counseling is available for those in need.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sigma_icon-block icon-block-2">
                        <div class="sigma_icon-block-content">
                            <h5> Job Finding </h5>
                            <p>Explore job opportunities shared within the community. We help connect skilled individuals with employers who value their talents.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sigma_icon-block icon-block-2">
                        <div class="sigma_icon-block-content">
                            <h5> Career Advice </h5>
                            <p>Get mentorship and professional guidance to choose the right career path and achieve long-term success.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sigma_icon-block icon-block-2">
                        <div class="sigma_icon-block-content">
                            <h5> Event Booking </h5>
                            <p>Search for venues to host cultural, social, and religious events. Easily book spaces that celebrate and respect our traditions.</p>
                        </div>
                    </div>
                </div>
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
                            <h3 class="counter title">17 </h3>
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
                            <h3 class="counter title mb-0 ms-3">25</h3>
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
                            <h3 class="counter title">100</h3>
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

        // Sample Bangladesh locations
        const locations = [
            { lat: 23.8103, lng: 90.4125 }, // Dhaka
            { lat: 22.3569, lng: 91.7832 }, // Chittagong
            { lat: 22.8456, lng: 89.5403 }, // Khulna
            { lat: 24.3745, lng: 88.6042 }, // Rajshahi
            { lat: 24.8949, lng: 91.8687 }, // Sylhet
            { lat: 22.7010, lng: 90.3535 }, // Barisal
            { lat: 25.7439, lng: 89.2752 }, // Rangpur
            { lat: 23.4607, lng: 91.1809 }  // Comilla
        ];

        // Create markers
        const markers = locations.map((position, i) => {
            return new google.maps.Marker({
                position,
                title: `Location ${i + 1}`
            });
        });

        // Add marker clusterer
        new markerClusterer.MarkerClusterer({ map, markers });
    }
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTRqyVq5k6iX60e382PGnio2_vWLd2yCg&callback=initMap"
    async
    defer></script>
@endsection

