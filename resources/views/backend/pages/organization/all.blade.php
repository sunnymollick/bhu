@extends('backend.layouts.default')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Organization List</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Organization</li>
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
                    <h3 class="card-title">Organization List</h3>
                    <a href="{{ route('admin.organization.create') }}" class="btn btn-primary btn-sm float-right">
                        Create Organization
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="organizationsTable">
                        <thead>
                            <th>Name</th>
                            <th>Division</th>
                            <th>District</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($organizations as $o)
                            <tr>
                                <td>{{ $o->name }}</td>
                                <td>{{ $o->division->name ?? '' }}</td>
                                <td>{{ $o->district->name ?? '' }}</td>
                                <td>{{ $o->organization_type }}</td>
                                <td>
                                    <span class="badge badge-{{ $o->status == 'approved' ? 'success' : ($o->status == 'rejected' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($o->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 m-0" type="button" id="actionDropdown{{ $o->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="actionDropdown{{ $o->id }}">
                                            <a class="dropdown-item" href="{{ route('admin.organization.edit', $o->id) }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <button class="dropdown-item text-danger" type="button" data-toggle="modal" data-target="#deleteModal{{ $o->id }}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                            @if($o->status !== 'approved' && (Auth::user()->role_id == 1 || Auth::user()->role_id == 2))
                                            <form method="POST" action="{{ route('admin.organization.approve', $o->id) }}" style="display:inline;">
                                                @csrf
                                                <button class="dropdown-item text-success" type="submit">
                                                    <i class="fa fa-check"></i> Approve
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $o->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title text-white" id="deleteModalLabel{{ $o->id }}">Confirm Delete</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete the organization <strong>"{{ $o->name }}"</strong>?</p>
                                            <p class="text-muted">This action cannot be undone.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form method="POST" action="{{ route('admin.organization.destroy', $o->id) }}" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts_plugin')
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
@endsection
@section('scripts_custom')
<script>
    $(function () {
        $("#organizationsTable").DataTable({
            pageLength: 25,
            order: []  // Disable initial sorting to maintain backend order
        });
    });
</script>
@endsection
