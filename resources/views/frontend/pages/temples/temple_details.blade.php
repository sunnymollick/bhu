@extends('frontend.layouts.default')

@section('title', $temple->name . ' - Bengali Hindu Unity')

@section('stylesheet')
<!-- Extra CSS for temple details page -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/developer.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/gallery-slider.css') }}">
<style>
    /* Fixed map container */
    #temple-location-map {
        width: 100%;
        height: 400px;
        border-radius: 5px;
        background-color: #e5e3df;
        min-height: 400px;
    }

    /* Gallery slider styles → gallery-slider.css */

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

    /* Gallery slider arrows → gallery-slider.css */

    /* Slick Slider Custom Arrows for Events */
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

    /* Activity cards styling to match template */
    .activity-card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 20px;
        height: 100%;
        background: #fff;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .activity-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    .activity-card h5 {
        font-weight: 700;
        margin-bottom: 20px;
        font-size: 1.1rem;
        color: #333;
    }

    .activity-card .text-muted {
        font-weight: 400;
        font-size: 0.95rem;
    }

    .activity-card ul {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }

    .activity-card ul li {
        padding: 6px 0;
        line-height: 1.6;
        color: #555;
    }

    .activity-card ul li i {
        color: #28a745;
        font-size: 0.9rem;
    }

    .activity-card ul li small {
        color: #888;
        font-size: 0.85rem;
    }

    /* Sticky header for temple details page */
    .sigma_header.header-3 {
        z-index: 999;
    }

    /* Force square "Other Temples" thumbnails (prevent oval on non-square source images) */
    .sidebar-widget.widget-recent-posts .sigma_recent-post > a img {
        width: 75px;
        height: 75px;
        object-fit: cover;
    }

    /* ===== Mobile Responsive Fixes ===== */

    /* Tablets & small laptops */
    @media (max-width: 991px) {
        #temple-location-map {
            height: 300px;
            min-height: 300px;
        }
    }

    /* Phones – general (≤575px) */
    @media (max-width: 575px) {
        .event-image {
            height: 180px;
        }
        .activity-card {
            padding: 14px;
        }
        .activity-card h5 {
            font-size: 1rem;
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

    /* Mobile M / narrow phones (≤425px) */
    @media (max-width: 425px) {
        .temple-details-meta ul li {
            font-size: 0.85rem;
            line-height: 1.5;
        }
    }

    /* Mobile S (≤375px) */
    @media (max-width: 375px) {
        .sidebar-widget.widget-recent-posts .sigma_recent-post > a img {
            width: 50px;
            height: 50px;
        }
        .widget-recent-posts .sigma_recent-post > a {
            width: 50px;
            margin-right: 10px;
        }
    }

    .sigma_header.header-3.sticky {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 999;
        animation: fadeHeaderInDown 0.5s;
        box-shadow: 0px 10px 50px 0px rgba(53, 82, 99, 0.09);
        background-color: #fff;
    }

    .sigma_header.header-3.sticky .sigma_header-top {
        display: none;
    }
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">{{ $temple->name }}</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-details">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('frontend.temples') }}">Temples</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $temple->name }}</li>
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
                        <a href="{{ $temple->main_picture ? asset('backend/uploads/temple/profile/' . $temple->main_picture) : 'https://placehold.co/1200x800/f4a261/ffffff?text=Main+Temple+View' }}" class="gallery-thumb">
                            <img src="{{ $temple->main_picture ? asset('backend/uploads/temple/profile/' . $temple->main_picture) : 'https://placehold.co/1200x800/f4a261/ffffff?text=Main+Temple+View' }}" alt="{{ $temple->name }}" class="img-fluid mb-4 rounded">
                        </a>

                        <!-- At a Glance Info Box -->
                        <div class="p-4 mb-4 rounded" style="background-color: #f8f9fa;">
                            <h3 class="mt-0">At a Glance</h3>
                            <div class="temple-details-meta">
                                <ul>
                                    @if($temple->address)
                                    <li><i class="fal fa-map-marker-alt"></i>{{ $temple->address }}</li>
                                    @endif
                                    @if($temple->contact_no)
                                    <li><i class="fal fa-phone"></i>{{ $temple->contact_no }}</li>
                                    @endif
                                    @if($temple->contact_name)
                                    <li><i class="fal fa-user"></i>Contact: {{ $temple->contact_name }}@if($temple->designation) ({{ $temple->designation }})@endif</li>
                                    @endif
                                    @if($temple->service_time)
                                    <li><i class="fal fa-clock"></i>{{ $temple->service_time }}</li>
                                    @endif
                                    @if($temple->division)
                                    <li><i class="fal fa-map"></i>{{ $temple->upazila->name ?? '' }}@if($temple->upazila), @endif{{ $temple->district->name ?? '' }}@if($temple->district), @endif{{ $temple->division->name ?? '' }}</li>
                                    @endif
                                    @if($temple->village)
                                    <li><i class="fal fa-location-arrow"></i>Village: {{ $temple->village }}</li>
                                    @endif
                                    @if($temple->post_office)
                                    <li><i class="fal fa-envelope-open"></i>Post Office: {{ $temple->post_office }}@if($temple->zipcode) - {{ $temple->zipcode }}@endif</li>
                                    @endif
                                    @if($temple->residential_facility)
                                    <li><i class="fal fa-home"></i>Residential Facility Available</li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <!-- Detailed Description -->
                        <h3>About the Temple</h3>
                        @if($temple->description)
                        <div class="temple-description">{!! nl2br(strip_tags(html_entity_decode($temple->description))) !!}</div>
                        @else
                        <p>{{ $temple->name }} is an important Hindu place of worship serving the local community. The temple conducts regular prayers, festivals, and community services.</p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- End Main Content -->

            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <!-- Other Temples Widget -->
                    <div class="sidebar-widget widget-recent-posts">
                        <h5>Other Temples</h5>
                        @forelse($relatedTemples as $relatedTemple)
                        <article class="sigma_recent-post">
                            <a href="{{ route('frontend.temples.details', $relatedTemple->id) }}">
                                <img src="{{ $relatedTemple->main_picture ? asset('backend/uploads/temple/profile/' . $relatedTemple->main_picture) : 'https://placehold.co/100x100/f4a261/ffffff?text=T' }}" alt="{{ $relatedTemple->name }}">
                            </a>
                            <div class="sigma_recent-post-body">
                                <a href="{{ route('frontend.temples.details', $relatedTemple->id) }}"><i class="far fa-calendar"></i> {{ $relatedTemple->district->name ?? 'Bangladesh' }}</a>
                                <h6><a href="{{ route('frontend.temples.details', $relatedTemple->id) }}">{{ $relatedTemple->name }}</a></h6>
                            </div>
                        </article>
                        @empty
                        <p class="text-muted">No related temples found.</p>
                        @endforelse
                    </div>

                    @if($temple->latitude && $temple->longitude)
                    <div class="sidebar-widget widget-categories">
                        <h5>Our Location</h5>
                        <div id="temple-location-map"></div>
                    </div>
                    @endif

                    <div class="sidebar-widget widget-categories" style="background-color: #fff9f4;">
                        <h4>Support Our Mission</h4>
                        <p class="mb-3">Your generous donations help us maintain the temple, organize festivals, and serve the community. Every contribution makes a difference.</p>
                        <a href="#" class="sigma_btn-custom">Donate Now <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->
        </div>

        @if($temple->activities && $temple->activities->count() > 0)
        <div class="row">
            <div class="col-lg-12">
                <hr class="my-4">
                <h3 class="mb-4">Activities & Services</h3>
                <div class="row gy-4">
                    @php
                        $activitiesByCategory = $temple->activities->groupBy('activity.activity_category_id');
                    @endphp

                    @foreach($activitiesByCategory as $categoryId => $activities)
                        @php
                            $category = $activities->first()->activity->category ?? null;
                        @endphp
                        @if($category)
                        <div class="col-lg-4 col-md-6">
                            <div class="activity-card">
                                <h5>{{ $category->name }}
                                    @if($category->name_bn)
                                    <span class="text-muted">({{ $category->name_bn }})</span>
                                    @endif
                                </h5>
                                <ul>
                                    @foreach($activities as $templeActivity)
                                        @if($templeActivity->activity)
                                        <li><i class="bi bi-check-circle-fill me-2"></i>{{ $templeActivity->activity->title }}
                                            @if($templeActivity->activity->title_bn)
                                            <small class="text-muted">({{ $templeActivity->activity->title_bn }})</small>
                                            @endif
                                        </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        @if($templeGallery && $templeGallery->count() > 0)
        <div class="row">
            <div class="col-lg-12">
                <hr class="my-4">
                <h3 class="mb-4">Photo Gallery</h3>
                @include('frontend.partials.gallery-slider', [
                    'images' => $templeGallery->map(fn($g) => asset('backend/uploads/temple/gallery/' . $g->picture))->toArray(),
                    'alt'    => $temple->name . ' Gallery',
                ])
            </div>
        </div>
        @endif

        <!-- Upcoming Events Section -->
        @if($upcomingEvents && $upcomingEvents->count() > 0)
        <div class="row">
            <div class="col-lg-12">
                <hr class="my-4">
                <h3 class="mb-4">Upcoming Events</h3>
                <div class="upcoming-events-slider">
                    @foreach($upcomingEvents as $event)
                    <div class="event-card">
                        <a href="{{ route('frontend.event.details.unified', ['type' => 'temple', 'id' => $event->id]) }}" class="event-card-link">
                            <div class="event-card-inner">
                                <div class="event-image">
                                    <img src="{{ $event->banner_image ? asset('backend/uploads/temple_event/banner/' . $event->banner_image) : 'https://placehold.co/400x250/e76f51/ffffff?text=Event' }}" alt="{{ $event->event_name }}" class="img-fluid rounded">
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

        @if($eventGallery && $eventGallery->count() > 0)
        <div class="row">
            <div class="col-lg-12">
                <hr class="my-5">
                <h3>Event Gallery</h3>
                <ul class="lightSlider">
                    @foreach($eventGallery as $gallery)
                    <li><img src="{{ asset('backend/uploads/temple/gallery/' . $gallery->picture) }}" alt="{{ $temple->name }} Event" /></li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('custom_scripts')
<!-- Extra JS for temple details page -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Sticky Header for Temple Details Page
        var header = $(".can-sticky");
        var headerHeight = header.innerHeight();

        function doSticky() {
            if (window.pageYOffset > headerHeight) {
                header.addClass("sticky");
            } else {
                header.removeClass("sticky");
            }
        }

        // Run on scroll
        $(window).on('scroll', function() {
            doSticky();
        });

        // Initial check
        doSticky();

        // Gallery slider → gallery-slider.js

        // Initialize Events Slider
        var eventSlider = $('.upcoming-events-slider');
        if (eventSlider.length > 0) {
            var eventCount = eventSlider.children('.event-card').length;

            if (eventCount > 3) {
                eventSlider.slick({
                    infinite: true,
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
                                slidesToScroll: 1
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
        }

        // Magnific Popup → gallery-slider.js

        @if($temple->latitude && $temple->longitude)
        // Initialize Google Maps
        function initTempleMap() {
            const mapElement = document.getElementById('temple-location-map');
            if (!mapElement || typeof google === 'undefined') return;

            const templeLocation = {
                lat: {{ $temple->latitude }},
                lng: {{ $temple->longitude }}
            };
            const templeName = "{{ $temple->name }}";

            const map = new google.maps.Map(mapElement, {
                zoom: 15,
                center: templeLocation
            });

            const marker = new google.maps.Marker({
                map: map,
                position: templeLocation,
                title: templeName
            });

            const infoWindow = new google.maps.InfoWindow({
                content: `<div class="map-info-window">
                    <strong>${templeName}</strong><br>
                    {{ $temple->address ?? '' }}
                </div>`
            });

            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });
        }

        // Load Google Maps if not already loaded
        if (typeof google !== 'undefined' && google.maps) {
            initTempleMap();
        } else {
            window.initTempleMap = initTempleMap;
        }
        @endif
    });
</script>
<script src="{{ asset('frontend/assets/js/gallery-slider.js') }}"></script>

<!-- Load Google Maps API with async -->
@if($temple->latitude && $temple->longitude)
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTRqyVq5k6iX60e382PGnio2_vWLd2yCg&callback=initTempleMap&loading=async">
</script>
@endif
@endsection
