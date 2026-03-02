<?php $__env->startSection('stylesheet'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>News List</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
            <li class="breadcrumb-item active">News</li>
        </ol>
        </div>
    </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">News List</h3>
                    <a href="<?php echo e(route('admin.news.add')); ?>" class="btn btn-primary btn-sm float-right">
                        Create News
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="newsTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Date & Time</th>
                                <th>Created By</th>
                                <th>Status</th>
                                <th>Gallery</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $newsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e(Str::limit($news->title, 50)); ?></td>
                                <td><?php echo e($news->location); ?></td>
                                <td><?php echo e($news->date_time->format('d M Y, h:i A')); ?></td>
                                <td><?php echo e($news->creator?->name ?? 'N/A'); ?></td>
                                <td>
                                    <?php if($news->status == 'approved'): ?>
                                        <span class="badge badge-success">Approved</span>
                                    <?php elseif($news->status == 'disapproved'): ?>
                                        <span class="badge badge-danger">Disapproved</span>
                                    <?php else: ?>
                                        <span class="badge badge-warning">Pending</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($news->attachments && count($news->attachments) > 0): ?>
                                        <a href="#" class="btn btn-sm btn-info gallery-btn" data-images='<?php echo json_encode($news->attachments, 15, 512) ?>'>
                                            <i class="fa fa-image"></i> (<?php echo e(count($news->attachments)); ?>)
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted">No files</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('admin.news.edit', $news->id)); ?>" class="btn btn-sm btn-primary" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <?php if(in_array(Auth::user()->role?->name, ['Super Admin', 'Admin']) && $news->status !== 'approved'): ?>
                                        <button class="btn btn-sm btn-success approve-news-btn" data-id="<?php echo e($news->id); ?>" title="Approve">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <?php endif; ?>
                                        <button class="btn btn-sm btn-danger" onclick="showDeleteModal(<?php echo e($news->id); ?>, 'News', '<?php echo e(route('admin.news.delete', $news->id)); ?>')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="galleryModalLabel">Attachments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex flex-wrap" id="galleryImages">
        <!-- Images will be loaded here -->
      </div>
    </div>
  </div>
</div>

<!-- Full Image Modal -->
<div class="modal fade" id="fullImageModal" tabindex="-1" role="dialog" aria-labelledby="fullImageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:auto;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img id="fullImage" src="" class="img-fluid" style="max-width:100%; max-height:80vh;">
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts_plugin'); ?>
<script src="<?php echo e(asset('backend/plugins/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts_custom'); ?>
<script>
    $(function () {
        $("#newsTable").DataTable({pageLength: 25});
    });

    // $(document).on('click', '.gallery-btn', function(e) {
    //     e.preventDefault();
    //     let images = $(this).data('images');
    //     let html = '';
    //     if (Array.isArray(images)) {
    //         images.forEach(function(img) {
    //             html += `<img src="/${img}" class="img-thumbnail m-2 gallery-thumb" style="max-width:150px;cursor:pointer;" data-full="/${img}">`;
    //         });
    //     } else {
    //         html = '<p>No images found.</p>';
    //     }
    //     $('#galleryImages').html(html);
    //     $('#galleryModal').modal('show');
    // });

    $(document).on('click', '.gallery-btn', function(e) {
        e.preventDefault();
        let images = $(this).data('images');
        // Fallback: if images is a string, try to parse it
        if (typeof images === 'string') {
            try {
                images = JSON.parse(images);
            } catch (e) {
                images = [];
            }
        }
        let html = '';
        if (Array.isArray(images)) {
            images.forEach(function(img) {
                html += `<img src="/${img}" class="img-thumbnail m-2 gallery-thumb" style="max-width:150px;cursor:pointer;" data-full="/${img}">`;
            });
        } else {
            html = '<p>No images found.</p>';
        }
        $('#galleryImages').html(html);
        $('#galleryModal').modal('show');
    });

    // Show full image in modal when thumbnail is clicked
    $(document).on('click', '.gallery-thumb', function() {
        var fullImg = $(this).data('full');
        $('#fullImage').attr('src', fullImg);
        $('#fullImageModal').modal('show');
    });

    // Handle approve button click
    $(document).on('click', '.approve-news-btn', function(e) {
        e.preventDefault();
        var newsId = $(this).data('id');
        if(confirm('Are you sure you want to approve this news item?')) {
            $.ajax({
                url: "<?php echo e(url('admin/news/approve')); ?>/" + newsId,
                type: 'POST',
                data: {
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/pages/news/all.blade.php ENDPATH**/ ?>