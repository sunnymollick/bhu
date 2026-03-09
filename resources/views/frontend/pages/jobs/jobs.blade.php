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

/* Mobile Filter Drawer (Bootstrap 5.0.2 compatible) */
    .btn-mobile-filter {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        color: #fff;
        font-weight: 600;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        font-size: 1rem;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(220,138,69,.3);
        transition: all .25s;
    }
    .btn-mobile-filter:hover,
    .btn-mobile-filter:focus,
    .btn-mobile-filter:active {
        background: linear-gradient(to right, #c97a3a, #4a4444);
        color: #fff;
    }
    .filter-count-badge {
        font-size: .7rem;
        border-radius: 50px;
        min-width: 20px;
    }
    #jobFilterDrawer .offcanvas-header {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        color: #fff;
    }
    #jobFilterDrawer .offcanvas-header .btn-close {
        filter: brightness(0) invert(1);
    }
    #jobFilterDrawer .offcanvas-header .offcanvas-title {
        color: #fff;
    }
    #jobFilterDrawer .offcanvas-body {
        padding-bottom: 5rem;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }
    .filter-drawer-footer {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: .875rem 1rem;
        border-top: 1px solid #dee2e6;
        background: #fff;
        z-index: 1;
    }
    #jobFilterDrawer {
        max-width: 85vw;
    }
    @media (max-width: 1023px) {
        #jobFilterDrawer .offcanvas-body {
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }
        #jobFilterDrawer .offcanvas-body .mb-3:last-child {
            margin-bottom: 1rem !important;
        }
    }
    @media (max-width: 425px) {
        #jobFilterDrawer {
            max-width: 82vw;
        }
        #jobFilterDrawer .offcanvas-header {
            padding: .625rem .75rem;
        }
        #jobFilterDrawer .offcanvas-header .offcanvas-title {
            font-size: .95rem;
        }
        #jobFilterDrawer .offcanvas-body {
            padding: .75rem .75rem 5rem;
            font-size: .9rem;
        }
        #jobFilterDrawer .offcanvas-body .form-label {
            font-size: .85rem;
            margin-bottom: .25rem;
        }
        #jobFilterDrawer .offcanvas-body .form-select {
            font-size: .85rem;
        }
        #jobFilterDrawer .offcanvas-body .mb-3 {
            margin-bottom: .625rem !important;
        }
        .filter-drawer-footer {
            padding: .625rem .75rem;
        }
    }
    .offcanvas-backdrop.show {
        opacity: 0.25;
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
        <ol class="breadcrumb breadcrumb-normal">
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
            {{-- Mobile Filter Toggle (visible below lg) --}}
            <div class="col-12 d-lg-none mb-3">
                <button class="btn btn-mobile-filter w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#jobFilterDrawer" aria-controls="jobFilterDrawer">
                    <i class="fal fa-filter me-2"></i>Filters
                    <span class="badge bg-white text-dark ms-2 filter-count-badge" id="activeFilterCount" style="display:none;">0</span>
                </button>
            </div>

            {{-- Desktop sidebar (visible on lg+) --}}
            <div class="col-lg-3 d-none d-lg-block">
                <div class="filter-sidebar" id="desktopFilterContainer">
                    <h5 class="underline-title mb-3">Filter Jobs</h5>
                </div>
            </div>

            {{-- Mobile offcanvas drawer --}}
            <div class="offcanvas offcanvas-start" tabindex="-1" id="jobFilterDrawer" aria-labelledby="jobFilterDrawerLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="jobFilterDrawerLabel"><i class="fal fa-filter me-2"></i>Filter Jobs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" id="mobileFilterContainer"></div>
                <div class="filter-drawer-footer">
                    <button type="button" id="applyFilterBtn" class="sigma_btn-custom w-100">
                        <i class="fal fa-check me-1"></i> Show Results
                    </button>
                </div>
            </div>

            {{-- Single filter form in template --}}
            <template id="filterFormTemplate">
                <form id="jobFilterForm">
                    <div class="mb-3">
                        <button type="button" id="resetFilterBtn" class="sigma_btn-custom w-100">Reset Filter</button>
                    </div>
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
                </form>
            </template>

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
                        <p>Showing <b id="showFrom">{{ $jobs->firstItem() ?? 0 }}</b> to <b id="showTo">{{ $jobs->lastItem() ?? 0 }}</b> of <b id="showTotal">{{ $jobs->total() }}</b> jobs</p>
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
(function() {
    'use strict';

    var filterController = null;
    var searchController = null;
    var filterTimer = null;
    var DEBOUNCE = 300;

    document.addEventListener('DOMContentLoaded', function() {

        // ── Form placement ───────────────────────────────────────────────
        var tpl = document.getElementById('filterFormTemplate');
        var desktopContainer = document.getElementById('desktopFilterContainer');
        var mobileContainer  = document.getElementById('mobileFilterContainer');
        var formNode = tpl.content.firstElementChild.cloneNode(true);

        function placeForm() {
            var isDesktop = window.innerWidth >= 992;
            var target = isDesktop ? desktopContainer : mobileContainer;
            var f = document.getElementById('jobFilterForm');
            if (f && f.parentNode === target) return;
            if (f) target.appendChild(f);
        }

        (window.innerWidth >= 992 ? desktopContainer : mobileContainer).appendChild(formNode);

        var resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(placeForm, 150);
        });

        // ── References ───────────────────────────────────────────────────
        var form           = document.getElementById('jobFilterForm');
        var divisionSelect = document.getElementById('division');
        var districtSelect = document.getElementById('district');
        var jobsGrid       = document.getElementById('jobsGrid');
        var pagContainer   = document.getElementById('paginationContainer');

        // ── Core filter (AbortController) ────────────────────────────────
        function filterJobs(extraParams) {
            if (filterController) filterController.abort();
            filterController = new AbortController();

            var formData = new FormData(form);

            var q = document.getElementById('job-search-input').value.trim();
            if (q) formData.append('query', q);

            formData.append('sort_by', document.getElementById('sortBy').value);

            if (extraParams) {
                Object.keys(extraParams).forEach(function(k) { formData.append(k, extraParams[k]); });
            }

            var params = new URLSearchParams(formData).toString();

            jobsGrid.innerHTML = '<div class="col-12 text-center py-5"><i class="fas fa-spinner fa-spin fa-3x"></i></div>';

            fetch('{{ route("frontend.jobs.filter") }}?' + params, { signal: filterController.signal })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                filterController = null;
                jobsGrid.innerHTML = data.grid;
                pagContainer.innerHTML = data.pagination;
                if (data.count) {
                    document.getElementById('showFrom').textContent = data.count.from;
                    document.getElementById('showTo').textContent = data.count.to;
                    document.getElementById('showTotal').textContent = data.count.total;
                }
            })
            .catch(function(err) {
                if (err.name !== 'AbortError') {
                    console.error('Filter error:', err);
                    jobsGrid.innerHTML = '<div class="col-12 text-center py-5"><div class="alert alert-danger">Error loading jobs. Please try again.</div></div>';
                }
            });
        }

        function scheduleFilter() {
            clearTimeout(filterTimer);
            filterTimer = setTimeout(function() { filterJobs(); }, DEBOUNCE);
        }

        // ── Division → District cascade ──────────────────────────────────
        divisionSelect.addEventListener('change', function() {
            var divId = this.value;
            Array.from(districtSelect.options).forEach(function(opt) {
                if (opt.value === '') { opt.style.display = ''; return; }
                opt.style.display = (!divId || opt.getAttribute('data-division') == divId) ? '' : 'none';
            });
            districtSelect.value = '';
            scheduleFilter();
        });

        // ── All select filters ───────────────────────────────────────────
        form.addEventListener('change', function(e) {
            if (e.target.tagName === 'SELECT') scheduleFilter();
        });

        document.getElementById('sortBy').addEventListener('change', function() {
            scheduleFilter();
        });

        // ── jQuery section ───────────────────────────────────────────────
        (function($) {

            // Reset
            $(document).on('click', '#resetFilterBtn', function() {
                var f = document.getElementById('jobFilterForm');
                if (f) f.reset();
                $('#job-search-input').val('');
                $('#sortBy').val('latest');
                $('#district option').css('display', '');
                updateFilterCount();
                closeDrawer();
                clearTimeout(filterTimer);
                filterJobs();
            });

            // Apply (mobile)
            $(document).on('click', '#applyFilterBtn', function() {
                closeDrawer();
                setTimeout(function() {
                    document.getElementById('jobsGrid').scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 350);
            });

            function closeDrawer() {
                var el = document.getElementById('jobFilterDrawer');
                var inst = bootstrap.Offcanvas.getInstance(el);
                if (inst) inst.hide();
            }

            // Badge count
            function updateFilterCount() {
                var count = 0;
                ['#jobCategory','#jobIndustry','#jobType','#workMode','#division','#district'].forEach(function(sel) {
                    if ($(sel).val()) count++;
                });
                var $b = $('#activeFilterCount');
                count > 0 ? $b.text(count).show() : $b.hide();
            }
            $(document).on('change', '#jobFilterForm select', function() { updateFilterCount(); });

            // ── Autocomplete ─────────────────────────────────────────────
            var searchTimer;
            var $searchInput = $('#job-search-input');
            var $autocomplete = $('<ul class="job-autocomplete-list"></ul>');
            $searchInput.after($autocomplete);

            $(document).on('click', function(e) {
                if (!$(e.target).closest('.custom-search-box').length) $autocomplete.hide();
            });

            $searchInput.on('input', function() {
                var query = $(this).val().trim();
                clearTimeout(searchTimer);
                if (query.length < 2) {
                    $autocomplete.hide();
                    if (query.length === 0) { clearTimeout(filterTimer); filterJobs(); }
                    return;
                }
                searchTimer = setTimeout(function() {
                    if (searchController) searchController.abort();
                    searchController = new AbortController();
                    fetch('{{ route("api.jobs.search") }}?query=' + encodeURIComponent(query), { signal: searchController.signal })
                    .then(function(r) { return r.json(); })
                    .then(function(data) {
                        searchController = null;
                        $autocomplete.empty();
                        if (data.length === 0) {
                            $autocomplete.html('<li class="text-muted" style="padding:20px;text-align:center;cursor:default;">No jobs found</li>').show();
                            return;
                        }
                        data.forEach(function(job) {
                            var $item = $('<li class="autocomplete-item"></li>');
                            $item.html(
                                '<div class="job-title">' + $('<span>').text(job.title).html() + '</div>' +
                                '<div class="job-company">' + $('<span>').text(job.company + (job.location ? ' - ' + job.location : '')).html() + '</div>'
                            );
                            $item.data('title', job.title);
                            $autocomplete.append($item);
                        });
                        $autocomplete.show();
                    })
                    .catch(function(err) { if (err.name !== 'AbortError') console.error(err); });
                }, 300);
            });

            $autocomplete.on('click', '.autocomplete-item', function() {
                $searchInput.val($(this).data('title'));
                $autocomplete.hide();
                clearTimeout(filterTimer);
                filterJobs();
            });

            $('#job-search-form').on('submit', function(e) {
                e.preventDefault();
                $autocomplete.hide();
                clearTimeout(filterTimer);
                filterJobs();
            });

            // Keyboard nav
            $searchInput.on('keydown', function(e) {
                var $items = $autocomplete.find('.autocomplete-item');
                var $active = $items.filter('.active');
                if (e.key === 'ArrowDown') { e.preventDefault(); if (!$active.length) $items.first().addClass('active'); else $active.removeClass('active').next('.autocomplete-item').addClass('active'); }
                else if (e.key === 'ArrowUp') { e.preventDefault(); if ($active.length) $active.removeClass('active').prev('.autocomplete-item').addClass('active'); }
                else if (e.key === 'Enter' && $active.length) { e.preventDefault(); $active.click(); }
                else if (e.key === 'Escape') { $autocomplete.hide(); }
            });

            // ── Pagination (delegated) ───────────────────────────────────
            $(document).on('click', '#paginationContainer .pagination a', function(e) {
                e.preventDefault();
                var page = $(this).data('page');
                if (!page) {
                    var href = $(this).attr('href');
                    if (!href || href === '#') return;
                    page = new URL(href).searchParams.get('page') || 1;
                }
                filterJobs({ page: page });
                setTimeout(function() { jobsGrid.scrollIntoView({ behavior: 'smooth', block: 'start' }); }, 100);
            });

        })(jQuery);
    });
})();
</script>
@endsection
