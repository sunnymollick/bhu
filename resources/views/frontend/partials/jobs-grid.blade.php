@forelse($jobs as $job)
    <div class="col-md-12">
        <div class="job-listing-card">
            <div class="job-title"><a href="{{ route('frontend.jobs.details', $job->id) }}">{{ $job->job_title }}</a></div>
            <div class="job-meta row">
                <div class="col-md-4 col-12 mb-1">
                    <span class="job-label">Company:</span> {{ $job->company }}
                </div>
                @if($job->jobCategory)
                <div class="col-md-4 col-12 mb-1">
                    <span class="job-label">Category:</span> {{ $job->jobCategory->name }}
                </div>
                @endif
                @if($job->jobIndustry)
                <div class="col-md-4 col-12 mb-1">
                    <span class="job-label">Industry:</span> {{ $job->jobIndustry->name }}
                </div>
                @endif
            </div>
            <div class="job-meta row">
                <div class="col-md-4 col-12 mb-1">
                    <span class="job-label">Type:</span> {{ ucfirst(str_replace('_', ' ', $job->job_type)) }}
                </div>
                <div class="col-md-4 col-12 mb-1">
                    <span class="job-label">Mode:</span> {{ ucfirst(str_replace('_', '-', $job->work_mode)) }}
                </div>
                @if($job->division || $job->district)
                <div class="col-md-4 col-12 mb-1">
                    <span class="job-label">Location:</span>
                    @if($job->district){{ $job->district->name }}@endif
                    @if($job->district && $job->division), @endif
                    @if($job->division){{ $job->division->name }}@endif
                </div>
                @endif
            </div>
            @if($job->deadline)
            <div class="job-meta row">
                <div class="col-md-4 col-12 mb-1">
                    <span class="job-label job-deadline">Deadline:</span> {{ \Carbon\Carbon::parse($job->deadline)->format('Y-m-d') }}
                </div>
            </div>
            @endif
        </div>
    </div>
@empty
    <div class="col-12">
        <div class="alert alert-info text-center">
            <i class="fal fa-info-circle"></i> No jobs found. Please adjust your filters.
        </div>
    </div>
@endforelse
