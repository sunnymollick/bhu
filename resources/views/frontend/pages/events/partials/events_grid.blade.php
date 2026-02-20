@forelse($events as $event)
<div class="event-card">
    <div class="event-image-wrapper">
        @if(isset($event->temple_id) && $event->banner_image)
            <img src="{{ asset('backend/uploads/temple_event/banner/' . $event->banner_image) }}" alt="{{ $event->event_name }}">
            <div class="event-type-badge temple">Temple Event</div>
        @elseif(isset($event->organization_id) && $event->banner_image)
            <img src="{{ asset('backend/uploads/organization_event/banner/' . $event->banner_image) }}" alt="{{ $event->event_name }}">
            <div class="event-type-badge organization">Organization Event</div>
        @elseif(isset($event->temple_id))
            <img src="https://placehold.co/800x400/a9561f/ffffff?text=Temple+Event" alt="{{ $event->event_name }}">
            <div class="event-type-badge temple">Temple Event</div>
        @else
            <img src="https://placehold.co/800x400/c94641/ffffff?text=Organization+Event" alt="{{ $event->event_name }}">
            <div class="event-type-badge organization">Organization Event</div>
        @endif
        <div class="event-date-badge">
            @if($event->event_date_end && $event->event_date != $event->event_date_end)
                {{-- Multi-day event --}}
                <div class="date-range-start">
                    <span class="day">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</span>
                    <span class="month">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</span>
                </div>
                <span class="date-separator">to</span>
                <div class="date-range-end">
                    <span class="day">{{ \Carbon\Carbon::parse($event->event_date_end)->format('d') }}</span>
                    <span class="month">{{ \Carbon\Carbon::parse($event->event_date_end)->format('M y') }}</span>
                </div>
            @else
                {{-- Single day event --}}
                <span class="day">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</span>
                <span class="month">{{ \Carbon\Carbon::parse($event->event_date)->format('M y') }}</span>
            @endif
        </div>
    </div>
    <div class="event-content">
        <h3 class="event-title">
            @if(isset($event->temple_id))
                <a href="{{ route('frontend.event.details.unified', ['type' => 'temple', 'id' => $event->id]) }}">{{ $event->event_name }}</a>
            @else
                <a href="{{ route('frontend.event.details.unified', ['type' => 'organization', 'id' => $event->id]) }}">{{ $event->event_name }}</a>
            @endif
        </h3>
        @if($event->short_description)
            <p class="event-description">{{ Str::limit(strip_tags($event->short_description), 150) }}</p>
        @elseif($event->description)
            <p class="event-description">{{ Str::limit(strip_tags($event->description), 150) }}</p>
        @endif
        <div class="event-meta">
            @if($event->event_date_end && $event->event_date != $event->event_date_end)
                {{-- Multi-day event --}}
                <div class="event-meta-item">
                    <i class="far fa-calendar-alt"></i>
                    <span>
                        {{ \Carbon\Carbon::parse($event->event_date)->format('l, M d') }} - {{ \Carbon\Carbon::parse($event->event_date_end)->format('l, M d, Y') }}
                    </span>
                </div>
            @endif
            @if($event->event_time_start || $event->event_time_end)
            <div class="event-meta-item">
                <i class="far fa-clock"></i>
                <span>
                    @if(!($event->event_date_end && $event->event_date != $event->event_date_end))
                        {{ \Carbon\Carbon::parse($event->event_date)->format('l') }}
                    @endif
                    @if($event->event_time_start)
                        {{ !($event->event_date_end && $event->event_date != $event->event_date_end) ? '(' : '' }}{{ \Carbon\Carbon::parse($event->event_time_start)->format('g:i A') }}
                    @endif
                    @if($event->event_time_start && $event->event_time_end)
                        -
                    @endif
                    @if($event->event_time_end)
                        {{ \Carbon\Carbon::parse($event->event_time_end)->format('g:i A') }}{{ !($event->event_date_end && $event->event_date != $event->event_date_end) ? ')' : '' }}
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
        <div class="event-source">
            <i class="far fa-building"></i>
            @if(isset($event->temple_id))
                <strong>{{ $event->temple->name ?? 'Temple' }}</strong>
            @else
                <strong>{{ $event->organization->name ?? 'Organization' }}</strong>
            @endif
        </div>
        @if(isset($event->temple_id))
            <a href="{{ route('frontend.event.details.unified', ['type' => 'temple', 'id' => $event->id]) }}" class="join-btn">
                VIEW DETAILS
                <i class="far fa-arrow-right"></i>
            </a>
        @else
            <a href="{{ route('frontend.event.details.unified', ['type' => 'organization', 'id' => $event->id]) }}" class="join-btn">
                VIEW DETAILS
                <i class="far fa-arrow-right"></i>
            </a>
        @endif
    </div>
</div>
@empty
<div class="alert alert-info">
    <i class="far fa-info-circle me-2"></i>No upcoming events found.
</div>
@endforelse

<!-- Pagination -->
@if($events->hasPages())
<nav aria-label="Event pagination" id="events-pagination">
    {{ $events->links('pagination::bootstrap-4') }}
</nav>
@endif
