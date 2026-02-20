@forelse($temples as $temple)
    <div class="col-md-4">
        <article class="sigma_post">
            <div class="sigma_post-thumb">
                <a href="{{ route('frontend.temples.details', $temple->id) }}">
                    @if($temple->main_picture)
                        <img src="{{ asset('backend/uploads/temple/profile/' . $temple->main_picture) }}" alt="{{ $temple->name }}">
                    @else
                        <img src="https://placehold.co/400x270" alt="{{ $temple->name }}">
                    @endif
                </a>
            </div>
            <div class="sigma_post-body">
                <h5>
                    <a href="{{ route('frontend.temples.details', $temple->id) }}">{{ $temple->name }}</a>
                </h5>
                @if($temple->address)
                    <p class="text-muted small"><i class="fal fa-map-marker-alt"></i> {{ Str::limit($temple->address, 50) }}</p>
                @endif
            </div>
        </article>
    </div>
@empty
    <div class="col-12">
        <div class="alert alert-info text-center">
            <i class="fal fa-info-circle"></i> No temples found. Please adjust your filters.
        </div>
    </div>
@endforelse
