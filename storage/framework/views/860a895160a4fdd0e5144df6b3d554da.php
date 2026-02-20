<?php $__env->startSection('stylesheet'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Job Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.job_post.all')); ?>">All Job Posts</a></li>
                    <li class="breadcrumb-item active">Create Job Post</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Create Job Post</h3>
        </div>
        <form method="POST" action="<?php echo e(route('admin.job_post.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Company</label>
                        <input type="text" name="company" class="form-control" required value="<?php echo e(old('company')); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Job Title</label>
                        <input type="text" name="job_title" class="form-control" required value="<?php echo e(old('job_title')); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Job Category</label>
                        <select name="job_category_id" class="form-control" required>
                            <option value="">Select</option>
                            <?php $__currentLoopData = $jobCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>" <?php echo e(old('job_category_id') == $cat->id ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Job Industry</label>
                        <select name="job_industry_id" class="form-control" required>
                            <option value="">Select</option>
                            <?php $__currentLoopData = $jobIndustries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ind): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($ind->id); ?>" <?php echo e(old('job_industry_id') == $ind->id ? 'selected' : ''); ?>><?php echo e($ind->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Job Type</label>
                        <select name="job_type" class="form-control" required>
                            <option value="">Select</option>
                            <option value="full_time" <?php echo e(old('job_type')=='full_time'?'selected':''); ?>>Full Time</option>
                            <option value="part_time" <?php echo e(old('job_type')=='part_time'?'selected':''); ?>>Part Time</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Work Mode</label>
                        <select name="work_mode" class="form-control" required>
                            <option value="">Select</option>
                            <option value="remote" <?php echo e(old('work_mode')=='remote'?'selected':''); ?>>Remote</option>
                            <option value="in_person" <?php echo e(old('work_mode')=='in_person'?'selected':''); ?>>In-person</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Division</label>
                        <select name="division_id" id="division_id" class="form-control">
                            <option value="">Select Division</option>
                            <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($division->id); ?>" <?php echo e(old('division_id')==$division->id?'selected':''); ?>><?php echo e($division->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>District</label>
                        <select name="district_id" id="district_id" class="form-control">
                            <option value="">Select Division First</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label>About</label>
                    <textarea name="about" class="form-control summernote"><?php echo e(old('about')); ?></textarea>
                </div>
                <div class="mb-3">
                    <label>Requirements and Qualifications</label>
                    <textarea name="requirements" class="form-control summernote"><?php echo e(old('requirements')); ?></textarea>
                </div>
                <div class="mb-3">
                    <label>Preferred Experience and Skills</label>
                    <textarea name="preferred_experience" class="form-control summernote"><?php echo e(old('preferred_experience')); ?></textarea>
                </div>
                <div class="mb-3">
                    <label>Responsibilities</label>
                    <textarea name="responsibilities" class="form-control summernote"><?php echo e(old('responsibilities')); ?></textarea>
                </div>
                <div class="mb-3">
                    <label>Why Join Us</label>
                    <textarea name="why_join_us" class="form-control summernote"><?php echo e(old('why_join_us')); ?></textarea>
                </div>
                <div class="mb-3">
                    <label>Application Deadline</label>
                    <input type="date" name="deadline" class="form-control" value="<?php echo e(old('deadline')); ?>">
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Submit</button>
                <a href="<?php echo e(route('admin.job_post.all')); ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts_plugin'); ?>
<script src="<?php echo e(asset('backend/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts_custom'); ?>
<script>
    $(function () {
        $('.summernote').summernote({height: 150});

        // Load districts when division is selected
        $('#division_id').on('change', function() {
            var divisionId = $(this).val();
            var districtSelect = $('#district_id');

            // Clear current districts
            districtSelect.html('<option value="">Loading...</option>');

            if (divisionId) {
                $.ajax({
                    url: '/admin/get-districts/' + divisionId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        districtSelect.html('<option value="">Select District</option>');
                        $.each(data, function(key, district) {
                            districtSelect.append('<option value="' + district.id + '">' + district.name + '</option>');
                        });
                    },
                    error: function() {
                        districtSelect.html('<option value="">Error loading districts</option>');
                    }
                });
            } else {
                districtSelect.html('<option value="">Select Division First</option>');
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/pages/job_post/create.blade.php ENDPATH**/ ?>