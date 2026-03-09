@extends('frontend.layouts.default')

@section('title', 'All Organizations - Bengali Hindu Unity')

@section('stylesheet')
<style>
    /* Organization Image Styles */
    .sigma_post-thumb {
        width: 100%;
        height: 270px;
        overflow: hidden;
        position: relative;
    }

    .sigma_post-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    /* Autocomplete Styles */
    .custom-search-box {
        position: relative;
    }

    .organization-autocomplete-list {
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

    .organization-autocomplete-list li {
        padding: 12px 15px;
        cursor: pointer;
        border-bottom: 1px solid #f0f0f0;
        transition: background-color 0.2s;
    }

    .organization-autocomplete-list li:last-child {
        border-bottom: none;
    }

    .organization-autocomplete-list li:hover,
    .organization-autocomplete-list li.active {
        background-color: #f8f9fa;
    }

    .organization-autocomplete-list .organization-name {
        font-weight: 500;
        color: #333;
        margin-bottom: 4px;
    }

    .organization-autocomplete-list .organization-location {
        font-size: 0.875rem;
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
    #orgFilterDrawer .offcanvas-header {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        color: #fff;
    }
    #orgFilterDrawer .offcanvas-header .btn-close {
        filter: brightness(0) invert(1);
    }
    #orgFilterDrawer .offcanvas-header .offcanvas-title {
        color: #fff;
    }
    #orgFilterDrawer .offcanvas-body {
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

/* Offcanvas: never cover full screen on small devices */
    #orgFilterDrawer {
        max-width: 85vw;
    }
    @media (max-width: 1023px) {
        #orgFilterDrawer .offcanvas-body {
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }
        #orgFilterDrawer .offcanvas-body .mb-3:last-child {
            margin-bottom: 1rem !important;
        }
    }
    @media (max-width: 425px) {
        #orgFilterDrawer {
            max-width: 82vw;
        }
        #orgFilterDrawer .offcanvas-header {
            padding: .625rem .75rem;
        }
        #orgFilterDrawer .offcanvas-header .offcanvas-title {
            font-size: .95rem;
        }
        #orgFilterDrawer .offcanvas-body {
            padding: .75rem .75rem 5rem;
            font-size: .9rem;
        }
        #orgFilterDrawer .offcanvas-body .form-label {
            font-size: .85rem;
            margin-bottom: .25rem;
        }
        #orgFilterDrawer .offcanvas-body .form-select,
        #orgFilterDrawer .offcanvas-body .form-check-label {
            font-size: .85rem;
        }
        #orgFilterDrawer .offcanvas-body .mb-3 {
            margin-bottom: .625rem !important;
        }
        .filter-drawer-footer {
            padding: .625rem .75rem;
        }
    }
    /* Semi-transparent backdrop so background stays visible */
    .offcanvas-backdrop.show {
        opacity: 0.25;
    }
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">All Organizations</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-normal">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Organizations</li>
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
                <button class="btn btn-mobile-filter w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#orgFilterDrawer" aria-controls="orgFilterDrawer">
                    <i class="fal fa-filter me-2"></i>Filters
                    <span class="badge bg-white text-dark ms-2 filter-count-badge" id="activeFilterCount" style="display:none;">0</span>
                </button>
            </div>

            {{-- Desktop sidebar (visible on lg+) --}}
            <div class="col-lg-3 d-none d-lg-block">
                <div class="sidebar">
                    <div class="sidebar-widget widget-temple-filter" id="desktopFilterContainer">
                        <h5 class="underline-title">Filter Organizations</h5>
                        {{-- Form placed here on desktop via JS --}}
                    </div>
                </div>
            </div>

            {{-- Mobile offcanvas drawer (standard BS 5.0 offcanvas) --}}
            <div class="offcanvas offcanvas-start" tabindex="-1" id="orgFilterDrawer" aria-labelledby="orgFilterDrawerLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="orgFilterDrawerLabel"><i class="fal fa-filter me-2"></i>Filter Organizations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" id="mobileFilterContainer">
                    {{-- Form moved here on mobile via JS --}}
                </div>
                <div class="filter-drawer-footer">
                    <button type="button" id="applyFilterBtn" class="sigma_btn-custom w-100">
                        <i class="fal fa-check me-1"></i> Show Results
                    </button>
                </div>
            </div>

            {{-- The actual filter form (rendered once, moved by JS) --}}
            <template id="filterFormTemplate">
                <form id="organizationFilterForm">
                    <div class="mb-3">
                        <button type="button" id="resetFilterBtn" class="sigma_btn-custom w-100">Reset Filter</button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Division</label>
                        <select name="division_id" id="division" class="form-select">
                            <option value="">Select Division</option>
                            @foreach($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">District</label>
                        <select name="district_id" id="district" class="form-select">
                            <option value="">Select District</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}" data-division="{{ $district->division_id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Organization Type</label>
                        <select name="organization_type" id="organization_type" class="form-select">
                            <option value="">All Types</option>
                            <option value="business">Business</option>
                            <option value="religious">Religious</option>
                            <option value="both">Both</option>
                        </select>
                    </div>
                    <div class="mb-3" id="business-categories-section">
                        <h6 class="fw-bold text-primary">Business Categories</h6>
                        @foreach($businessCategories as $category)
                            @if($category->businesses->count() > 0)
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">{{ $category->name }}</label>
                                    @foreach($category->businesses as $business)
                                        <div class="form-check">
                                            <input class="form-check-input business-checkbox" type="checkbox"
                                                name="businesses[]" id="business_{{ $business->id }}" value="{{ $business->id }}">
                                            <label class="form-check-label" for="business_{{ $business->id }}">
                                                {{ $business->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="mb-3" id="religious-categories-section">
                        <h6 class="fw-bold text-success">Religious Categories</h6>
                        @foreach($religiousCategories as $category)
                            @if($category->businesses->count() > 0)
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">{{ $category->name }}</label>
                                    @foreach($category->businesses as $business)
                                        <div class="form-check">
                                            <input class="form-check-input business-checkbox" type="checkbox"
                                                name="businesses[]" id="business_{{ $business->id }}" value="{{ $business->id }}">
                                            <label class="form-check-label" for="business_{{ $business->id }}">
                                                {{ $business->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                </form>
            </template>

            <!-- Main Content -->
            <div class="col-lg-9">
                <!-- Search Box -->
                <div class="custom-search-container mb-4 offset-lg-3">
                    <div class="custom-search-box position-relative">
                        <form action="{{ route('frontend.organizations') }}" method="GET" id="organization-search-form">
                            <input type="text" name="query" id="organization-search-input" class="form-control"
                                placeholder="Search organizations, business categories..." aria-label="Search organizations">
                            <button type="submit" class="btn btn-search" aria-label="Search">
                                <i class="fal fa-search search-icon"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Organizations Grid -->
                <div class="row" id="organizationsGrid">
                    @include('frontend.partials.organizations-grid')
                </div>

                <!-- Pagination -->
                <div class="row">
                    <div class="col-12">
                        <div id="paginationContainer">
                            @include('frontend.partials.organizations-pagination')
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

    // ── State ────────────────────────────────────────────────────────────
    let filterController = null;
    let searchController = null;
    let filterTimer = null;
    const FILTER_DEBOUNCE = 300;

    // ── DOM-Ready ────────────────────────────────────────────────────────
    document.addEventListener('DOMContentLoaded', function() {

        // --- Form placement (move single form between desktop / mobile) ---
        var tpl = document.getElementById('filterFormTemplate');
        var desktopContainer = document.getElementById('desktopFilterContainer');
        var mobileContainer  = document.getElementById('mobileFilterContainer');
        var formNode = tpl.content.firstElementChild.cloneNode(true);

        function placeForm() {
            var isDesktop = window.innerWidth >= 992;
            var target = isDesktop ? desktopContainer : mobileContainer;
            var currentForm = document.getElementById('organizationFilterForm');
            if (currentForm && currentForm.parentNode === target) return;
            if (currentForm) target.appendChild(currentForm);
        }

        // Initial placement
        (window.innerWidth >= 992 ? desktopContainer : mobileContainer).appendChild(formNode);

        var resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(placeForm, 150);
        });

        // --- Element references ---
        var form             = document.getElementById('organizationFilterForm');
        var divisionSelect   = document.getElementById('division');
        var districtSelect   = document.getElementById('district');
        var orgTypeSelect    = document.getElementById('organization_type');
        var orgGrid          = document.getElementById('organizationsGrid');
        var paginationContainer = document.getElementById('paginationContainer');

        // ── Core AJAX filter (with AbortController) ──────────────────────
        function filterOrganizations(extraParams) {
            if (filterController) filterController.abort();
            filterController = new AbortController();

            var formData = new FormData(form);

            var searchQuery = document.getElementById('organization-search-input').value.trim();
            if (searchQuery) formData.append('query', searchQuery);

            if (extraParams) {
                Object.keys(extraParams).forEach(function(k) {
                    formData.append(k, extraParams[k]);
                });
            }

            var params = new URLSearchParams(formData).toString();

            // Show loading spinner
            orgGrid.innerHTML = '<div class="col-12 text-center py-5"><i class="fas fa-spinner fa-spin fa-3x"></i></div>';

            fetch('{{ route("frontend.organizations.filter") }}?' + params, {
                signal: filterController.signal
            })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                filterController = null;
                orgGrid.innerHTML = data.organizationsHtml;
                paginationContainer.innerHTML = data.paginationHtml;
            })
            .catch(function(err) {
                if (err.name !== 'AbortError') {
                    console.error('Filter error:', err);
                    orgGrid.innerHTML = '<div class="col-12 text-center py-5"><div class="alert alert-danger">Error loading organizations. Please try again.</div></div>';
                }
            });
        }

        // ── Debounced wrapper ────────────────────────────────────────────
        function scheduleFilter() {
            clearTimeout(filterTimer);
            filterTimer = setTimeout(function() {
                filterOrganizations();
            }, FILTER_DEBOUNCE);
        }

        // ── Cascading dropdowns ──────────────────────────────────────────
        divisionSelect.addEventListener('change', function() {
            var divisionId = this.value;

            Array.from(districtSelect.options).forEach(function(opt) {
                if (opt.value === '') { opt.style.display = ''; return; }
                opt.style.display = (!divisionId || opt.getAttribute('data-division') == divisionId) ? '' : 'none';
            });
            districtSelect.value = '';

            scheduleFilter();
        });

        districtSelect.addEventListener('change', function() {
            scheduleFilter();
        });

        // ── Organization type toggle ─────────────────────────────────────
        orgTypeSelect.addEventListener('change', function() {
            var orgType = this.value;
            var bizSection = document.getElementById('business-categories-section');
            var relSection = document.getElementById('religious-categories-section');

            if (orgType === 'business') {
                bizSection.style.display = '';
                relSection.style.display = 'none';
                // Uncheck hidden religious checkboxes
                relSection.querySelectorAll('.business-checkbox').forEach(function(cb) { cb.checked = false; });
            } else if (orgType === 'religious') {
                bizSection.style.display = 'none';
                relSection.style.display = '';
                // Uncheck hidden business checkboxes
                bizSection.querySelectorAll('.business-checkbox').forEach(function(cb) { cb.checked = false; });
            } else {
                bizSection.style.display = '';
                relSection.style.display = '';
            }

            scheduleFilter();
        });

        // Checkbox listeners (delegated via form)
        form.addEventListener('change', function(e) {
            if (e.target.classList.contains('business-checkbox')) {
                scheduleFilter();
            }
        });

        // ── jQuery section (autocomplete, reset, pagination, badge) ──────
        (function($) {

            // Reset filter (delegated)
            $(document).on('click', '#resetFilterBtn', function() {
                $('#division').val('');
                $('#district').val('');
                $('#organization_type').val('');
                $('#district option').show();
                $('#business-categories-section').show();
                $('#religious-categories-section').show();
                $('.business-checkbox').prop('checked', false);
                $('#organization-search-input').val('');
                updateFilterCount();
                closeFilterDrawer();

                clearTimeout(filterTimer);
                filterOrganizations();
            });

            // Mobile "Show Results"
            $(document).on('click', '#applyFilterBtn', function() {
                closeFilterDrawer();
                setTimeout(function() {
                    document.getElementById('organizationsGrid').scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 350);
            });

            // Helper: close offcanvas
            function closeFilterDrawer() {
                var el = document.getElementById('orgFilterDrawer');
                var inst = bootstrap.Offcanvas.getInstance(el);
                if (inst) inst.hide();
            }

            // Badge count
            function updateFilterCount() {
                var count = 0;
                if ($('#division').val()) count++;
                if ($('#district').val()) count++;
                if ($('#organization_type').val()) count++;
                count += $('.business-checkbox:checked').length;
                var $badge = $('#activeFilterCount');
                if (count > 0) { $badge.text(count).show(); } else { $badge.hide(); }
            }

            $(document).on('change', '#organizationFilterForm select, #organizationFilterForm input', function() {
                updateFilterCount();
            });

            // ── Autocomplete search ──────────────────────────────────────
            var searchTimer;
            var $searchInput = $('#organization-search-input');
            var $searchForm  = $('#organization-search-form');
            var $autocomplete = $('<ul class="organization-autocomplete-list"></ul>');
            $searchInput.after($autocomplete);

            $(document).on('click', function(e) {
                if (!$(e.target).closest('.custom-search-box').length) $autocomplete.hide();
            });

            $searchInput.on('input', function() {
                var query = $(this).val().trim();
                clearTimeout(searchTimer);
                if (query.length < 2) {
                    $autocomplete.hide();
                    if (query.length === 0) {
                        clearTimeout(filterTimer);
                        filterOrganizations();
                    }
                    return;
                }
                searchTimer = setTimeout(function() {
                    if (searchController) searchController.abort();
                    searchController = new AbortController();

                    fetch('{{ route("api.organizations.search") }}?query=' + encodeURIComponent(query), {
                        signal: searchController.signal
                    })
                    .then(function(r) { return r.json(); })
                    .then(function(data) {
                        searchController = null;
                        $autocomplete.empty();
                        if (data.length === 0) {
                            $autocomplete.html('<li class="text-muted" style="padding:20px;text-align:center;cursor:default;">No organizations found</li>').show();
                            return;
                        }
                        data.forEach(function(org) {
                            var $item = $('<li class="autocomplete-item"></li>');
                            $item.html(
                                '<div class="organization-name">' + $('<span>').text(org.name).html() + '</div>' +
                                '<div class="organization-location">' + $('<span>').text(org.location).html() + '</div>'
                            );
                            $item.data('org', org);
                            $autocomplete.append($item);
                        });
                        $autocomplete.show();
                    })
                    .catch(function(err) {
                        if (err.name !== 'AbortError') console.error('Search error:', err);
                    });
                }, 300);
            });

            $autocomplete.on('click', '.autocomplete-item', function() {
                var org = $(this).data('org');
                $searchInput.val(org.name);
                $autocomplete.hide();
                clearTimeout(filterTimer);
                filterOrganizations();
            });

            $searchForm.on('submit', function(e) {
                e.preventDefault();
                $autocomplete.hide();
                clearTimeout(filterTimer);
                filterOrganizations();
            });

            // Keyboard navigation
            $searchInput.on('keydown', function(e) {
                var $items  = $autocomplete.find('.autocomplete-item');
                var $active = $items.filter('.active');
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    if (!$active.length) $items.first().addClass('active');
                    else $active.removeClass('active').next('.autocomplete-item').addClass('active');
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    if ($active.length) $active.removeClass('active').prev('.autocomplete-item').addClass('active');
                } else if (e.key === 'Enter' && $active.length) {
                    e.preventDefault();
                    $active.click();
                } else if (e.key === 'Escape') {
                    $autocomplete.hide();
                }
            });

            // ── Pagination (delegated) ───────────────────────────────────
            $(document).on('click', '#paginationContainer .pagination a', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                if (!url || url === '#') return;

                var page = new URL(url).searchParams.get('page') || 1;
                filterOrganizations({ page: page });

                setTimeout(function() {
                    orgGrid.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 100);
            });

        })(jQuery);
    });
})();
</script>
@endsection
