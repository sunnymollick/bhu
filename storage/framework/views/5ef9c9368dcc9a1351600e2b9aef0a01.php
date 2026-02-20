<?php $__env->startSection('title', 'Register - Bengali Hindu Unity'); ?>

<?php $__env->startSection('stylesheet'); ?>
<style>
    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    .is-invalid {
        border-color: #dc3545;
    }

    .sigma_btn-custom.primary {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        color: #fff;
    }

    .sigma_btn-custom.primary:hover {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        transform: translateY(-2px);
    }

    /* Custom File Input Styling */
    .custom-file-upload {
        position: relative;
        overflow: hidden;
    }

    .custom-file-upload input[type="file"] {
        position: absolute;
        left: -9999px;
    }

    .file-upload-label {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        background: #f8f9fa;
        border: 2px dashed #dee2e6;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-upload-label:hover {
        background: #e9ecef;
        border-color: #adb5bd;
    }

    .file-upload-label.has-file {
        background: #e8f5e9;
        border-color: #4caf50;
        border-style: solid;
    }

    .file-upload-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        border-radius: 6px;
        margin-right: 12px;
        font-size: 20px;
        color: #6c757d;
    }

    .file-upload-label.has-file .file-upload-icon {
        background: #4caf50;
        color: #fff;
    }

    .file-upload-text {
        flex: 1;
    }

    .file-upload-text .file-name {
        font-weight: 600;
        color: #495057;
        margin-bottom: 2px;
    }

    .file-upload-text .file-info {
        font-size: 0.875rem;
        color: #6c757d;
    }

    .file-upload-label.has-file .file-upload-text .file-name {
        color: #2e7d32;
    }

    /* Disabled select fields styling */
    select.form-control:disabled {
        background-color: #e9ecef;
        cursor: not-allowed;
        opacity: 0.6;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subheader'); ?>
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">Register</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="<?php echo e(route('frontend.index')); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Register Start -->
<div class="section">
    <div class="container">
        <form method="post" action="<?php echo e(route('auth.register.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="section-title text-center">
                    <h4 class="title">Register</h4>
                </div>
                <div class="row">
                    <div class="form-group col-xl-6">
                        <label>First Name <span class="text-danger">*</span></label>
                        <input type="text" placeholder="First Name" name="fname" class="form-control <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('fname')); ?>" required minlength="2">
                        <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-6">
                        <label>Last Name <span class="text-danger">*</span></label>
                        <input type="text" placeholder="Last Name" name="lname" class="form-control <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('lname')); ?>" required minlength="2">
                        <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-6">
                        <label>Email Address <span class="text-danger">*</span></label>
                        <input type="email" placeholder="Email Address" name="email" id="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" required>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-6">
                        <label>Confirm Email Address <span class="text-danger">*</span></label>
                        <input type="email" placeholder="Confirm Email Address" name="confirm_email" id="confirm_email" class="form-control <?php $__errorArgs = ['confirm_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('confirm_email')); ?>" required>
                        <?php $__errorArgs = ['confirm_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div id="email_match_error" class="invalid-feedback" style="display: none;">Emails do not match</div>
                    </div>
                    <div class="form-group col-xl-6">
                        <label>Phone Number <span class="text-danger">*</span></label>
                        <input type="text" placeholder="Phone Number" name="contact_no" id="contact_no" class="form-control <?php $__errorArgs = ['contact_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('contact_no')); ?>" required>
                        <?php $__errorArgs = ['contact_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-6">
                        <label>Confirm Phone Number <span class="text-danger">*</span></label>
                        <input type="text" placeholder="Confirm Phone Number" name="confirm_contact_no" id="confirm_contact_no" class="form-control <?php $__errorArgs = ['confirm_contact_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('confirm_contact_no')); ?>" required>
                        <?php $__errorArgs = ['confirm_contact_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div id="phone_match_error" class="invalid-feedback" style="display: none;">Phone numbers do not match</div>
                    </div>
                    <div class="form-group col-xl-6">
                        <label>Password <span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="password" placeholder="Enter Password" name="password" id="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            <span toggle="#password" class="fa fa-eye-slash field-icon toggle-password" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;"></span>
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div id="password_strength" class="mt-2" style="display: none;">
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                            </div>
                            <small id="password_strength_text" class="text-muted"></small>
                        </div>
                        <div id="password_requirements" class="mt-2" style="display: none;">
                            <small class="text-muted d-block mb-1"><strong>Password Requirements:</strong></small>
                            <small id="req_length" class="d-block" style="color: #dc3545;">✗ Minimum 8 characters</small>
                            <small id="req_lowercase" class="d-block" style="color: #dc3545;">✗ At least one lowercase letter</small>
                            <small id="req_uppercase" class="d-block" style="color: #dc3545;">✗ At least one uppercase letter</small>
                            <small id="req_number" class="d-block" style="color: #dc3545;">✗ At least one number</small>
                            <small id="req_special" class="d-block" style="color: #dc3545;">✗ At least one special character (@$!%*#?&)</small>
                        </div>
                    </div>
                    <div class="form-group col-xl-6">
                        <label>Confirm Password <span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="password" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            <span toggle="#password_confirmation" class="fa fa-eye-slash field-icon toggle-password" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;"></span>
                        </div>
                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div id="password_match_error" class="invalid-feedback" style="display: none;">Passwords do not match</div>
                    </div>
                    <div class="form-group col-xl-12">
                        <label>Company Name</label>
                        <input type="text" placeholder="Company Name (Optional)" name="company_name" class="form-control <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('company_name')); ?>">
                        <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-6">
                        <label>Country <span class="text-danger">*</span></label>
                        <select class="form-control <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="country" id="country" required>
                        <option value="">Select a Country</option>
                        <option value="Afghanistan" <?php echo e(old('country') == 'Afghanistan' ? 'selected' : ''); ?>>Afghanistan</option>
                        <option value="Åland Islands" <?php echo e(old('country') == 'Åland Islands' ? 'selected' : ''); ?>>Åland Islands</option>
                        <option value="Albania" <?php echo e(old('country') == 'Albania' ? 'selected' : ''); ?>>Albania</option>
                        <option value="Algeria" <?php echo e(old('country') == 'Algeria' ? 'selected' : ''); ?>>Algeria</option>
                        <option value="American Samoa" <?php echo e(old('country') == 'American Samoa' ? 'selected' : ''); ?>>American Samoa</option>
                        <option value="Andorra" <?php echo e(old('country') == 'Andorra' ? 'selected' : ''); ?>>Andorra</option>
                        <option value="Angola" <?php echo e(old('country') == 'Angola' ? 'selected' : ''); ?>>Angola</option>
                        <option value="Anguilla" <?php echo e(old('country') == 'Anguilla' ? 'selected' : ''); ?>>Anguilla</option>
                        <option value="Antarctica" <?php echo e(old('country') == 'Antarctica' ? 'selected' : ''); ?>>Antarctica</option>
                        <option value="Antigua and Barbuda" <?php echo e(old('country') == 'Antigua and Barbuda' ? 'selected' : ''); ?>>Antigua and Barbuda</option>
                        <option value="Argentina" <?php echo e(old('country') == 'Argentina' ? 'selected' : ''); ?>>Argentina</option>
                        <option value="Armenia" <?php echo e(old('country') == 'Armenia' ? 'selected' : ''); ?>>Armenia</option>
                        <option value="Aruba" <?php echo e(old('country') == 'Aruba' ? 'selected' : ''); ?>>Aruba</option>
                        <option value="Australia" <?php echo e(old('country') == 'Australia' ? 'selected' : ''); ?>>Australia</option>
                        <option value="Austria" <?php echo e(old('country') == 'Austria' ? 'selected' : ''); ?>>Austria</option>
                        <option value="Azerbaijan" <?php echo e(old('country') == 'Azerbaijan' ? 'selected' : ''); ?>>Azerbaijan</option>
                        <option value="Bahamas" <?php echo e(old('country') == 'Bahamas' ? 'selected' : ''); ?>>Bahamas</option>
                        <option value="Bahrain" <?php echo e(old('country') == 'Bahrain' ? 'selected' : ''); ?>>Bahrain</option>
                        <option value="Bangladesh" <?php echo e(old('country') == 'Bangladesh' ? 'selected' : ''); ?>>Bangladesh</option>
                        <option value="Barbados" <?php echo e(old('country') == 'Barbados' ? 'selected' : ''); ?>>Barbados</option>
                        <option value="Belarus" <?php echo e(old('country') == 'Belarus' ? 'selected' : ''); ?>>Belarus</option>
                        <option value="Belgium" <?php echo e(old('country') == 'Belgium' ? 'selected' : ''); ?>>Belgium</option>
                        <option value="Belize" <?php echo e(old('country') == 'Belize' ? 'selected' : ''); ?>>Belize</option>
                        <option value="Benin" <?php echo e(old('country') == 'Benin' ? 'selected' : ''); ?>>Benin</option>
                        <option value="Bermuda" <?php echo e(old('country') == 'Bermuda' ? 'selected' : ''); ?>>Bermuda</option>
                        <option value="Bhutan" <?php echo e(old('country') == 'Bhutan' ? 'selected' : ''); ?>>Bhutan</option>
                        <option value="Bolivia" <?php echo e(old('country') == 'Bolivia' ? 'selected' : ''); ?>>Bolivia</option>
                        <option value="Bosnia and Herzegovina" <?php echo e(old('country') == 'Bosnia and Herzegovina' ? 'selected' : ''); ?>>Bosnia and Herzegovina</option>
                        <option value="Botswana" <?php echo e(old('country') == 'Botswana' ? 'selected' : ''); ?>>Botswana</option>
                        <option value="Bouvet Island" <?php echo e(old('country') == 'Bouvet Island' ? 'selected' : ''); ?>>Bouvet Island</option>
                        <option value="Brazil" <?php echo e(old('country') == 'Brazil' ? 'selected' : ''); ?>>Brazil</option>
                        <option value="British Indian Ocean Territory" <?php echo e(old('country') == 'British Indian Ocean Territory' ? 'selected' : ''); ?>>British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam" <?php echo e(old('country') == 'Brunei Darussalam' ? 'selected' : ''); ?>>Brunei Darussalam</option>
                        <option value="Bulgaria" <?php echo e(old('country') == 'Bulgaria' ? 'selected' : ''); ?>>Bulgaria</option>
                        <option value="Burkina Faso" <?php echo e(old('country') == 'Burkina Faso' ? 'selected' : ''); ?>>Burkina Faso</option>
                        <option value="Burundi" <?php echo e(old('country') == 'Burundi' ? 'selected' : ''); ?>>Burundi</option>
                        <option value="Cambodia" <?php echo e(old('country') == 'Cambodia' ? 'selected' : ''); ?>>Cambodia</option>
                        <option value="Cameroon" <?php echo e(old('country') == 'Cameroon' ? 'selected' : ''); ?>>Cameroon</option>
                        <option value="Canada" <?php echo e(old('country') == 'Canada' ? 'selected' : ''); ?>>Canada</option>
                        <option value="Cape Verde" <?php echo e(old('country') == 'Cape Verde' ? 'selected' : ''); ?>>Cape Verde</option>
                        <option value="Cayman Islands" <?php echo e(old('country') == 'Cayman Islands' ? 'selected' : ''); ?>>Cayman Islands</option>
                        <option value="Central African Republic" <?php echo e(old('country') == 'Central African Republic' ? 'selected' : ''); ?>>Central African Republic</option>
                        <option value="Chad" <?php echo e(old('country') == 'Chad' ? 'selected' : ''); ?>>Chad</option>
                        <option value="Chile" <?php echo e(old('country') == 'Chile' ? 'selected' : ''); ?>>Chile</option>
                        <option value="China" <?php echo e(old('country') == 'China' ? 'selected' : ''); ?>>China</option>
                        <option value="Christmas Island" <?php echo e(old('country') == 'Christmas Island' ? 'selected' : ''); ?>>Christmas Island</option>
                        <option value="Cocos (Keeling) Islands" <?php echo e(old('country') == 'Cocos (Keeling) Islands' ? 'selected' : ''); ?>>Cocos (Keeling) Islands</option>
                        <option value="Colombia" <?php echo e(old('country') == 'Colombia' ? 'selected' : ''); ?>>Colombia</option>
                        <option value="Comoros" <?php echo e(old('country') == 'Comoros' ? 'selected' : ''); ?>>Comoros</option>
                        <option value="Congo" <?php echo e(old('country') == 'Congo' ? 'selected' : ''); ?>>Congo</option>
                        <option value="Congo, The Democratic Republic of The" <?php echo e(old('country') == 'Congo, The Democratic Republic of The' ? 'selected' : ''); ?>>Congo, The Democratic Republic of The</option>
                        <option value="Cook Islands" <?php echo e(old('country') == 'Cook Islands' ? 'selected' : ''); ?>>Cook Islands</option>
                        <option value="Costa Rica" <?php echo e(old('country') == 'Costa Rica' ? 'selected' : ''); ?>>Costa Rica</option>
                        <option value="Cote D'ivoire" <?php echo e(old('country') == "Cote D'ivoire" ? 'selected' : ''); ?>>Cote D'ivoire</option>
                        <option value="Croatia" <?php echo e(old('country') == 'Croatia' ? 'selected' : ''); ?>>Croatia</option>
                        <option value="Cuba" <?php echo e(old('country') == 'Cuba' ? 'selected' : ''); ?>>Cuba</option>
                        <option value="Cyprus" <?php echo e(old('country') == 'Cyprus' ? 'selected' : ''); ?>>Cyprus</option>
                        <option value="Czech Republic" <?php echo e(old('country') == 'Czech Republic' ? 'selected' : ''); ?>>Czech Republic</option>
                        <option value="Denmark" <?php echo e(old('country') == 'Denmark' ? 'selected' : ''); ?>>Denmark</option>
                        <option value="Djibouti" <?php echo e(old('country') == 'Djibouti' ? 'selected' : ''); ?>>Djibouti</option>
                        <option value="Dominica" <?php echo e(old('country') == 'Dominica' ? 'selected' : ''); ?>>Dominica</option>
                        <option value="Dominican Republic" <?php echo e(old('country') == 'Dominican Republic' ? 'selected' : ''); ?>>Dominican Republic</option>
                        <option value="Ecuador" <?php echo e(old('country') == 'Ecuador' ? 'selected' : ''); ?>>Ecuador</option>
                        <option value="Egypt" <?php echo e(old('country') == 'Egypt' ? 'selected' : ''); ?>>Egypt</option>
                        <option value="El Salvador" <?php echo e(old('country') == 'El Salvador' ? 'selected' : ''); ?>>El Salvador</option>
                        <option value="Equatorial Guinea" <?php echo e(old('country') == 'Equatorial Guinea' ? 'selected' : ''); ?>>Equatorial Guinea</option>
                        <option value="Eritrea" <?php echo e(old('country') == 'Eritrea' ? 'selected' : ''); ?>>Eritrea</option>
                        <option value="Estonia" <?php echo e(old('country') == 'Estonia' ? 'selected' : ''); ?>>Estonia</option>
                        <option value="Ethiopia" <?php echo e(old('country') == 'Ethiopia' ? 'selected' : ''); ?>>Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)" <?php echo e(old('country') == 'Falkland Islands (Malvinas)' ? 'selected' : ''); ?>>Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands" <?php echo e(old('country') == 'Faroe Islands' ? 'selected' : ''); ?>>Faroe Islands</option>
                        <option value="Fiji" <?php echo e(old('country') == 'Fiji' ? 'selected' : ''); ?>>Fiji</option>
                        <option value="Finland" <?php echo e(old('country') == 'Finland' ? 'selected' : ''); ?>>Finland</option>
                        <option value="France" <?php echo e(old('country') == 'France' ? 'selected' : ''); ?>>France</option>
                        <option value="French Guiana" <?php echo e(old('country') == 'French Guiana' ? 'selected' : ''); ?>>French Guiana</option>
                        <option value="French Polynesia" <?php echo e(old('country') == 'French Polynesia' ? 'selected' : ''); ?>>French Polynesia</option>
                        <option value="French Southern Territories" <?php echo e(old('country') == 'French Southern Territories' ? 'selected' : ''); ?>>French Southern Territories</option>
                        <option value="Gabon" <?php echo e(old('country') == 'Gabon' ? 'selected' : ''); ?>>Gabon</option>
                        <option value="Gambia" <?php echo e(old('country') == 'Gambia' ? 'selected' : ''); ?>>Gambia</option>
                        <option value="Georgia" <?php echo e(old('country') == 'Georgia' ? 'selected' : ''); ?>>Georgia</option>
                        <option value="Germany" <?php echo e(old('country') == 'Germany' ? 'selected' : ''); ?>>Germany</option>
                        <option value="Ghana" <?php echo e(old('country') == 'Ghana' ? 'selected' : ''); ?>>Ghana</option>
                        <option value="Gibraltar" <?php echo e(old('country') == 'Gibraltar' ? 'selected' : ''); ?>>Gibraltar</option>
                        <option value="Greece" <?php echo e(old('country') == 'Greece' ? 'selected' : ''); ?>>Greece</option>
                        <option value="Greenland" <?php echo e(old('country') == 'Greenland' ? 'selected' : ''); ?>>Greenland</option>
                        <option value="Grenada" <?php echo e(old('country') == 'Grenada' ? 'selected' : ''); ?>>Grenada</option>
                        <option value="Guadeloupe" <?php echo e(old('country') == 'Guadeloupe' ? 'selected' : ''); ?>>Guadeloupe</option>
                        <option value="Guam" <?php echo e(old('country') == 'Guam' ? 'selected' : ''); ?>>Guam</option>
                        <option value="Guatemala" <?php echo e(old('country') == 'Guatemala' ? 'selected' : ''); ?>>Guatemala</option>
                        <option value="Guernsey" <?php echo e(old('country') == 'Guernsey' ? 'selected' : ''); ?>>Guernsey</option>
                        <option value="Guinea" <?php echo e(old('country') == 'Guinea' ? 'selected' : ''); ?>>Guinea</option>
                        <option value="Guinea-bissau" <?php echo e(old('country') == 'Guinea-bissau' ? 'selected' : ''); ?>>Guinea-bissau</option>
                        <option value="Guyana" <?php echo e(old('country') == 'Guyana' ? 'selected' : ''); ?>>Guyana</option>
                        <option value="Haiti" <?php echo e(old('country') == 'Haiti' ? 'selected' : ''); ?>>Haiti</option>
                        <option value="Heard Island and Mcdonald Islands" <?php echo e(old('country') == 'Heard Island and Mcdonald Islands' ? 'selected' : ''); ?>>Heard Island and Mcdonald Islands</option>
                        <option value="Holy See (Vatican City State)" <?php echo e(old('country') == 'Holy See (Vatican City State)' ? 'selected' : ''); ?>>Holy See (Vatican City State)</option>
                        <option value="Honduras" <?php echo e(old('country') == 'Honduras' ? 'selected' : ''); ?>>Honduras</option>
                        <option value="Hong Kong" <?php echo e(old('country') == 'Hong Kong' ? 'selected' : ''); ?>>Hong Kong</option>
                        <option value="Hungary" <?php echo e(old('country') == 'Hungary' ? 'selected' : ''); ?>>Hungary</option>
                        <option value="Iceland" <?php echo e(old('country') == 'Iceland' ? 'selected' : ''); ?>>Iceland</option>
                        <option value="India" <?php echo e(old('country') == 'India' ? 'selected' : ''); ?>>India</option>
                        <option value="Indonesia" <?php echo e(old('country') == 'Indonesia' ? 'selected' : ''); ?>>Indonesia</option>
                        <option value="Iran, Islamic Republic of" <?php echo e(old('country') == 'Iran, Islamic Republic of' ? 'selected' : ''); ?>>Iran, Islamic Republic of</option>
                        <option value="Iraq" <?php echo e(old('country') == 'Iraq' ? 'selected' : ''); ?>>Iraq</option>
                        <option value="Ireland" <?php echo e(old('country') == 'Ireland' ? 'selected' : ''); ?>>Ireland</option>
                        <option value="Isle of Man" <?php echo e(old('country') == 'Isle of Man' ? 'selected' : ''); ?>>Isle of Man</option>
                        <option value="Israel" <?php echo e(old('country') == 'Israel' ? 'selected' : ''); ?>>Israel</option>
                        <option value="Italy" <?php echo e(old('country') == 'Italy' ? 'selected' : ''); ?>>Italy</option>
                        <option value="Jamaica" <?php echo e(old('country') == 'Jamaica' ? 'selected' : ''); ?>>Jamaica</option>
                        <option value="Japan" <?php echo e(old('country') == 'Japan' ? 'selected' : ''); ?>>Japan</option>
                        <option value="Jersey" <?php echo e(old('country') == 'Jersey' ? 'selected' : ''); ?>>Jersey</option>
                        <option value="Jordan" <?php echo e(old('country') == 'Jordan' ? 'selected' : ''); ?>>Jordan</option>
                        <option value="Kazakhstan" <?php echo e(old('country') == 'Kazakhstan' ? 'selected' : ''); ?>>Kazakhstan</option>
                        <option value="Kenya" <?php echo e(old('country') == 'Kenya' ? 'selected' : ''); ?>>Kenya</option>
                        <option value="Kiribati" <?php echo e(old('country') == 'Kiribati' ? 'selected' : ''); ?>>Kiribati</option>
                        <option value="Korea, Democratic People's Republic of" <?php echo e(old('country') == "Korea, Democratic People's Republic of" ? 'selected' : ''); ?>>Korea, Democratic People's Republic of</option>
                        <option value="Korea, Republic of" <?php echo e(old('country') == 'Korea, Republic of' ? 'selected' : ''); ?>>Korea, Republic of</option>
                        <option value="Kuwait" <?php echo e(old('country') == 'Kuwait' ? 'selected' : ''); ?>>Kuwait</option>
                        <option value="Kyrgyzstan" <?php echo e(old('country') == 'Kyrgyzstan' ? 'selected' : ''); ?>>Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic" <?php echo e(old('country') == "Lao People's Democratic Republic" ? 'selected' : ''); ?>>Lao People's Democratic Republic</option>
                        <option value="Latvia" <?php echo e(old('country') == 'Latvia' ? 'selected' : ''); ?>>Latvia</option>
                        <option value="Lebanon" <?php echo e(old('country') == 'Lebanon' ? 'selected' : ''); ?>>Lebanon</option>
                        <option value="Lesotho" <?php echo e(old('country') == 'Lesotho' ? 'selected' : ''); ?>>Lesotho</option>
                        <option value="Liberia" <?php echo e(old('country') == 'Liberia' ? 'selected' : ''); ?>>Liberia</option>
                        <option value="Libyan Arab Jamahiriya" <?php echo e(old('country') == 'Libyan Arab Jamahiriya' ? 'selected' : ''); ?>>Libyan Arab Jamahiriya</option>
                        <option value="Liechtenstein" <?php echo e(old('country') == 'Liechtenstein' ? 'selected' : ''); ?>>Liechtenstein</option>
                        <option value="Lithuania" <?php echo e(old('country') == 'Lithuania' ? 'selected' : ''); ?>>Lithuania</option>
                        <option value="Luxembourg" <?php echo e(old('country') == 'Luxembourg' ? 'selected' : ''); ?>>Luxembourg</option>
                        <option value="Macao" <?php echo e(old('country') == 'Macao' ? 'selected' : ''); ?>>Macao</option>
                        <option value="Macedonia, The Former Yugoslav Republic of" <?php echo e(old('country') == 'Macedonia, The Former Yugoslav Republic of' ? 'selected' : ''); ?>>Macedonia, The Former Yugoslav Republic of</option>
                        <option value="Madagascar" <?php echo e(old('country') == 'Madagascar' ? 'selected' : ''); ?>>Madagascar</option>
                        <option value="Malawi" <?php echo e(old('country') == 'Malawi' ? 'selected' : ''); ?>>Malawi</option>
                        <option value="Malaysia" <?php echo e(old('country') == 'Malaysia' ? 'selected' : ''); ?>>Malaysia</option>
                        <option value="Maldives" <?php echo e(old('country') == 'Maldives' ? 'selected' : ''); ?>>Maldives</option>
                        <option value="Mali" <?php echo e(old('country') == 'Mali' ? 'selected' : ''); ?>>Mali</option>
                        <option value="Malta" <?php echo e(old('country') == 'Malta' ? 'selected' : ''); ?>>Malta</option>
                        <option value="Marshall Islands" <?php echo e(old('country') == 'Marshall Islands' ? 'selected' : ''); ?>>Marshall Islands</option>
                        <option value="Martinique" <?php echo e(old('country') == 'Martinique' ? 'selected' : ''); ?>>Martinique</option>
                        <option value="Mauritania" <?php echo e(old('country') == 'Mauritania' ? 'selected' : ''); ?>>Mauritania</option>
                        <option value="Mauritius" <?php echo e(old('country') == 'Mauritius' ? 'selected' : ''); ?>>Mauritius</option>
                        <option value="Mayotte" <?php echo e(old('country') == 'Mayotte' ? 'selected' : ''); ?>>Mayotte</option>
                        <option value="Mexico" <?php echo e(old('country') == 'Mexico' ? 'selected' : ''); ?>>Mexico</option>
                        <option value="Micronesia, Federated States of" <?php echo e(old('country') == 'Micronesia, Federated States of' ? 'selected' : ''); ?>>Micronesia, Federated States of</option>
                        <option value="Moldova, Republic of" <?php echo e(old('country') == 'Moldova, Republic of' ? 'selected' : ''); ?>>Moldova, Republic of</option>
                        <option value="Monaco" <?php echo e(old('country') == 'Monaco' ? 'selected' : ''); ?>>Monaco</option>
                        <option value="Mongolia" <?php echo e(old('country') == 'Mongolia' ? 'selected' : ''); ?>>Mongolia</option>
                        <option value="Montenegro" <?php echo e(old('country') == 'Montenegro' ? 'selected' : ''); ?>>Montenegro</option>
                        <option value="Montserrat" <?php echo e(old('country') == 'Montserrat' ? 'selected' : ''); ?>>Montserrat</option>
                        <option value="Morocco" <?php echo e(old('country') == 'Morocco' ? 'selected' : ''); ?>>Morocco</option>
                        <option value="Mozambique" <?php echo e(old('country') == 'Mozambique' ? 'selected' : ''); ?>>Mozambique</option>
                        <option value="Myanmar" <?php echo e(old('country') == 'Myanmar' ? 'selected' : ''); ?>>Myanmar</option>
                        <option value="Namibia" <?php echo e(old('country') == 'Namibia' ? 'selected' : ''); ?>>Namibia</option>
                        <option value="Nauru" <?php echo e(old('country') == 'Nauru' ? 'selected' : ''); ?>>Nauru</option>
                        <option value="Nepal" <?php echo e(old('country') == 'Nepal' ? 'selected' : ''); ?>>Nepal</option>
                        <option value="Netherlands" <?php echo e(old('country') == 'Netherlands' ? 'selected' : ''); ?>>Netherlands</option>
                        <option value="Netherlands Antilles" <?php echo e(old('country') == 'Netherlands Antilles' ? 'selected' : ''); ?>>Netherlands Antilles</option>
                        <option value="New Caledonia" <?php echo e(old('country') == 'New Caledonia' ? 'selected' : ''); ?>>New Caledonia</option>
                        <option value="New Zealand" <?php echo e(old('country') == 'New Zealand' ? 'selected' : ''); ?>>New Zealand</option>
                        <option value="Nicaragua" <?php echo e(old('country') == 'Nicaragua' ? 'selected' : ''); ?>>Nicaragua</option>
                        <option value="Niger" <?php echo e(old('country') == 'Niger' ? 'selected' : ''); ?>>Niger</option>
                        <option value="Nigeria" <?php echo e(old('country') == 'Nigeria' ? 'selected' : ''); ?>>Nigeria</option>
                        <option value="Niue" <?php echo e(old('country') == 'Niue' ? 'selected' : ''); ?>>Niue</option>
                        <option value="Norfolk Island" <?php echo e(old('country') == 'Norfolk Island' ? 'selected' : ''); ?>>Norfolk Island</option>
                        <option value="Northern Mariana Islands" <?php echo e(old('country') == 'Northern Mariana Islands' ? 'selected' : ''); ?>>Northern Mariana Islands</option>
                        <option value="Norway" <?php echo e(old('country') == 'Norway' ? 'selected' : ''); ?>>Norway</option>
                        <option value="Oman" <?php echo e(old('country') == 'Oman' ? 'selected' : ''); ?>>Oman</option>
                        <option value="Pakistan" <?php echo e(old('country') == 'Pakistan' ? 'selected' : ''); ?>>Pakistan</option>
                        <option value="Palau" <?php echo e(old('country') == 'Palau' ? 'selected' : ''); ?>>Palau</option>
                        <option value="Palestinian Territory, Occupied" <?php echo e(old('country') == 'Palestinian Territory, Occupied' ? 'selected' : ''); ?>>Palestinian Territory, Occupied</option>
                        <option value="Panama" <?php echo e(old('country') == 'Panama' ? 'selected' : ''); ?>>Panama</option>
                        <option value="Papua New Guinea" <?php echo e(old('country') == 'Papua New Guinea' ? 'selected' : ''); ?>>Papua New Guinea</option>
                        <option value="Paraguay" <?php echo e(old('country') == 'Paraguay' ? 'selected' : ''); ?>>Paraguay</option>
                        <option value="Peru" <?php echo e(old('country') == 'Peru' ? 'selected' : ''); ?>>Peru</option>
                        <option value="Philippines" <?php echo e(old('country') == 'Philippines' ? 'selected' : ''); ?>>Philippines</option>
                        <option value="Pitcairn" <?php echo e(old('country') == 'Pitcairn' ? 'selected' : ''); ?>>Pitcairn</option>
                        <option value="Poland" <?php echo e(old('country') == 'Poland' ? 'selected' : ''); ?>>Poland</option>
                        <option value="Portugal" <?php echo e(old('country') == 'Portugal' ? 'selected' : ''); ?>>Portugal</option>
                        <option value="Puerto Rico" <?php echo e(old('country') == 'Puerto Rico' ? 'selected' : ''); ?>>Puerto Rico</option>
                        <option value="Qatar" <?php echo e(old('country') == 'Qatar' ? 'selected' : ''); ?>>Qatar</option>
                        <option value="Reunion" <?php echo e(old('country') == 'Reunion' ? 'selected' : ''); ?>>Reunion</option>
                        <option value="Romania" <?php echo e(old('country') == 'Romania' ? 'selected' : ''); ?>>Romania</option>
                        <option value="Russian Federation" <?php echo e(old('country') == 'Russian Federation' ? 'selected' : ''); ?>>Russian Federation</option>
                        <option value="Rwanda" <?php echo e(old('country') == 'Rwanda' ? 'selected' : ''); ?>>Rwanda</option>
                        <option value="Saint Helena" <?php echo e(old('country') == 'Saint Helena' ? 'selected' : ''); ?>>Saint Helena</option>
                        <option value="Saint Kitts and Nevis" <?php echo e(old('country') == 'Saint Kitts and Nevis' ? 'selected' : ''); ?>>Saint Kitts and Nevis</option>
                        <option value="Saint Lucia" <?php echo e(old('country') == 'Saint Lucia' ? 'selected' : ''); ?>>Saint Lucia</option>
                        <option value="Saint Pierre and Miquelon" <?php echo e(old('country') == 'Saint Pierre and Miquelon' ? 'selected' : ''); ?>>Saint Pierre and Miquelon</option>
                        <option value="Saint Vincent and The Grenadines" <?php echo e(old('country') == 'Saint Vincent and The Grenadines' ? 'selected' : ''); ?>>Saint Vincent and The Grenadines</option>
                        <option value="Samoa" <?php echo e(old('country') == 'Samoa' ? 'selected' : ''); ?>>Samoa</option>
                        <option value="San Marino" <?php echo e(old('country') == 'San Marino' ? 'selected' : ''); ?>>San Marino</option>
                        <option value="Sao Tome and Principe" <?php echo e(old('country') == 'Sao Tome and Principe' ? 'selected' : ''); ?>>Sao Tome and Principe</option>
                        <option value="Saudi Arabia" <?php echo e(old('country') == 'Saudi Arabia' ? 'selected' : ''); ?>>Saudi Arabia</option>
                        <option value="Senegal" <?php echo e(old('country') == 'Senegal' ? 'selected' : ''); ?>>Senegal</option>
                        <option value="Serbia" <?php echo e(old('country') == 'Serbia' ? 'selected' : ''); ?>>Serbia</option>
                        <option value="Seychelles" <?php echo e(old('country') == 'Seychelles' ? 'selected' : ''); ?>>Seychelles</option>
                        <option value="Sierra Leone" <?php echo e(old('country') == 'Sierra Leone' ? 'selected' : ''); ?>>Sierra Leone</option>
                        <option value="Singapore" <?php echo e(old('country') == 'Singapore' ? 'selected' : ''); ?>>Singapore</option>
                        <option value="Slovakia" <?php echo e(old('country') == 'Slovakia' ? 'selected' : ''); ?>>Slovakia</option>
                        <option value="Slovenia" <?php echo e(old('country') == 'Slovenia' ? 'selected' : ''); ?>>Slovenia</option>
                        <option value="Solomon Islands" <?php echo e(old('country') == 'Solomon Islands' ? 'selected' : ''); ?>>Solomon Islands</option>
                        <option value="Somalia" <?php echo e(old('country') == 'Somalia' ? 'selected' : ''); ?>>Somalia</option>
                        <option value="South Africa" <?php echo e(old('country') == 'South Africa' ? 'selected' : ''); ?>>South Africa</option>
                        <option value="South Georgia and The South Sandwich Islands" <?php echo e(old('country') == 'South Georgia and The South Sandwich Islands' ? 'selected' : ''); ?>>South Georgia and The South Sandwich Islands</option>
                        <option value="Spain" <?php echo e(old('country') == 'Spain' ? 'selected' : ''); ?>>Spain</option>
                        <option value="Sri Lanka" <?php echo e(old('country') == 'Sri Lanka' ? 'selected' : ''); ?>>Sri Lanka</option>
                        <option value="Sudan" <?php echo e(old('country') == 'Sudan' ? 'selected' : ''); ?>>Sudan</option>
                        <option value="Suriname" <?php echo e(old('country') == 'Suriname' ? 'selected' : ''); ?>>Suriname</option>
                        <option value="Svalbard and Jan Mayen" <?php echo e(old('country') == 'Svalbard and Jan Mayen' ? 'selected' : ''); ?>>Svalbard and Jan Mayen</option>
                        <option value="Swaziland" <?php echo e(old('country') == 'Swaziland' ? 'selected' : ''); ?>>Swaziland</option>
                        <option value="Sweden" <?php echo e(old('country') == 'Sweden' ? 'selected' : ''); ?>>Sweden</option>
                        <option value="Switzerland" <?php echo e(old('country') == 'Switzerland' ? 'selected' : ''); ?>>Switzerland</option>
                        <option value="Syrian Arab Republic" <?php echo e(old('country') == 'Syrian Arab Republic' ? 'selected' : ''); ?>>Syrian Arab Republic</option>
                        <option value="Taiwan, Province of China" <?php echo e(old('country') == 'Taiwan, Province of China' ? 'selected' : ''); ?>>Taiwan, Province of China</option>
                        <option value="Tajikistan" <?php echo e(old('country') == 'Tajikistan' ? 'selected' : ''); ?>>Tajikistan</option>
                        <option value="Tanzania, United Republic of" <?php echo e(old('country') == 'Tanzania, United Republic of' ? 'selected' : ''); ?>>Tanzania, United Republic of</option>
                        <option value="Thailand" <?php echo e(old('country') == 'Thailand' ? 'selected' : ''); ?>>Thailand</option>
                        <option value="Timor-leste" <?php echo e(old('country') == 'Timor-leste' ? 'selected' : ''); ?>>Timor-leste</option>
                        <option value="Togo" <?php echo e(old('country') == 'Togo' ? 'selected' : ''); ?>>Togo</option>
                        <option value="Tokelau" <?php echo e(old('country') == 'Tokelau' ? 'selected' : ''); ?>>Tokelau</option>
                        <option value="Tonga" <?php echo e(old('country') == 'Tonga' ? 'selected' : ''); ?>>Tonga</option>
                        <option value="Trinidad and Tobago" <?php echo e(old('country') == 'Trinidad and Tobago' ? 'selected' : ''); ?>>Trinidad and Tobago</option>
                        <option value="Tunisia" <?php echo e(old('country') == 'Tunisia' ? 'selected' : ''); ?>>Tunisia</option>
                        <option value="Turkey" <?php echo e(old('country') == 'Turkey' ? 'selected' : ''); ?>>Turkey</option>
                        <option value="Turkmenistan" <?php echo e(old('country') == 'Turkmenistan' ? 'selected' : ''); ?>>Turkmenistan</option>
                        <option value="Turks and Caicos Islands" <?php echo e(old('country') == 'Turks and Caicos Islands' ? 'selected' : ''); ?>>Turks and Caicos Islands</option>
                        <option value="Tuvalu" <?php echo e(old('country') == 'Tuvalu' ? 'selected' : ''); ?>>Tuvalu</option>
                        <option value="Uganda" <?php echo e(old('country') == 'Uganda' ? 'selected' : ''); ?>>Uganda</option>
                        <option value="Ukraine" <?php echo e(old('country') == 'Ukraine' ? 'selected' : ''); ?>>Ukraine</option>
                        <option value="United Arab Emirates" <?php echo e(old('country') == 'United Arab Emirates' ? 'selected' : ''); ?>>United Arab Emirates</option>
                        <option value="United Kingdom" <?php echo e(old('country') == 'United Kingdom' ? 'selected' : ''); ?>>United Kingdom</option>
                        <option value="United States" <?php echo e(old('country') == 'United States' ? 'selected' : ''); ?>>United States</option>
                        <option value="United States Minor Outlying Islands" <?php echo e(old('country') == 'United States Minor Outlying Islands' ? 'selected' : ''); ?>>United States Minor Outlying Islands</option>
                        <option value="Uruguay" <?php echo e(old('country') == 'Uruguay' ? 'selected' : ''); ?>>Uruguay</option>
                        <option value="Uzbekistan" <?php echo e(old('country') == 'Uzbekistan' ? 'selected' : ''); ?>>Uzbekistan</option>
                        <option value="Vanuatu" <?php echo e(old('country') == 'Vanuatu' ? 'selected' : ''); ?>>Vanuatu</option>
                        <option value="Venezuela" <?php echo e(old('country') == 'Venezuela' ? 'selected' : ''); ?>>Venezuela</option>
                        <option value="Viet Nam" <?php echo e(old('country') == 'Viet Nam' ? 'selected' : ''); ?>>Viet Nam</option>
                        <option value="Virgin Islands, British" <?php echo e(old('country') == 'Virgin Islands, British' ? 'selected' : ''); ?>>Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S." <?php echo e(old('country') == "Virgin Islands, U.S." ? 'selected' : ''); ?>>Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna" <?php echo e(old('country') == 'Wallis and Futuna' ? 'selected' : ''); ?>>Wallis and Futuna</option>
                        <option value="Western Sahara" <?php echo e(old('country') == 'Western Sahara' ? 'selected' : ''); ?>>Western Sahara</option>
                        <option value="Yemen" <?php echo e(old('country') == 'Yemen' ? 'selected' : ''); ?>>Yemen</option>
                        <option value="Zambia" <?php echo e(old('country') == 'Zambia' ? 'selected' : ''); ?>>Zambia</option>
                        <option value="Zimbabwe" <?php echo e(old('country') == 'Zimbabwe' ? 'selected' : ''); ?>>Zimbabwe</option>
                        </select>
                        <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-6">
                        <label for="Division">Division <small class="text-muted">(Bangladesh only)</small></label>
                        <select name="division" id="division" class="form-control <?php $__errorArgs = ['division'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" disabled>
                            <option value="">Select Division</option>
                            <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($division->id); ?>" <?php echo e(old('division') == $division->id ? 'selected' : ''); ?>>
                                    <?php echo e($division->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['division'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-6">
                        <label for="district">District <small class="text-muted">(Bangladesh only)</small></label>
                        <select name="district" id="district" class="form-control <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" disabled>
                            <option value="">Select District</option>
                        </select>
                        <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-6">
                        <label for="upazila">Upazila <small class="text-muted">(Bangladesh only)</small></label>
                        <select name="upazila" id="upazila" class="form-control <?php $__errorArgs = ['upazila'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" disabled>
                            <option value="">Select Upazila</option>
                        </select>
                        <?php $__errorArgs = ['upazila'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-6">
                        <label>Street Address 1 <span class="text-danger">*</span></label>
                        <input type="text" placeholder="Street Address One" name="addr_1" class="form-control <?php $__errorArgs = ['addr_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('addr_1')); ?>" required>
                        <?php $__errorArgs = ['addr_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-6">
                        <label>Street Address 2</label>
                        <input type="text" placeholder="Street Address Two (Optional)" name="addr_2" class="form-control <?php $__errorArgs = ['addr_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('addr_2')); ?>">
                        <?php $__errorArgs = ['addr_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-4">
                        <label>Town / City / Village<span class="text-danger">*</span></label>
                        <input type="text" placeholder="Town/City/Village" name="town" class="form-control <?php $__errorArgs = ['town'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('town')); ?>" required>
                        <?php $__errorArgs = ['town'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-4">
                        <label>State</label>
                        <input type="text" placeholder="State (Optional)" name="state" class="form-control <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('state')); ?>">
                        <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-4">
                        <label>Zipcode <span class="text-danger">*</span></label>
                        <input type="number" placeholder="Zipcode" name="zipcode" class="form-control <?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('zipcode')); ?>" required>
                        <?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-12">
                        <label>Reference By (Optional)</label>
                        <input type="email" placeholder="Enter Reference Person's Email" name="reference_by" class="form-control <?php $__errorArgs = ['reference_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('reference_by')); ?>">
                        <?php $__errorArgs = ['reference_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-6">
                        <label class="d-block mb-2">Passport (Optional)</label>
                        <?php if(session('temp_passport_original')): ?>
                            <div class="uploaded-file-preview" style="margin-bottom: 15px; position: relative;">
                                <div style="text-align: center;">
                                    <img src="<?php echo e(asset('backend/uploads/temp/' . session('temp_passport'))); ?>" alt="Passport Preview" style="max-width: 100%; max-height: 200px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                    <div style="margin-top: 10px; padding: 8px; background: #e8f5e9; border-radius: 6px; display: inline-block;">
                                        <i class="fas fa-check-circle" style="color: #4caf50;"></i>
                                        <span style="font-weight: 600; color: #2e7d32; margin-left: 5px;"><?php echo e(session('temp_passport_original')); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="custom-file-upload">
                            <input type="file" name="passport" id="passport" class="<?php $__errorArgs = ['passport'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*">
                            <label for="passport" class="file-upload-label" id="passport-label" <?php if(session('temp_passport_original')): ?> style="border-color: #4caf50; background: #f1f8f4;" <?php endif; ?>>
                                <div class="file-upload-icon">
                                    <i class="far fa-file-image" <?php if(session('temp_passport_original')): ?> style="color: #4caf50;" <?php endif; ?>></i>
                                </div>
                                <div class="file-upload-text">
                                    <div class="file-name"><?php if(session('temp_passport_original')): ?> File already uploaded <?php else: ?> Choose Passport Image <?php endif; ?></div>
                                    <div class="file-info"><?php if(session('temp_passport_original')): ?> Upload a different file or keep current <?php else: ?> PNG, JPG, JPEG (Max 2MB) <?php endif; ?></div>
                                </div>
                            </label>
                        </div>
                        <div class="uploaded-file-preview" id="passport-preview" style="display: none; margin-top: 15px; position: relative;">
                            <div style="text-align: center;">
                                <img id="passport-img" src="" alt="Passport Preview" style="max-width: 100%; max-height: 300px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                <div style="margin-top: 10px; padding: 8px; background: #f8f9fa; border-radius: 6px; display: inline-block;">
                                    <span class="file-name-display" style="font-weight: 600; color: #495057; margin-right: 10px;"></span>
                                    <span class="file-size-display" style="font-size: 0.875rem; color: #6c757d;"></span>
                                </div>
                                <div style="margin-top: 10px;">
                                    <button type="button" class="btn btn-sm btn-danger remove-image-btn" data-target="passport" style="padding: 6px 20px; border-radius: 6px;">
                                        <i class="fas fa-times"></i> Remove Image
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $__errorArgs = ['passport'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group col-xl-6">
                        <label class="d-block mb-2">NID (Optional)</label>
                        <?php if(session('temp_nid_original')): ?>
                            <div class="uploaded-file-preview" style="margin-bottom: 15px; position: relative;">
                                <div style="text-align: center;">
                                    <img src="<?php echo e(asset('backend/uploads/temp/' . session('temp_nid'))); ?>" alt="NID Preview" style="max-width: 100%; max-height: 200px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                    <div style="margin-top: 10px; padding: 8px; background: #e8f5e9; border-radius: 6px; display: inline-block;">
                                        <i class="fas fa-check-circle" style="color: #4caf50;"></i>
                                        <span style="font-weight: 600; color: #2e7d32; margin-left: 5px;"><?php echo e(session('temp_nid_original')); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="custom-file-upload">
                            <input type="file" name="nid" id="nid" class="<?php $__errorArgs = ['nid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*">
                            <label for="nid" class="file-upload-label" id="nid-label" <?php if(session('temp_nid_original')): ?> style="border-color: #4caf50; background: #f1f8f4;" <?php endif; ?>>
                                <div class="file-upload-icon">
                                    <i class="far fa-id-card" <?php if(session('temp_nid_original')): ?> style="color: #4caf50;" <?php endif; ?>></i>
                                </div>
                                <div class="file-upload-text">
                                    <div class="file-name"><?php if(session('temp_nid_original')): ?> File already uploaded <?php else: ?> Choose NID Image <?php endif; ?></div>
                                    <div class="file-info"><?php if(session('temp_nid_original')): ?> Upload a different file or keep current <?php else: ?> PNG, JPG, JPEG (Max 2MB) <?php endif; ?></div>
                                </div>
                            </label>
                        </div>
                        <div class="uploaded-file-preview" id="nid-preview" style="display: none; margin-top: 15px; position: relative;">
                            <div style="text-align: center;">
                                <img id="nid-img" src="" alt="NID Preview" style="max-width: 100%; max-height: 300px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                <div style="margin-top: 10px; padding: 8px; background: #f8f9fa; border-radius: 6px; display: inline-block;">
                                    <span class="file-name-display" style="font-weight: 600; color: #495057; margin-right: 10px;"></span>
                                    <span class="file-size-display" style="font-size: 0.875rem; color: #6c757d;"></span>
                                </div>
                                <div style="margin-top: 10px;">
                                    <button type="button" class="btn btn-sm btn-danger remove-image-btn" data-target="nid" style="padding: 6px 20px; border-radius: 6px;">
                                        <i class="fas fa-times"></i> Remove Image
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $__errorArgs = ['nid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xl-12">
                    <button type="submit" class="sigma_btn-custom primary d-block w-100" id="submitBtn">
                        <span id="btnText">Register</span>
                        <span id="btnSpinner" style="display: none;">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Processing...
                        </span>
                    </button>
                </div>
                <div class="form-group col-xl-12">
                    <div class="text-center" style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #e0e0e0;">
                        <p style="margin-bottom: 0; color: #6c757d; font-size: 15px;">
                            Already have an account? <a href="<?php echo e(route('login')); ?>" style="color: #4a90e2; text-decoration: none; font-weight: 600; transition: color 0.3s;">Sign In</a>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Register End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_scripts'); ?>
<script>
    $(document).ready(function() {
        // Country-based field management
        $('#country').on('change', function() {
            var selectedCountry = $(this).val();
            var $divisionDropdown = $('#division');
            var $districtDropdown = $('#district');
            var $upazilaDropdown = $('#upazila');

            if (selectedCountry === 'Bangladesh') {
                // Enable division dropdown for Bangladesh
                $divisionDropdown.prop('disabled', false);
            } else {
                // Reset and disable all Bangladesh-specific fields
                $divisionDropdown.val('').prop('disabled', true);
                $districtDropdown.html('<option value="">Select District</option>').prop('disabled', true);
                $upazilaDropdown.html('<option value="">Select Upazila</option>').prop('disabled', true);
            }
        });

        // Check on page load if Bangladesh is already selected (from old input)
        if ($('#country').val() === 'Bangladesh') {
            $('#division').prop('disabled', false);

            // If old division value exists, trigger change to load districts
            <?php if(old('division')): ?>
                var oldDivision = '<?php echo e(old('division')); ?>';
                if (oldDivision) {
                    $('#division').val(oldDivision).trigger('change');

                    // After districts load, set old district value if exists
                    <?php if(old('district')): ?>
                        setTimeout(function() {
                            var oldDistrict = '<?php echo e(old('district')); ?>';
                            $('#district').val(oldDistrict).trigger('change');

                            // After upazilas load, set old upazila value if exists
                            <?php if(old('upazila')): ?>
                                setTimeout(function() {
                                    $('#upazila').val('<?php echo e(old('upazila')); ?>');
                                }, 500);
                            <?php endif; ?>
                        }, 500);
                    <?php endif; ?>
                }
            <?php endif; ?>
        }

        // Cascading Dropdown for Division -> District -> Upazila
        $('#division').on('change', function() {
            var divisionId = $(this).val();
            var $districtDropdown = $('#district');
            var $upazilaDropdown = $('#upazila');

            // Reset district and upazila dropdowns
            $districtDropdown.html('<option value="">Select District</option>');
            $upazilaDropdown.html('<option value="">Select Upazila</option>');
            $districtDropdown.prop('disabled', true);
            $upazilaDropdown.prop('disabled', true);

            if (divisionId) {
                // Fetch districts for selected division
                $.ajax({
                    url: '/api/get-districts/' + divisionId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success && response.districts.length > 0) {
                            $.each(response.districts, function(index, district) {
                                $districtDropdown.append('<option value="' + district.id + '">' + district.name + '</option>');
                            });
                            $districtDropdown.prop('disabled', false);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching districts:', error);
                        toastr.error('Failed to load districts', 'Error');
                    }
                });
            }
        });

        $('#district').on('change', function() {
            var districtId = $(this).val();
            var $upazilaDropdown = $('#upazila');

            // Reset upazila dropdown
            $upazilaDropdown.html('<option value="">Select Upazila</option>');
            $upazilaDropdown.prop('disabled', true);

            if (districtId) {
                // Fetch upazilas for selected district
                $.ajax({
                    url: '/api/get-upazilas/' + districtId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success && response.upazilas.length > 0) {
                            $.each(response.upazilas, function(index, upazila) {
                                $upazilaDropdown.append('<option value="' + upazila.id + '">' + upazila.name + '</option>');
                            });
                            $upazilaDropdown.prop('disabled', false);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching upazilas:', error);
                        toastr.error('Failed to load upazilas', 'Error');
                    }
                });
            }
        });

        // Scroll to first backend validation error on page load
        <?php if($errors->any()): ?>
            var firstError = $('.is-invalid, .invalid-feedback:visible').first();
            if (firstError.length > 0) {
                var targetElement = firstError.hasClass('is-invalid') ? firstError : firstError.prev('.form-control, .custom-file-upload');
                if (targetElement.length > 0) {
                    targetElement[0].scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    setTimeout(function() {
                        if (targetElement.is('input, select, textarea')) {
                            targetElement.focus();
                        }
                    }, 700);
                }
            }
        <?php endif; ?>

        // File upload handling
// File upload handling with image preview
        function handleFileUpload(inputId, labelId) {
            $('#' + inputId).on('change', function() {
                var file = this.files[0];
                var fileName = $(this).val().split('\\').pop();
                var label = $('#' + labelId);
                var previewBox = $('#' + inputId + '-preview');
                var imgElement = $('#' + inputId + '-img');

                if (file) {
                    var fileSize = file.size / 1024 / 1024; // Size in MB

                    // Update label to show selected state
                    label.addClass('has-file');
                    label.css({'border-color': '', 'background': ''});
                    label.find('.file-upload-icon i').css('color', '');
                    label.find('.file-name').text(fileName);
                    label.find('.file-info').text('(' + fileSize.toFixed(2) + ' MB)');

                    // Read and display the image
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        imgElement.attr('src', e.target.result);
                        previewBox.show();
                        previewBox.find('.file-name-display').text(fileName);
                        previewBox.find('.file-size-display').text('(' + fileSize.toFixed(2) + ' MB)');
                    };
                    reader.readAsDataURL(file);
                } else {
                    // Reset to default state
                    label.removeClass('has-file');
                    previewBox.hide();
                    imgElement.attr('src', '');
                }
            });
        }

        handleFileUpload('passport', 'passport-label');
        handleFileUpload('nid', 'nid-label');

        // Handle remove image button
        $('.remove-image-btn').on('click', function() {
            var target = $(this).data('target');
            var input = $('#' + target);
            var label = $('#' + target + '-label');
            var previewBox = $('#' + target + '-preview');
            var imgElement = $('#' + target + '-img');

            // Clear the file input
            input.val('');

            // Reset label state
            label.removeClass('has-file');

            // Hide preview
            previewBox.hide();
            imgElement.attr('src', '');
        });

        // Real-time validation for all required fields
        $('input[required], select[required]').on('input change blur', function() {
            var $input = $(this);
            var value = $input.val().trim();

            // Remove existing custom error
            $input.next('.invalid-feedback.custom-error').remove();

            // Check if field is empty
            if (value === '') {
                $input.addClass('is-invalid');
                $input.after('<div class="invalid-feedback custom-error" style="display: block;">This field is required</div>');
            }
            // Check for minlength violation
            else if ($input.attr('minlength') && value.length < parseInt($input.attr('minlength'))) {
                $input.addClass('is-invalid');
                var minLength = $input.attr('minlength');
                $input.after('<div class="invalid-feedback custom-error" style="display: block;">Minimum ' + minLength + ' characters required</div>');
            }
            // Check for email validity
            else if ($input.attr('type') === 'email' && !this.validity.valid) {
                $input.addClass('is-invalid');
                $input.after('<div class="invalid-feedback custom-error" style="display: block;">Please enter a valid email address</div>');
            }
            // Field is valid
            else {
                $input.removeClass('is-invalid');
            }
        });

        // Handle invalid event for HTML5 validation
        $('input[required], select[required]').on('invalid', function(e) {
            e.preventDefault();
            $(this).trigger('blur');
        });

        // Email confirmation validation - check on both fields
        function validateEmailMatch() {
            var email = $('#email').val();
            var confirmEmail = $('#confirm_email').val();

            if (confirmEmail && email !== confirmEmail) {
                $('#confirm_email').addClass('is-invalid');
                $('#email_match_error').show();
            } else {
                $('#confirm_email').removeClass('is-invalid');
                $('#email_match_error').hide();
            }
        }

        $('#email').on('input change blur', validateEmailMatch);
        $('#confirm_email').on('input change blur', validateEmailMatch);

        // Phone confirmation validation - check on both fields
        function validatePhoneMatch() {
            var phone = $('#contact_no').val();
            var confirmPhone = $('#confirm_contact_no').val();

            if (confirmPhone && phone !== confirmPhone) {
                $('#confirm_contact_no').addClass('is-invalid');
                $('#phone_match_error').show();
            } else {
                $('#confirm_contact_no').removeClass('is-invalid');
                $('#phone_match_error').hide();
            }
        }

        $('#contact_no').on('input change blur', validatePhoneMatch);
        $('#confirm_contact_no').on('input change blur', validatePhoneMatch);

        // Password strength validation
        function checkPasswordStrength(password) {
            var strength = 0;
            var tips = '';

            if (password.length >= 8) strength += 1;
            if (password.length >= 12) strength += 1;
            if (/[a-z]/.test(password)) strength += 1;
            if (/[A-Z]/.test(password)) strength += 1;
            if (/[0-9]/.test(password)) strength += 1;
            if (/[^a-zA-Z0-9]/.test(password)) strength += 1;

            var strengthText = '';
            var strengthPercent = 0;
            var strengthColor = '';

            if (strength <= 2) {
                strengthText = 'Weak';
                strengthPercent = 33;
                strengthColor = '#dc3545';
            } else if (strength <= 4) {
                strengthText = 'Medium';
                strengthPercent = 66;
                strengthColor = '#ffc107';
            } else {
                strengthText = 'Strong';
                strengthPercent = 100;
                strengthColor = '#28a745';
            }

            return {
                text: strengthText,
                percent: strengthPercent,
                color: strengthColor
            };
        }

        // Password validation with strength indicator
        $('#password').on('input change blur', function(e) {
            var password = $(this).val();
            var $strengthDiv = $('#password_strength');
            var $strengthBar = $strengthDiv.find('.progress-bar');
            var $strengthText = $('#password_strength_text');
            var $requirementsDiv = $('#password_requirements');
            var $input = $(this);
            var $parent = $input.parent();
            var $formGroup = $input.closest('.form-group');

            // Remove ALL invalid-feedback messages within the form-group
            $formGroup.find('.invalid-feedback:not(#password_match_error)').remove();

            if (password.length > 0) {
                $strengthDiv.show();
                var strength = checkPasswordStrength(password);

                $strengthBar.css('width', strength.percent + '%')
                    .css('background-color', strength.color);
                $strengthText.text('Password Strength: ' + strength.text)
                    .css('color', strength.color);

                // Validate each requirement
                var hasMinLength = password.length >= 8;
                var hasLowercase = /[a-z]/.test(password);
                var hasUppercase = /[A-Z]/.test(password);
                var hasNumber = /[0-9]/.test(password);
                var hasSpecial = /[@$!%*#?&]/.test(password);

                // Update requirement indicators
                updateRequirement('#req_length', hasMinLength, 'Minimum 8 characters');
                updateRequirement('#req_lowercase', hasLowercase, 'At least one lowercase letter');
                updateRequirement('#req_uppercase', hasUppercase, 'At least one uppercase letter');
                updateRequirement('#req_number', hasNumber, 'At least one number');
                updateRequirement('#req_special', hasSpecial, 'At least one special character (@$!%*#?&)');

                // Check if all requirements are met
                var allValid = hasMinLength && hasLowercase && hasUppercase && hasNumber && hasSpecial;

                if (!allValid) {
                    // Show requirements and mark field as invalid
                    $requirementsDiv.show();
                    $input.addClass('is-invalid').css('border-color', '#dc3545');
                } else {
                    // Hide requirements and mark field as valid
                    $requirementsDiv.hide();
                    $input.removeClass('is-invalid').css('border-color', '');
                }
            } else {
                // Field is empty
                $strengthDiv.hide();
                $requirementsDiv.hide();

                // Show required error on blur if field is empty
                if (e.type === 'blur' || $input.data('touched')) {
                    $input.addClass('is-invalid').css('border-color', '#dc3545');
                    $parent.after('<div class="invalid-feedback" style="display: block;">This field is required</div>');
                    $input.data('touched', true);
                } else {
                    $input.removeClass('is-invalid').css('border-color', '');
                }
            }

            // Check password match
            validatePasswordMatch();
        });

        // Helper function to update requirement status
        function updateRequirement(selector, isValid, text) {
            var $elem = $(selector);
            if (isValid) {
                $elem.html('✓ ' + text).css('color', '#28a745');
            } else {
                $elem.html('✗ ' + text).css('color', '#dc3545');
            }
        }

        // Password confirmation validation
        function validatePasswordMatch() {
            var password = $('#password').val();
            var confirmPassword = $('#password_confirmation').val();

            if (confirmPassword && password !== confirmPassword) {
                $('#password_confirmation').addClass('is-invalid');
                $('#password_match_error').show();
            } else if (confirmPassword) {
                $('#password_confirmation').removeClass('is-invalid');
                $('#password_match_error').hide();
            }
        }

        $('#password_confirmation').on('input change blur', validatePasswordMatch);

        // Toggle password visibility
        $('.toggle-password').on('click', function() {
            var input = $($(this).attr('toggle'));
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                input.attr('type', 'password');
                $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });

        // Reference by email validation (optional but must be valid if provided)
        $('input[name="reference_by"]').on('input change blur', function() {
            var $this = $(this);
            var value = $this.val().trim();

            // Remove existing custom error
            $this.next('.invalid-feedback.custom-error').remove();

            // Only validate if value is provided (field is optional)
            if (value !== '' && !this.validity.valid) {
                $this.addClass('is-invalid');
                $this.after('<div class="invalid-feedback custom-error" style="display: block;">Please enter a valid email address</div>');
            } else {
                $this.removeClass('is-invalid');
            }
        });

        // Function to validate and scroll
        function validateAndScroll() {
            var isValid = true;
            var invalidFields = [];

            // Trigger validation on all required fields
            $('input[required], select[required]').each(function() {
                var $this = $(this);

                if (!this.validity.valid) {
                    $this.addClass('is-invalid');

                    // Create error message if it doesn't exist
                    if (!$this.next('.invalid-feedback.custom-error').length) {
                        var errorMsg = 'This field is required';
                        if ($this.attr('type') === 'email') {
                            errorMsg = 'Please enter a valid email address';
                        } else if (this.validity.tooShort) {
                            var minLength = $this.attr('minlength');
                            errorMsg = 'Minimum ' + minLength + ' characters required';
                        } else if ($this.attr('type') === 'number' && !this.validity.valid) {
                            errorMsg = 'Please enter a valid number';
                        }
                        $this.after('<div class="invalid-feedback custom-error" style="display: block;">' + errorMsg + '</div>');
                    }

                    isValid = false;
                    invalidFields.push({
                        element: $this,
                        offset: $this.offset().top
                    });
                }
            });

            // Check email match
            var email = $('#email').val();
            var confirmEmail = $('#confirm_email').val();
            if (confirmEmail && email !== confirmEmail) {
                $('#confirm_email').addClass('is-invalid');
                $('#email_match_error').show();
                isValid = false;
                invalidFields.push({
                    element: $('#confirm_email'),
                    offset: $('#confirm_email').offset().top
                });
            }

            // Check phone match
            var phone = $('#contact_no').val();
            var confirmPhone = $('#confirm_contact_no').val();
            if (confirmPhone && phone !== confirmPhone) {
                $('#confirm_contact_no').addClass('is-invalid');
                $('#phone_match_error').show();
                isValid = false;
                invalidFields.push({
                    element: $('#confirm_contact_no'),
                    offset: $('#confirm_contact_no').offset().top
                });
            }

            // Check password
            var password = $('#password').val();
            if (password.length < 8) {
                $('#password').addClass('is-invalid');
                $('#password').parent().next('.invalid-feedback.custom-error').remove();
                $('#password').parent().after('<div class="invalid-feedback custom-error" style="display: block;">Password must be at least 8 characters</div>');
                isValid = false;
                invalidFields.push({
                    element: $('#password'),
                    offset: $('#password').offset().top
                });
            }

            // Check password match
            var confirmPassword = $('#password_confirmation').val();
            if (confirmPassword && password !== confirmPassword) {
                $('#password_confirmation').addClass('is-invalid');
                $('#password_match_error').show();
                isValid = false;
                invalidFields.push({
                    element: $('#password_confirmation'),
                    offset: $('#password_confirmation').offset().top
                });
            }

            // Check reference_by email (optional but must be valid if provided)
            var referenceBy = $('input[name="reference_by"]');
            var referenceValue = referenceBy.val().trim();
            if (referenceValue !== '' && !referenceBy[0].validity.valid) {
                referenceBy.addClass('is-invalid');
                if (!referenceBy.next('.invalid-feedback.custom-error').length) {
                    referenceBy.after('<div class="invalid-feedback custom-error" style="display: block;">Please enter a valid email address</div>');
                }
                isValid = false;
                invalidFields.push({
                    element: referenceBy,
                    offset: referenceBy.offset().top
                });
            }

            if (!isValid && invalidFields.length > 0) {
                // Sort by offset to find topmost field
                invalidFields.sort(function(a, b) {
                    return a.offset - b.offset;
                });

                var topField = invalidFields[0].element;

                // Scroll to the topmost error field
                topField[0].scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                setTimeout(function() {
                    topField.focus();
                }, 700);

                return false;
            }

            return true;
        }

        // Handle button click
        $('button[type="submit"]').on('click', function(e) {
            if (!validateAndScroll()) {
                e.preventDefault();
                return false;
            }
        });

        // Form submission validation (fallback)
        $('form').on('submit', function(e) {
            var $form = $(this);
            var $submitBtn = $('#submitBtn');
            var $btnText = $('#btnText');
            var $btnSpinner = $('#btnSpinner');

            // Check if already submitting
            if ($submitBtn.prop('disabled')) {
                e.preventDefault();
                return false;
            }

            if (!validateAndScroll()) {
                e.preventDefault();
                return false;
            }

            // Show spinner and disable button
            $btnText.hide();
            $btnSpinner.show();
            $submitBtn.prop('disabled', true);
            $submitBtn.css('opacity', '0.7');

            return true;
        });

        // Toastr configuration
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
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

        // Display success message
        <?php if(session('success')): ?>
            toastr.success('<?php echo e(session('success')); ?>', 'Success');
        <?php endif; ?>

        // Display error message
        <?php if($errors->has('error')): ?>
            toastr.error('<?php echo e($errors->first('error')); ?>', 'Error');
        <?php endif; ?>

        // Display validation errors
        <?php if($errors->any() && !$errors->has('error')): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                toastr.error('<?php echo e($error); ?>', 'Validation Error');
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/pages/auth/registration.blade.php ENDPATH**/ ?>