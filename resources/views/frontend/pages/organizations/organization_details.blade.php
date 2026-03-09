@extends('frontend.layouts.default')

@section('title', $organization->name . ' - Bengali Hindu Unity')

@section('stylesheet')
<style>
    .lSPrev, .lSNext {
        background: rgba(0, 0, 0, 0.5); /* Black with 50% transparency */
        border-radius: 50%; /* Optional: make the background circle */
        padding: 10px; /* Adds some space around the arrow icon */
        color: white; /* Make the arrow icon white for contrast */
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10; /* Make sure arrows appear above the slider content */
    }

    .lSPrev {
        left: 10px; /* Adjust distance from the left */
    }

    .lSNext {
        right: 10px; /* Adjust distance from the right */
    }

    /* Upcoming Events Slider Styles */
    .upcoming-events-slider {
        margin: 0 -15px;
    }

    .event-card {
        padding: 0 15px;
        margin-bottom: 30px;
    }

    .event-card-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .event-card-inner {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
    }

    .event-card-inner:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    .event-image {
        position: relative;
        overflow: hidden;
        height: 250px;
    }

    .event-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .event-card-inner:hover .event-image img {
        transform: scale(1.1);
    }

    .event-card-content {
        background: #fff;
    }

    .event-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .event-meta {
        font-size: 0.9rem;
        color: #666;
    }

    .event-meta i {
        color: #e76f51;
    }

    /* Slick Slider Custom Arrows */
    .upcoming-events-slider .slick-prev,
    .upcoming-events-slider .slick-next {
        background: rgba(231, 111, 81, 0.9);
        border-radius: 50%;
        width: 40px;
        height: 40px;
        z-index: 10;
    }

    .upcoming-events-slider .slick-prev:hover,
    .upcoming-events-slider .slick-next:hover {
        background: rgba(231, 111, 81, 1);
    }

    .upcoming-events-slider .slick-prev {
        left: -20px;
    }

    .upcoming-events-slider .slick-next {
        right: -20px;
    }

    .upcoming-events-slider .slick-prev:before,
    .upcoming-events-slider .slick-next:before {
        font-size: 20px;
    }

    /* Grid layout for 3 or fewer events */
    .events-grid-layout {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 30px;
    }

    .events-grid-layout .event-card {
        flex: 0 0 calc(33.333% - 20px);
        max-width: calc(33.333% - 20px);
        padding: 0;
        margin-bottom: 0;
    }

    @media (max-width: 991px) {
        .events-grid-layout .event-card {
            flex: 0 0 calc(50% - 15px);
            max-width: calc(50% - 15px);
        }
    }

    @media (max-width: 575px) {
        .events-grid-layout .event-card {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    /* Force square "Similar Organization" thumbnails */
    .sidebar-widget.widget-recent-posts .sigma_recent-post > a img {
        width: 75px;
        height: 75px;
        object-fit: cover;
    }

    /* ===== Responsive Fixes ===== */

    /* Tablet only (768px – 1023px) */
    @media (min-width: 768px) and (max-width: 1023px) {
        .header-img-text {
            font-size: 1.1rem;
            line-height: 1.3;
        }
    }

    /* Small laptop (1024px – 1365px) */
    @media (min-width: 1024px) and (max-width: 1365px) {
        .header-img-text {
            font-size: 1.3rem;
            line-height: 1.35;
        }
    }

    /* Tablets & small laptops */
    @media (max-width: 991px) {
        #temple-location-map {
            height: 300px;
            min-height: 300px;
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
            padding: 16px 20px;
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
        .event-image {
            height: 180px;
        }
        #temple-location-map {
            height: 250px;
            min-height: 250px;
        }
        .sidebar-widget.widget-recent-posts .sigma_recent-post > a img {
            width: 60px;
            height: 60px;
        }
        .widget-recent-posts .sigma_recent-post > a {
            width: 60px;
            margin-right: 12px;
        }
        .widget-recent-posts .sigma_recent-post h6 {
            font-size: 13px;
        }
    }

    /* Mobile M (≤425px) */
    @media (max-width: 425px) {
        .sigma_subheader .breadcrumb {
            padding: 14px 16px;
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
        .temple-details-meta ul li {
            font-size: 0.85rem;
            line-height: 1.5;
        }
    }

    /* Mobile S (≤375px) */
    @media (max-width: 375px) {
        .sigma_subheader .breadcrumb {
            padding: 12px 14px;
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
        .sidebar-widget.widget-recent-posts .sigma_recent-post > a img {
            width: 50px;
            height: 50px;
        }
        .widget-recent-posts .sigma_recent-post > a {
            width: 50px;
            margin-right: 10px;
        }
    }
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">{{ $organization->name }}</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-details">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('frontend.organizations') }}">Organizations</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $organization->name }}</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-9">
                <div class="post-detail-wrapper temple-details-img">

                    <div class="entry-content">
                        <!-- Featured Image -->
                        <a href="{{ $organization->logo_url ? asset($organization->logo_url) : 'https://placehold.co/1200x800/f4a261/ffffff?text=' . urlencode($organization->name) }}" class="gallery-thumb">
                            <img src="{{ $organization->logo_url ? asset($organization->logo_url) : 'https://placehold.co/1200x800/f4a261/ffffff?text=' . urlencode($organization->name) }}" alt="{{ $organization->name }}" class="img-fluid mb-4 rounded">
                        </a>

                        <!-- At a Glance Info Box -->
                        <div class="p-4 mb-4 rounded" style="background-color: #f8f9fa;">
                            <h3 class="mt-0">At a Glance</h3>
                            <div class="temple-details-meta">
                                <ul>
                                    @if($organization->address)
                                        <li><i class="fal fa-map-marker-alt"></i>{{ $organization->address }}</li>
                                    @endif
                                    @if($organization->phone)
                                        <li><i class="fal fa-phone"></i>{{ $organization->phone }}</li>
                                    @endif
                                    @if($organization->email)
                                        <li><i class="fal fa-envelope"></i>{{ $organization->email }}</li>
                                    @endif
                                    @if($organization->website)
                                        <li><i class="fal fa-globe"></i><a href="{{ $organization->website }}" target="_blank">{{ $organization->website }}</a></li>
                                    @endif
                                    @if($organization->division || $organization->district)
                                        <li><i class="fal fa-map"></i>
                                            @if($organization->division){{ $organization->division->name }}@endif
                                            @if($organization->division && $organization->district), @endif
                                            @if($organization->district){{ $organization->district->name }}@endif
                                        </li>
                                    @endif
                                    @if($organization->registration_no)
                                        <li><i class="fal fa-id-card"></i>Registration No: {{ $organization->registration_no }}</li>
                                    @endif
                                    @if($organization->established_date)
                                        <li><i class="fal fa-calendar"></i>Established: {{ \Carbon\Carbon::parse($organization->established_date)->format('F d, Y') }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <!-- Detailed Description -->
                        <h3>About the Organization</h3>
                        @if($organization->description)
                            <div class="organization-description">
                                {!! nl2br(strip_tags(html_entity_decode($organization->description))) !!}
                            </div>
                        @else
                            <p>No description available for this organization.</p>
                        @endif

                    </div>
                </div>
            </div>
            <!-- End Main Content -->

            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="sidebar">

                    <!-- Other Organization Widget -->
                    <div class="sidebar-widget widget-recent-posts">
                        <h5 class="underline-title">Similar Organization</h5>
                        @forelse($similarOrganizations as $similar)
                            <article class="sigma_recent-post">
                                <a href="{{ route('frontend.organizations.details', $similar->id) }}">
                                    <img src="{{ $similar->logo_url ? asset($similar->logo_url) : 'https://placehold.co/100x100/f4a261/ffffff?text=' . substr($similar->name, 0, 1) }}" alt="{{ $similar->name }}">
                                </a>
                                <div class="sigma_recent-post-body">
                                    <a href="{{ route('frontend.organizations.details', $similar->id) }}">
                                        <i class="far fa-map-marker-alt"></i>
                                        @if($similar->division){{ $similar->division->name }}@endif
                                        @if($similar->division && $similar->district), {{ $similar->district->name }}@endif
                                    </a>
                                    <h6><a href="{{ route('frontend.organizations.details', $similar->id) }}">{{ $similar->name }}</a></h6>
                                </div>
                            </article>
                        @empty
                            <p class="text-muted">No similar organizations found.</p>
                        @endforelse
                    </div>

                    <div class="sidebar-widget widget-categories">
                        <h5>Our Location</h5>
                        <div id="temple-location-map" style="width:100%; height:400px; border-radius: 5px; background-color: #e5e3df;"></div>

                    </div>

                    <div class="sidebar-widget widget-categories" style="background-color: #fff9f4;">
                        <h4>Support Our Mission</h4>
                        <p class="mb-3">Your generous donations help us maintain the temple, organize festivals, and serve the community. Every contribution makes a difference.</p>
                        <a href="donation.html" class="sigma_btn-custom">Donate Now <i class="far fa-arrow-right"></i></a>
                    </div>



                </div>
            </div>
            <!-- End Sidebar -->

        </div>
        <div class="row">
            <div class="col-lg-12">
                <hr class="my-4">

                @if($organization->organization_type === 'business' || $organization->organization_type === 'both')
                    <h3 class="mb-4">Business Categories & Activities</h3>
                    @if($businessCategories && count($businessCategories) > 0)
                    <div class="row gy-4">
                        @foreach($businessCategories as $categoryName => $businesses)
                        <div class="col-lg-4 col-md-6">
                            <div class="border rounded shadow-sm p-3 h-100">
                                <h5 class="fw-bold mb-3">{{ $categoryName }}</h5>
                                <ul class="list-unstyled ps-2">
                                    @foreach($businesses as $business)
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>{{ $business }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>No business activities available for this organization.
                    </div>
                    @endif
                @endif

                @if($organization->organization_type === 'religious' || $organization->organization_type === 'both')
                    @if($organization->organization_type === 'both')
                        <hr class="my-4">
                    @endif
                    <h3 class="mb-4">Religious Categories & Activities</h3>
                    @if($religiousCategories && count($religiousCategories) > 0)
                    <div class="row gy-4">
                        @foreach($religiousCategories as $categoryName => $businesses)
                        <div class="col-lg-4 col-md-6">
                            <div class="border rounded shadow-sm p-3 h-100">
                                <h5 class="fw-bold mb-3">{{ $categoryName }}</h5>
                                <ul class="list-unstyled ps-2">
                                    @foreach($businesses as $business)
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>{{ $business }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>No religious activities available for this organization.
                    </div>
                    @endif
                @endif
            </div>
        </div>

        <!-- Upcoming Events Section -->
        @if($upcomingEvents && $upcomingEvents->count() > 0)
        <div class="row">
            <div class="col-lg-12">
                <hr class="my-4">
                <h3 class="mb-4">Upcoming Events</h3>
                <div class="upcoming-events-slider">
                    @foreach($upcomingEvents as $event)
                    <div class="event-card">
                        <a href="{{ route('frontend.event.details.unified', ['type' => 'organization', 'id' => $event->id]) }}" class="event-card-link">
                            <div class="event-card-inner">
                                <div class="event-image">
                                    <img src="{{ $event->banner_image ? asset('backend/uploads/organization_event/banner/' . $event->banner_image) : 'https://placehold.co/400x250/e76f51/ffffff?text=Event' }}" alt="{{ $event->event_name }}" class="img-fluid rounded">
                                </div>
                                <div class="event-card-content p-3">
                                    <h5 class="event-title mb-2">{{ $event->event_name }}</h5>
                                    <div class="event-meta">
                                        <p class="mb-1">
                                            <i class="fal fa-calendar-alt me-2"></i>
                                            <strong>{{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}</strong>
                                        </p>
                                        @if($event->event_time_start || $event->event_time_end)
                                        <p class="mb-1">
                                            <i class="fal fa-clock me-2"></i>
                                            @if($event->event_time_start)
                                                {{ \Carbon\Carbon::parse($event->event_time_start)->format('g:i A') }}
                                            @endif
                                            @if($event->event_time_start && $event->event_time_end)
                                                -
                                            @endif
                                            @if($event->event_time_end)
                                                {{ \Carbon\Carbon::parse($event->event_time_end)->format('g:i A') }}
                                            @endif
                                        </p>
                                        @endif
                                        @if($event->location)
                                        <p class="mb-0">
                                            <i class="fal fa-map-marker-alt me-2"></i>
                                            {{ $event->location }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('custom_scripts')
<script>
    // Initialize the single-location map (defined globally for callback)
    @if($organization->latitude && $organization->longitude)
        // Initialize Google Maps
        async function initOrganizationMap() {
            const mapElement = document.getElementById('temple-location-map');
            if (!mapElement || typeof google === 'undefined') return;

            const organizationLocation = {
                lat: {{ $organization->latitude }},
                lng: {{ $organization->longitude }}
            };
            const organizationName = "{{ $organization->name }}";

            const map = new google.maps.Map(mapElement, {
                zoom: 15,
                center: organizationLocation
            });

            const marker = new google.maps.Marker({
                map: map,
                position: organizationLocation,
                title: organizationName
            });

            const infoWindow = new google.maps.InfoWindow({
                content: `<div class="map-info-window">
                    <strong>${organizationName}</strong><br>
                    {{ $organization->address ?? '' }}
                </div>`
            });

            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });
        }

        // Load Google Maps if not already loaded
        if (typeof google !== 'undefined' && google.maps) {
            initOrganizationMap();
        } else {
            window.initOrganizationMap = initOrganizationMap;
        }
        @endif

    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Upcoming Events Slider only if there are more than 3 events
        var eventSlider = $('.upcoming-events-slider');
        var eventCount = eventSlider.children('.event-card').length;

        if (eventCount > 3) {
            eventSlider.slick({
                infinite: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                dots: false,
                centerMode: false,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            centerMode: false
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: false
                        }
                    }
                ]
            });
        } else {
            // Display as a flex grid without slider
            eventSlider.addClass('events-grid-layout');
        }

        // Swiper Initialization
        const swiper = new Swiper(".myGallerySwiper", {
            loop: true,
            spaceBetween: 20,
            slidesPerView: 2,
            centeredSlides: true,
            grabCursor: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            breakpoints: {

                0: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                }
            }
        });


        // Magnific Popup Initialization
        $('.gallery-zoom').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-with-zoom',
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
            }
        });
    });

</script>

<!-- Load Google Maps API with async -->
@if($organization->latitude && $organization->longitude)
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTRqyVq5k6iX60e382PGnio2_vWLd2yCg&callback=initOrganizationMap&loading=async">
</script>
@endif
@endsection
