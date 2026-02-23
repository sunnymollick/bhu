<?php $__env->startSection('stylesheet'); ?>
<style>
fieldset.scheduler-border {
    border: 1px groove #72cce0 !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
    width:auto;
    padding:0 10px;
    border-bottom:none;
}
.preview-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 20px;
}

.preview-container img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border: 2px solid #ccc;
    border-radius: 8px;
    padding: 5px;
}

/* Validation styling */
.invalid-feedback {
    display: block;
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.is-invalid {
    border-color: #dc3545 !important;
}

.form-control.is-invalid:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.text-danger {
    color: #dc3545;
}

/* Password Toggle Styling */
.password-container {
    position: relative;
}

.password-toggle {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6c757d;
    font-size: 1.1rem;
    padding: 5px;
    z-index: 10;
    transition: color 0.3s ease;
    user-select: none;
}

.password-toggle:hover {
    color: #495057;
}

.password-toggle:active {
    color: #212529;
}

.password-container .form-control {
    padding-right: 40px;
}
</style>
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/select2/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Add User</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.user.all')); ?>">All Users</a></li>
            <li class="breadcrumb-item active">Add User</li>
        </ol>
        </div>
    </div>
    </div>
</section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Create New User</h3>
                    </div>
                    <form method="POST" action="<?php echo e(route('admin.user.store')); ?>" enctype="multipart/form-data" id="createUserForm">
                        <?php echo csrf_field(); ?>

                        <!-- Display Success Message -->
                        <?php if(session('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                                <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <!-- Display Error Message -->
                        <?php if($errors->has('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                                <i class="fas fa-exclamation-circle"></i> <?php echo e($errors->first('error')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <!-- Display General Validation Errors -->
                        <?php if($errors->any() && !$errors->has('error')): ?>
                            <div class="alert alert-warning alert-dismissible fade show m-3" role="alert">
                                <i class="fas fa-exclamation-triangle"></i> <strong>Please fix the following errors:</strong>
                                <ul class="mb-0 mt-2">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" value="<?php echo e(old('name')); ?>"  minlength="2">
                                        <?php $__errorArgs = ['name'];
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
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" value="<?php echo e(old('email')); ?>" >
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <div class="password-container">
                                            <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="password"  minlength="6">
                                            <span class="password-toggle" onclick="togglePasswordVisibility('password', this)">
                                                <i class="fas fa-eye" id="password-icon"></i>
                                            </span>
                                        </div>
                                        <small class="form-text text-muted">Minimum 6 characters (user can change later)</small>
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
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                        <div class="password-container">
                                            <input type="password" class="form-control <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="confirm_password" id="confirm_password"  minlength="6">
                                            <span class="password-toggle" onclick="togglePasswordVisibility('confirm_password', this)">
                                                <i class="fas fa-eye" id="confirm_password-icon"></i>
                                            </span>
                                        </div>
                                        <div class="invalid-feedback" id="password_match_error" style="display: none;">Passwords do not match</div>
                                        <?php $__errorArgs = ['confirm_password'];
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
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="contact_no">Contact No <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['contact_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="contact_no" id="contact_no" value="<?php echo e(old('contact_no')); ?>"  pattern="[\d\s\+\-\(\)]+">
                                        <small class="form-text text-muted">Phone number with optional +, -, spaces, or parentheses</small>
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
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address" id="address" value="<?php echo e(old('address')); ?>">
                                        <?php $__errorArgs = ['address'];
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
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="role_id">Select Role <span class="text-danger">*</span></label>
                                        <select name="role_id" class="form-control <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="role_id" >
                                            <option value="">SELECT ROLE</option>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($r->id); ?>" <?php echo e(old('role_id') == $r->id ? 'selected' : ''); ?>><?php echo e($r->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['role_id'];
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
                                <div class="col-sm-6 col-md-6">
                                    <label for="in_website">Website Visibility</label>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" name="in_website" id="in_website" <?php echo e(old('in_website') ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="in_website">Show in Website?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="imageInput">Picture</label>

                                        <input type="file" name="image" id="imageInput" accept="image/*">
                                        <small class="form-text text-muted">Recommended size: 400x270px</small>
                                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        <div id="preview" style="width: 400px; height: 270px; overflow: hidden; background: #f0f0f0; margin-top: 10px; display: none;"></div>

                                        <button type="button" id="cropButton" class="btn btn-sm btn-secondary" style="margin-top: 15px; display: none;">Crop Image</button>

                                        <div id="croppedContainer" style="margin-top: 20px; display: none;">
                                            <h5>Cropped Preview:</h5>
                                            <img id="croppedResult" style="max-width: 100%; border: 1px solid #ccc;"/>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts_plugin'); ?>
<script src="<?php echo e(asset('backend/plugins/select2/js/select2.full.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts_custom'); ?>
<script>
  $(function () {
    $('.select2').select2();

    // Scroll to top if there are server-side validation errors
    <?php if($errors->any()): ?>
        $('html, body').animate({
            scrollTop: $('.alert').offset().top - 100
        }, 500);
    <?php endif; ?>
  });

  // ============================================
  // PASSWORD VISIBILITY TOGGLE (Industry Standard)
  // ============================================
  function togglePasswordVisibility(fieldId, iconElement) {
    const passwordField = document.getElementById(fieldId);
    const icon = iconElement.querySelector('i');

    if (passwordField.type === 'password') {
        // Show password
        passwordField.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
        iconElement.setAttribute('title', 'Hide password');
    } else {
        // Hide password
        passwordField.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
        iconElement.setAttribute('title', 'Show password');
    }
  }

  // Image cropper functionality
  const imageInput = document.getElementById('imageInput');
  const previewContainer = document.getElementById('preview');
  const cropButton = document.getElementById('cropButton');
  const croppedResult = document.getElementById('croppedResult');
  const croppedContainer = document.getElementById('croppedContainer');

  let cropper;

  imageInput.addEventListener('change', function () {
    const file = this.files[0];
    if (!file || !file.type.startsWith('image/')) return;

    const reader = new FileReader();
    reader.onload = function (e) {
        previewContainer.innerHTML = '';
        previewContainer.style.display = 'block';
        cropButton.style.display = 'inline-block';

        if (cropper) {
            cropper.destroy();
            cropper = null;
        }

        const img = document.createElement('img');
        img.src = e.target.result;
        img.style.maxWidth = '100%';
        img.style.display = 'block';
        previewContainer.appendChild(img);

        cropper = new Cropper(img, {
            aspectRatio: 400 / 270,
            viewMode: 1,
            autoCropArea: 1,
            cropBoxResizable: false,
            cropBoxMovable: false,
            dragMode: 'move',
            responsive: true,
            background: false,
        });
    };
    reader.readAsDataURL(file);
  });

  cropButton.addEventListener('click', function () {
    if (cropper) {
        const canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 270,
        });
        croppedResult.src = canvas.toDataURL('image/jpeg');
        croppedContainer.style.display = 'block';
    }
  });

  // Form validation function - runs on submit
  function validateAndScroll() {
    // Remove all previous error indicators
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback.custom-error').remove();
    $('#password_match_error').hide();

    var isValid = true;
    var invalidFields = [];

    // ============================================
    // EXPLICIT FIELD VALIDATION (Industry Standard)
    // Validate fields by ID - doesn't rely on HTML attributes
    // ============================================

    // Validate Name (required, min 2 chars)
    var name = $('#name').val();
    if (!name || name.trim() === '') {
        $('#name').addClass('is-invalid');
        $('#name').parent().append('<div class="invalid-feedback custom-error" style="display: block;">Name is required</div>');
        isValid = false;
        invalidFields.push({ element: $('#name'), offset: $('#name').offset().top });
    } else if (name.trim().length < 2) {
        $('#name').addClass('is-invalid');
        $('#name').parent().append('<div class="invalid-feedback custom-error" style="display: block;">Name must be at least 2 characters</div>');
        isValid = false;
        invalidFields.push({ element: $('#name'), offset: $('#name').offset().top });
    }

    // Validate Email (required, valid format)
    var email = $('#email').val();
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email || email.trim() === '') {
        $('#email').addClass('is-invalid');
        $('#email').parent().append('<div class="invalid-feedback custom-error" style="display: block;">Email is required</div>');
        isValid = false;
        invalidFields.push({ element: $('#email'), offset: $('#email').offset().top });
    } else if (!emailPattern.test(email)) {
        $('#email').addClass('is-invalid');
        $('#email').parent().append('<div class="invalid-feedback custom-error" style="display: block;">Please enter a valid email address</div>');
        isValid = false;
        invalidFields.push({ element: $('#email'), offset: $('#email').offset().top });
    }

    // Validate Password (required, min 6 chars)
    var password = $('#password').val();
    if (!password || password.trim() === '') {
        $('#password').addClass('is-invalid');
        $('#password').next('small').after('<div class="invalid-feedback custom-error" style="display: block;">Password is required</div>');
        isValid = false;
        invalidFields.push({ element: $('#password'), offset: $('#password').offset().top });
    } else if (password.length < 6) {
        $('#password').addClass('is-invalid');
        $('#password').next('small').after('<div class="invalid-feedback custom-error" style="display: block;">Password must be at least 6 characters</div>');
        isValid = false;
        invalidFields.push({ element: $('#password'), offset: $('#password').offset().top });
    }

    // Validate Confirm Password (required, must match)
    var confirmPassword = $('#confirm_password').val();
    if (!confirmPassword || confirmPassword.trim() === '') {
        $('#confirm_password').addClass('is-invalid');
        $('#password_match_error').text('Confirm password is required').show();
        isValid = false;
        invalidFields.push({ element: $('#confirm_password'), offset: $('#confirm_password').offset().top });
    } else if (confirmPassword !== password) {
        $('#confirm_password').addClass('is-invalid');
        $('#password_match_error').text('Passwords do not match').show();
        isValid = false;
        invalidFields.push({ element: $('#confirm_password'), offset: $('#confirm_password').offset().top });
    }

    // Validate Contact Number (required, valid format)
    var contactNo = $('#contact_no').val();
    var phonePattern = /^[\d\s\+\-\(\)]+$/;
    if (!contactNo || contactNo.trim() === '') {
        $('#contact_no').addClass('is-invalid');
        $('#contact_no').next('small').after('<div class="invalid-feedback custom-error" style="display: block;">Contact number is required</div>');
        isValid = false;
        invalidFields.push({ element: $('#contact_no'), offset: $('#contact_no').offset().top });
    } else if (!phonePattern.test(contactNo)) {
        $('#contact_no').addClass('is-invalid');
        $('#contact_no').next('small').after('<div class="invalid-feedback custom-error" style="display: block;">Phone number can only contain numbers, spaces, +, -, or parentheses</div>');
        isValid = false;
        invalidFields.push({ element: $('#contact_no'), offset: $('#contact_no').offset().top });
    }

    // Validate Role (required)
    var roleId = $('#role_id').val();
    if (!roleId || roleId === '' || roleId === null) {
        $('#role_id').addClass('is-invalid');
        $('#role_id').parent().append('<div class="invalid-feedback custom-error" style="display: block;">Please select a role</div>');
        isValid = false;
        invalidFields.push({ element: $('#role_id'), offset: $('#role_id').offset().top });
    }

    // Scroll to first error if validation failed
    if (!isValid && invalidFields.length > 0) {
        // Sort by offset to find topmost field
        invalidFields.sort(function(a, b) {
            return a.offset - b.offset;
        });

        var topField = invalidFields[0].element;

        // Smooth scroll to the topmost error field
        $('html, body').animate({
            scrollTop: topField.offset().top - 100
        }, 500);

        setTimeout(function() {
            topField.focus();
        }, 600);

        return false;
    }

    return true;
  }

  // ============================================
  // 1. INSTANT ERROR REMOVAL (Real-time UX)
  // ============================================
  // Remove errors immediately when user starts typing (clears both JS and Laravel validation errors)
  $('#name, #email, #address').on('input', function() {
    $(this).removeClass('is-invalid');
    // Remove both custom JS errors and server-side Laravel errors
    $(this).siblings('.invalid-feedback').hide();
    $(this).next('.invalid-feedback').hide();
    $(this).siblings('.invalid-feedback.custom-error').remove();
    $(this).next('.invalid-feedback.custom-error').remove();
  });

  $('#contact_no').on('input', function() {
    $(this).removeClass('is-invalid');
    // Remove both custom JS errors and server-side Laravel errors
    $(this).siblings('.invalid-feedback').hide();
    $(this).next('small').next('.invalid-feedback').hide();
    $(this).next('small').next('.invalid-feedback.custom-error').remove();
  });

  $('#password').on('input', function() {
    $(this).removeClass('is-invalid');
    // Remove both custom JS errors and server-side Laravel errors
    $(this).next('small').next('.invalid-feedback').hide();
    $(this).next('small').next('.invalid-feedback.custom-error').remove();
  });

  $('#confirm_password').on('input', function() {
    $(this).removeClass('is-invalid');
    $('#password_match_error').hide();
    // Remove server-side Laravel errors
    $(this).siblings('.invalid-feedback').hide();
    $(this).next('.invalid-feedback').hide();
  });

  $('#role_id').on('change input', function() {
    $(this).removeClass('is-invalid');
    // Remove both custom JS errors and server-side Laravel errors
    $(this).siblings('.invalid-feedback').hide();
    $(this).next('.invalid-feedback').hide();
    $(this).next('.invalid-feedback.custom-error').remove();
  });

  // ============================================
  // 2. BLUR VALIDATION (Detailed field validation)
  // ============================================
  // Validates each field when user leaves it - provides specific error messages

  $('#name').on('blur', function() {
    var value = $(this).val();
    $(this).removeClass('is-invalid');
    $(this).next('.invalid-feedback.custom-error').remove();

    if (!value || value.trim() === '') {
        $(this).addClass('is-invalid');
        $(this).parent().append('<div class="invalid-feedback custom-error" style="display: block;">Name is required</div>');
    } else if (value.trim().length < 2) {
        $(this).addClass('is-invalid');
        $(this).parent().append('<div class="invalid-feedback custom-error" style="display: block;">Name must be at least 2 characters</div>');
    }
  });

  $('#email').on('blur', function() {
    var value = $(this).val();
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    $(this).removeClass('is-invalid');
    $(this).next('.invalid-feedback.custom-error').remove();

    if (!value || value.trim() === '') {
        $(this).addClass('is-invalid');
        $(this).parent().append('<div class="invalid-feedback custom-error" style="display: block;">Email is required</div>');
    } else if (!emailPattern.test(value)) {
        $(this).addClass('is-invalid');
        $(this).parent().append('<div class="invalid-feedback custom-error" style="display: block;">Please enter a valid email address</div>');
    }
  });

  $('#contact_no').on('blur', function() {
    var value = $(this).val();
    var phonePattern = /^[\d\s\+\-\(\)]+$/;
    $(this).removeClass('is-invalid');
    $(this).next('small').next('.invalid-feedback.custom-error').remove();

    if (!value || value.trim() === '') {
        $(this).addClass('is-invalid');
        $(this).parent().append('<div class="invalid-feedback custom-error" style="display: block;">Contact number is required</div>');
    } else if (!phonePattern.test(value)) {
        $(this).addClass('is-invalid');
        $(this).next('small').after('<div class="invalid-feedback custom-error" style="display: block;">Phone number can only contain numbers, spaces, +, -, or parentheses</div>');
    }
  });

  $('#password').on('blur keyup', function() {
    var value = $(this).val();
    $(this).removeClass('is-invalid');
    $(this).next('small').next('.invalid-feedback.custom-error').remove();

    if (!value || value.trim() === '') {
        $(this).addClass('is-invalid');
        $(this).next('small').after('<div class="invalid-feedback custom-error" style="display: block;">Password is required</div>');
    } else if (value.length < 6) {
        $(this).addClass('is-invalid');
        $(this).next('small').after('<div class="invalid-feedback custom-error" style="display: block;">Password must be at least 6 characters</div>');
    }

    // Also check password match if confirm password has value
    var confirmPassword = $('#confirm_password').val();
    if (confirmPassword) {
        $('#confirm_password').trigger('keyup');
    }
  });

  $('#confirm_password').on('blur keyup', function() {
    var value = $(this).val();
    var password = $('#password').val();
    $(this).removeClass('is-invalid');
    $('#password_match_error').hide();

    if (!value || value.trim() === '') {
        $(this).addClass('is-invalid');
        $('#password_match_error').text('Confirm password is required').show();
    } else if (value !== password) {
        $(this).addClass('is-invalid');
        $('#password_match_error').text('Passwords do not match').show();
    }
  });

  $('#role_id').on('blur', function() {
    var value = $(this).val();
    $(this).removeClass('is-invalid');
    $(this).next('.invalid-feedback.custom-error').remove();

    if (!value || value === '') {
        $(this).addClass('is-invalid');
        $(this).parent().append('<div class="invalid-feedback custom-error" style="display: block;">Please select a role</div>');
    }
  });

  // ============================================
  // 3. FORM SUBMISSION (Comprehensive validation)
  // ============================================
  // Final validation check before submitting - prevents invalid data submission

  $('#createUserForm').on('submit', function(e) {
    // Run validation
    if (!validateAndScroll()) {
        e.preventDefault();
        return false;
    }

    // Visual feedback - disable submit button and show loading state
    var $submitBtn = $(this).find('button[type="submit"]');
    var originalText = $submitBtn.text();

    $submitBtn.prop('disabled', true)
              .html('<i class="fas fa-spinner fa-spin"></i> Submitting...')
              .css('opacity', '0.7');

    // Re-enable button after 10 seconds as fallback (in case of network issues)
    setTimeout(function() {
        if ($submitBtn.prop('disabled')) {
            $submitBtn.prop('disabled', false)
                      .text(originalText)
                      .css('opacity', '1');
        }
    }, 10000);

    return true;
  });

  // Auto-dismiss alerts after 5 seconds
  setTimeout(function() {
    $('.alert').fadeOut('slow', function() {
        $(this).remove();
    });
  }, 5000);
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/pages/user/create.blade.php ENDPATH**/ ?>