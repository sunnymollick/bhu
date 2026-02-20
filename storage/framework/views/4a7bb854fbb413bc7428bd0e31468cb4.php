<?php $__env->startSection('stylesheet'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/select2/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Edit Temple</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.temple.all')); ?>">All Temples</a></li>
            <li class="breadcrumb-item active">Edit Temple</li>
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
                        <h3 class="card-title">Edit Temple</h3>
                    </div>
                    <form method="POST" action="<?php echo e(route('admin.temple.update', $temple->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Temple Name (মন্দিরের নাম)</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $temple->name)); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="textarea" name="description" placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo e(old('description', $temple->description)); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Location</legend>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address</label> 
                                            <input type="text" name="address" class="form-control" id="address" value="<?php echo e(old('address', $temple->address)); ?>">
                                            <input type="hidden" id="latitude" name="latitude" value="<?php echo e(old('latitude', $temple->latitude)); ?>" />
                                            <input type="hidden" id="longitude" name="longitude" value="<?php echo e(old('longitude', $temple->longitude)); ?>" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Division (বিভাগ)</label>
                                            <select id="division-select" class="form-control select2" name="division_id" style="width: 100%;">
                                                <option value="">Select Division</option>
                                                <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($division->id); ?>" <?php echo e($temple->division_id == $division->id ? 'selected' : ''); ?>><?php echo e($division->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>District (জেলা)</label>
                                            <select id="district-select" class="form-control select2" name="district_id" style="width: 100%;">
                                                <option value="">Select District</option>
                                                <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($district->id); ?>" <?php echo e($temple->district_id == $district->id ? 'selected' : ''); ?>><?php echo e($district->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Upazila (উপজেলা)</label>
                                            <select id="upazila-select" class="form-control select2" name="upazila_id" style="width: 100%;">
                                                <option value="">Select Upazila</option>
                                                <?php $__currentLoopData = $upazilas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upazila): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($upazila->id); ?>" <?php echo e($temple->upazila_id == $upazila->id ? 'selected' : ''); ?>><?php echo e($upazila->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Union Parishad (ইউনিয়ন পরিষদ)</label>
                                            <input type="text" class="form-control" name="union_parisad" value="<?php echo e(old('union_parisad', $temple->union_parisad)); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Village (গ্রাম)</label>
                                            <input type="text" class="form-control" name="village" value="<?php echo e(old('village', $temple->village)); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="city_corp">City Corporation (সিটি কর্পোরেশন)</label>
                                            <input type="text" class="form-control" name="city_corp" value="<?php echo e(old('city_corp', $temple->city_corp)); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="ward">Ward (ওয়ার্ড)</label>
                                            <input type="text" class="form-control" name="ward" value="<?php echo e(old('ward', $temple->ward)); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="thana">Thana (থানা)</label>
                                            <input type="text" class="form-control" name="thana" value="<?php echo e(old('thana', $temple->thana)); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="post_office">Post Office / ডাকঘর</label>
                                            <input type="text" class="form-control" name="post_office" value="<?php echo e(old('post_office', $temple->post_office)); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="zipcode">Zip Code / পোস্ট কোড</label>
                                            <input type="text" class="form-control" name="zipcode" value="<?php echo e(old('zipcode', $temple->zipcode)); ?>">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Contact Person</legend>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="contact_name">Name (ব্যক্তির নাম)</label>
                                            <input type="text" class="form-control" name="contact_name" value="<?php echo e(old('contact_name', $temple->contact_name)); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Contact No. (মোবাইল নম্বর)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="contact_no" value="<?php echo e(old('contact_no', $temple->contact_no)); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Designation (পদবী)</label>
                                            <input type="text" class="form-control" name="designation" value="<?php echo e(old('designation', $temple->designation)); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="nid">NID</label>
                                            <input type="text" class="form-control" name="nid" value="<?php echo e(old('nid', $temple->nid)); ?>">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Activities</legend>
                                <div class="row">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-sm-6 col-md-4 mb-4">
                                        <div class="p-3 border rounded shadow-sm h-100">
                                            <h5 class="fw-bold">
                                                <?php echo e($category->name); ?>

                                                <?php if($category->name_bn): ?>
                                                    <small class="text-muted">(<?php echo e($category->name_bn); ?>)</small>
                                                <?php endif; ?>
                                            </h5>
                                            <hr>
                                            <?php if($category->activities->count()): ?>
                                                <?php $__currentLoopData = $category->activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="form-check mb-1">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            name="activities[]"
                                                            value="<?php echo e($activity->id); ?>"
                                                            id="activity-<?php echo e($activity->id); ?>"
                                                            <?php echo e(in_array($activity->id, $temple->activities->pluck('activity_id')->toArray()) ? 'checked' : ''); ?>

                                                        >
                                                        <label class="form-check-label" for="activity-<?php echo e($activity->id); ?>">
                                                            <?php echo e($activity->title); ?>

                                                            <?php if($activity->title_bn): ?>
                                                                <small class="text-muted">(<?php echo e($activity->title_bn); ?>)</small>
                                                            <?php endif; ?>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <p class="text-muted">No activities available.</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="main_picture">Main Picture</label>
                                        <input type="file" name="main_picture" class="form-control">
                                        <?php if($temple->main_picture): ?>
                                            <div class="mt-2">
                                                <img src="<?php echo e(asset('backend/uploads/temple/profile/'.$temple->main_picture)); ?>" style="max-width:120px;">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Image Gallery</legend>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="file" name="images[]" multiple class="form-control">
                                        <?php if($temple->gallery && count($temple->gallery)): ?>
                                            <div class="mt-3">
                                                <label>Existing Gallery Images:</label>
                                                <div>
                                                    <?php $__currentLoopData = $temple->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <img src="<?php echo e(asset('backend/uploads/temple/gallery/'.$img->picture)); ?>" class="img-thumbnail m-1" style="max-width:80px;">
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?php echo e(route('admin.temple.all')); ?>" class="btn btn-secondary">Cancel</a>
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
<script src="<?php echo e(asset('backend/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTRqyVq5k6iX60e382PGnio2_vWLd2yCg&libraries=places"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts_custom'); ?>
<script>
$(document).ready(function () {
    $('#division-select').on('change', function () {
        let divisionId = $(this).val();
        $('#district-select').html('<option value="">Loading...</option>');
        $('#upazila-select').html('<option value="">Select Upazila</option>');

        if (divisionId) {
            $.ajax({
                url: '/admin/get-districts/' + divisionId,
                type: 'GET',
                success: function (data) {
                    $('#district-select').html('<option value="">Select District</option>');
                    $.each(data, function (key, district) {
                        $('#district-select').append('<option value="' + district.id + '">' + district.name + '</option>');
                    });
                }
            });
        } else {
            $('#district-select').html('<option value="">Select District</option>');
        }
    });

    $('#district-select').on('change', function () {
        let districtId = $(this).val();
        $('#upazila-select').html('<option value="">Loading...</option>');

        if (districtId) {
            $.ajax({
                url: '/admin/get-upazilas/' + districtId,
                type: 'GET',
                success: function (data) {
                    $('#upazila-select').html('<option value="">Select Upazila</option>');
                    $.each(data, function (key, upazila) {
                        $('#upazila-select').append('<option value="' + upazila.id + '">' + upazila.name + '</option>');
                    });
                }
            });
        } else {
            $('#upazila-select').html('<option value="">Select Upazila</option>');
        }
    });
});
</script>
<script>
  $(function () {
    $('.select2').select2()
  });
</script>
<script>
    let autocomplete;
    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('address'),
            { types: ['geocode'] }
        );
        autocomplete.addListener('place_changed', function() {
            const place = autocomplete.getPlace();
            if (place.geometry) {
                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();
            }
        });
    }
    window.onload = initAutocomplete;
</script>
<script>
    $(function () {
        $('.textarea').summernote()
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/pages/temple/edit.blade.php ENDPATH**/ ?>