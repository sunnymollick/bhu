@extends('backend.layouts.default')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>News List</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
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
                    <a href="{{ route('admin.news.add') }}" class="btn btn-primary btn-sm float-right">
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
                            @foreach($newsList as $index => $news)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ Str::limit($news->title, 50) }}</td>
                                <td>{{ $news->location }}</td>
                                <td>{{ $news->date_time->format('d M Y, h:i A') }}</td>
                                <td>{{ $news->creator?->name ?? 'N/A' }}</td>
                                <td>
                                    @if($news->status == 'approved')
                                        <span class="badge badge-success">Approved</span>
                                    @elseif($news->status == 'disapproved')
                                        <span class="badge badge-danger">Disapproved</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($news->attachments && count($news->attachments) > 0)
                                        <a href="#" class="btn btn-sm btn-info gallery-btn" data-images='@json($news->attachments)'>
                                            <i class="fa fa-image"></i> ({{ count($news->attachments) }})
                                        </a>
                                    @else
                                        <span class="text-muted">No files</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if(in_array(Auth::user()->role?->name, ['Super Admin', 'Admin']) && $news->status !== 'approved')
                                        <button class="btn btn-sm btn-success approve-news-btn" data-id="{{ $news->id }}" title="Approve">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        @endif
                                        <button class="btn btn-sm btn-danger" onclick="showDeleteModal({{ $news->id }}, 'News', '{{ route('admin.news.delete', $news->id) }}')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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
@endsection


@section('scripts_plugin')
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
@endsection
@section('scripts_custom')
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
                url: "{{ url('admin/news/approve') }}/" + newsId,
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    });

</script>
@endsection
