<?php $__env->startSection('title', 'All Temples - Bengali Hindu Unity'); ?>
<?php $__env->startSection('stylesheet'); ?>
<style>
/* Temple Image Styles */
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

    .temple-autocomplete-list {
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

    .temple-autocomplete-list li {
        padding: 12px 15px;
        cursor: pointer;
        border-bottom: 1px solid #f0f0f0;
        transition: background-color 0.2s;
    }

    .temple-autocomplete-list li:last-child {
        border-bottom: none;
    }

    .temple-autocomplete-list li:hover,
    .temple-autocomplete-list li.active {
        background-color: #f8f9fa;
    }

    .temple-autocomplete-list .temple-name {
        font-weight: 500;
        color: #333;
        margin-bottom: 4px;
    }

    .temple-autocomplete-list .temple-location {
        font-size: 0.85em;
        color: #666;
    }

    .temple-autocomplete-list .no-results {
        color: #999;
        text-align: center;
        padding: 20px;
        cursor: default;
    }

    .temple-autocomplete-list .no-results:hover {
        background-color: white;
    }

    #temple-search-input:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
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
    #filterDrawer .offcanvas-header {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        color: #fff;
    }
    #filterDrawer .offcanvas-header .btn-close {
        filter: brightness(0) invert(1);
    }
    #filterDrawer .offcanvas-header .offcanvas-title {
        color: #fff;
    }
    #filterDrawer .offcanvas-body {
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
    #filterDrawer {
        max-width: 85vw;
    }
    @media (max-width: 1023px) {
        #filterDrawer .offcanvas-body {
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }
        #filterDrawer .offcanvas-body .mb-3:last-child {
            margin-bottom: 1rem !important;
        }
    }
    @media (max-width: 425px) {
        #filterDrawer {
            max-width: 82vw;
        }
        #filterDrawer .offcanvas-header {
            padding: .625rem .75rem;
        }
        #filterDrawer .offcanvas-header .offcanvas-title {
            font-size: .95rem;
        }
        #filterDrawer .offcanvas-body {
            padding: .75rem .75rem 5rem;
            font-size: .9rem;
        }
        #filterDrawer .offcanvas-body .form-label {
            font-size: .85rem;
            margin-bottom: .25rem;
        }
        #filterDrawer .offcanvas-body .form-select,
        #filterDrawer .offcanvas-body .form-check-label {
            font-size: .85rem;
        }
        #filterDrawer .offcanvas-body .mb-3 {
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subheader'); ?>
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">All Temples</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-normal">
            <li class="breadcrumb-item"><a class="btn-link" href="<?php echo e(url('/')); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Temples</li>
        </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="section">
    <div class="container-fluid">
    <div class="row">
        
        <div class="col-12 d-lg-none mb-3">
            <button class="btn btn-mobile-filter w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterDrawer" aria-controls="filterDrawer">
                <i class="fal fa-filter me-2"></i>Filters
                <span class="badge bg-white text-dark ms-2 filter-count-badge" id="activeFilterCount" style="display:none;">0</span>
            </button>
        </div>

        
        <div class="col-lg-3 d-none d-lg-block">
            <div class="sidebar">
                <div class="sidebar-widget widget-temple-filter" id="desktopFilterContainer">
                    <h5>Filter Temples</h5>
                    
                </div>
            </div>
        </div>

        
        <div class="offcanvas offcanvas-start" tabindex="-1" id="filterDrawer" aria-labelledby="filterDrawerLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="filterDrawerLabel"><i class="fal fa-filter me-2"></i>Filter Temples</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" id="mobileFilterContainer">
                
            </div>
            <div class="filter-drawer-footer">
                <button type="button" id="applyFilterBtn" class="sigma_btn-custom w-100">
                    <i class="fal fa-check me-1"></i> Show Results
                </button>
            </div>
        </div>

        
        <template id="filterFormTemplate">
            <form id="templeFilterForm">
                <div class="mb-3">
                    <button type="button" id="resetFilterBtn" class="sigma_btn-custom w-100">Reset Filter</button>
                </div>
                <div class="mb-3">
                    <label class="form-label">Division</label>
                    <select name="division_id" id="division" class="form-select">
                        <option value="">Select Division</option>
                        <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($division->id); ?>"><?php echo e($division->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">District</label>
                    <select name="district_id" id="district" class="form-select">
                        <option value="">Select District</option>
                        <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($district->id); ?>" data-division="<?php echo e($district->division_id); ?>"><?php echo e($district->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Upazila</label>
                    <select name="upazila_id" id="upazila" class="form-select">
                        <option value="">Select Upazila</option>
                        <?php $__currentLoopData = $upazilas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upazila): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($upazila->id); ?>" data-district="<?php echo e($upazila->district_id); ?>"><?php echo e($upazila->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="residential_facility" id="residential_yes" value="1">
                        <label class="form-check-label" for="residential_yes">Residential Facility</label>
                    </div>
                </div>
                <?php $__currentLoopData = $activityCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-3">
                    <label class="form-label"><?php echo e($category->name); ?> <?php if($category->name_bn): ?>(<?php echo e($category->name_bn); ?>)<?php endif; ?></label>
                    <?php $__currentLoopData = $category->activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check">
                        <input class="form-check-input activity-checkbox" type="checkbox" name="activities[]" id="activity_<?php echo e($activity->id); ?>" value="<?php echo e($activity->id); ?>">
                        <label class="form-check-label" for="activity_<?php echo e($activity->id); ?>">
                            <?php echo e($activity->title); ?> <?php if($activity->title_bn): ?>(<?php echo e($activity->title_bn); ?>)<?php endif; ?>
                        </label>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
        </template>

        <!-- Main Content -->
        <div class="col-lg-9">
            <!-- SEARCH BOX START -->
            <div class="custom-search-container mb-4 offset-lg-3">
                <div class="custom-search-box position-relative">
                <form action="/search" method="GET" id="temple-search-form">
                    <input type="text" name="query" id="temple-search-input" class="form-control" placeholder="Search temples, locations..." aria-label="Search temples" autocomplete="off">
                    <button type="submit" class="btn btn-search" aria-label="Search">
                    <i class="fal fa-search search-icon"></i>
                    </button>
                </form>
                </div>
            </div>
            <!-- SEARCH BOX END -->

            <!-- Temples Grid -->
            <div class="row" id="temples-grid">
                <?php echo $__env->make('frontend.partials.temples-grid', ['temples' => $temples], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
            <!-- Pagination Start -->
            <div id="temples-pagination">
                <?php echo $__env->make('frontend.partials.temples-pagination', ['temples' => $temples], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
            <!-- Pagination End -->
        </div>

    </div>
    </div>
</div>
<div class="map-content">
    <div class="widget-temple-filter mt-4">
        <h5 class="widget-title p-10">Filter from Map</h5>
        <div id="map" style="width:100%;height:800px;margin-top:0.5rem;"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_scripts'); ?>
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
<script>
(function() {
    'use strict';

    // ── State ────────────────────────────────────────────────────────────
    const temples = <?php echo json_encode($templesData, 15, 512) ?>;

    let map = null;
    let markerCluster = null;
    let markers = [];
    let mapsApiLoaded = false;

    // Single AbortController – ensures only the latest fetch is alive
    let filterController = null;
    let searchController = null;

    // Debounce timer for batching rapid filter changes
    let filterTimer = null;
    const FILTER_DEBOUNCE = 300; // ms

    // ── Expose globals needed by Google Maps callback ────────────────────
    window.mapsApiLoaded = false;

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
            var currentForm = document.getElementById('templeFilterForm');
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
        const form              = document.getElementById('templeFilterForm');
        const divisionSelect    = document.getElementById('division');
        const districtSelect    = document.getElementById('district');
        const upazilaSelect     = document.getElementById('upazila');
        const templesGrid       = document.getElementById('temples-grid');
        const templesPagination = document.getElementById('temples-pagination');

        // ── Core AJAX filter (with AbortController) ──────────────────────
        function filterTemplesAjax(extraParams) {
            // Cancel any in-flight filter request
            if (filterController) filterController.abort();
            filterController = new AbortController();

            const formData = new FormData(form);

            // Include search query if present
            var searchQuery = document.getElementById('temple-search-input').value.trim();
            if (searchQuery) formData.append('query', searchQuery);

            // Merge any extra params (e.g. page)
            if (extraParams) {
                Object.keys(extraParams).forEach(function(k) {
                    formData.append(k, extraParams[k]);
                });
            }

            var params = new URLSearchParams(formData).toString();

            fetch('<?php echo e(route("frontend.temples.filter")); ?>?' + params, {
                signal: filterController.signal
            })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                filterController = null;
                templesGrid.innerHTML       = data.templesHtml;
                templesPagination.innerHTML  = data.paginationHtml;
            })
            .catch(function(err) {
                if (err.name !== 'AbortError') console.error('Filter error:', err);
            });
        }

        // ── Debounced wrapper – coalesces rapid filter changes ───────────
        function scheduleFilter() {
            clearTimeout(filterTimer);
            filterTimer = setTimeout(function() {
                filterTemplesAjax();
                updateMapMarkers();
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
            upazilaSelect.value  = '';
            Array.from(upazilaSelect.options).forEach(function(opt) {
                if (opt.value !== '') opt.style.display = 'none';
            });

            scheduleFilter();
        });

        districtSelect.addEventListener('change', function() {
            var districtId = this.value;

            Array.from(upazilaSelect.options).forEach(function(opt) {
                if (opt.value === '') { opt.style.display = ''; return; }
                opt.style.display = (!districtId || opt.getAttribute('data-district') == districtId) ? '' : 'none';
            });
            upazilaSelect.value = '';

            scheduleFilter();
        });

        upazilaSelect.addEventListener('change', function() {
            scheduleFilter();
        });

        // Checkbox listeners
        var allCheckboxes = form.querySelectorAll('input[type="checkbox"]');
        allCheckboxes.forEach(function(cb) {
            cb.addEventListener('change', function() { scheduleFilter(); });
        });

        // ── Map helpers (reuse single map instance) ──────────────────────
        function clearMapMarkers() {
            if (markerCluster) {
                markerCluster.clearMarkers();
                markerCluster = null;
            }
            markers.forEach(function(m) { m.setMap(null); });
            markers = [];
        }

        function getFilteredTemples() {
            var divisionId  = divisionSelect.value;
            var districtId  = districtSelect.value;
            var upazilaId   = upazilaSelect.value;
            var residential = document.getElementById('residential_yes').checked;
            var query       = document.getElementById('temple-search-input').value.trim().toLowerCase();

            var selectedActivities = Array.from(document.querySelectorAll('.activity-checkbox:checked'))
                .map(function(cb) { return parseInt(cb.value); });

            return temples.filter(function(t) {
                var searchMatch = !query || t.name.toLowerCase().indexOf(query) !== -1;
                var locMatch    = (!divisionId || t.division_id == divisionId) &&
                                  (!districtId || t.district_id == districtId) &&
                                  (!upazilaId  || t.upazila_id  == upazilaId);
                var resMatch    = !residential || t.residential_facility;
                var actMatch    = selectedActivities.length === 0 ||
                    selectedActivities.some(function(id) { return t.activities && t.activities.indexOf(id) !== -1; });
                return searchMatch && locMatch && resMatch && actMatch;
            });
        }

        function updateMapMarkers() {
            if (!mapsApiLoaded || typeof google === 'undefined') return;

            var filtered = getFilteredTemples();

            // Create map once
            if (!map) {
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 7,
                    center: { lat: 23.6850, lng: 90.3563 }
                });
            }

            clearMapMarkers();

            if (!filtered.length) return;

            var bounds = new google.maps.LatLngBounds();

            filtered.forEach(function(t) {
                if (!t.lat || !t.lng) return;
                var pos = { lat: t.lat, lng: t.lng };
                bounds.extend(pos);

                var marker = new google.maps.Marker({ position: pos, map: map, title: t.name });
                var infoWin = new google.maps.InfoWindow({
                    content: '<div class="map-info-window"><strong>' + t.name + '</strong><br>' + (t.address || '') + '</div>'
                });
                marker.addListener('click', function() { infoWin.open(map, marker); });
                markers.push(marker);
            });

            if (typeof markerClusterer !== 'undefined') {
                markerCluster = new markerClusterer.MarkerClusterer({ map: map, markers: markers });
            }

            if (markers.length > 0) map.fitBounds(bounds);
        }

        // Expose for Google Maps callback
        window._updateMapMarkers = updateMapMarkers;

        // ── jQuery section (autocomplete, reset, pagination) ─────────────
        (function($) {

            // Reset filter (delegated – safe for moved DOM)
            $(document).on('click', '#resetFilterBtn', function() {
                $('#division').val('');
                $('#district').val('');
                $('#upazila').val('');
                $('#district option, #upazila option').show();
                $('#residential_yes').prop('checked', false);
                $('.activity-checkbox').prop('checked', false);
                $('#temple-search-input').val('');
                updateFilterCount();
                closeFilterDrawer();

                // Cancel pending debounce, fire immediately
                clearTimeout(filterTimer);
                filterTemplesAjax();
                updateMapMarkers();
            });

            // Mobile "Show Results"
            $(document).on('click', '#applyFilterBtn', function() {
                closeFilterDrawer();
                setTimeout(function() {
                    document.getElementById('temples-grid').scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 350);
            });

            // Helper: close offcanvas
            function closeFilterDrawer() {
                var el = document.getElementById('filterDrawer');
                var inst = bootstrap.Offcanvas.getInstance(el);
                if (inst) inst.hide();
            }

            // Badge count
            function updateFilterCount() {
                var count = 0;
                if ($('#division').val()) count++;
                if ($('#district').val()) count++;
                if ($('#upazila').val()) count++;
                if ($('#residential_yes').is(':checked')) count++;
                count += $('.activity-checkbox:checked').length;
                var $badge = $('#activeFilterCount');
                if (count > 0) { $badge.text(count).show(); } else { $badge.hide(); }
            }

            $(document).on('change', '#templeFilterForm select, #templeFilterForm input', function() {
                updateFilterCount();
            });

            // ── Autocomplete search ──────────────────────────────────────
            var searchTimer;
            var $searchInput  = $('#temple-search-input');
            var $searchForm   = $('#temple-search-form');
            var $autocomplete = $('<ul class="temple-autocomplete-list"></ul>');
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
                        filterTemplesAjax();
                        updateMapMarkers();
                    }
                    return;
                }
                searchTimer = setTimeout(function() {
                    // Abort previous search request
                    if (searchController) searchController.abort();
                    searchController = new AbortController();

                    fetch('<?php echo e(route("api.temples.search")); ?>?query=' + encodeURIComponent(query), {
                        signal: searchController.signal
                    })
                    .then(function(r) { return r.json(); })
                    .then(function(data) {
                        searchController = null;
                        $autocomplete.empty();
                        if (data.length === 0) {
                            $autocomplete.html('<li class="no-results">No temples found</li>').show();
                            return;
                        }
                        data.forEach(function(temple) {
                            var $item = $('<li class="autocomplete-item"></li>');
                            $item.html(
                                '<div class="temple-name">' + $('<span>').text(temple.label).html() + '</div>' +
                                '<div class="temple-location">' + $('<span>').text(temple.location).html() + '</div>'
                            );
                            $item.data('temple', temple);
                            $autocomplete.append($item);
                        });
                        $autocomplete.show();
                    })
                    .catch(function(err) {
                        if (err.name !== 'AbortError') console.error('Search error:', err);
                    });
                }, 300);
            });

            function performSearch(query) {
                clearTimeout(filterTimer);
                var formData = new FormData(form);
                formData.append('query', query);

                if (filterController) filterController.abort();
                filterController = new AbortController();

                var params = new URLSearchParams(formData).toString();
                fetch('<?php echo e(route("frontend.temples.filter")); ?>?' + params, {
                    signal: filterController.signal
                })
                .then(function(r) { return r.json(); })
                .then(function(data) {
                    filterController = null;
                    templesGrid.innerHTML       = data.templesHtml;
                    templesPagination.innerHTML  = data.paginationHtml;
                    updateMapMarkers();
                })
                .catch(function(err) {
                    if (err.name !== 'AbortError') console.error('Search error:', err);
                });
            }

            $autocomplete.on('click', '.autocomplete-item', function() {
                var temple = $(this).data('temple');
                $searchInput.val(temple.value);
                $autocomplete.hide();
                performSearch(temple.value);
            });

            $searchForm.on('submit', function(e) {
                e.preventDefault();
                var query = $searchInput.val().trim();
                if (query.length > 0) { performSearch(query); } else {
                    clearTimeout(filterTimer);
                    filterTemplesAjax();
                    updateMapMarkers();
                }
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
            $(document).on('click', '#temples-pagination .page-link', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                if (!url || url === '#') return;

                var urlParams = new URLSearchParams(url.split('?')[1]);
                var page = urlParams.get('page');

                filterTemplesAjax(page ? { page: page } : {});

                setTimeout(function() {
                    templesGrid.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 100);
            });

        })(jQuery);

        // If Google Maps was already loaded, initialise now
        if (mapsApiLoaded) updateMapMarkers();
    });

    // ── Google Maps callback ─────────────────────────────────────────────
    window.initGoogleMaps = function() {
        mapsApiLoaded = true;
        window.mapsApiLoaded = true;
        if (typeof window._updateMapMarkers === 'function') window._updateMapMarkers();
    };

    window.handleMapsError = function() {
        console.error('Failed to load Google Maps API.');
        document.getElementById('map').innerHTML =
            '<div style="padding:20px;text-align:center;color:#666;">' +
            '<p><strong>Map could not be loaded</strong></p>' +
            '<p>Please enable billing for Google Maps API in Google Cloud Console</p></div>';
    };

})();
</script>

<!-- Load Google Maps API with async and callback -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTRqyVq5k6iX60e382PGnio2_vWLd2yCg&callback=initGoogleMaps&loading=async"
    onerror="handleMapsError()">
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/pages/temples/temples.blade.php ENDPATH**/ ?>