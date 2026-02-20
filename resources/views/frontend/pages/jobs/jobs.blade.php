@extends('frontend.layouts.default')

@section('title', 'All Jobs - Bengali Hindu Unity')

@section('stylesheet')
<style>
/* Autocomplete Styles */
    .custom-search-box {
        position: relative;
    }

    .job-autocomplete-list {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 1px solid #ddd;
        border-top: none;
        border-radius: 0 0 4px 4px;
        list-style: none;
        margin: 0;
        padding: 0;
        max-height: 400px;
        overflow-y: auto;
        z-index: 1000;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        display: none;
    }

    .job-autocomplete-list li {
        padding: 12px 15px;
        cursor: pointer;
        border-bottom: 1px solid #f0f0f0;
        transition: background-color 0.2s;
    }

    .job-autocomplete-list li:last-child {
        border-bottom: none;
    }

    .job-autocomplete-list li:hover,
    .job-autocomplete-list li.active {
        background-color: #f8f9fa;
    }

    .job-autocomplete-list .job-title {
        font-weight: 500;
        color: #333;
        margin-bottom: 4px;
    }

    .job-autocomplete-list .job-company {
        font-size: 0.85em;
        color: #666;
    }

    .job-autocomplete-list .no-results {
        color: #999;
        text-align: center;
        padding: 20px;
        cursor: default;
    }

    .job-autocomplete-list .no-results:hover {
        background-color: white;
    }

    #job-search-input:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">All Jobs</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jobs</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <!-- Filter Sidebar -->
            <div class="col-lg-3">
                <div class="filter-sidebar">
                    <h5 class="underline-title mb-3">Filter Jobs</h5>
                    <form id="jobFilterForm">
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="job_category_id" id="jobCategory">
                                <option value="">All Categories</option>
                                @foreach($jobCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Industry</label>
                            <select class="form-select" name="job_industry_id" id="jobIndustry">
                                <option value="">All Industries</option>
                                @foreach($jobIndustries as $industry)
                                    <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Job Type</label>
                            <select class="form-select" name="job_type" id="jobType">
                                <option value="">Any</option>
                                <option value="full_time">Full Time</option>
                                <option value="part_time">Part Time</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Work Mode</label>
                            <select class="form-select" name="work_mode" id="workMode">
                                <option value="">Any</option>
                                <option value="remote">Remote</option>
                                <option value="in_person">In-person</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Division</label>
                            <select class="form-select" name="division_id" id="division">
                                <option value="">All Divisions</option>
                                @foreach($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">District</label>
                            <select class="form-select" name="district_id" id="district">
                                <option value="">All Districts</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}" data-division="{{ $district->division_id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Reset Filter Button -->
                        <button type="button" id="resetFilterBtn" class="btn btn-primary btn-block">Reset Filter</button>
                    </form>
                </div>
            </div>
            <!-- Main Content -->
            <div class="col-lg-9">
                <!-- SEARCH BOX START -->
                <div class="custom-search-container mb-4 offset-lg-3">
                    <div class="custom-search-box position-relative">
                        <form action="{{ route('frontend.jobs') }}" method="GET" id="job-search-form">
                            <input type="text" name="query" id="job-search-input" class="form-control" placeholder="Search jobs ..." aria-label="Search jobs">
                            <button type="submit" class="btn btn-search" aria-label="Search">
                                <i class="fal fa-search search-icon"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="sigma_shop-global">
                        <p>Showing <b>{{ $jobs->firstItem() ?? 0 }}</b> to <b>{{ $jobs->lastItem() ?? 0 }}</b> of <b>{{ $jobs->total() }}</b> jobs</p>
                        <form method="post">
                            <select class="form-control" name="sort_by" id="sortBy">
                                <option value="latest">Latest Jobs</option>
                                <option value="oldest">Oldest Jobs</option>
                                <option value="deadline_soon">Deadline Soon</option>
                                <option value="deadline_far">Deadline Far</option>
                            </select>
                        </form>
                    </div>
                </div>
                <!-- SEARCH BOX END -->
                <div class="row" id="jobsGrid">
                    @include('frontend.partials.jobs-grid')
                </div>

                <!-- Pagination -->
                <div class="row">
                    <div class="col-12">
                        <div id="paginationContainer">
                            @include('frontend.partials.jobs-pagination')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_scripts')
<script>
    $(document).ready(function() {
        let currentPage = 1;
        let filterTimeout;

        // Create autocomplete dropdown
        let $autocompleteList = $('<ul class="job-autocomplete-list"></ul>');
        $('#job-search-input').after($autocompleteList);

        // Division change - cascade districts
        $('#division').on('change', function() {
            const divisionId = $(this).val();
            const districtSelect = $('#district');

            if (divisionId) {
                districtSelect.find('option').each(function() {
                    const option = $(this);
                    if (option.val() === '') {
                        option.show();
                    } else if (option.data('division') == divisionId) {
                        option.show();
                    } else {
                        option.hide();
                    }
                });
                districtSelect.val('');
            } else {
                districtSelect.find('option').show();
                districtSelect.val('');
            }

            filterJobs();
        });

        // District change
        $('#district').on('change', function() {
            filterJobs();
        });

        // Filter changes
        $('#jobCategory, #jobIndustry, #jobType, #workMode').on('change', function() {
            filterJobs();
        });

        // Sorting change
        $('#sortBy').on('change', function() {
            filterJobs();
        });

        // Filter Jobs Function
        function filterJobs(page = 1) {
            currentPage = page;

            const formData = {
                job_category_id: $('#jobCategory').val(),
                job_industry_id: $('#jobIndustry').val(),
                job_type: $('#jobType').val(),
                work_mode: $('#workMode').val(),
                division_id: $('#division').val(),
                district_id: $('#district').val(),
                query: $('#job-search-input').val(),
                sort_by: $('#sortBy').val(),
                page: page
            };

            $.ajax({
                url: '{{ route("frontend.jobs.filter") }}',
                method: 'GET',
                data: formData,
                success: function(response) {
                    $('#jobsGrid').html(response.grid);
                    $('#paginationContainer').html(response.pagination);

                    // Update the count display
                    $('.sigma_shop-global p').html(
                        'Showing <b>' + response.count.from + '</b> to <b>' +
                        response.count.to + '</b> of <b>' + response.count.total + '</b> jobs'
                    );
                },
                error: function(xhr) {
                    console.error('Error filtering jobs:', xhr);
                }
            });
        }

        // Update pagination
        function updatePagination(filters) {
            // No longer needed as pagination is updated in filterJobs
        }

        // Pagination click handler
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            const page = $(this).data('page');
            if (page) {
                filterJobs(page);
            }
        });

        // Reset filter
        $('#resetFilterBtn').on('click', function() {
            $('#jobFilterForm')[0].reset();
            $('#job-search-input').val('');
            $('#sortBy').val('latest');
            filterJobs(1);
        });

        // Search functionality with autocomplete
        let searchTimeout;
        $('#job-search-input').on('keyup', function() {
            clearTimeout(searchTimeout);
            const query = $(this).val();

            if (query.length >= 2) {
                searchTimeout = setTimeout(function() {
                    $.ajax({
                        url: '{{ route("api.jobs.search") }}',
                        method: 'GET',
                        data: { query: query },
                        success: function(results) {
                            displaySearchResults(results);
                        }
                    });
                }, 300);
            } else {
                $autocompleteList.hide();
            }
        });

        // Display search results
        function displaySearchResults(results) {
            $autocompleteList.empty();

            if (results.length > 0) {
                results.forEach(function(job) {
                    let $li = $('<li></li>');
                    $li.html(`
                        <div class="job-title">${job.title}</div>
                        <div class="job-company">${job.company}${job.location ? ' - ' + job.location : ''}</div>
                    `);
                    $li.data('title', job.title);
                    $autocompleteList.append($li);
                });
                $autocompleteList.show();
            } else {
                $autocompleteList.hide();
            }
        }

        // Click on autocomplete item
        $(document).on('click', '.job-autocomplete-list li', function() {
            const jobTitle = $(this).data('title');
            $('#job-search-input').val(jobTitle);
            $autocompleteList.hide();
            filterJobs(1);
        });

        // Hide autocomplete when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.custom-search-box').length) {
                $autocompleteList.hide();
            }
        });

        // Search form submit
        $('#job-search-form').on('submit', function(e) {
            e.preventDefault();
            filterJobs(1);
            $autocompleteList.hide();
        });

        // Clear search when input is cleared
        $('#job-search-input').on('input', function() {
            if ($(this).val() === '') {
                filterJobs(1);
            }
        });
    });
</script>
@endsection
