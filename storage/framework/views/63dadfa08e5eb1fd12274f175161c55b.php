<?php $__env->startSection('title', 'Events - Bengali Hindu Unity'); ?>

<?php $__env->startSection('stylesheet'); ?>
<style>
    .event-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 25px rgba(0,0,0,0.15);
    }

    .event-image-wrapper {
        position: relative;
        overflow: hidden;
        height: 280px;
    }

    .event-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .event-card:hover .event-image-wrapper img {
        transform: scale(1.1);
    }

    .event-date-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: #d86800;
        color: #fff;
        text-align: center;
        padding: 10px 15px;
        border-radius: 5px;
        font-weight: 600;
        box-shadow: 0 3px 10px rgba(216, 104, 0, 0.5);
        display: flex;
        flex-direction: column;
        align-items: center;
        min-width: 60px;
    }

    .event-date-badge .day {
        font-size: 28px;
        line-height: 1;
        display: inline-block;
    }

    .event-date-badge .month {
        font-size: 14px;
        display: inline-block;
        margin-top: 2px;
    }

    .event-date-badge .date-separator {
        font-size: 16px;
        display: block;
        margin: 3px 0;
        font-weight: 700;
        line-height: 1;
    }

    .event-date-badge .date-range-start,
    .event-date-badge .date-range-end {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .event-date-badge .date-range-start {
        padding-bottom: 3px;
    }

    .event-date-badge .date-range-end {
        padding-top: 3px;
    }

    .event-type-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .event-type-badge.temple {
        background: rgba(216, 104, 0, 0.95);
    }

    .event-type-badge.organization {
        background: rgba(216, 104, 0, 0.95);
    }

    .event-content {
        padding: 25px;
    }

    .event-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #d86800;
        margin-bottom: 15px;
        line-height: 1.4;
    }

    .event-title a {
        color: #d86800;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .event-title a:hover {
        color: #b85700;
    }

    .event-description {
        color: #666;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .event-meta {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }

    .event-meta-item {
        display: flex;
        align-items: center;
        color: #d86800;
    }

    .event-meta-item i {
        margin-right: 8px;
        width: 16px;
    }

    .event-source {
        font-size: 0.85rem;
        color: #999;
        margin-top: 10px;
        padding-top: 10px;
        border-top: 1px solid #f0f0f0;
    }

    .join-btn {
        background: #d86800;
        color: #fff;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(216, 104, 0, 0.3);
    }

    .join-btn:hover {
        background: #b85700;
        color: #fff;
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(216, 104, 0, 0.4);
    }

    .join-btn i {
        margin-left: 8px;
    }

    .sidebar-widget {
        background: #fff;
        border-radius: 8px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }

    .sidebar-widget h5 {
        font-weight: 600;
        margin-bottom: 20px;
    }

    .search-form {
        position: relative;
    }

    .search-form input {
        width: 100%;
        padding: 12px 50px 12px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        font-size: 14px;
    }

    .search-form button {
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        padding: 0 20px;
        background: #d86800;
        border: none;
        color: #fff;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .search-form button:hover {
        background: #b85700;
        transform: scale(1.05);
    }

    .recent-event-item {
        display: flex;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .recent-event-item:last-child {
        border-bottom: none;
    }

    .recent-event-item a {
        text-decoration: none;
        color: #333;
        display: flex;
        gap: 15px;
        width: 100%;
        transition: all 0.3s ease;
    }

    .recent-event-item a:hover {
        color: #d86800;
    }

    .recent-event-item a:hover .recent-event-title {
        color: #d86800;
    }

    .recent-event-image {
        width: 80px;
        height: 80px;
        border-radius: 5px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .recent-event-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .recent-event-item a:hover .recent-event-image img {
        transform: scale(1.1);
    }

    .recent-event-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .recent-event-title {
        font-weight: 600;
        margin-bottom: 8px;
        line-height: 1.4;
        font-size: 0.95rem;
        color: #333;
        transition: color 0.3s ease;
    }

    .recent-event-date {
        font-size: 0.85rem;
        color: #999;
        display: flex;
        align-items: center;
    }

    .recent-event-date i {
        margin-right: 5px;
        color: #d86800;
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 40px;
    }

    .pagination .page-item {
        list-style: none;
    }

    .pagination .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: none;
        background: #f5f5f5;
        color: #666;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover,
    .pagination .page-item.active .page-link {
        background: #d86800;
        color: #fff;
    }

    .show-all-btn {
        display: block;
        width: 100%;
        padding: 12px 20px;
        margin-top: 15px;
        background: #d86800;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-weight: 600;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 2px 8px rgba(216, 104, 0, 0.3);
    }

    .show-all-btn:hover {
        background: #b85700;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(216, 104, 0, 0.4);
    }

    .show-all-btn i {
        margin-left: 8px;
    }

    .recent-event-item.hidden-event {
        display: none;
    }

    .loading-spinner {
        text-align: center;
        padding: 20px;
        color: #d86800;
    }

    .search-form-wrapper {
        position: relative;
        display: flex;
        gap: 10px;
    }

    .search-form-wrapper select {
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        font-size: 14px;
        background: white;
        min-width: 150px;
    }

    .event-autocomplete-list {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 1px solid #ddd;
        border-top: none;
        border-radius: 0 0 5px 5px;
        list-style: none;
        margin: 0;
        padding: 0;
        max-height: 400px;
        overflow-y: auto;
        z-index: 1000;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        display: none;
    }

    .event-autocomplete-list li {
        padding: 12px 15px;
        cursor: pointer;
        border-bottom: 1px solid #f0f0f0;
        transition: background-color 0.2s;
    }

    .event-autocomplete-list li:last-child {
        border-bottom: none;
    }

    .event-autocomplete-list li:hover,
    .event-autocomplete-list li.active {
        background-color: #f8f9fa;
    }

    .event-autocomplete-list .event-name {
        font-weight: 500;
        color: #333;
        margin-bottom: 4px;
    }

    .event-autocomplete-list .event-info {
        font-size: 0.85em;
        color: #666;
    }

    .event-autocomplete-list .no-results {
        color: #999;
        text-align: center;
        padding: 20px;
        cursor: default;
    }

    .event-autocomplete-list .no-results:hover {
        background-color: white;
    }

    .search-input-wrapper {
        position: relative;
        flex: 1;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subheader'); ?>
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">Events</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="<?php echo e(url('/')); ?>">Home</a></li>
            <li class="breadcrumb-item active">Events</li>
        </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="section">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8" id="events-container">
                <?php echo $__env->make('frontend.pages.events.partials.events_grid', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Search Widget -->
                <div class="sidebar-widget">
                    <h5 class="underline-title">Search Events</h5>
                    <div class="search-form-wrapper">
                        <select id="event-type-filter" class="form-select">
                            <option value="">All Events</option>
                            <option value="organization" <?php echo e(request('type') == 'organization' ? 'selected' : ''); ?>>Organizations</option>
                            <option value="temple" <?php echo e(request('type') == 'temple' ? 'selected' : ''); ?>>Temples</option>
                        </select>
                    </div>
                    <div class="search-input-wrapper mt-3">
                        <form id="event-search-form" class="search-form">
                            <input type="text" name="search" id="event-search-input" placeholder="Search Events" value="<?php echo e(request('search')); ?>" autocomplete="off">
                            <button type="submit">
                                <i class="far fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Recent Events Widget -->
                <?php if($recentEvents && $recentEvents->count() > 0): ?>
                <div class="sidebar-widget">
                    <h5 class="underline-title">Recent Events</h5>
                    <?php $__currentLoopData = $recentEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentEvent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="recent-event-item">
                        <?php if(isset($recentEvent->temple_id)): ?>
                            <a href="<?php echo e(route('frontend.event.details.unified', ['type' => 'temple', 'id' => $recentEvent->id])); ?>">
                                <div class="recent-event-image">
                                    <img src="<?php echo e($recentEvent->banner_image ? asset('backend/uploads/temple_event/banner/' . $recentEvent->banner_image) : 'https://placehold.co/150x150/a9561f/ffffff?text=Temple'); ?>" alt="<?php echo e($recentEvent->event_name); ?>">
                                </div>
                                <div class="recent-event-content">
                                    <div class="recent-event-title"><?php echo e(Str::limit($recentEvent->event_name, 50)); ?></div>
                                    <div class="recent-event-date">
                                        <i class="far fa-calendar-alt"></i>
                                        <?php if($recentEvent->event_date_end && $recentEvent->event_date != $recentEvent->event_date_end): ?>
                                            <?php echo e(\Carbon\Carbon::parse($recentEvent->event_date)->format('M d')); ?> - <?php echo e(\Carbon\Carbon::parse($recentEvent->event_date_end)->format('M d, Y')); ?>

                                        <?php else: ?>
                                            <?php echo e(\Carbon\Carbon::parse($recentEvent->event_date)->format('M d, Y')); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('frontend.event.details.unified', ['type' => 'organization', 'id' => $recentEvent->id])); ?>">
                                <div class="recent-event-image">
                                    <img src="<?php echo e($recentEvent->banner_image ? asset('backend/uploads/organization_event/banner/' . $recentEvent->banner_image) : 'https://placehold.co/150x150/c94641/ffffff?text=Org'); ?>" alt="<?php echo e($recentEvent->event_name); ?>">
                                </div>
                                <div class="recent-event-content">
                                    <div class="recent-event-title"><?php echo e(Str::limit($recentEvent->event_name, 50)); ?></div>
                                    <div class="recent-event-date">
                                        <i class="far fa-calendar-alt"></i>
                                        <?php if($recentEvent->event_date_end && $recentEvent->event_date != $recentEvent->event_date_end): ?>
                                            <?php echo e(\Carbon\Carbon::parse($recentEvent->event_date)->format('M d')); ?> - <?php echo e(\Carbon\Carbon::parse($recentEvent->event_date_end)->format('M d, Y')); ?>

                                        <?php else: ?>
                                            <?php echo e(\Carbon\Carbon::parse($recentEvent->event_date)->format('M d, Y')); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div id="extra-events-container"></div>
                    <button type="button" class="show-all-btn" id="showAllEventsBtn">
                        Show All Events
                        <i class="far fa-arrow-down"></i>
                    </button>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search and Filter Functionality
        let searchTimer;
        let $searchInput = $('#event-search-input');
        let $typeFilter = $('#event-type-filter');
        let $searchForm = $('#event-search-form');

        // Create autocomplete dropdown
        let $autocompleteList = $('<ul class="event-autocomplete-list"></ul>');
        $('.search-input-wrapper').append($autocompleteList);

        // Hide autocomplete on click outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.search-input-wrapper').length) {
                $autocompleteList.hide();
            }
        });

        // Handle type filter change
        $typeFilter.on('change', function() {
            performEventSearch();
        });

        // Search on input with debounce
        $searchInput.on('input', function() {
            let query = $(this).val().trim();
            clearTimeout(searchTimer);

            if (query.length < 2) {
                $autocompleteList.hide();
                if (query.length === 0) {
                    performEventSearch();
                }
                return;
            }

            searchTimer = setTimeout(function() {
                // Show autocomplete suggestions
                showAutocompleteSuggestions(query);
            }, 300);
        });

        // Handle autocomplete item click
        $(document).on('click', '.event-autocomplete-list .autocomplete-item', function() {
            let eventData = $(this).data('event');
            $searchInput.val(eventData.event_name);
            $autocompleteList.hide();
            performEventSearch();
        });

        // Handle form submit
        $searchForm.on('submit', function(e) {
            e.preventDefault();
            $autocompleteList.hide();
            performEventSearch();
        });

        function showAutocompleteSuggestions(query) {
            let type = $typeFilter.val();

            $.ajax({
                url: '<?php echo e(route('frontend.events')); ?>',
                method: 'GET',
                data: {
                    search: query,
                    type: type,
                    autocomplete: 1
                },
                success: function(data) {
                    if (data.suggestions && data.suggestions.length > 0) {
                        $autocompleteList.empty();

                        data.suggestions.forEach(function(event) {
                            let $item = $('<li class="autocomplete-item"></li>');
                            let eventType = event.temple_id ? 'Temple Event' : 'Organization Event';
                            let organizer = event.temple_id ? (event.temple ? event.temple.name : 'Temple') : (event.organization ? event.organization.name : 'Organization');

                            $item.html(
                                '<div class="event-name">' + event.event_name + '</div>' +
                                '<div class="event-info">' + eventType + ' • ' + organizer + '</div>'
                            );
                            $item.data('event', event);
                            $autocompleteList.append($item);
                        });

                        $autocompleteList.show();
                    } else {
                        $autocompleteList.html('<li class="no-results">No events found</li>').show();
                    }
                },
                error: function() {
                    console.error('Error fetching autocomplete suggestions');
                }
            });
        }

        function performEventSearch() {
            let query = $searchInput.val().trim();
            let type = $typeFilter.val();

            let params = new URLSearchParams();
            if (query) params.append('search', query);
            if (type) params.append('type', type);
            params.append('ajax', '1');

            // Show loading state
            $('#events-container').html('<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-3x text-primary"></i><p class="mt-3">Loading events...</p></div>');

            // Fetch filtered events via AJAX
            $.ajax({
                url: '<?php echo e(route('frontend.events')); ?>?' + params.toString(),
                method: 'GET',
                success: function(data) {
                    if (data.html) {
                        $('#events-container').html(data.html);

                        // Update URL without page reload
                        let newUrl = '<?php echo e(route('frontend.events')); ?>' + (params.toString().replace('&ajax=1', '').replace('ajax=1&', '').replace('ajax=1', '') ? '?' + params.toString().replace('&ajax=1', '').replace('ajax=1&', '').replace('ajax=1', '') : '');
                        window.history.pushState({}, '', newUrl);
                    }
                },
                error: function() {
                    $('#events-container').html('<div class="alert alert-danger"><i class="far fa-exclamation-circle me-2"></i>Error loading events. Please try again.</div>');
                }
            });
        }

        // Show All Events Button
        const showAllBtn = document.getElementById('showAllEventsBtn');
        const extraEventsContainer = document.getElementById('extra-events-container');
        let allEventsLoaded = false;

        if (showAllBtn) {
            showAllBtn.addEventListener('click', function() {
                if (allEventsLoaded) {
                    return;
                }

                // Show loading state
                showAllBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
                showAllBtn.disabled = true;

                // Fetch all events via AJAX
                fetch('<?php echo e(route('frontend.events')); ?>?show_all=1', {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.events && data.events.length > 0) {
                        // Clear container
                        extraEventsContainer.innerHTML = '';

                        // Add new events
                        data.events.forEach(event => {
                            const eventHTML = createEventHTML(event);
                            extraEventsContainer.insertAdjacentHTML('beforeend', eventHTML);
                        });

                        // Update button
                        showAllBtn.innerHTML = 'All Events Loaded <i class="far fa-check"></i>';
                        allEventsLoaded = true;

                        // Optionally hide button after a delay
                        setTimeout(() => {
                            showAllBtn.style.display = 'none';
                        }, 2000);
                    } else {
                        showAllBtn.innerHTML = 'No More Events';
                        showAllBtn.disabled = true;
                    }
                })
                .catch(error => {
                    console.error('Error loading events:', error);
                    showAllBtn.innerHTML = 'Error Loading Events';
                    showAllBtn.disabled = false;
                });
            });
        }

        function createEventHTML(event) {
            const isTemple = event.hasOwnProperty('temple_id') && event.temple_id !== null;
            const imageUrl = isTemple
                ? (event.banner_image ? '<?php echo e(asset('backend/uploads/temple_event/banner/')); ?>/' + event.banner_image : 'https://placehold.co/150x150/a9561f/ffffff?text=Temple')
                : (event.banner_image ? '<?php echo e(asset('backend/uploads/organization_event/banner/')); ?>/' + event.banner_image : 'https://placehold.co/150x150/c94641/ffffff?text=Org');

            const detailUrl = isTemple
                ? '<?php echo e(url('/event/temple')); ?>/' + event.id
                : '<?php echo e(url('/event/organization')); ?>/' + event.id;

            const eventName = event.event_name.length > 50 ? event.event_name.substring(0, 50) + '...' : event.event_name;
            const eventDate = new Date(event.event_date).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });

            return `
                <div class="recent-event-item">
                    <a href="${detailUrl}">
                        <div class="recent-event-image">
                            <img src="${imageUrl}" alt="${event.event_name}">
                        </div>
                        <div class="recent-event-content">
                            <div class="recent-event-title">${eventName}</div>
                            <div class="recent-event-date">
                                <i class="far fa-calendar-alt"></i>
                                ${eventDate}
                            </div>
                        </div>
                    </a>
                </div>
            `;
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/pages/events/all_events.blade.php ENDPATH**/ ?>