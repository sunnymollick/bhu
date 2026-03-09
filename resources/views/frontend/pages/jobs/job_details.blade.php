@extends('frontend.layouts.default')

@section('title', $job->job_title . ' - Bengali Hindu Unity')

@section('stylesheet')
<style>
    .job-logo {
        max-width: 120px;
        max-height: 120px;
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        margin-bottom: 20px;
    }
    .job-header-box {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        padding: 32px 24px;
        margin-bottom: 32px;
        display: flex;
        align-items: center;
        gap: 32px;
    }
    .job-header-details {
        flex: 1;
    }
    .job-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .job-meta {
        font-size: 1.05rem;
        color: #555;
        margin-bottom: 8px;
    }
    .job-meta i {
        color: #007bff;
        margin-right: 6px;
    }
    .job-tags span {
        display: inline-block;
        background: #f2f2f2;
        color: #333;
        font-size: 0.95rem;
        border-radius: 4px;
        padding: 2px 10px;
        margin-right: 8px;
        margin-bottom: 2px;
    }
    .job-section-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-top: 32px;
        margin-bottom: 16px;
    }
    .job-desc {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        padding: 24px;
        margin-bottom: 32px;
    }
    .job-sidebar {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        padding: 24px;
        margin-bottom: 24px;
    }
    .job-sidebar h5 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 16px;
    }
    .job-sidebar .sigma_recent-post img {
        border-radius: 6px;
    }
    .apply-btn {
        margin-top: 24px;
        font-size: 1.1rem;
        font-weight: 600;
    }
    .job-deadline {
        color: #dc3545;
        font-weight: 500;
        margin-left: 10px;
    }

    /* ===== Responsive Fixes ===== */

    /* Tablets & below (≤991px) */
    @media (max-width: 991px) {
        .job-header-box {
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
            padding: 20px 16px;
        }
        .job-title {
            font-size: 1.5rem;
        }
        .job-section-title {
            font-size: 1.15rem;
            margin-top: 24px;
            margin-bottom: 12px;
        }
        .job-desc {
            padding: 18px;
            margin-bottom: 24px;
        }
        .job-desc h4 {
            font-size: 1.15rem;
        }
    }

    /* Phones – general (≤575px) */
    @media (max-width: 575px) {
        .job-header-box {
            padding: 16px 14px;
            gap: 12px;
        }
        .job-logo {
            max-width: 80px;
            max-height: 80px;
        }
        .job-title {
            font-size: 1.25rem;
        }
        .job-meta {
            font-size: 0.9rem;
        }
        .job-tags span {
            font-size: 0.8rem;
            padding: 2px 8px;
        }
        .job-desc {
            padding: 14px;
            margin-bottom: 20px;
        }
        .job-desc h4 {
            font-size: 1.05rem;
        }
        .job-section-title {
            font-size: 1.05rem;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .apply-btn {
            font-size: 1rem;
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
        .job-title {
            font-size: 1.1rem;
        }
        .job-meta {
            font-size: 0.85rem;
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
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">{{ $job->job_title }}</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-details">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('frontend.jobs') }}">Jobs</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $job->job_title }}</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<!-- Main Content -->
<div class="section">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-9">
                <!-- Job Header Box -->
                <div class="job-header-box">
                    <img src="https://placehold.co/200x200" alt="{{ $job->company }} Logo" class="job-logo">
                    <div class="job-header-details">
                        <div class="job-title mb-1">{{ $job->job_title }}</div>
                        <div class="job-meta mb-2">
                            <span class="job-label"><i class="fa fa-building"></i> {{ $job->company }}</span>
                            @if($job->district && $job->division)
                            <span class="job-label"><i class="fa fa-map-marker-alt"></i> {{ $job->district->name }}, {{ $job->division->name }}</span>
                            @endif
                            @if($job->jobCategory)
                            <span class="job-label"><i class="fa fa-briefcase"></i> {{ $job->jobCategory->name }}</span>
                            @endif
                            @if($job->jobIndustry)
                            <span class="job-label"><i class="fa fa-industry"></i> {{ $job->jobIndustry->name }}</span>
                            @endif
                            @if($job->deadline)
                            <span class="job-deadline"><i class="fa fa-calendar"></i> Deadline: {{ \Carbon\Carbon::parse($job->deadline)->format('Y-m-d') }}</span>
                            @endif
                        </div>
                        @if($job->skills)
                        <div class="job-tags mb-2">
                            @foreach(explode(',', $job->skills) as $skill)
                            <span>{{ trim($skill) }}</span>
                            @endforeach
                        </div>
                        @endif
                        <div class="job-meta">
                            @if($job->job_type)
                            <span class="job-label"><i class="fa fa-clock"></i> {{ ucfirst(str_replace('_', ' ', $job->job_type)) }}</span>
                            @endif
                            @if($job->work_mode)
                            <span class="job-label"><i class="fa fa-laptop"></i> {{ ucfirst(str_replace('_', ' ', $job->work_mode)) }}</span>
                            @endif
                        </div>
                        <a href="#" class="btn btn-primary apply-btn">Apply Now</a>
                    </div>
                </div>
                <!-- About Section -->
                <div class="job-desc">
                    @if($job->about)
                    <h4>Job Description</h4>
                    <div>{!! $job->about !!}</div>
                    @endif

                    @if($job->requirements)
                    <h4>Requirements</h4>
                    <div>{!! $job->requirements !!}</div>
                    @endif

                    @if($job->responsibilities)
                    <h4>Responsibilities</h4>
                    <div>{!! $job->responsibilities !!}</div>
                    @endif
                </div>

            </div>
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="sidebar">

                    <!-- Similar Jobs Widget -->
                    <div class="sidebar-widget widget-recent-posts">
                        <h5 class="underline-title">Similar Jobs</h5>
                        @forelse($similarJobs as $similarJob)
                        <article class="sigma_recent-post">
                            <a href="{{ route('frontend.jobs.details', $similarJob->id) }}"><img src="https://placehold.co/100x100/f4a261/ffffff?text={{ substr($similarJob->company, 0, 1) }}" alt="{{ $similarJob->company }}"></a>
                            <div class="sigma_recent-post-body">
                                @if($similarJob->district)
                                <a href="{{ route('frontend.jobs.details', $similarJob->id) }}"><i class="far fa-map-marker-alt"></i> {{ $similarJob->district->name }}</a>
                                @endif
                                <h6><a href="{{ route('frontend.jobs.details', $similarJob->id) }}">{{ $similarJob->job_title }}</a></h6>
                            </div>
                        </article>
                        @empty
                        <p>No similar jobs found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
