@extends('backend.layouts.default')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Organization Events</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Organization Events</li>
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
                    <h3 class="card-title">All Events</h3>
                    <a href="{{ route('admin.organization_event.create') }}" class="btn btn-primary btn-sm float-right">
                        Add New Event
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="eventsTable">
                        <thead>
                            <th>Banner</th>
                            <th>Event Name</th>
                            <th>Organization</th>
                            <th>Location</th>
                            <th>Event Date</th>
                            <th>Event Time</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                            <tr>
                                <td>
                                    @if($event->banner_image)
                                        <img src="{{ asset('backend/uploads/organization_event/banner/' . $event->banner_image) }}" class="img-thumbnail" style="height: 50px; width: 80px; object-fit: cover;">
                                    @else
                                        <span class="badge badge-secondary">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $event->event_name }}</td>
                                <td>{{ $event->organization->name ?? 'N/A' }}</td>
                                <td>{{ $event->location ?? 'N/A' }}</td>
                                <td>{{ $event->event_date ? $event->event_date->format('d M Y') : '' }}</td>
                                <td>
                                    @if($event->event_time_start && $event->event_time_end)
                                        {{ \Carbon\Carbon::parse($event->event_time_start)->format('g:i A') }} - {{ \Carbon\Carbon::parse($event->event_time_end)->format('g:i A') }}
                                    @elseif($event->event_time_start)
                                        {{ \Carbon\Carbon::parse($event->event_time_start)->format('g:i A') }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-{{ $event->status ? 'success' : 'danger' }}">
                                        {{ $event->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $event->creator->name ?? 'N/A' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 m-0" type="button" id="actionDropdown{{ $event->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="actionDropdown{{ $event->id }}">
                                            @php
                                                $user = Auth::user();
                                                $isAdmin = $user->role_id == 1 || $user->role_id == 2;
                                                $isOwner = $event->organization && $event->organization->created_by == $user->id;
                                                $canManage = $isAdmin || $isOwner;
                                            @endphp

                                            @if($canManage)
                                                <a class="dropdown-item" href="javascript:void(0);" onclick="toggleStatus({{ $event->id }})">
                                                    @if($event->status)
                                                        <i class="fa fa-times-circle"></i> Deactivate
                                                    @else
                                                        <i class="fa fa-check-circle"></i> Activate
                                                    @endif
                                                </a>
                                            @endif

                                            <a class="dropdown-item" href="{{ route('admin.organization_event.edit', $event->id) }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="deleteEvent({{ $event->id }})">
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

<!-- Toggle Status Confirmation Modal -->
<div class="modal fade" id="toggleModal" tabindex="-1" role="dialog" aria-labelledby="toggleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="toggleModalLabel">Confirm Status Change</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to change the status of this event?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="toggleForm" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary">Yes, Change Status</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="deleteModalLabel">Delete Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this event? This will also delete all associated gallery images.</p>
                <p class="text-danger"><strong>This action cannot be undone!</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
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
        $("#eventsTable").DataTable({pageLength: 25});
    });

    function toggleStatus(eventId) {
        $('#toggleForm').attr('action', '/admin/organization-event/toggle/' + eventId);
        $('#toggleModal').modal('show');
    }

    function deleteEvent(eventId) {
        $('#deleteForm').attr('action', '/admin/organization-event/' + eventId);
        $('#deleteModal').modal('show');
    }
</script>
@endsection
