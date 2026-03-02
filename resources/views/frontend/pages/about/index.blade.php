@extends('frontend.layouts.default')

@section('title', 'About Us - Bengali Hindu Unity')

@section('stylesheet')
<style>
    .about-gallery {
        position: relative;
        overflow: hidden;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-bottom: 20px;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }

    .gallery-item:nth-child(1) { animation-delay: 0.1s; }
    .gallery-item:nth-child(2) { animation-delay: 0.2s; }
    .gallery-item:nth-child(3) { animation-delay: 0.3s; }
    .gallery-item:nth-child(4) { animation-delay: 0.4s; }

    .gallery-item.hidden-item {
        display: none;
        animation: fadeInUp 0.5s ease forwards;
    }

    .gallery-item.show {
        display: block;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .gallery-item img {
        width: 100%;
        height: 270px;
        object-fit: cover;
        transition: transform 0.5s ease;
        display: block;
    }

    .gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .gallery-item:hover img {
        transform: scale(1.1);
    }

    .show-more-btn {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        margin-top: 10px;
    }

    .show-more-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
    }

    .show-more-btn:focus {
        outline: none;
    }

    .show-more-btn i {
        margin-left: 5px;
        transition: transform 0.3s ease;
    }

    .show-more-btn.active i {
        transform: rotate(180deg);
    }

    .gallery-count-badge {
        background: rgba(255, 107, 53, 0.9);
        color: white;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 12px;
        font-weight: 600;
        margin-left: 8px;
    }

    /* Gallery Modal Styles */
    .gallery-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.95);
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .gallery-modal.active {
        display: block;
    }

    .modal-content-wrapper {
        position: relative;
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
    }

    .modal-close {
        position: absolute;
        top: 20px;
        right: 35px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        z-index: 10000;
        transition: color 0.3s ease;
    }

    .modal-close:hover,
    .modal-close:focus {
        color: #ff6b35;
    }

    .modal-gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        padding: 20px;
    }

    .modal-gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(255, 255, 255, 0.1);
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .modal-gallery-item:hover {
        transform: scale(1.05);
    }

    .modal-gallery-item img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        display: block;
    }

    .modal-title {
        color: white;
        text-align: center;
        font-size: 28px;
        margin-bottom: 30px;
        font-weight: 600;
    }

    /* =============================================
    GALLERY — RESPONSIVE OVERRIDES
       ============================================= */

    /* Tablet portrait (≤991px): gallery moves above text, full width */
    @media (max-width: 991.98px) {
        .about-gallery {
            margin-bottom: 30px;
        }

        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .gallery-item img {
            height: 220px;
        }

        .modal-gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 15px;
            padding: 15px;
        }

        .modal-gallery-item img {
            height: 240px;
        }

        .modal-title {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .modal-content-wrapper {
            margin: 30px auto;
            padding: 15px;
        }

        .modal-close {
            top: 10px;
            right: 20px;
            font-size: 32px;
        }
    }

    /* Mobile landscape (≤767px) */
    @media (max-width: 767.98px) {
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .gallery-item img {
            height: 180px;
        }

        .gallery-item:hover {
            transform: none;
        }

        .show-more-btn {
            padding: 10px 22px;
            font-size: 14px;
        }

        .gallery-count-badge {
            padding: 4px 10px;
            font-size: 11px;
        }

        .modal-gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            padding: 10px;
        }

        .modal-gallery-item img {
            height: 180px;
        }

        .modal-title {
            font-size: 18px;
            padding: 0 10px;
        }

        .modal-content-wrapper {
            margin: 20px auto;
            padding: 10px;
        }

        .modal-close {
            top: 8px;
            right: 15px;
            font-size: 28px;
        }
    }

    /* Mobile portrait (≤575px) */
    @media (max-width: 575.98px) {
        .gallery-grid {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .gallery-item img {
            height: 200px;
        }

        .show-more-btn {
            padding: 8px 18px;
            font-size: 13px;
        }

        .gallery-count-badge {
            padding: 3px 8px;
            font-size: 10px;
            margin-left: 6px;
        }

        .modal-gallery-grid {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .modal-gallery-item img {
            height: 220px;
        }

        .modal-title {
            font-size: 16px;
        }
    }

    /* Very small screens (≤399px) */
    @media (max-width: 399.98px) {
        .gallery-item img {
            height: 170px;
        }

        .show-more-btn {
            padding: 7px 14px;
            font-size: 12px;
        }

        .modal-gallery-item img {
            height: 180px;
        }
    }

    /* About page subtitle — template color */
    .section-title .subtitle {
        color: #dc8a45;
    }
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">About Us</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
@if($about)
<!-- about Start -->
<section class="section">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-1 order-2">
                <div class="about-gallery">
                    @if(!empty($about->gallery) && count($about->gallery) > 0)
                        <div class="gallery-grid" id="galleryGrid">
                            @foreach($about->gallery as $index => $image)
                                @if($index < 4)
                                    <div class="gallery-item" data-index="{{ $index }}">
                                        <img src="{{ asset('storage/' . $image) }}" alt="{{ $about->title }} - Gallery Image {{ $index + 1 }}" loading="lazy">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        @if(count($about->gallery) > 4)
                            <div class="text-center">
                                <button type="button" class="show-more-btn" id="showMoreBtn" onclick="openGalleryModal()">
                                    <span id="btnText">View All Photos</span>
                                    <span class="gallery-count-badge" id="countBadge">{{ count($about->gallery) }}</span>
                                    <i class="fas fa-images"></i>
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="gallery-grid">
                            <div class="gallery-item">
                                <img src="https://placehold.co/270x300" alt="placeholder">
                            </div>
                            <div class="gallery-item">
                                <img src="https://placehold.co/270x300" alt="placeholder">
                            </div>
                            <div class="gallery-item">
                                <img src="https://placehold.co/270x300" alt="placeholder">
                            </div>
                            <div class="gallery-item">
                                <img src="https://placehold.co/270x300" alt="placeholder">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 order-lg-2 order-1">
                <div class="me-lg-30">
                    <div class="section-title mb-0 text-start">
                        @if($about->subtitle)
                            <p class="subtitle">{{ strtoupper($about->subtitle) }}</p>
                        @endif
                        <h4 class="title">{{ $about->title }}</h4>
                    </div>
                    @if($about->short_description)
                        <p class="blockquote bg-transparent">{{ $about->short_description }}</p>
                    @endif

                    @if($about->who_we_are_title || $about->who_we_are_content)
                        <div class="sigma_icon-block icon-block-3">
                            <div class="icon-wrapper">
                                <img src="{{ asset('frontend/assets/img/textures/icons/1.png') }}" alt="">
                            </div>
                            <div class="sigma_icon-block-content">
                                <h5>{{ $about->who_we_are_title ?? 'Who we are' }}</h5>
                                <div>{!! $about->who_we_are_content !!}</div>
                            </div>
                        </div>
                    @endif

                    @if($about->mission_title || $about->mission_content)
                        <div class="sigma_icon-block icon-block-3">
                            <div class="icon-wrapper">
                                <img src="{{ asset('frontend/assets/img/textures/icons/2.png') }}" alt="">
                            </div>
                            <div class="sigma_icon-block-content">
                                <h5>{{ $about->mission_title ?? 'Our Mission' }}</h5>
                                <div>{!! $about->mission_content !!}</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>
<!-- about End -->
@else
<!-- No content available -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    <h4>About content is not available at the moment.</h4>
                    <p>Please check back later.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Gallery Modal -->
@if($about && !empty($about->gallery) && count($about->gallery) > 4)
<div id="galleryModal" class="gallery-modal">
    <span class="modal-close" onclick="closeGalleryModal()">&times;</span>
    <div class="modal-content-wrapper">
        <h2 class="modal-title">{{ $about->title }} - Gallery ({{ count($about->gallery) }} Photos)</h2>
        <div class="modal-gallery-grid">
            @foreach($about->gallery as $index => $image)
                <div class="modal-gallery-item" data-index="{{ $index }}">
                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $about->title }} - Photo {{ $index + 1 }}" loading="lazy">
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection

@section('custom_scripts')
<script>
function openGalleryModal() {
    const modal = document.getElementById('galleryModal');
    if (modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

function closeGalleryModal() {
    const modal = document.getElementById('galleryModal');
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
}

// Close modal when clicking outside the content
document.addEventListener('click', function(event) {
    const modal = document.getElementById('galleryModal');
    if (event.target === modal) {
        closeGalleryModal();
    }
});

// Close modal on ESC key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeGalleryModal();
    }
});
</script>
@endsection
