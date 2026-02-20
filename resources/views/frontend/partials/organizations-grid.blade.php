@forelse($organizations as $organization)
    <div class="col-md-4">
        <article class="sigma_post">
            <div class="sigma_post-thumb">
                <a href="{{ route('frontend.organizations.details', $organization->id) }}">
                    @if($organization->logo_url)
                        <img src="{{ asset($organization->logo_url) }}" alt="{{ $organization->name }}">
                    @else
                        <img src="https://placehold.co/400x270" alt="{{ $organization->name }}">
                    @endif
                </a>
            </div>
            <div class="sigma_post-body">
                <h5>
                    <a href="{{ route('frontend.organizations.details', $organization->id) }}">{{ $organization->name }}</a>
                </h5>
                @if($organization->address)
                    <p class="text-muted small"><i class="fal fa-map-marker-alt"></i> {{ Str::limit($organization->address, 50) }}</p>
                @endif
            </div>
        </article>
    </div>
@empty
    <div class="col-12">
        <div class="alert alert-info text-center">
            <i class="fal fa-info-circle"></i> No organizations found. Please adjust your filters.
        </div>
    </div>
@endforelse
