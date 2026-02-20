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
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subheader'); ?>
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">All Temples</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
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
        <div class="col-lg-3">
            <div class="sidebar">
                <!-- New Temple Filter Controls -->
                <div class="sidebar-widget widget-temple-filter">
                <h5>Filter Temples</h5>
                <form id="templeFilterForm">
                    <!-- Reset Filter Button -->
                    <div class="mb-3">
                        <button type="button" id="resetFilterBtn" class="sigma_btn-custom w-100">Reset Filter</button>
                    </div>

                    <!-- Division -->
                    <div class="mb-3">
                    <label class="form-label">Division</label>
                    <select name="division_id" id="division" class="form-select">
                        <option value="">Select Division</option>
                        <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($division->id); ?>">
                                <?php echo e($division->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <!-- District -->
                    <div class="mb-3">
                    <label class="form-label">District</label>
                    <select name="district_id" id="district" class="form-select">
                        <option value="">Select District</option>
                        <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($district->id); ?>" data-division="<?php echo e($district->division_id); ?>">
                                <?php echo e($district->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <!-- Upazila -->
                    <div class="mb-3">
                    <label class="form-label">Upazila</label>
                    <select name="upazila_id" id="upazila" class="form-select">
                        <option value="">Select Upazila</option>
                        <?php $__currentLoopData = $upazilas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upazila): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($upazila->id); ?>" data-district="<?php echo e($upazila->district_id); ?>">
                                <?php echo e($upazila->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                    <!-- Residential Facility -->
                    <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="residential_facility" id="residential_yes" value="1">
                        <label class="form-check-label" for="residential_yes">Residential Facility</label>
                    </div>
                    </div>

                    <!-- Dynamic Activity Categories -->
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
                </div>
            </div>
        </div>
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
    // Map data limited to 1000 temples for optimal performance with 30k+ records
    const temples = <?php echo json_encode($templesData, 15, 512) ?>;

    console.log('Loaded ' + temples.length + ' temples for map visualization');

    // Initialize Google Maps API callback
    let map, markerCluster, markers = [];
    let mapsApiLoaded = false;

    // Handle cascading dropdowns and AJAX filtering
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('templeFilterForm');
        const divisionSelect = document.getElementById('division');
        const districtSelect = document.getElementById('district');
        const upazilaSelect = document.getElementById('upazila');
        const templesGrid = document.getElementById('temples-grid');
        const templesPagination = document.getElementById('temples-pagination');

        // AJAX filter function
        function filterTemplesAjax() {
            const formData = new FormData(form);

            // Include search query if present
            const searchQuery = document.getElementById('temple-search-input').value.trim();
            if (searchQuery) {
                formData.append('query', searchQuery);
            }

            const params = new URLSearchParams(formData).toString();

            fetch('<?php echo e(route('frontend.temples.filter')); ?>?' + params)
                .then(response => response.json())
                .then(data => {
                    templesGrid.innerHTML = data.templesHtml;
                    templesPagination.innerHTML = data.paginationHtml;
                    console.log('Filtered ' + data.totalCount + ' temples');
                })
                .catch(error => console.error('Error:', error));
        }

        // Add change listeners to all checkboxes
        const allCheckboxes = form.querySelectorAll('input[type="checkbox"]');
        allCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                filterTemplesAjax();
                // Use jQuery function if available, otherwise use vanilla JS
                if (typeof filterAndUpdateMap === 'function') {
                    filterAndUpdateMap();
                } else {
                    initMap(filterTemplesForMap());
                }
            });
        });

        // Handle division change
        divisionSelect.addEventListener('change', function () {
            const divisionId = this.value;

            // Show/hide districts based on selected division
            Array.from(districtSelect.options).forEach(option => {
                if (option.value === '') {
                    option.style.display = '';
                } else {
                    const divId = option.getAttribute('data-division');
                    option.style.display = (!divisionId || divId == divisionId) ? '' : 'none';
                }
            });

            // Reset district and upazila when division changes
            districtSelect.value = '';
            upazilaSelect.value = '';

            // Hide all upazilas
            Array.from(upazilaSelect.options).forEach(option => {
                if (option.value !== '') {
                    option.style.display = 'none';
                }
            });

            // Filter temples and update map
            filterTemplesAjax();
            if (typeof filterAndUpdateMap === 'function') {
                filterAndUpdateMap();
            } else {
                initMap(filterTemplesForMap());
            }
        });

        // Handle district change
        districtSelect.addEventListener('change', function () {
            const districtId = this.value;

            // Show/hide upazilas based on selected district
            Array.from(upazilaSelect.options).forEach(option => {
                if (option.value === '') {
                    option.style.display = '';
                } else {
                    const distId = option.getAttribute('data-district');
                    option.style.display = (!districtId || distId == districtId) ? '' : 'none';
                }
            });

            // Reset upazila when district changes
            upazilaSelect.value = '';

            // Filter temples and update map
            filterTemplesAjax();
            if (typeof filterAndUpdateMap === 'function') {
                filterAndUpdateMap();
            } else {
                initMap(filterTemplesForMap());
            }
        });

        // Handle upazila change
        upazilaSelect.addEventListener('change', function () {
            // Filter temples and update map
            filterTemplesAjax();
            if (typeof filterAndUpdateMap === 'function') {
                filterAndUpdateMap();
            } else {
                initMap(filterTemplesForMap());
            }
        });

        // Initialize map with current filters
        if (mapsApiLoaded) {
            initMap(filterTemplesForMap());
        }
    });

    // Filter temples for map based on current form values
    function filterTemplesForMap() {
        const divisionId = document.getElementById('division').value;
        const districtId = document.getElementById('district').value;
        const upazilaId = document.getElementById('upazila').value;
        const residentialFacility = document.getElementById('residential_yes').checked;

        // Get selected activity IDs
        const selectedActivities = Array.from(document.querySelectorAll('.activity-checkbox:checked'))
            .map(cb => parseInt(cb.value));

        return temples.filter(t => {
            // Location filters
            const locationMatch = (!divisionId || t.division_id == divisionId) &&
                (!districtId || t.district_id == districtId) &&
                (!upazilaId || t.upazila_id == upazilaId);

            // Residential facility filter
            const residentialMatch = !residentialFacility || t.residential_facility;

            // Activity filter - check if temple has any of the selected activities
            const activityMatch = selectedActivities.length === 0 ||
                selectedActivities.some(actId => t.activities && t.activities.includes(actId));

            return locationMatch && residentialMatch && activityMatch;
        });
    }

    // Google Maps initialization function
    function initMap(filteredTemples) {
        // Check if Google Maps is available
        if (typeof google === 'undefined' || !google.maps) {
            console.error('Google Maps API not loaded yet');
            return;
        }

        // If there are no temples, center on Bangladesh
        if (!filteredTemples || !filteredTemples.length) {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {
                    lat: 23.6850,
                    lng: 90.3563
                }
            });
            return;
        }

        // Compute bounds to fit all markers
        const bounds = new google.maps.LatLngBounds();
        filteredTemples.forEach(t => {
            if (t.lat && t.lng) {
                bounds.extend({
                    lat: t.lat,
                    lng: t.lng
                });
            }
        });

        // Initialize map centered on the bounds' center
        map = new google.maps.Map(document.getElementById('map'), {
            center: bounds.getCenter(),
            zoom: 7
        });

        // Remove previous markers
        if (markerCluster) {
            markerCluster.clearMarkers();
        }
        markers = [];

        // Create markers
        filteredTemples.forEach(t => {
            if (!t.lat || !t.lng) return;

            let marker = new google.maps.Marker({
                position: {
                    lat: t.lat,
                    lng: t.lng
                },
                map: map,
                title: t.name
            });

            const infoWindow = new google.maps.InfoWindow({
                content: `<div class="map-info-window">
                    <strong>${t.name}</strong><br>
                    ${t.address || ''}
                </div>`
            });

            marker.addListener('click', function () {
                infoWindow.open(map, marker);
            });

            markers.push(marker);
        });

        // Add marker clustering
        if (typeof markerClusterer !== 'undefined') {
            markerCluster = new markerClusterer.MarkerClusterer({
                map,
                markers
            });
        }

        // Fit map to show all markers
        if (markers.length > 0) {
            map.fitBounds(bounds);
        }
    }

</script>
<script>
    // Callback function for Google Maps API
    function initGoogleMaps() {
        mapsApiLoaded = true;
        console.log('Google Maps API loaded successfully');

        // Initialize map with filtered temples
        const filteredTemples = filterTemplesForMap();
        initMap(filteredTemples);
    }

    // Handle Google Maps API loading error
    function handleMapsError() {
        console.error('Failed to load Google Maps API. Please check your API key and billing settings.');
        document.getElementById('map').innerHTML = '<div style="padding: 20px; text-align: center; color: #666;">' +
            '<p><strong>Map could not be loaded</strong></p>' +
            '<p>Please enable billing for Google Maps API in Google Cloud Console</p>' +
            '</div>';
    }

    // jQuery Autocomplete for Temple Search
    $(document).ready(function() {
        // Reset Filter Button
        $('#resetFilterBtn').on('click', function() {
            // Reset all dropdowns
            $('#division').val('');
            $('#district').val('');
            $('#upazila').val('');

            // Show all district and upazila options
            $('#district option').show();
            $('#upazila option').show();

            // Uncheck residential facility
            $('#residential_yes').prop('checked', false);

            // Uncheck all activity checkboxes
            $('.activity-checkbox').prop('checked', false);

            // Clear search input
            $('#temple-search-input').val('');

            // Reload all temples
            reloadAllTemples();
        });

        let searchTimer;
        let $searchInput = $('#temple-search-input');
        let $searchForm = $('#temple-search-form');

        // Create autocomplete dropdown
        let $autocompleteList = $('<ul class="temple-autocomplete-list"></ul>');
        $searchInput.after($autocompleteList);

        // Hide autocomplete on click outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.custom-search-box').length) {
                $autocompleteList.hide();
            }
        });

        // Search on input
        $searchInput.on('input', function() {
            let query = $(this).val().trim();

            clearTimeout(searchTimer);

            if (query.length < 2) {
                $autocompleteList.hide();

                // If search is cleared completely, reload all temples
                if (query.length === 0) {
                    reloadAllTemples();
                }
                return;
            }

            searchTimer = setTimeout(function() {
                $.ajax({
                    url: '<?php echo e(route('api.temples.search')); ?>',
                    method: 'GET',
                    data: { query: query },
                    success: function(data) {
                        $autocompleteList.empty();

                        if (data.length === 0) {
                            $autocompleteList.html('<li class="no-results">No temples found</li>').show();
                            return;
                        }

                        data.forEach(function(temple) {
                            let $item = $('<li class="autocomplete-item"></li>');
                            $item.html(
                                '<div class="temple-name">' + temple.label + '</div>' +
                                '<div class="temple-location">' + temple.location + '</div>'
                            );
                            $item.data('temple', temple);
                            $autocompleteList.append($item);
                        });

                        $autocompleteList.show();
                    },
                    error: function() {
                        console.error('Error fetching search results');
                    }
                });
            }, 300); // Debounce 300ms
        });

        // Function to perform search and display results
        function performSearch(query) {
            console.log('Performing search for:', query);

            // Add query to form data
            const formData = new FormData(document.getElementById('templeFilterForm'));
            formData.append('query', query);
            const params = new URLSearchParams(formData).toString();

            console.log('Search params:', params);

            fetch('<?php echo e(route('frontend.temples.filter')); ?>?' + params)
                .then(response => response.json())
                .then(data => {
                    console.log('Search API response:', data);
                    document.getElementById('temples-grid').innerHTML = data.templesHtml;
                    document.getElementById('temples-pagination').innerHTML = data.paginationHtml;
                    console.log('Search results: ' + data.totalCount + ' temples found');

                    // Update map with filtered results
                    filterAndUpdateMap();
                })
                .catch(error => console.error('Error:', error));
        }

        // Function to filter and update map based on current filters including search
        function filterAndUpdateMap() {
            const query = $searchInput.val().trim();
            const divisionId = document.getElementById('division').value;
            const districtId = document.getElementById('district').value;
            const upazilaId = document.getElementById('upazila').value;
            const residentialFacility = document.getElementById('residential_yes').checked;
            const selectedActivities = Array.from(document.querySelectorAll('.activity-checkbox:checked'))
                .map(cb => parseInt(cb.value));

            let filteredTemples = temples.filter(t => {
                // Search filter
                let searchMatch = true;
                if (query.length > 0) {
                    searchMatch = t.name.toLowerCase().includes(query.toLowerCase());
                }

                // Location filters
                const locationMatch = (!divisionId || t.division_id == divisionId) &&
                       (!districtId || t.district_id == districtId) &&
                       (!upazilaId || t.upazila_id == upazilaId);

                // Residential facility filter
                const residentialMatch = !residentialFacility || t.residential_facility;

                // Activity filter
                const activityMatch = selectedActivities.length === 0 ||
                    selectedActivities.some(actId => t.activities && t.activities.includes(actId));

                return searchMatch && locationMatch && residentialMatch && activityMatch;
            });

            initMap(filteredTemples);
        }

        // Handle item click
        $autocompleteList.on('click', '.autocomplete-item', function() {
            let temple = $(this).data('temple');
            $searchInput.val(temple.value);
            $autocompleteList.hide();

            // Trigger search to display results
            performSearch(temple.value);
        });

        // Handle form submit
        $searchForm.on('submit', function(e) {
            e.preventDefault();
            let query = $searchInput.val().trim();
            if (query.length > 0) {
                performSearch(query);
            } else {
                reloadAllTemples();
            }
        });

        // Function to reload all temples without search filter
        function reloadAllTemples() {
            console.log('Reloading all temples...');

            // Get current filters without search query
            const formData = new FormData(document.getElementById('templeFilterForm'));
            const params = new URLSearchParams(formData).toString();

            fetch('<?php echo e(route('frontend.temples.filter')); ?>?' + params)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('temples-grid').innerHTML = data.templesHtml;
                    document.getElementById('temples-pagination').innerHTML = data.paginationHtml;
                    console.log('Reloaded ' + data.totalCount + ' temples');

                    // Update map with all filtered results (excluding search)
                    filterAndUpdateMap();
                })
                .catch(error => console.error('Error:', error));
        }

        // Handle keyboard navigation
        $searchInput.on('keydown', function(e) {
            let $items = $autocompleteList.find('.autocomplete-item');
            let $active = $items.filter('.active');

            if (e.key === 'ArrowDown') {
                e.preventDefault();
                if ($active.length === 0) {
                    $items.first().addClass('active');
                } else {
                    $active.removeClass('active').next('.autocomplete-item').addClass('active');
                }
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                if ($active.length > 0) {
                    $active.removeClass('active').prev('.autocomplete-item').addClass('active');
                }
            } else if (e.key === 'Enter') {
                if ($active.length > 0) {
                    e.preventDefault();
                    $active.click();
                }
            } else if (e.key === 'Escape') {
                $autocompleteList.hide();
            }
        });

        // Handle pagination clicks with AJAX
        $(document).on('click', '#temples-pagination .page-link', function(e) {
            e.preventDefault();

            const url = $(this).attr('href');
            if (!url || url === '#') return;

            // Extract page number from URL
            const urlParams = new URLSearchParams(url.split('?')[1]);
            const page = urlParams.get('page');

            // Get current filters and search
            const formData = new FormData(document.getElementById('templeFilterForm'));
            const searchQuery = $searchInput.val().trim();
            if (searchQuery) {
                formData.append('query', searchQuery);
            }
            if (page) {
                formData.append('page', page);
            }

            const params = new URLSearchParams(formData).toString();

            fetch('<?php echo e(route('frontend.temples.filter')); ?>?' + params)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('temples-grid').innerHTML = data.templesHtml;
                    document.getElementById('temples-pagination').innerHTML = data.paginationHtml;
                    console.log('Page ' + page + ': ' + data.totalCount + ' temples');

                    // Scroll to top of temple grid
                    document.getElementById('temples-grid').scrollIntoView({ behavior: 'smooth', block: 'start' });
                })
                .catch(error => console.error('Error:', error));
        });
    });

</script>

<!-- Load Google Maps API with async and callback -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTRqyVq5k6iX60e382PGnio2_vWLd2yCg&callback=initGoogleMaps&loading=async"
    onerror="handleMapsError()">
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/pages/temples/temples.blade.php ENDPATH**/ ?>