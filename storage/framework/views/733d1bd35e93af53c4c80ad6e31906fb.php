<?php $__env->startSection('title', 'Home - Bengali Hindu Unity'); ?>

<?php $__env->startSection('stylesheet'); ?>
<style>
    /* Service Icon Styling */
    .sigma_icon-block .icon-wrapper {
        margin-bottom: 20px;
    }

    .sigma_icon-block .icon-wrapper i {
        font-size: 48px;
        color: #dc8a45;
        transition: all 0.3s ease;
    }

    .sigma_icon-block:hover .icon-wrapper i {
        color: #c77835;
        transform: scale(1.1);
    }

    /* Banner breadcrumb positioning */
    .sigma_banner.banner-3 {
        position: relative;
    }

    .sigma_banner.banner-3 .breadcrumb {
        position: absolute;
        bottom: -32px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        background: #fff;
        padding: 20px 28px;
        border-radius: 50px;
        margin: 0;
        box-shadow: 0px 10px 20px 0px rgb(53 82 99 / 9%);
        justify-content: center;
        align-items: center;
    }

    /* Apply standard breadcrumb item styling */
    .sigma_banner.banner-3 .breadcrumb-item+.breadcrumb-item {
        padding-left: 15px;
    }

    .sigma_banner.banner-3 .breadcrumb-item a.btn-link {
        position: relative;
        color: #dc8a45 !important;
        font-weight: 700;
        font-size: 14px;
    }

    .sigma_banner.banner-3 .breadcrumb-item a.btn-link:hover {
        color: #c77835 !important;
    }

    .sigma_banner.banner-3 .breadcrumb .breadcrumb-item.active {
        color: #5c5555 !important;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 14px;
        display: flex;
        align-items: center;
    }

    /* Keep header top section visible when sticky */
    .sigma_header.header-fixed .sigma_header-top,
    .sigma_header.can-sticky .sigma_header-top {
        display: block !important;
    }

    /* Responsive banner adjustments */
    .sigma_banner-slider-inner {
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 520px;
        display: flex;
        align-items: center;
    }

    .sigma_banner-text .title {
        color: #fff;
        font-weight: 700;
        font-size: 48px;
        line-height: 1.05;
    }

    .sigma_banner-text .blockquote {
        color: #f1f1f1;
        font-size: 16px;
    }

    .section-button .sigma_btn-custom { white-space: nowrap; }

    /* Mobile-specific image fallback (use <img> on small screens so image scales naturally) */
    .banner-mobile-img { display: none; width: 100%; height: auto; object-fit: cover; }

    @media (max-width: 767.98px) {
        .sigma_banner-slider-inner {
            min-height: 360px;
            padding: 28px 0;
            background-position: center !important;
            background-size: cover !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            align-items: center !important;
            text-align: center !important;
            background-image: none !important;
        }

        .sigma_banner-slider-inner .container { width: 100%; max-width: 100%; padding-left: 16px; padding-right: 16px; }
        .sigma_banner-text { width: 100% !important; }
        .sigma_banner-text .title { font-size: 26px !important; line-height: 1.1; margin-bottom: 10px; }
        .sigma_banner-text .blockquote { font-size: 15px !important; text-align: center; padding: 0 12px; margin-bottom: 12px; }

        .section-button { display: flex !important; flex-direction: column; gap: 10px; align-items: center; }
        .section-button .sigma_btn-custom { display: inline-block; width: 100%; max-width: 260px; }
        .section-button .ms-3 { margin-left: 0 !important; }
        .section-button .sigma_btn-custom.white { margin-left: 0 !important; }

        .sigma_banner.banner-3 .breadcrumb { bottom: -48px; padding: 12px 18px; }
    }

    @media (max-width: 767.98px) {
        .banner-mobile-img { display: block; }
    }

    /* Fixed banner height to prevent shrinking */
    .sigma_banner-slider-inner {
        min-height: 600px;
        display: flex;
        align-items: center;
        position: relative;
    }

    /* Position buttons at bottom left */
    .banner-buttons-bottom {
        position: absolute;
        bottom: 150px;
        left: 0;
        z-index: 10;
    }

    .banner-buttons-bottom .section-button {
        padding-left: 50px;
    }

    @media (max-width: 768px) {
        .sigma_banner-slider-inner {
            min-height: 400px;
        }
        .banner-buttons-bottom {
            bottom: 30px;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Banner Start -->
    <div class="sigma_banner banner-3">

        <div class="sigma_banner-slider">

        <?php $__empty_1 = true; $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <!-- Banner Item Start -->
        <div class="light-bg sigma_banner-slider-inner bg-cover bg-center" style="background-image: url('<?php echo e($banner->image_name === 'h1.webp' ? asset('frontend/assets/img/banner/h1.webp') : ($banner->image_name === 'placeholder.jpg' ? 'https://placehold.co/1920x707' : asset('backend/uploads/banner/' . $banner->image_name))); ?>');">
            <div class="sigma_banner-text">
                <div class="container">
                    <div class="row align-items-center">
                    <div class="col-lg-6">
                        
                    </div>
                    </div>
                </div>
            </div>
            <div class="banner-buttons-bottom">
                <div class="container">
                    <div class="section-button d-flex align-items-center">
                    <?php if($banner->button_text_1 && $banner->button_link_1): ?>
                    <a href="<?php echo e(url($banner->button_link_1)); ?>" class="sigma_btn-custom"><?php echo e($banner->button_text_1); ?> <i class="far fa-arrow-right"></i> </a>
                    <?php endif; ?>
                    <?php if($banner->button_text_2 && $banner->button_link_2): ?>
                    <a href="<?php echo e(url($banner->button_link_2)); ?>" class="ms-3 sigma_btn-custom white"><?php echo e($banner->button_text_2); ?> <i class="far fa-arrow-right"></i> </a>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Item End -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <!-- Default Banner Item -->
        <div class="light-bg sigma_banner-slider-inner bg-cover bg-center" style="background-image: url('<?php echo e(asset('frontend/assets/img/banner/h1.webp')); ?>');">
            <div class="sigma_banner-text">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="title">BHU (Bengali Hindu Unity) fighting for our rights</h1>
                    <p class="blockquote mb-0 bg-transparent">We are concerned Hindus working to unite 20 million fellow Hindus under a single organization to advocate for our rights.</p>
                </div>
                </div>
            </div>
            </div>
            <div class="banner-buttons-bottom">
                <div class="container">
                    <div class="section-button d-flex align-items-center">
                    <a href="<?php echo e(url('/contact-us')); ?>" class="sigma_btn-custom">Join Today <i class="far fa-arrow-right"></i> </a>
                    <a href="<?php echo e(url('/services')); ?>" class="ms-3 sigma_btn-custom white">View Services <i class="far fa-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>
    </div>
    <!-- Banner End -->

    <!-- Who We Are Section Start -->
    <section class="section section-padding light-bg">
        <div class="container">
            <div class="section-title section-title-2 text-center">
                <h4 class="title"><?php echo e($about?->who_we_are_title ?? 'Who We Are'); ?></h4>
            </div>
            <?php if($about?->who_we_are_content): ?>
                <div class="disc"><?php echo $about->who_we_are_content; ?></div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Who We Are Section End -->

    <!-- How We Can Help Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="section-title section-title-2 text-center">
                <h4 class="title">How We Can Help</h4>
            </div>

            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-4">
                    <div class="sigma_icon-block icon-block-2">
                        <?php if($service->icon): ?>
                        <div class="icon-wrapper">
                            <i class="fas <?php echo e($service->icon); ?>"></i>
                        </div>
                        <?php endif; ?>
                        <div class="sigma_icon-block-content">
                            <h5><?php echo e($service->title); ?></h5>
                            <p><?php echo e(Str::limit($service->description, 130)); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 text-center">
                    <p>No services available at the moment.</p>
                </div>
                <?php endif; ?>
            </div>

            <div class="text-center mt-3">
                <h5 class="text-center">Need Our Support?</h5>
                <a href="<?php echo e(url('/register')); ?>" class="mt-3 sigma_btn-custom dark">Register Today</a>
            </div>
        </div>
    </div>
    <!-- How We Can Help End -->

    <!-- Fun Facts Section Start -->
    <div class="rts-fun-facts-area rts-section-gap bg-dark-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h4 class="title">Empowering Hindus, Securing Our Future</h4>
                        <p class="disc">
                            This platform brings together Hindus across Bangladesh to stand united for our rights, culture, and community. With thousands of members, temples, and organizations connected, we are building a stronger voice and a stronger future. Together, we protect our heritage and empower our people.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-24 mt--40">
                <div class="col-lg-4">
                    <div class="single-facts-three horizontal-fact">
                        <div class="icon-and-number">
                            <div class="icon">
                                <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                            </div>
                            <h3 class="counter title"><?php echo e(number_format($statistics['users'])); ?></h3>
                        </div>
                        <div class="inner">
                            <span class="bottom">Registered Users</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-facts-three horizontal-fact">
                        <div class="icon-and-number">
                            <div class="icon">
                                <i class="fa fa-building fa-3x" aria-hidden="true"></i>
                            </div>
                            <h3 class="counter title mb-0 ms-3"><?php echo e(number_format($statistics['organizations'])); ?></h3>
                        </div>
                        <div class="inner">
                            <span class="bottom">Registered Organizations</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-facts-three horizontal-fact">
                        <div class="icon-and-number">
                            <div class="icon">
                                <i class="fa fa-university fa-3x" aria-hidden="true"></i>
                            </div>
                            <h3 class="counter title"><?php echo e(number_format($statistics['temples'])); ?></h3>
                        </div>
                        <div class="inner">
                            <span class="bottom">Registered Temples</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fun Facts Section End -->

    <!-- Map Start -->
    <div class="section d-none d-lg-block p-0">
        <div id="map" style="width:100%;height:700px;"></div>
    </div>
    <!-- Map End -->

    <!-- Back To Top Start -->
    <div class="sigma_top style-5">
        <i class="far fa-angle-double-up"></i>
    </div>
    <!-- Back To Top End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_scripts'); ?>
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
<script>
    function initMap() {
        // Create the map centered on Bangladesh
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 7,
            center: { lat: 23.6850, lng: 90.3563 }, // Bangladesh center
        });

        // Dynamic locations from database
        const locations = <?php echo json_encode($mapLocations, 15, 512) ?>;

        // Create markers with InfoWindow
        const markers = locations.map((location, i) => {
            const marker = new google.maps.Marker({
                position: { lat: location.lat, lng: location.lng },
                title: location.name
            });

            // Add click listener to show InfoWindow
            const infoWindow = new google.maps.InfoWindow({
                content: `<div style="padding: 5px;">
                            <h6 style="margin: 0 0 5px 0; font-weight: bold;">${location.name}</h6>
                            <p style="margin: 0; font-size: 13px; color: #666;">${location.address || 'No address available'}</p>
                          </div>`
            });

            marker.addListener('click', () => {
                infoWindow.open(map, marker);
            });

            return marker;
        });

        // Add marker clusterer for better performance with many markers
        new markerClusterer.MarkerClusterer({ map, markers });
    }
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTRqyVq5k6iX60e382PGnio2_vWLd2yCg&callback=initMap"
    async
    defer></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/pages/home/index.blade.php ENDPATH**/ ?>