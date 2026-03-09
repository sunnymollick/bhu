@extends('frontend.layouts.default')

@section('title', 'Temple Events - Bengali Hindu Unity')

@section('stylesheet')
<style>
    .event-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 25px rgba(0,0,0,0.15);
    }

    .event-image-wrapper {
        position: relative;
        overflow: hidden;
        height: 280px;
    }

    .event-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .event-card:hover .event-image-wrapper img {
        transform: scale(1.1);
    }

    .event-date-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: #c94641;
        color: #fff;
        text-align: center;
        padding: 10px 15px;
        border-radius: 5px;
        font-weight: 600;
        box-shadow: 0 3px 10px rgba(201, 70, 65, 0.4);
    }

    .event-date-badge .day {
        font-size: 28px;
        line-height: 1;
        display: block;
    }

    .event-date-badge .month {
        font-size: 14px;
        display: block;
        margin-top: 2px;
    }

    .event-content {
        padding: 25px;
    }

    .event-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #c94641;
        margin-bottom: 15px;
        line-height: 1.4;
    }

    .event-title a {
        color: #c94641;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .event-title a:hover {
        color: #a03833;
    }

    .event-description {
        color: #666;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .event-meta {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }

    .event-meta-item {
        display: flex;
        align-items: center;
        color: #c94641;
    }

    .event-meta-item i {
        margin-right: 8px;
        width: 16px;
    }

    .join-btn {
        background: #7a5c5c;
        color: #fff;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .join-btn:hover {
        background: #624747;
        color: #fff;
        transform: translateX(5px);
    }

    .join-btn i {
        margin-left: 8px;
    }

    .sidebar-widget {
        background: #fff;
        border-radius: 8px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }

    .sidebar-widget h5 {
        color: #c94641;
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #c94641;
    }

    .search-form {
        position: relative;
    }

    .search-form input {
        width: 100%;
        padding: 12px 50px 12px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        font-size: 14px;
    }

    .search-form button {
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        padding: 0 20px;
        background: #c94641;
        border: none;
        color: #fff;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .search-form button:hover {
        background: #a03833;
    }

    .recent-event-item {
        display: flex;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .recent-event-item:last-child {
        border-bottom: none;
    }

    .recent-event-item a {
        text-decoration: none;
        color: #333;
        display: flex;
        gap: 15px;
        width: 100%;
        transition: all 0.3s ease;
    }

    .recent-event-item a:hover {
        color: #c94641;
    }

    .recent-event-item a:hover .recent-event-title {
        color: #c94641;
    }

    .recent-event-image {
        width: 80px;
        height: 80px;
        border-radius: 5px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .recent-event-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .recent-event-item a:hover .recent-event-image img {
        transform: scale(1.1);
    }

    .recent-event-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .recent-event-title {
        font-weight: 600;
        margin-bottom: 8px;
        line-height: 1.4;
        font-size: 0.95rem;
        color: #333;
        transition: color 0.3s ease;
    }

    .recent-event-date {
        font-size: 0.85rem;
        color: #999;
        display: flex;
        align-items: center;
    }

    .recent-event-date i {
        margin-right: 5px;
        color: #c94641;
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 40px;
    }

    .pagination .page-item {
        list-style: none;
    }

    .pagination .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: none;
        background: #f5f5f5;
        color: #666;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover,
    .pagination .page-item.active .page-link {
        background: #c94641;
        color: #fff;
    }
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">Temple Events</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-normal">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Temple Events</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                @forelse($events as $event)
                <div class="event-card">
                    <div class="event-image-wrapper">
                        <img src="{{ $event->banner_image ? asset('backend/uploads/temple_event/banner/' . $event->banner_image) : 'https://placehold.co/800x400/e76f51/ffffff?text=Event' }}" alt="{{ $event->event_name }}">
                        <div class="event-date-badge">
                            <span class="day">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</span>
                            <span class="month">{{ \Carbon\Carbon::parse($event->event_date)->format('M y') }}</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <h3 class="event-title">
                            <a href="{{ route('frontend.temple.events.details', $event->id) }}">{{ $event->event_name }}</a>
                        </h3>
                        @if($event->short_description)
                        <p class="event-description">{{ Str::limit(strip_tags($event->short_description), 150) }}</p>
                        @elseif($event->description)
                        <p class="event-description">{{ Str::limit(strip_tags($event->description), 150) }}</p>
                        @endif
                        <div class="event-meta">
                            @if($event->event_time_start || $event->event_time_end)
                            <div class="event-meta-item">
                                <i class="far fa-clock"></i>
                                <span>
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('l') }}
                                    @if($event->event_time_start)
                                        ({{ \Carbon\Carbon::parse($event->event_time_start)->format('g:i A') }}
                                    @endif
                                    @if($event->event_time_start && $event->event_time_end)
                                        -
                                    @endif
                                    @if($event->event_time_end)
                                        {{ \Carbon\Carbon::parse($event->event_time_end)->format('g:i A') }})
                                    @endif
                                </span>
                            </div>
                            @endif
                            @if($event->location)
                            <div class="event-meta-item">
                                <i class="far fa-map-marker-alt"></i>
                                <span>{{ $event->location }}</span>
                            </div>
                            @endif
                        </div>
                        <a href="{{ route('frontend.temple.events.details', $event->id) }}" class="join-btn">
                            VIEW DETAILS
                            <i class="far fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @empty
                <div class="alert alert-info">
                    <i class="far fa-info-circle me-2"></i>No upcoming temple events found.
                </div>
                @endforelse

                <!-- Pagination -->
                @if($events->hasPages())
                <nav aria-label="Event pagination">
                    {{ $events->links('pagination::bootstrap-4') }}
                </nav>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Search Widget -->
                <div class="sidebar-widget">
                    <h5>Search</h5>
                    <form action="{{ route('frontend.temple.events') }}" method="GET" class="search-form">
                        <input type="text" name="search" placeholder="Search Events" value="{{ request('search') }}">
                        <button type="submit">
                            <i class="far fa-search"></i>
                        </button>
                    </form>
                </div>

                <!-- Recent Events Widget -->
                @if($recentEvents && $recentEvents->count() > 0)
                <div class="sidebar-widget">
                    <h5>Upcoming Events</h5>
                    @foreach($recentEvents as $recentEvent)
                    <div class="recent-event-item">
                        <a href="{{ route('frontend.temple.events.details', $recentEvent->id) }}">
                            <div class="recent-event-image">
                                <img src="{{ $recentEvent->banner_image ? asset('backend/uploads/temple_event/banner/' . $recentEvent->banner_image) : 'https://placehold.co/150x150/e76f51/ffffff?text=Event' }}" alt="{{ $recentEvent->event_name }}">
                            </div>
                            <div class="recent-event-content">
                                <div class="recent-event-title">{{ Str::limit($recentEvent->event_name, 50) }}</div>
                                <div class="recent-event-date">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($recentEvent->event_date)->format('M d, Y') }}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
