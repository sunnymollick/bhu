<footer class="sigma_footer footer-2">
    <div class="sigma_footer-middle">
        <div class="container">
            <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer-widget">
                <h5 class="widget-title">About Us</h5>
                <p class="mb-4"><?php echo e($footerAbout?->short_description ?? ''); ?></p>
                <div class="d-flex align-items-center justify-content-md-start justify-content-center">
                <i class="far fa-phone custom-primary me-3"></i>
                <span><?php echo e($siteSettings->primary_phone ?? ''); ?></span>
                </div>
                <div class="d-flex align-items-center justify-content-md-start justify-content-center mt-2">
                <i class="far fa-envelope custom-primary me-3"></i>
                <span><?php echo e($siteSettings->primary_email ?? ''); ?></span>
                </div>
                <div class="d-flex align-items-center justify-content-md-start justify-content-center mt-2">
                <i class="far fa-map-marker custom-primary me-3"></i>
                <span><?php echo e($siteSettings->address ?? ''); ?></span>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 footer-widget">
                <h5 class="widget-title">Information</h5>
                <ul>
                <li> <a href="#">Item 1</a> </li>
                <li> <a href="#">Item 2</a> </li>
                <li> <a href="#">Item 3</a> </li>
                <li> <a href="#">Item 4</a> </li>
                <li> <a href="#">Item 5</a> </li>
                </ul>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 footer-widget">
                <h5 class="widget-title">Others</h5>
                <ul>
                <li> <a href="#">Item 1</a> </li>
                <li> <a href="#">Item 2</a> </li>
                <li> <a href="#">Item 3</a> </li>
                <li> <a href="#">Item 4</a> </li>
                <li> <a href="#">Item 5</a> </li>
                </ul>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 d-none d-lg-block footer-widget widget-recent-posts">
                <h5 class="widget-title">Recent Posts</h5>
                <article class="sigma_recent-post">
                <a href="temples-details.html"><img src="<?php echo e(asset('frontend/assets/img/blog/sm/1.jpg')); ?>" alt="post"></a>
                <div class="sigma_recent-post-body">
                    <a href="temples-details.html"> <i class="far fa-calendar"></i> May 20, 2024</a>
                    <h6> <a href="temples-details.html">As we've all discovered by now, the world can change</a> </h6>
                </div>
                </article>
                <article class="sigma_recent-post">
                <a href="temples-details.html"><img src="<?php echo e(asset('frontend/assets/img/blog/sm/2.jpg')); ?>" alt="post"></a>
                <div class="sigma_recent-post-body">
                    <a href="temples-details.html"> <i class="far fa-calendar"></i> May 20, 2024</a>
                    <h6> <a href="temples-details.html">Testimony love offering so blessed</a> </h6>
                </div>
                </article>
                <article class="sigma_recent-post">
                <a href="temples-details.html"><img src="<?php echo e(asset('frontend/assets/img/blog/sm/3.jpg')); ?>" alt="post"></a>
                <div class="sigma_recent-post-body">
                    <a href="temples-details.html"> <i class="far fa-calendar"></i> May 20, 2024</a>
                    <h6> <a href="temples-details.html">As we've all discovered by now, the world can change</a> </h6>
                </div>
                </article>
            </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="sigma_footer-bottom">
        <div class="container-fluid">
            <div class="sigma_footer-copyright">
            <p> Copyright &copy; Bengali Hindu Unity - <a href="#" class="custom-primary"><?php echo e(date('Y')); ?></a> </p>
            </div>
            <div class="sigma_footer-logo">
            <img class="footer-logo" width="208" height="60" src="<?php echo e(asset('frontend/assets/img/generated-image (1).png')); ?>" alt="logo">
            </div>
            <ul class="sigma_sm square light">
            <li>
                <a href="<?php echo e($siteSettings->facebook_url ?? '#'); ?>" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo e($siteSettings->linkedin_url ?? '#'); ?>" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-linkedin-in"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo e($siteSettings->x_url ?? '#'); ?>" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo e($siteSettings->youtube_url ?? '#'); ?>" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-youtube"></i>
                </a>
            </li>
            </ul>
        </div>
    </div>

</footer>
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/includes/footer.blade.php ENDPATH**/ ?>