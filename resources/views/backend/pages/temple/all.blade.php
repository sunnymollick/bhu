@extends('backend.layouts.default')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Temple List</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Temple</li>
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
                    <h3 class="card-title">Temple List</h3>
                    <a href="{{ route('admin.temple.add') }}" class="btn btn-primary btn-sm float-right">
                        Create Temple
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="templesTable">
                        <thead>
                            <th>Name</th>
                            <th>Division</th>
                            <th>District</th>
                            <th>Upazila</th>
                            <th>Contact Person</th>
                            <th>Contact No.</th>
                            <th>Active</th>
                            <th>Approval</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($temples as $t)
                            <tr>
                                <td>{{ $t->name }}</td>
                                <td>{{ $t->division->name }}</td>
                                <td>{{ $t->district->name }}</td>
                                <td>{{ $t->upazila?->name ?? '' }}</td>
                                <td>{{ $t->contact_name }}</td>
                                <td>{{ $t->contact_no }}</td>
                                <td>
                                    @if($t->status)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if($t->approval_status == 'approved')
                                        <span class="badge badge-success">Approved</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                                <td>{{ $t->creator->name ?? 'N/A' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 m-0" type="button" id="actionDropdown{{ $t->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="actionDropdown{{ $t->id }}">
                                            @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                                @if($t->approval_status == 'pending')
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="approveTemple({{ $t->id }})">
                                                        <i class="fa fa-check"></i> Approve
                                                    </a>
                                                @endif
                                            @endif
                                            @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || $t->created_by == Auth::id())
                                                @if($t->status)
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="toggleTemple({{ $t->id }})">
                                                        <i class="fa fa-ban"></i> Deactivate
                                                    </a>
                                                @else
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="toggleTemple({{ $t->id }})">
                                                        <i class="fa fa-check-circle"></i> Activate
                                                    </a>
                                                @endif
                                            @endif
                                            <a class="dropdown-item" href="{{ route('admin.temple.edit', $t->id) }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="showDeleteModal({{ $t->id }}, 'Temple', '{{ route('admin.temple.destroy', $t->id) }}')">
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
<div class="modal fade" id="approveTempleModal" tabindex="-1" role="dialog" aria-labelledby="approveTempleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="approveTempleForm" method="POST" action="">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Approve Temple</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to approve this temple?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Approve</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Toggle Status Confirmation Modal -->
<div class="modal fade" id="toggleTempleModal" tabindex="-1" role="dialog" aria-labelledby="toggleTempleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="toggleTempleForm" method="POST" action="">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Toggle Temple Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to change the status of this temple?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
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
        $("#templesTable").DataTable({pageLength: 25});
    });

    // Handle approve button click
    function approveTemple(templeId) {
        var action = "{{ url('admin/temple/approve') }}/" + templeId;
        $('#approveTempleForm').attr('action', action);
        $('#approveTempleModal').modal('show');
    }

    // Handle toggle status button click
    function toggleTemple(templeId) {
        var action = "{{ url('admin/temple/toggle') }}/" + templeId;
        $('#toggleTempleForm').attr('action', action);
        $('#toggleTempleModal').modal('show');
    }
</script>
@endsection
