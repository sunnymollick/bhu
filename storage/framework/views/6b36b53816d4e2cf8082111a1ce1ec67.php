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
</style>
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
        <h1>Edit News</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.news.all')); ?>">All News</a></li>
            <li class="breadcrumb-item active">Edit News</li>
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
                        <h3 class="card-title">Edit News</h3>
                    </div>
                    <form method="POST" action="<?php echo e(route('admin.news.update', $news->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Title of the Incident</label>
                                        <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $news->title)); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="location">Location (District, City, Village)</label>
                                        <input type="text" name="location" class="form-control" value="<?php echo e(old('location', $news->location)); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date_time">Date & Time of Incident</label>
                                        <input type="datetime-local" name="date_time" class="form-control" value="<?php echo e(old('date_time', \Carbon\Carbon::parse($news->date_time)->format('Y-m-d\TH:i'))); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Details</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>What happened?</label>
                                            <textarea name="what" class="form-control" required><?php echo e(old('what', $news->what)); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>When did it happen?</label>
                                            <textarea name="when" class="form-control" required><?php echo e(old('when', $news->when)); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Why did it happen?</label>
                                            <textarea name="why" class="form-control" required><?php echo e(old('why', $news->why)); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Who was involved?</label>
                                            <textarea name="who" class="form-control" required><?php echo e(old('who', $news->who)); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Where did it happen?</label>
                                            <textarea name="where" class="form-control" required><?php echo e(old('where', $news->where)); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>How did it happen?</label>
                                            <textarea name="how" class="form-control" required><?php echo e(old('how', $news->how)); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="victim_testimony">Victim's Testimony or Comment</label>
                                        <textarea name="victim_testimony" class="form-control" required><?php echo e(old('victim_testimony', $news->victim_testimony)); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="opposition_reaction">Opposition Reaction (if known)</label>
                                        <textarea name="opposition_reaction" class="form-control"><?php echo e(old('opposition_reaction', $news->opposition_reaction)); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="media_coverage">Media Coverage (if any)</label>
                                        <textarea name="media_coverage" class="form-control"><?php echo e(old('media_coverage', $news->media_coverage)); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Contact (can be anonymous or encrypted)</label>
                                        <input type="text" name="contact" class="form-control" value="<?php echo e(old('contact', $news->contact)); ?>">
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="is_confidential" class="form-check-input" id="is_confidential" value="1" <?php echo e(old('is_confidential', $news->is_confidential) ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="is_confidential">Keep my information confidential</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="witness_statement">Witness Statement (optional)</label>
                                        <textarea name="witness_statement" class="form-control"><?php echo e(old('witness_statement', $news->witness_statement)); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="government_response">Government Response (if any)</label>
                                        <textarea name="government_response" class="form-control"><?php echo e(old('government_response', $news->government_response)); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="attachments">Attachments (photo, video, documents)</label>
                                        <input type="file" name="attachments[]" multiple class="form-control">
                                        <?php if(is_array($news->attachments) && count($news->attachments)): ?>
                                            <div class="mt-2">
                                                <label>Existing Attachments:</label>
                                                <div>
                                                    <?php $__currentLoopData = $news->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <a href="/<?php echo e($img); ?>" target="_blank">
                                                            <img src="/<?php echo e($img); ?>" class="img-thumbnail m-1" style="max-width:80px;">
                                                        </a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Final News (Optional)</legend>
                                <div class="form-group">
                                    <label for="final_news">Final News (Optional)</label>
                                    <textarea name="final_news" class="form-control textarea" rows="10"><?php echo e(old('final_news', $news->final_news)); ?></textarea>
                                </div>
                            </fieldset>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts_custom'); ?>
<script>
  $(function () {
    $('.select2').select2()
  });
  $(function () {
    $('.textarea').summernote()
  })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/pages/news/edit.blade.php ENDPATH**/ ?>