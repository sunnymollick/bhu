@extends('backend.layouts.default')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<style>
    /* Fix dropdown text overflow */
    .dropdown-menu .dropdown-item {
        white-space: normal;
        word-wrap: break-word;
        padding: 8px 15px;
        font-size: 14px;
    }
    .dropdown-menu {
        min-width: 250px;
    }
</style>
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>User List</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">User</li>
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
                    <h3 class="card-title">User List</h3>
                    <a href="{{ route('admin.user.add') }}" class="btn btn-primary btn-sm float-right">
                        Create User
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="usersTable">
                        <thead>
                            <th style="display:none;">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Role</th>
                            <th>Reference Verified</th>
                            <th>Approval Status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                            <tr>
                                <td style="display:none;">{{ $u->id }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->contact_no }}</td>
                                <td>{{ $u->role?->name ?? 'N/A' }}</td>
                                <td>
                                    @if($u->is_verified === null)
                                        <span class="badge badge-secondary">Pending</span>
                                    @elseif($u->is_verified == 1)
                                        <span class="badge badge-success">Verified</span>
                                    @else
                                        <span class="badge badge-danger">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    @if($u->is_approved)
                                        <span class="badge badge-success">Approved</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if($u->active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 m-0" type="button" id="actionDropdown{{ $u->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="actionDropdown{{ $u->id }}">
                                            @if($u->is_verified === null && !in_array($u->role_id, [1, 2]))
                                                <a class="dropdown-item" href="{{ route('admin.user.show-verification-reminder', $u->id) }}">
                                                    <i class="fa fa-envelope"></i> Send Email For Complete Verification
                                                </a>
                                                <div class="dropdown-divider"></div>
                                            @endif
                                            @if(!$u->is_approved)
                                                <a class="dropdown-item approve-user-btn" href="#" data-id="{{ $u->id }}">
                                                    <i class="fa fa-check"></i> Approve
                                                </a>
                                            @endif
                                            <a class="dropdown-item toggle-active-btn" href="#" data-id="{{ $u->id }}" data-active="{{ $u->active }}">
                                                <i class="fa fa-{{ $u->active ? 'ban' : 'check-circle' }}"></i> {{ $u->active ? 'Make Inactive' : 'Make Active' }}
                                            </a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="showDeleteModal({{ $u->id }}, 'User', '{{ route('admin.user.destroy', $u->id) }}')">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </div>
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

<!-- Approve Confirmation Modal -->
<div class="modal fade" id="approveUserModal" tabindex="-1" role="dialog" aria-labelledby="approveUserModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="approveUserForm" method="POST" action="">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Approve User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to approve this user?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Approve</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Toggle Active/Inactive Modal -->
<div class="modal fade" id="toggleActiveModal" tabindex="-1" role="dialog" aria-labelledby="toggleActiveModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="toggleActiveForm" method="POST" action="">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="toggleActiveModalTitle">Toggle User Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="toggleActiveModalBody">
          Are you sure you want to change this user's status?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" id="toggleActiveBtn">Confirm</button>
        </div>
      </div>
    </form>
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
        $("#usersTable").DataTable({
            pageLength: 25,
            order: [[0, 'desc']], // Sort by ID column (index 0) in descending order
            columnDefs: [
                { targets: 0, visible: false } // Hide the ID column
            ]
        });
    });

    // Handle approve button click
    $(document).on('click', '.approve-user-btn', function(e) {
        e.preventDefault();
        var userId = $(this).data('id');
        var action = "{{ url('admin/user/approve') }}/" + userId;
        $('#approveUserForm').attr('action', action);
        $('#approveUserModal').modal('show');
    });

    // Handle active/inactive toggle button click
    $(document).on('click', '.toggle-active-btn', function(e) {
        e.preventDefault();
        var userId = $(this).data('id');
        var isActive = $(this).data('active');
        var action = "{{ url('admin/user/toggle-active') }}/" + userId;

        if(isActive) {
            $('#toggleActiveModalTitle').text('Make User Inactive');
            $('#toggleActiveModalBody').text('Are you sure you want to make this user inactive?');
            $('#toggleActiveBtn').removeClass('btn-success').addClass('btn-warning').text('Make Inactive');
        } else {
            $('#toggleActiveModalTitle').text('Make User Active');
            $('#toggleActiveModalBody').text('Are you sure you want to make this user active?');
            $('#toggleActiveBtn').removeClass('btn-warning').addClass('btn-success').text('Make Active');
        }

        $('#toggleActiveForm').attr('action', action);
        $('#toggleActiveModal').modal('show');
    });
</script>
@endsection
