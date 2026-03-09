<?php $__env->startSection('title', $event->event_name . ' - Bengali Hindu Unity'); ?>

<?php $__env->startSection('stylesheet'); ?>
<style>
    .event-info-box {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        padding: 25px;
        margin-bottom: 30px;
    }

    .event-info-box h5 {
        color: #d86800;
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #d86800;
    }

    .event-info-item {
        display: flex;
        align-items: start;
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .event-info-item:last-child {
        border-bottom: none;
    }

    .event-info-label {
        font-weight: 600;
        color: #333;
        min-width: 120px;
        display: flex;
        align-items: center;
    }

    .event-info-label i {
        color: #d86800;
        margin-right: 8px;
        font-size: 1.1rem;
    }

    .event-info-value {
        color: #666;
        flex: 1;
    }

    .event-banner-wrapper {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    .event-banner-wrapper img {
        width: 100%;
        height: auto;
        display: block;
    }

    .event-description {
        background: #fff;
        border-radius: 8px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }

    .event-description h3 {
        color: #d86800;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .event-schedule {
        background: #fff9f4;
        border-left: 4px solid #d86800;
        padding: 20px;
        margin-bottom: 30px;
        border-radius: 4px;
    }

    .event-schedule h4 {
        color: #d86800;
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    .gallery-section {
        background: #fff;
        border-radius: 8px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }

    .gallery-section h3 {
        color: #d86800;
        margin-bottom: 25px;
        font-weight: 600;
    }

    .event-gallery-slider {
        margin: 0 -15px;
        position: relative;
    }

    .gallery-slide {
        padding: 0 15px;
        height: 400px;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        cursor: pointer;
        height: 100%;
        display: block;
        background: #f5f5f5;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.3s ease;
        display: block;
    }

    .gallery-item:hover img {
        transform: scale(1.05);
    }

    .event-gallery-slider .slick-prev,
    .event-gallery-slider .slick-next {
        background: rgba(216, 104, 0, 0.9);
        border-radius: 50%;
        width: 45px;
        height: 45px;
        z-index: 10;
    }

    .event-gallery-slider .slick-prev:hover,
    .event-gallery-slider .slick-next:hover {
        background: rgba(216, 104, 0, 1);
    }

    .event-gallery-slider .slick-prev {
        left: -22px;
    }

    .event-gallery-slider .slick-next {
        right: -22px;
    }

    .event-gallery-slider .slick-prev:before,
    .event-gallery-slider .slick-next:before {
        font-size: 22px;
    }

    .event-gallery-slider .slick-dots {
        bottom: -40px;
        text-align: center;
        width: 100%;
        left: 0;
        right: 0;
        position: absolute;
        display: flex !important;
        justify-content: center;
        align-items: center;
        list-style: none;
        padding: 0;
        margin: 0 auto;
    }

    .event-gallery-slider .slick-dots li {
        margin: 0 5px;
        display: inline-block;
    }

    .event-gallery-slider .slick-dots li button {
        background-color: #f0d6be;
    }

    .event-gallery-slider .slick-dots li.slick-active button {
        background-color: #dc8a45;
    }

    .event-gallery-slider .slick-dots li button:before {
        font-size: 12px;
        color: #dc8a45;
    }

    .event-gallery-slider .slick-dots li.slick-active button:before {
        color: #dc8a45;
    }

    .related-events-section {
        background: #fff;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }

    .related-events-section h3 {
        color: #d86800;
        margin-bottom: 25px;
        font-weight: 600;
    }

    .related-event-card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .related-event-card:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transform: translateY(-3px);
    }

    .related-event-card a {
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
    }

    .related-event-image {
        height: 150px;
        overflow: hidden;
    }

    .related-event-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .related-event-card:hover .related-event-image img {
        transform: scale(1.1);
    }

    .related-event-content {
        padding: 15px;
    }

    .related-event-title {
        font-size: 1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .related-event-meta {
        font-size: 0.85rem;
        color: #666;
    }

    .related-event-meta i {
        color: #d86800;
        margin-right: 5px;
    }

    .organizer-link {
        display: inline-flex;
        align-items: center;
        color: #d86800;
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .organizer-link:hover {
        color: #b85700;
        text-decoration: underline;
    }

    .organizer-link i {
        margin-right: 8px;
    }

    .event-type-label {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .event-type-label.temple {
        background: rgba(216, 104, 0, 0.15);
        color: #d86800;
    }

    .event-type-label.organization {
        background: rgba(216, 104, 0, 0.15);
        color: #d86800;
    }

    .all-events-btn {
        display: block;
        width: 100%;
        padding: 12px 20px;
        margin-top: 20px;
        background: #d86800;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(216, 104, 0, 0.3);
    }

    .all-events-btn:hover {
        background: #b85700;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(216, 104, 0, 0.4);
    }

    .all-events-btn i {
        margin-left: 8px;
    }
    /* ===== Sub-head banner & breadcrumb — Responsive ===== */

    /* Small Laptop (1024px – 1365px) */
    @media (min-width: 1024px) and (max-width: 1365px) {
        .header-img-text {
            font-size: 1.3rem;
            line-height: 1.35;
        }
    }

    /* Tablet (768px – 1023px) */
    @media (min-width: 768px) and (max-width: 1023px) {
        .header-img-text {
            font-size: 1.1rem;
            line-height: 1.3;
        }
    }

    /* Phones – general (≤575px) */
    @media (max-width: 575px) {
        .sub-head-banner {
            height: 200px;
        }
        .header-img-text {
            font-size: 1.15rem;
            padding: 0 12px;
            width: 90%;
        }
        .sigma_subheader .breadcrumb {
            padding: 16px 20px;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 94vw;
        }
        .sigma_subheader .breadcrumb .breadcrumb-item {
            display: inline-flex;
            align-items: center;
            font-size: 12px;
            line-height: 1.2;
        }
        .sigma_subheader .breadcrumb li a,
        .sigma_subheader .breadcrumb-item a.btn-link {
            font-size: 12px !important;
            line-height: 1.2;
        }
        .sigma_subheader .breadcrumb .breadcrumb-item.active {
            font-size: 12px;
            line-height: 1.2;
        }
        .sigma_subheader .breadcrumb-item+.breadcrumb-item::before {
            font-size: 13px;
            line-height: 1.2;
            display: inline-flex;
            align-items: center;
            padding-right: 8px;
        }
        .sigma_subheader .breadcrumb-item+.breadcrumb-item {
            padding-left: 8px;
        }
    }

    /* Mobile M / narrow phones (≤425px) */
    @media (max-width: 425px) {
        .sigma_subheader .breadcrumb {
            padding: 14px 16px;
        }
        .sub-head-banner {
            height: 170px;
        }
        .header-img-text {
            font-size: 1rem;
        }
        .sigma_subheader .breadcrumb .breadcrumb-item {
            font-size: 11px;
        }
        .sigma_subheader .breadcrumb li a,
        .sigma_subheader .breadcrumb-item a.btn-link {
            font-size: 11px !important;
        }
        .sigma_subheader .breadcrumb .breadcrumb-item.active {
            font-size: 11px;
        }
        .sigma_subheader .breadcrumb-item+.breadcrumb-item::before {
            font-size: 12px;
        }
    }

    /* Mobile S (≤375px) */
    @media (max-width: 375px) {
        .sigma_subheader .breadcrumb {
            padding: 12px 14px;
        }
        .sub-head-banner {
            height: 150px;
        }
        .header-img-text {
            font-size: 0.9rem;
        }
        .sigma_subheader .breadcrumb .breadcrumb-item {
            font-size: 10px;
        }
        .sigma_subheader .breadcrumb li a,
        .sigma_subheader .breadcrumb-item a.btn-link {
            font-size: 10px !important;
        }
        .sigma_subheader .breadcrumb .breadcrumb-item.active {
            font-size: 10px;
        }
        .sigma_subheader .breadcrumb-item+.breadcrumb-item::before {
            font-size: 11px;
            padding-right: 6px;
        }
        .sigma_subheader .breadcrumb-item+.breadcrumb-item {
            padding-left: 6px;
        }
    }

    /* ===== Event Details Components — Responsive ===== */

    /* Small Laptop (≤1280px) */
    @media (max-width: 1280px) {
        .event-info-box {
            padding: 22px;
        }
        .event-description,
        .gallery-section {
            padding: 25px;
        }
        .related-events-section {
            padding: 25px;
        }
        .gallery-slide {
            height: 350px;
        }
        .event-gallery-slider .slick-prev {
            left: -18px;
        }
        .event-gallery-slider .slick-next {
            right: -18px;
        }
    }

    /* Tablet (≤1024px) */
    @media (max-width: 1024px) {
        .event-info-box {
            padding: 20px;
            margin-bottom: 25px;
        }
        .event-info-label {
            min-width: 110px;
        }
        .event-description,
        .gallery-section {
            padding: 22px;
            margin-bottom: 25px;
        }
        .related-events-section {
            padding: 22px;
        }
        .gallery-slide {
            height: 300px;
        }
        .event-gallery-slider .slick-prev,
        .event-gallery-slider .slick-next {
            width: 40px;
            height: 40px;
        }
        .event-gallery-slider .slick-prev:before,
        .event-gallery-slider .slick-next:before {
            font-size: 20px;
        }
        .event-gallery-slider .slick-prev {
            left: -15px;
        }
        .event-gallery-slider .slick-next {
            right: -15px;
        }
        .event-schedule {
            padding: 18px;
        }
        .event-banner-wrapper {
            margin-bottom: 25px;
        }
        .all-events-btn {
            padding: 10px 16px;
            font-size: 0.95rem;
        }
    }

    /* Tablet Portrait / Large Phone (≤768px) */
    @media (max-width: 768px) {
        .event-info-box {
            padding: 18px;
            margin-bottom: 20px;
        }
        .event-info-box h5 {
            font-size: 1.1rem;
            margin-bottom: 15px;
            padding-bottom: 8px;
        }
        .event-info-item {
            padding: 10px 0;
        }
        .event-info-label {
            min-width: 100px;
            font-size: 0.9rem;
        }
        .event-info-label i {
            font-size: 1rem;
        }
        .event-info-value {
            font-size: 0.9rem;
        }
        .event-type-label {
            font-size: 0.8rem;
            padding: 5px 10px;
        }
        .organizer-link {
            font-size: 0.95rem;
            margin-bottom: 15px;
        }
        .event-banner-wrapper {
            margin-bottom: 20px;
            border-radius: 6px;
        }
        .event-description,
        .gallery-section {
            padding: 20px;
            margin-bottom: 20px;
        }
        .event-description h3,
        .gallery-section h3 {
            font-size: 1.25rem;
            margin-bottom: 15px;
        }
        .event-schedule {
            padding: 15px;
            margin-bottom: 20px;
        }
        .event-schedule h4 {
            font-size: 1.1rem;
            margin-bottom: 12px;
        }
        .gallery-slide {
            height: 260px;
        }
        .event-gallery-slider {
            margin: 0 -10px;
        }
        .gallery-slide {
            padding: 0 10px;
        }
        .event-gallery-slider .slick-prev,
        .event-gallery-slider .slick-next {
            width: 36px;
            height: 36px;
        }
        .event-gallery-slider .slick-prev:before,
        .event-gallery-slider .slick-next:before {
            font-size: 18px;
        }
        .event-gallery-slider .slick-prev {
            left: -10px;
        }
        .event-gallery-slider .slick-next {
            right: -10px;
        }
        .event-gallery-slider .slick-dots li button:before {
            font-size: 10px;
        }
        .related-events-section {
            padding: 20px;
        }
        .related-events-section h3 {
            font-size: 1.25rem;
            margin-bottom: 18px;
        }
        .related-event-card {
            margin-bottom: 15px;
        }
        .related-event-image {
            height: 130px;
        }
        .related-event-content {
            padding: 12px;
        }
        .related-event-title {
            font-size: 0.95rem;
        }
        .all-events-btn {
            padding: 10px 14px;
            font-size: 0.9rem;
        }
        h1.mb-4 {
            font-size: 1.5rem;
        }
    }

    /* Mobile L (≤425px) */
    @media (max-width: 425px) {
        .event-info-box {
            padding: 15px;
            margin-bottom: 18px;
        }
        .event-info-box h5 {
            font-size: 1rem;
            margin-bottom: 12px;
        }
        .event-info-item {
            flex-direction: column;
            gap: 4px;
            padding: 10px 0;
        }
        .event-info-label {
            min-width: unset;
            font-size: 0.85rem;
        }
        .event-info-value {
            font-size: 0.85rem;
            padding-left: 24px;
        }
        .event-type-label {
            font-size: 0.78rem;
            padding: 4px 10px;
            margin-bottom: 10px;
        }
        .organizer-link {
            font-size: 0.88rem;
            margin-bottom: 12px;
        }
        .organizer-link i {
            margin-right: 6px;
            font-size: 0.9rem;
        }
        .event-banner-wrapper {
            margin-bottom: 18px;
            border-radius: 5px;
        }
        .event-description,
        .gallery-section {
            padding: 16px;
            margin-bottom: 18px;
            border-radius: 6px;
        }
        .event-description h3,
        .gallery-section h3 {
            font-size: 1.15rem;
            margin-bottom: 12px;
        }
        .event-schedule {
            padding: 14px;
            margin-bottom: 18px;
            font-size: 0.9rem;
        }
        .event-schedule h4 {
            font-size: 1rem;
        }
        .gallery-slide {
            height: 220px;
        }
        .event-gallery-slider .slick-prev,
        .event-gallery-slider .slick-next {
            width: 32px;
            height: 32px;
        }
        .event-gallery-slider .slick-prev:before,
        .event-gallery-slider .slick-next:before {
            font-size: 16px;
        }
        .event-gallery-slider .slick-prev {
            left: -6px;
        }
        .event-gallery-slider .slick-next {
            right: -6px;
        }
        .related-events-section {
            padding: 16px;
            border-radius: 6px;
        }
        .related-events-section h3 {
            font-size: 1.15rem;
            margin-bottom: 15px;
        }
        .related-event-image {
            height: 120px;
        }
        .related-event-content {
            padding: 10px;
        }
        .related-event-title {
            font-size: 0.9rem;
            margin-bottom: 6px;
        }
        .related-event-meta {
            font-size: 0.8rem;
        }
        .all-events-btn {
            padding: 10px 12px;
            font-size: 0.85rem;
        }
        h1.mb-4 {
            font-size: 1.3rem;
        }
    }

    /* Mobile M (≤375px) */
    @media (max-width: 375px) {
        .event-info-box {
            padding: 12px;
            margin-bottom: 15px;
        }
        .event-info-box h5 {
            font-size: 0.95rem;
            margin-bottom: 10px;
        }
        .event-info-item {
            padding: 8px 0;
        }
        .event-info-label {
            font-size: 0.82rem;
        }
        .event-info-label i {
            font-size: 0.9rem;
            margin-right: 6px;
        }
        .event-info-value {
            font-size: 0.82rem;
            padding-left: 22px;
        }
        .event-type-label {
            font-size: 0.75rem;
            padding: 4px 8px;
        }
        .organizer-link {
            font-size: 0.82rem;
            margin-bottom: 10px;
        }
        .event-banner-wrapper {
            margin-bottom: 15px;
        }
        .event-description,
        .gallery-section {
            padding: 14px;
            margin-bottom: 15px;
        }
        .event-description h3,
        .gallery-section h3 {
            font-size: 1.05rem;
            margin-bottom: 10px;
        }
        .event-schedule {
            padding: 12px;
            margin-bottom: 15px;
            font-size: 0.85rem;
        }
        .event-schedule h4 {
            font-size: 0.95rem;
        }
        .gallery-slide {
            height: 190px;
        }
        .event-gallery-slider .slick-prev,
        .event-gallery-slider .slick-next {
            width: 28px;
            height: 28px;
        }
        .event-gallery-slider .slick-prev:before,
        .event-gallery-slider .slick-next:before {
            font-size: 14px;
        }
        .related-events-section {
            padding: 14px;
        }
        .related-events-section h3 {
            font-size: 1.05rem;
        }
        .related-event-image {
            height: 110px;
        }
        .related-event-content {
            padding: 10px;
        }
        .related-event-title {
            font-size: 0.85rem;
        }
        .related-event-meta {
            font-size: 0.78rem;
        }
        .all-events-btn {
            padding: 9px 10px;
            font-size: 0.82rem;
        }
        h1.mb-4 {
            font-size: 1.2rem;
        }
    }

    /* Mobile S (≤320px) */
    @media (max-width: 320px) {
        .event-info-box {
            padding: 10px;
            margin-bottom: 12px;
        }
        .event-info-box h5 {
            font-size: 0.9rem;
        }
        .event-info-item {
            padding: 7px 0;
        }
        .event-info-label {
            font-size: 0.78rem;
        }
        .event-info-label i {
            font-size: 0.85rem;
            margin-right: 5px;
        }
        .event-info-value {
            font-size: 0.78rem;
            padding-left: 20px;
            word-break: break-word;
            overflow-wrap: break-word;
        }
        .event-type-label {
            font-size: 0.7rem;
            padding: 3px 7px;
        }
        .organizer-link {
            font-size: 0.78rem;
            margin-bottom: 8px;
        }
        .event-banner-wrapper {
            margin-bottom: 12px;
            border-radius: 4px;
        }
        .event-description,
        .gallery-section {
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 5px;
        }
        .event-description h3,
        .gallery-section h3 {
            font-size: 1rem;
            margin-bottom: 8px;
        }
        .event-schedule {
            padding: 10px;
            margin-bottom: 12px;
            font-size: 0.8rem;
        }
        .event-schedule h4 {
            font-size: 0.88rem;
        }
        .gallery-slide {
            height: 160px;
        }
        .event-gallery-slider .slick-prev,
        .event-gallery-slider .slick-next {
            width: 26px;
            height: 26px;
        }
        .event-gallery-slider .slick-prev:before,
        .event-gallery-slider .slick-next:before {
            font-size: 12px;
        }
        .event-gallery-slider .slick-prev {
            left: -4px;
        }
        .event-gallery-slider .slick-next {
            right: -4px;
        }
        .event-gallery-slider .slick-dots li button:before {
            font-size: 8px;
        }
        .event-gallery-slider .slick-dots li {
            margin: 0 3px;
        }
        .related-events-section {
            padding: 12px;
            border-radius: 5px;
        }
        .related-events-section h3 {
            font-size: 1rem;
        }
        .related-event-image {
            height: 100px;
        }
        .related-event-content {
            padding: 8px;
        }
        .related-event-title {
            font-size: 0.82rem;
        }
        .related-event-meta {
            font-size: 0.75rem;
        }
        .all-events-btn {
            padding: 8px 10px;
            font-size: 0.78rem;
        }
        h1.mb-4 {
            font-size: 1.1rem;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subheader'); ?>
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text"><?php echo e($event->event_name); ?></h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="<?php echo e(url('/')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a class="btn-link" href="<?php echo e(route('frontend.events')); ?>">Events</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e($event->event_name); ?></li>
        </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="section">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Event Type Label -->
                <?php if($type === 'temple'): ?>
                    <span class="event-type-label temple">
                        <i class="fal fa-gopuram me-1"></i>Temple Event
                    </span>
                    <a href="<?php echo e(route('frontend.temples.details', $event->temple_id)); ?>" class="organizer-link">
                        <i class="fal fa-gopuram"></i>
                        <?php echo e($event->temple->name); ?>

                    </a>
                <?php else: ?>
                    <span class="event-type-label organization">
                        <i class="fal fa-building me-1"></i>Organization Event
                    </span>
                    <a href="<?php echo e(route('frontend.organizations.details', $event->organization_id)); ?>" class="organizer-link">
                        <i class="fal fa-building"></i>
                        <?php echo e($event->organization->name); ?>

                    </a>
                <?php endif; ?>

                <!-- Event Banner -->
                <div class="event-banner-wrapper">
                    <?php if($type === 'temple' && $event->banner_image): ?>
                        <img src="<?php echo e(asset('backend/uploads/temple_event/banner/' . $event->banner_image)); ?>" alt="<?php echo e($event->event_name); ?>">
                    <?php elseif($type === 'organization' && $event->banner_image): ?>
                        <img src="<?php echo e(asset('backend/uploads/organization_event/banner/' . $event->banner_image)); ?>" alt="<?php echo e($event->event_name); ?>">
                    <?php else: ?>
                        <?php if($type === 'temple'): ?>
                            <img src="https://placehold.co/1200x600/a9561f/ffffff?text=Temple+Event" alt="<?php echo e($event->event_name); ?>">
                        <?php else: ?>
                            <img src="https://placehold.co/1200x600/c94641/ffffff?text=Organization+Event" alt="<?php echo e($event->event_name); ?>">
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <!-- Event Title -->
                <h1 class="mb-4"><?php echo e($event->event_name); ?></h1>

                <!-- Event Schedule (if available) -->
                <?php if($event->schedule): ?>
                <div class="event-schedule">
                    <h4><i class="fal fa-list-ul me-2"></i>Event Schedule</h4>
                    <div><?php echo nl2br(e($event->schedule)); ?></div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Event Information -->
                <div class="event-info-box">
                    <h5>Event Information</h5>

                    <div class="event-info-item">
                        <div class="event-info-label">
                            <i class="fal fa-calendar-alt"></i>
                            <span>Date:</span>
                        </div>
                        <div class="event-info-value">
                            <?php if($event->event_date_end && $event->event_date != $event->event_date_end): ?>
                                
                                <?php echo e(\Carbon\Carbon::parse($event->event_date)->format('F d, Y')); ?> - <?php echo e(\Carbon\Carbon::parse($event->event_date_end)->format('F d, Y')); ?>

                                <br>
                                <small class="text-muted">
                                    <?php echo e(\Carbon\Carbon::parse($event->event_date)->format('l')); ?> to <?php echo e(\Carbon\Carbon::parse($event->event_date_end)->format('l')); ?>

                                </small>
                            <?php else: ?>
                                
                                <?php echo e(\Carbon\Carbon::parse($event->event_date)->format('F d, Y')); ?>

                                <br>
                                <small class="text-muted"><?php echo e(\Carbon\Carbon::parse($event->event_date)->format('l')); ?></small>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if($event->event_time_start || $event->event_time_end): ?>
                    <div class="event-info-item">
                        <div class="event-info-label">
                            <i class="fal fa-clock"></i>
                            <span>Time:</span>
                        </div>
                        <div class="event-info-value">
                            <?php if($event->event_time_start): ?>
                                <?php echo e(\Carbon\Carbon::parse($event->event_time_start)->format('g:i A')); ?>

                            <?php endif; ?>
                            <?php if($event->event_time_start && $event->event_time_end): ?>
                                -
                            <?php endif; ?>
                            <?php if($event->event_time_end): ?>
                                <?php echo e(\Carbon\Carbon::parse($event->event_time_end)->format('g:i A')); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($event->location): ?>
                    <div class="event-info-item">
                        <div class="event-info-label">
                            <i class="fal fa-map-marker-alt"></i>
                            <span>Location:</span>
                        </div>
                        <div class="event-info-value">
                            <?php echo e($event->location); ?>

                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="event-info-item">
                        <div class="event-info-label">
                            <i class="fal fa-<?php echo e($type === 'temple' ? 'gopuram' : 'building'); ?>"></i>
                            <span><?php echo e($type === 'temple' ? 'Temple' : 'Organizer'); ?>:</span>
                        </div>
                        <div class="event-info-value">
                            <?php if($type === 'temple'): ?>
                                <a href="<?php echo e(route('frontend.temples.details', $event->temple_id)); ?>" class="text-decoration-none">
                                    <?php echo e($event->temple->name); ?>

                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('frontend.organizations.details', $event->organization_id)); ?>" class="text-decoration-none">
                                    <?php echo e($event->organization->name); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if($type === 'temple' && $event->temple->phone): ?>
                    <div class="event-info-item">
                        <div class="event-info-label">
                            <i class="fal fa-phone"></i>
                            <span>Phone:</span>
                        </div>
                        <div class="event-info-value">
                            <a href="tel:<?php echo e($event->temple->phone); ?>" class="text-decoration-none">
                                <?php echo e($event->temple->phone); ?>

                            </a>
                        </div>
                    </div>
                    <?php elseif($type !== 'temple' && $event->organization->phone): ?>
                    <div class="event-info-item">
                        <div class="event-info-label">
                            <i class="fal fa-phone"></i>
                            <span>Phone:</span>
                        </div>
                        <div class="event-info-value">
                            <a href="tel:<?php echo e($event->organization->phone); ?>" class="text-decoration-none">
                                <?php echo e($event->organization->phone); ?>

                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($type === 'temple' && $event->temple->email): ?>
                    <div class="event-info-item">
                        <div class="event-info-label">
                            <i class="fal fa-envelope"></i>
                            <span>Email:</span>
                        </div>
                        <div class="event-info-value">
                            <a href="mailto:<?php echo e($event->temple->email); ?>" class="text-decoration-none">
                                <?php echo e($event->temple->email); ?>

                            </a>
                        </div>
                    </div>
                    <?php elseif($type !== 'temple' && $event->organization->email): ?>
                    <div class="event-info-item">
                        <div class="event-info-label">
                            <i class="fal fa-envelope"></i>
                            <span>Email:</span>
                        </div>
                        <div class="event-info-value">
                            <a href="mailto:<?php echo e($event->organization->email); ?>" class="text-decoration-none">
                                <?php echo e($event->organization->email); ?>

                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Related Events -->
                <?php if($relatedEvents && $relatedEvents->count() > 0): ?>
                <div class="related-events-section">
                    <h3>More Events</h3>
                    <?php $__currentLoopData = $relatedEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedEvent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="related-event-card">
                        <?php if($type === 'temple'): ?>
                            <a href="<?php echo e(route('frontend.event.details.unified', ['type' => 'temple', 'id' => $relatedEvent->id])); ?>">
                                <div class="related-event-image">
                                    <img src="<?php echo e($relatedEvent->banner_image ? asset('backend/uploads/temple_event/banner/' . $relatedEvent->banner_image) : 'https://placehold.co/400x200/a9561f/ffffff?text=Temple'); ?>" alt="<?php echo e($relatedEvent->event_name); ?>">
                                </div>
                        <?php else: ?>
                            <a href="<?php echo e(route('frontend.event.details.unified', ['type' => 'organization', 'id' => $relatedEvent->id])); ?>">
                                <div class="related-event-image">
                                    <img src="<?php echo e($relatedEvent->banner_image ? asset('backend/uploads/organization_event/banner/' . $relatedEvent->banner_image) : 'https://placehold.co/400x200/c94641/ffffff?text=Organization'); ?>" alt="<?php echo e($relatedEvent->event_name); ?>">
                                </div>
                        <?php endif; ?>
                                <div class="related-event-content">
                                    <h5 class="related-event-title"><?php echo e($relatedEvent->event_name); ?></h5>
                                    <div class="related-event-meta">
                                        <div class="mb-1">
                                            <i class="fal fa-calendar-alt"></i>
                                            <?php echo e(\Carbon\Carbon::parse($relatedEvent->event_date)->format('M d, Y')); ?>

                                        </div>
                                        <?php if($relatedEvent->location): ?>
                                        <div>
                                            <i class="fal fa-map-marker-alt"></i>
                                            <?php echo e(Str::limit($relatedEvent->location, 30)); ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($type === 'temple'): ?>
                        <a href="<?php echo e(route('frontend.events', ['temple_id' => $event->temple_id])); ?>" class="all-events-btn">
                            View All <?php echo e($event->temple->name); ?> Events
                            <i class="far fa-arrow-right"></i>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('frontend.events', ['organization_id' => $event->organization_id])); ?>" class="all-events-btn">
                            View All <?php echo e($event->organization->name); ?> Events
                            <i class="far fa-arrow-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Full Width Content Sections -->
        <div class="row mt-4">
            <div class="col-12">
                <!-- Event Description -->
                <?php if($event->description): ?>
                <div class="event-description">
                    <h3>About This Event</h3>
                    <div><?php echo $event->description; ?></div>
                </div>
                <?php endif; ?>

                <!-- Short Description (if different from description) -->
                <?php if($event->short_description && $event->short_description != strip_tags($event->description)): ?>
                <div class="event-description">
                    <h3>Event Summary</h3>
                    <p><?php echo e($event->short_description); ?></p>
                </div>
                <?php endif; ?>

                <!-- Event Gallery -->
                <?php if($galleryImages && $galleryImages->count() > 0): ?>
                <div class="gallery-section">
                    <h3>Event Gallery</h3>
                    <div class="event-gallery-slider">
                        <?php if($type === 'temple'): ?>
                            <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="gallery-slide">
                                <a href="<?php echo e(asset('backend/uploads/temple_event/gallery/' . $gallery->picture)); ?>" class="gallery-item gallery-zoom">
                                    <img src="<?php echo e(asset('backend/uploads/temple_event/gallery/' . $gallery->picture)); ?>" alt="Event Gallery">
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="gallery-slide">
                                <a href="<?php echo e(asset('backend/uploads/organization_event/gallery/' . $gallery->picture)); ?>" class="gallery-item gallery-zoom">
                                    <img src="<?php echo e(asset('backend/uploads/organization_event/gallery/' . $gallery->picture)); ?>" alt="Event Gallery">
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Event Gallery Slider
        var gallerySlider = $('.event-gallery-slider');
        if (gallerySlider.length > 0) {
            var slideCount = gallerySlider.children('.gallery-slide').length;

            gallerySlider.slick({
                infinite: slideCount > 3,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                dots: true,
                centerMode: false,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        }

        // Magnific Popup for Gallery
        $('.gallery-zoom').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-with-zoom',
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/pages/events/event_details_unified.blade.php ENDPATH**/ ?>