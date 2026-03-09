@extends('frontend.layouts.default')

@section('title', 'Contact Us - Bengali Hindu Unity')

@section('stylesheet')
<style>
    /* Map Section */
    .sigma_map-wrapper {
        margin-top: 0;
        margin-bottom: 0;
        height: 600px;
        width: 100%;
        position: relative;
    }

    .sigma_map-wrapper iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    /* Contact Form Section with Negative Margin */
    .contact-form-overlap {
        margin-top: -150px;
        position: relative;
        z-index: 10;
        padding-bottom: 80px;
    }

    .contact-wrapper {
        background: #fff;
        padding: 50px 80px;
        border-radius: 0;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        max-width: 1000px;
        margin: 0 auto;
    }

    .section-title {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 40px;
        color: #222;
        position: relative;
        padding-bottom: 15px;
    }

    .section-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: #e76f51;
    }

    .sigma_form-group {
        margin-bottom: 20px;
    }

    .sigma_form-group input,
    .sigma_form-group textarea {
        width: 100%;
        height: 55px;
        border: 1px solid #e0e0e0;
        border-radius: 0;
        padding: 0 20px;
        font-size: 14px;
        color: #666;
        background: #f8f9fa;
        transition: all 0.3s;
    }

    .sigma_form-group input:focus,
    .sigma_form-group textarea:focus {
        border-color: #e76f51;
        outline: none;
        box-shadow: none;
        background: #fff;
    }

    .sigma_form-group input.is-invalid,
    .sigma_form-group textarea.is-invalid {
        border-color: #e74c3c;
        background: #fff5f5;
    }

    .sigma_form-group textarea {
        height: 140px;
        padding: 15px 20px;
        resize: none;
    }

    .sigma_btn-contact {
        background: linear-gradient(135deg, #d86800 0%, #b85700 100%);
        color: #fff;
        border: none;
        padding: 18px 50px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-block;
        box-shadow: 0 4px 15px rgba(216, 104, 0, 0.3);
    }

    .sigma_btn-contact:hover {
        background: linear-gradient(135deg, #b85700 0%, #9a4600 100%);
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(216, 104, 0, 0.5);
    }

    /* Contact Info Boxes */
    .sigma_info-box {
        text-align: center;
        padding: 40px 30px;
        margin-bottom: 30px;
        background: #fff;
        border: 1px solid #e8e8e8;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .sigma_info-box:hover {
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transform: translateY(-5px);
    }

    .sigma_info-box-inner {
        position: relative;
    }

    .sigma_info-title-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-bottom: 15px;
    }

    .sigma_info-title-wrapper i {
        font-size: 14px;
        color: #e76f51;
    }

    .sigma_info-title-wrapper span {
        font-size: 13px;
        font-weight: 600;
        color: #e76f51;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .sigma_info-box h5 {
        font-size: 22px;
        font-weight: 700;
        color: #222;
        margin-bottom: 20px;
    }

    .sigma_info-description p {
        color: #777;
        font-size: 15px;
        line-height: 1.8;
        margin-bottom: 8px;
    }

    .sigma_info-description p:last-child {
        margin-bottom: 0;
    }

    .sigma_info-icon {
        width: 90px;
        height: 90px;
        margin: 30px auto 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #e76f51;
        border-radius: 50%;
        transition: all 0.3s;
    }

    .sigma_info-icon i {
        font-size: 40px;
        color: #e76f51;
    }

    .sigma_info-box:hover .sigma_info-icon {
        background: #e76f51;
        transform: scale(1.1);
    }

    .sigma_info-box:hover .sigma_info-icon i {
        color: #fff;
    }

    @media (max-width: 991px) {
        .contact-wrapper {
            padding: 40px 50px;
        }

        .section-title {
            font-size: 28px;
        }

        .contact-form-overlap {
            margin-top: -120px;
        }

        .sigma_map-wrapper {
            height: 500px;
        }
    }

    @media (max-width: 767px) {
        .contact-wrapper {
            padding: 30px 20px;
        }

        .section-title {
            font-size: 24px;
        }

        .sigma_info-box {
            margin-bottom: 30px;
        }

        .contact-form-overlap {
            margin-top: -80px;
        }

        .sigma_map-wrapper {
            height: 400px;
        }
    }

    /* ===== Sub-head banner & breadcrumb — Responsive ===== */

    /* Small Laptop (1024px – 1365px) */
    @media (min-width: 1024px) and (max-width: 1365px) {
        .sub-head-banner {
            height: 260px;
        }
        .header-img-text {
            font-size: 1.3rem;
            line-height: 1.35;
        }
    }

    /* Tablet (768px – 1023px) */
    @media (min-width: 768px) and (max-width: 1023px) {
        .sub-head-banner {
            height: 250px;
        }
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
            padding: 20px 28px;
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
            padding: 18px 24px;
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
            padding: 16px 20px;
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
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">Contact Us</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<!-- Map Section -->
<div class="sigma_map-wrapper">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.8223207034!2d90.25487647968428!3d23.78106706485271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1674745745678!5m2!1sen!2sbd" allowfullscreen="" loading="lazy"></iframe>
</div>

<!-- Contact Form Section with Negative Margin -->
<div class="contact-form-overlap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-wrapper">
                    <form action="{{ route('frontend.contact.submit') }}" method="POST" id="contactForm" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="sigma_form-group">
                                    <input type="text" name="full_name" placeholder="Full Name" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="sigma_form-group">
                                    <input type="email" name="email" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="sigma_form-group">
                                    <input type="text" name="subject" placeholder="Subject" required>
                                </div>
                            </div>
                        </div>
                        <div class="sigma_form-group">
                            <textarea name="message" placeholder="Enter Message" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="sigma_btn-contact" name="button">Submit Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Info Section -->
<div class="section section-padding pt-0">
    <div class="container">
        <div class="row">
            <!-- Email Box -->
            <div class="col-lg-4">
                <div class="sigma_info-box">
                    <div class="sigma_info-box-inner">
                        <div class="sigma_info-title-wrapper">
                            <span>SEND EMAIL</span>
                            <i class="far fa-arrow-right"></i>
                        </div>
                        <h5>Email Address</h5>
                        <div class="sigma_info-description">
                            <p>info@example.com</p>
                            <p>info@support.com</p>
                        </div>
                        <div class="sigma_info-icon">
                            <i class="far fa-envelope"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Phone Box -->
            <div class="col-lg-4">
                <div class="sigma_info-box">
                    <div class="sigma_info-box-inner">
                        <div class="sigma_info-title-wrapper">
                            <span>CALL US NOW</span>
                            <i class="far fa-arrow-right"></i>
                        </div>
                        <h5>Phone Number</h5>
                        <div class="sigma_info-description">
                            <p>+123 478 390</p>
                            <p>+489 472 928</p>
                        </div>
                        <div class="sigma_info-icon">
                            <i class="far fa-phone"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Location Box -->
            <div class="col-lg-4">
                <div class="sigma_info-box">
                    <div class="sigma_info-box-inner">
                        <div class="sigma_info-title-wrapper">
                            <span>FIND US HERE</span>
                            <i class="far fa-arrow-right"></i>
                        </div>
                        <h5>Location</h5>
                        <div class="sigma_info-description">
                            <p>16/A Daddy Yankee Tower</p>
                            <p>New York, US</p>
                        </div>
                        <div class="sigma_info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_scripts')
<!-- Toastr CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    // Toastr configuration
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    $(document).ready(function() {
        // validation on input
        $('input[name="full_name"]').on('input', function() {
            const value = $(this).val().trim();
            $(this).removeClass('is-invalid');
            $(this).parent().find('.error-message').remove();

            if (value !== '' && value.length < 3) {
                showError(this, 'Full name must be at least 3 characters');
            }
        });

        $('input[name="email"]').on('input', function() {
            const value = $(this).val().trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            $(this).removeClass('is-invalid');
            $(this).parent().find('.error-message').remove();

            if (value !== '' && !emailRegex.test(value)) {
                showError(this, 'Please enter a valid email address');
            }
        });

        $('input[name="subject"]').on('input', function() {
            const value = $(this).val().trim();
            $(this).removeClass('is-invalid');
            $(this).parent().find('.error-message').remove();

            if (value !== '' && value.length < 5) {
                showError(this, 'Subject must be at least 5 characters');
            }
        });

        $('textarea[name="message"]').on('input', function() {
            const value = $(this).val().trim();
            $(this).removeClass('is-invalid');
            $(this).parent().find('.error-message').remove();

            if (value !== '' && value.length < 10) {
                showError(this, 'Message must be at least 10 characters');
            }
        });

        // Form submission
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();

            // Clear previous errors
            $('.error-message').remove();
            $('.is-invalid').removeClass('is-invalid');

            let isValid = true;

            // Full Name validation
            const fullName = $('input[name="full_name"]').val().trim();
            if (fullName === '') {
                showError('input[name="full_name"]', 'Full name is required');
                isValid = false;
            } else if (fullName.length < 3) {
                showError('input[name="full_name"]', 'Full name must be at least 3 characters');
                isValid = false;
            }

            // Email validation
            const email = $('input[name="email"]').val().trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === '') {
                showError('input[name="email"]', 'Email address is required');
                isValid = false;
            } else if (!emailRegex.test(email)) {
                showError('input[name="email"]', 'Please enter a valid email address');
                isValid = false;
            }

            // Subject validation
            const subject = $('input[name="subject"]').val().trim();
            if (subject === '') {
                showError('input[name="subject"]', 'Subject is required');
                isValid = false;
            } else if (subject.length < 5) {
                showError('input[name="subject"]', 'Subject must be at least 5 characters');
                isValid = false;
            }

            // Message validation
            const message = $('textarea[name="message"]').val().trim();
            if (message === '') {
                showError('textarea[name="message"]', 'Message is required');
                isValid = false;
            } else if (message.length < 10) {
                showError('textarea[name="message"]', 'Message must be at least 10 characters');
                isValid = false;
            }

            // If validation passes, submit the form
            if (isValid) {
                const submitBtn = $(this).find('button[type="submit"]');
                const originalText = submitBtn.text();

                // Disable button and show loading
                submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Submitting...');

                // Submit form via AJAX
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            // Show success toaster
                            toastr.success(response.message, 'Success!');

                            // Reset form
                            $('#contactForm')[0].reset();
                        } else {
                            toastr.error('Something went wrong. Please try again.', 'Error!');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            // Validation errors from server
                            const errors = xhr.responseJSON.errors;
                            let errorCount = 0;
                            $.each(errors, function(key, value) {
                                showError('[name="' + key + '"]', value[0]);
                                errorCount++;
                            });
                            toastr.error('Please fix the validation errors.', 'Validation Error!');
                        } else {
                            // Other errors
                            const errorMessage = xhr.responseJSON?.message || 'Something went wrong. Please try again.';
                            toastr.error(errorMessage, 'Error!');
                        }
                    },
                    complete: function() {
                        // Re-enable button
                        submitBtn.prop('disabled', false).html(originalText);
                    }
                });
            } else {
                toastr.warning('Please fill all required fields correctly.', 'Validation Error!');
            }
        });

        // Function to show error message
        function showError(selector, message) {
            const element = $(selector);
            element.addClass('is-invalid');
            element.parent().append('<div class="error-message" style="color: #e74c3c; font-size: 13px; margin-top: 5px; animation: fadeIn 0.3s;"><i class="fas fa-exclamation-circle"></i> ' + message + '</div>');
        }
    });
</script>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-5px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .error-message {
        display: flex;
        align-items: center;
        gap: 5px;
    }
</style>
@endsection
