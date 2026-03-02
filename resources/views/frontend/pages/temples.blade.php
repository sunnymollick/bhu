@extends('frontend.layouts.default')
@section('stylesheet')

@endsection
@section('subheader')
<div class="sigma_subheader dark-overlay dark-overlay-2">
    <div class="sigma_subheader">
        <div class="overlay">
            <img src="{{ asset('frontend/assets/img/temple_banner.jpg') }}" alt="">
            <div class="text-over-image">
            <h1 class="header-img-text">All Temples</h1>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Temples</li>
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
                <!-- New Temple Filter Controls -->
                <div class="sidebar-widget widget-temple-filter">
                <h5>Filter Temples</h5>
                <form id="templeFilterForm" onsubmit="return false;">
                    <!-- Division -->
                    <div class="mb-3">
                    <label class="form-label">Division</label>
                    <select id="division" class="form-select">
                        <option value="">Select Division</option>
                    </select>
                    </div>

                    <!-- District -->
                    <div class="mb-3">
                    <label class="form-label">District</label>
                    <select id="district" class="form-select">
                        <option value="">Select District</option>
                    </select>
                    </div>

                    <!-- Upazila -->
                    <div class="mb-3">
                    <label class="form-label">Upazila</label>
                    <select id="upazila" class="form-select">
                        <option value="">Select Upazila</option>
                    </select>
                    </div>
                    <!-- Residential Facility -->
                    <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="residential_yes" value="yes">
                        <label class=" form-check-label" for="residential_yes">Residential Facility</label>
                    </div>
                    </div>
                    <!-- Festivals -->
                    <div class="mb-3">
                    <label class="form-label">Festivals Celebrated</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="durga" value="durga_puja">
                        <label class="form-check-label" for="durga">Durga Puja</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="kali" value="kali_puja">
                        <label class="form-check-label" for="kali">Kali Puja</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="saraswati" value="saraswati_puja">
                        <label class="form-check-label" for="saraswati">Saraswati Puja</label>
                    </div>
                    </div>

                    <!-- Special Ceremonies -->
                    <div class="mb-3">
                    <label class="form-label">Special Ceremonies</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="wedding" value="wedding">
                        <label class="form-check-label" for="wedding">Wedding</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="upanayan" value="upanayan">
                        <label class="form-check-label" for="upanayan">Upanayan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="shraddha" value="shraddha">
                        <label class="form-check-label" for="shraddha">Shraddha</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="annoprashon" value="annoprashon">
                        <label class="form-check-label" for="annoprashon">Annoprashon</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="naamkaran" value="naamkaran">
                        <label class="form-check-label" for="naamkaran">Naamkaran</label>
                    </div>
                    </div>
                    <!-- Educational Programs -->
                    <div class="mb-3">
                    <label class="form-label">Educational Programs</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gita" value="gita">
                        <label class="form-check-label" for="gita">Gita Classes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="yoga" value="yoga">
                        <label class="form-check-label" for="yoga">Yoga / Meditation</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="music" value="music">
                        <label class="form-check-label" for="music">Music / Cultural Training</label>
                    </div>
                    </div>

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
                    <input type="text" name="query" class="form-control" placeholder="Search temples, locations..." aria-label="Search temples">
                    <button type="submit" class="btn btn-search" aria-label="Search">
                    <i class="fal fa-search search-icon"></i>
                    </button>
                </form>
                </div>
            </div>
            <!-- SEARCH BOX END -->
            <div class="row">
                <div class="col-md-4">
                <article class="sigma_post">
                    <div class="sigma_post-thumb">
                    <a href="temples-details.html">
                        <img src="https://placehold.co/400x270" alt="post">
                    </a>
                    </div>
                    <div class="sigma_post-body">
                    <h5> <a href="temples-details.html">Mahashivratri Temple</a> </h5>
                    </div>
                </article>
                </div>
                <!-- Article End -->

                <!-- Article Start -->
                <div class="col-md-4">
                <article class="sigma_post">
                    <div class="sigma_post-thumb">
                    <a href="temples-details.html">
                        <img src="https://placehold.co/400x270" alt="post">
                    </a>
                    </div>
                    <div class="sigma_post-body">
                    <h5> <a href="temples-details.html">Varanasi At Night</a> </h5>
                    </div>
                </article>
                </div>
                <!-- Article End -->

                <!-- Article Start -->
                <div class="col-md-4">
                <article class="sigma_post">
                    <div class="sigma_post-thumb">
                    <a href="temples-details.html">
                        <img src="https://placehold.co/400x270" alt="post">
                    </a>
                    </div>
                    <div class="sigma_post-body">
                    <h5> <a href="temples-details.html">OM Mahashivratri</a> </h5>
                    </div>
                </article>
                </div>
                <!-- Article End -->

                <!-- Article Start -->
                <div class="col-md-4">
                <article class="sigma_post">
                    <div class="sigma_post-thumb">
                    <a href="temples-details.html">
                        <img src="https://placehold.co/400x270" alt="post">
                    </a>
                    </div>
                    <div class="sigma_post-body">
                    <h5> <a href="temples-details.html">Chaar Dhaam Yatra</a> </h5>
                    </div>
                </article>
                </div>
                <!-- Article End -->

                <!-- Article Start -->
                <div class="col-md-4">
                <article class="sigma_post">
                    <div class="sigma_post-thumb">
                    <a href="temples-details.html">
                        <img src="https://placehold.co/400x270" alt="post">
                    </a>
                    </div>
                    <div class="sigma_post-body">
                    <h5> <a href="temples-details.html">Mahashivratri</a> </h5>
                    </div>
                </article>
                </div>
                <!-- Article End -->

                <!-- Article Start -->
                <div class="col-md-4">
                <article class="sigma_post">
                    <div class="sigma_post-thumb">
                    <a href="temples-details.html">
                        <img src="https://placehold.co/400x270" alt="post">
                    </a>
                    </div>
                    <div class="sigma_post-body">
                    <h5> <a href="temples-details.html">Jagannath Yatra</a> </h5>
                    </div>
                </article>
                </div>
                <!-- Article End -->

                <!-- Article Start -->
                <div class="col-md-4">
                <article class="sigma_post">
                    <div class="sigma_post-thumb">
                    <a href="temples-details.html">
                        <img src="https://placehold.co/400x270" alt="post">
                    </a>
                    </div>
                    <div class="sigma_post-body">
                    <h5> <a href="temples-details.html">Ramleela</a> </h5>
                    </div>
                </article>
                </div>
                <!-- Article End -->

                <!-- Article Start -->
                <div class="col-md-4">
                <article class="sigma_post">
                    <div class="sigma_post-thumb">
                    <a href="temples-details.html">
                        <img src="https://placehold.co/400x270" alt="post">
                    </a>
                    </div>
                    <div class="sigma_post-body">
                    <h5> <a href="temples-details.html">Kumbh Mela</a> </h5>
                    </div>
                </article>
                </div>
                <!-- Article End -->

                <!-- Article Start -->
                <div class="col-md-4">
                <article class="sigma_post">
                    <div class="sigma_post-thumb">
                    <a href="temples-details.html">
                        <img src="https://placehold.co/400x270" alt="post">
                    </a>
                    </div>
                    <div class="sigma_post-body">
                    <h5> <a href="temples-details.html">Kumbh Mela</a> </h5>
                    </div>
                </article>
                </div>
                <!-- Article End -->

            </div>
            <!-- Pagination Start -->
            <ul class="pagination mb-0">
                <li class="page-item"><a class="page-link" href="#"> <i class="far fa-chevron-left"></i> </a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#"> <i class="far fa-chevron-right"></i> </a></li>
            </ul>
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
@endsection
@section('custom_scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOr9696DDtCnhDRniUYvN5GyOBmTOBPVI"></script>
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
<script>
    // Example data - replace with your own or load via AJAX
    const divisions = [{
        id: 1,
        name: 'Dhaka'
    },
    {
        id: 2,
        name: 'Chittagong'
    }
    ];
    const districts = [{
        id: 1,
        division_id: 1,
        name: 'Dhaka'
    },
    {
        id: 2,
        division_id: 1,
        name: 'Gazipur'
    },
    {
        id: 3,
        division_id: 2,
        name: 'Comilla'
    },
    {
        id: 4,
        division_id: 2,
        name: "Cox's Bazar"
    }
    ];
    const temples = [{
        id: 1,
        name: 'Dhakeshwari Temple',
        division_id: 1,
        district_id: 1,
        lat: 23.7286,
        lng: 90.3880,
        address: 'Dhaka, Bangladesh'
    },
    {
        id: 2,
        name: 'Kali Temple',
        division_id: 1,
        district_id: 2,
        lat: 23.9999,
        lng: 90.4200,
        address: 'Gazipur, Bangladesh'
    },
    {
        id: 3,
        name: 'Comilla Temple',
        division_id: 2,
        district_id: 3,
        lat: 23.4607,
        lng: 91.1809,
        address: 'Comilla, Bangladesh'
    },
    {
        id: 4,
        name: "Cox's Bazar Temple",
        division_id: 2,
        district_id: 4,
        lat: 21.4272,
        lng: 92.0058,
        address: "Cox's Bazar, Bangladesh"
    }
    ];

    // Populate Division dropdown
    function populateDivisions() {
    const divisionSelect = document.getElementById('division');
    divisionSelect.innerHTML = '<option value="">All Divisions</option>';
    divisions.forEach(div => {
        let option = document.createElement('option');
        option.value = div.id;
        option.text = div.name;
        divisionSelect.appendChild(option);
    });
    }

    // Populate District dropdown based on selected division
    function populateDistricts(divisionId) {
    const districtSelect = document.getElementById('district');
    districtSelect.innerHTML = '<option value="">All Districts</option>';
    districts
        .filter(d => !divisionId || d.division_id == divisionId)
        .forEach(d => {
        let option = document.createElement('option');
        option.value = d.id;
        option.text = d.name;
        districtSelect.appendChild(option);
        });
    }

    // Filter temples based on dropdowns
    function filterTemples() {
    const divisionId = document.getElementById('division').value;
    const districtId = document.getElementById('district').value;
    return temples.filter(t => {
        return (!divisionId || t.division_id == divisionId) &&
        (!districtId || t.district_id == districtId);
    });
    }

    let map, markerCluster, markers = [];

    document.addEventListener('DOMContentLoaded', function () {
    populateDivisions();
    populateDistricts();
    initMap(filterTemples());

    document.getElementById('division').addEventListener('change', function () {
        populateDistricts(this.value);
        initMap(filterTemples());
    });
    document.getElementById('district').addEventListener('change', function () {
        initMap(filterTemples());
    });
    });

</script>
<script>
    function initMap(filteredTemples) {
    // If there are no temples, center on Bangladesh
    if (!filteredTemples.length) {
        map = new google.maps.Map(document.getElementById('map'), {
        zoom: 5,
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
        bounds.extend({
        lat: t.lat,
        lng: t.lng
        });
    });

    // Initialize map centered on the bounds' center
    map = new google.maps.Map(document.getElementById('map'), {
        // zoom: 5,
        center: bounds.getCenter()
    });

    // Remove previous markers
    if (markerCluster) markerCluster.clearMarkers();
    markers = [];
    filteredTemples.forEach(t => {
        let marker = new google.maps.Marker({
        position: {
            lat: t.lat,
            lng: t.lng
        },
        map: map,
        title: t.name
        });
        const infoWindow = new google.maps.InfoWindow({
        content: `<strong>${t.name}</strong><br>${t.address}`
        });
        marker.addListener('click', function () {
        infoWindow.open(map, marker);
        });
        markers.push(marker);
    });
    markerCluster = new markerClusterer.MarkerClusterer({
        map,
        markers
    });

    // Fit map to show all markers
    map.fitBounds(bounds);
    }

</script>
@endsection