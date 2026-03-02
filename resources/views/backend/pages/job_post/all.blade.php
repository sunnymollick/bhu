@extends('backend.layouts.default')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Job Posts</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">All Job Posts</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                @if(in_array(auth()->user()->role?->name, ['Admin', 'Super Admin']))
                    All Job Posts
                @else
                    My Job Posts
                @endif
            </h3>
            <a href="{{ route('admin.job_post.create') }}" class="btn btn-primary btn-sm float-right">Create New Job Post</a>
        </div>
        <div class="card-body table-responsive p-0">
            <table id="jobPostsTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Job Title</th>
                        <th>Type</th>
                        <th>Mode</th>
                        <th>Division</th>
                        <th>District</th>
                        <th>Deadline</th>
                        @if(in_array(auth()->user()->role?->name, ['Admin', 'Super Admin']))
                        <th>Posted By</th>
                        @endif
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($jobPosts as $job)
                    <tr>
                        <td>{{ $job->company }}</td>
                        <td>{{ $job->job_title }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $job->job_type)) }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $job->work_mode)) }}</td>
                        <td>{{ optional($job->division)->name }}</td>
                        <td>{{ optional($job->district)->name }}</td>
                        <td>{{ $job->deadline }}</td>
                        @if(in_array(auth()->user()->role?->name, ['Admin', 'Super Admin']))
                        <td>
                            <span class="badge badge-info">{{ optional($job->user)->name ?? 'N/A' }}</span>
                        </td>
                        @endif
                        <td>
                            @if($job->is_approved)
                                <span class="badge badge-success">Approved</span>
                            @else
                                <span class="badge badge-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            @if(!$job->is_approved && in_array(auth()->user()->role?->name, ['Admin', 'Super Admin']))
                                <form action="{{ route('admin.job_post.approve', $job->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button class="btn btn-sm btn-success" title="Approve Job Post">
                                        <i class="fas fa-check"></i> Approve
                                    </button>
                                </form>
                            @endif
                            <a href="{{ route('admin.job_post.edit', $job->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-danger" onclick="showDeleteModal({{ $job->id }}, 'Job Post', '{{ route('admin.job_post.destroy', $job->id) }}')">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="@if(in_array(auth()->user()->role?->name, ['Admin', 'Super Admin'])) 10 @else 9 @endif" class="text-center">
                            No job posts found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
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
        $("#jobPostsTable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "pageLength": 10,
            "order": [[6, "desc"]], // Sort by deadline column descending
            "columnDefs": [
                { "orderable": false, "targets": -1 } // Disable sorting on Actions column
            ]
        });
    });
</script>
@endsection
