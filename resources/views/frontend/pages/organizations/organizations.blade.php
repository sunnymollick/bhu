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
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">All Organizations</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
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
            <div class="col-lg-3">
                <div class="sidebar">
                    <!-- Filter Controls -->
                    <div class="sidebar-widget widget-temple-filter">
                        <h5 class="underline-title">Filter Organizations</h5>
                        <form id="organizationFilterForm">
                            <!-- Reset Filter Button -->
                            <div class="mb-3">
                                <button type="button" id="resetFilterBtn" class="sigma_btn-custom w-100">Reset Filter</button>
                            </div>

                            <!-- Division -->
                            <div class="mb-3">
                                <label class="form-label">Division</label>
                                <select name="division_id" id="division" class="form-select">
                                    <option value="">Select Division</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- District -->
                            <div class="mb-3">
                                <label class="form-label">District</label>
                                <select name="district_id" id="district" class="form-select">
                                    <option value="">Select District</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}" data-division="{{ $district->division_id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Organization Type -->
                            <div class="mb-3">
                                <label class="form-label">Organization Type</label>
                                <select name="organization_type" id="organization_type" class="form-select">
                                    <option value="">All Types</option>
                                    <option value="business">Business</option>
                                    <option value="religious">Religious</option>
                                    <option value="both">Both</option>
                                </select>
                            </div>

                            <!-- Business Categories -->
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

                            <!-- Religious Categories -->
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
                    </div>
                </div>
            </div>

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
    $(document).ready(function() {
        let currentPage = 1;
        let filterTimeout;

        // Division change - cascade districts
        $('#division').on('change', function() {
            const divisionId = $(this).val();
            const districtSelect = $('#district');

            if (divisionId) {
                // Show only districts for selected division
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
                // Show all districts if no division selected
                districtSelect.find('option').show();
                districtSelect.val('');
            }

            // Trigger filter
            filterOrganizations();
        });

        // District change
        $('#district').on('change', function() {
            filterOrganizations();
        });

        // Business checkbox change
        $('.business-checkbox').on('change', function() {
            filterOrganizations();
        });

        // Filter Organizations Function
        function filterOrganizations(page = 1) {
            currentPage = page;

            const formData = {
                division_id: $('#division').val(),
                district_id: $('#district').val(),
                organization_type: $('#organization_type').val(),
                businesses: [],
                query: $('#organization-search-input').val(),
                page: page
            };

            // Collect checked businesses
            $('.business-checkbox:checked').each(function() {
                formData.businesses.push($(this).val());
            });

            $.ajax({
                url: '{{ route("frontend.organizations.filter") }}',
                method: 'GET',
                data: formData,
                beforeSend: function() {
                    $('#organizationsGrid').html('<div class="col-12 text-center py-5"><i class="fas fa-spinner fa-spin fa-3x"></i></div>');
                },
                success: function(response) {
                    $('#organizationsGrid').html(response.organizationsHtml);
                    $('#paginationContainer').html(response.paginationHtml);
                    $('#showing-count').text(response.showingCount);
                    $('#total-count').text(response.totalCount);

                    // Reinitialize pagination click handlers
                    initializePagination();
                },
                error: function(xhr) {
                    console.error('Error filtering organizations:', xhr);
                    $('#organizationsGrid').html('<div class="col-12 text-center py-5"><div class="alert alert-danger">Error loading organizations. Please try again.</div></div>');
                }
            });
        }

        // Pagination Click Handler
        function initializePagination() {
            $('#paginationContainer .pagination a').on('click', function(e) {
                e.preventDefault();
                const url = $(this).attr('href');
                if (url) {
                    const page = new URL(url).searchParams.get('page') || 1;
                    filterOrganizations(page);
                    $('html, body').animate({scrollTop: 0}, 500);
                }
            });
        }

        // Initialize pagination on page load
        initializePagination();

        // Search Autocomplete
        $('#organization-search-input').on('keyup', function() {
            const query = $(this).val();

            if (query.length < 2) {
                $('.organization-autocomplete-list').hide().empty();

                // If search is cleared completely, reload all organizations
                if (query.length === 0) {
                    reloadAllOrganizations();
                }
                return;
            }

            clearTimeout(filterTimeout);
            filterTimeout = setTimeout(function() {
                $.ajax({
                    url: '{{ route("api.organizations.search") }}',
                    method: 'GET',
                    data: { query: query },
                    success: function(response) {
                        displayAutocomplete(response);
                    },
                    error: function(xhr) {
                        console.error('Search error:', xhr);
                    }
                });
            }, 300);
        });

        // Display Autocomplete Results
        function displayAutocomplete(organizations) {
            const input = $('#organization-search-input');
            let listHtml = '<ul class="organization-autocomplete-list">';

            if (organizations.length === 0) {
                listHtml += '<li class="text-muted">No organizations found</li>';
            } else {
                organizations.forEach(function(org) {
                    listHtml += `
                        <li data-id="${org.id}" data-name="${org.name}">
                            <div class="organization-name">${org.name}</div>
                            <div class="organization-location">${org.location}</div>
                        </li>
                    `;
                });
            }

            listHtml += '</ul>';

            // Remove existing list
            $('.organization-autocomplete-list').remove();

            // Add new list
            input.closest('.custom-search-box').append(listHtml);
            $('.organization-autocomplete-list').show();

            // Click handler for autocomplete items
            $('.organization-autocomplete-list li').on('click', function() {
                const orgName = $(this).data('name');
                const orgId = $(this).data('id');

                if (orgId && orgName) {
                    // Set the search input value
                    $('#organization-search-input').val(orgName);
                    $('.organization-autocomplete-list').hide();

                    // Trigger search to display results
                    filterOrganizations(1);
                }
            });
        }

        // Hide autocomplete when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.custom-search-box').length) {
                $('.organization-autocomplete-list').hide();
            }
        });

        // Search Form Submit
        $('#organization-search-form').on('submit', function(e) {
            e.preventDefault();
            filterOrganizations(1);
            $('.organization-autocomplete-list').hide();
        });

        // Reset Filter Button
        $('#resetFilterBtn').on('click', function() {
            // Reset all dropdowns
            $('#division').val('');
            $('#district').val('');
            $('#organization_type').val('');

            // Show all district options
            $('#district option').show();

            // Show both category sections
            $('#business-categories-section').show();
            $('#religious-categories-section').show();

            // Uncheck all business checkboxes
            $('.business-checkbox').prop('checked', false);

            // Clear search input
            $('#organization-search-input').val('');

            // Hide autocomplete
            $('.organization-autocomplete-list').hide();

            // Reload all organizations
            reloadAllOrganizations();
        });

        // Organization Type Change Handler
        $('#organization_type').on('change', function() {
            const orgType = $(this).val();

            if (orgType === 'business') {
                $('#business-categories-section').show();
                $('#religious-categories-section').hide();
                // Uncheck religious category checkboxes
                $('#religious-categories-section .business-checkbox').prop('checked', false);
            } else if (orgType === 'religious') {
                $('#business-categories-section').hide();
                $('#religious-categories-section').show();
                // Uncheck business category checkboxes
                $('#business-categories-section .business-checkbox').prop('checked', false);
            } else if (orgType === 'both') {
                $('#business-categories-section').show();
                $('#religious-categories-section').show();
            } else {
                // Show all when "All Types" is selected
                $('#business-categories-section').show();
                $('#religious-categories-section').show();
            }

            // Trigger filter
            filterOrganizations(1);
        });

        // Reload All Organizations (no filters)
        function reloadAllOrganizations() {
            $.ajax({
                url: '{{ route("frontend.organizations") }}',
                method: 'GET',
                beforeSend: function() {
                    $('#organizationsGrid').html('<div class="col-12 text-center py-5"><i class="fas fa-spinner fa-spin fa-3x"></i></div>');
                },
                success: function(response) {
                    // Parse the returned HTML to extract organizations grid and pagination
                    const $html = $(response);
                    const gridHtml = $html.find('#organizationsGrid').html();
                    const paginationHtml = $html.find('#paginationContainer').html();
                    const showingCount = $html.find('#showing-count').text();
                    const totalCount = $html.find('#total-count').text();

                    $('#organizationsGrid').html(gridHtml);
                    $('#paginationContainer').html(paginationHtml);
                    $('#showing-count').text(showingCount);
                    $('#total-count').text(totalCount);

                    // Reinitialize pagination
                    initializePagination();
                },
                error: function(xhr) {
                    console.error('Error reloading organizations:', xhr);
                    filterOrganizations(1);
                }
            });
        }

        console.log('Organizations page loaded');
    });
</script>
@endsection
