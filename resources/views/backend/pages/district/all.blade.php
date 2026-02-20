@extends('backend.layouts.default')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>District List</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">District</li>
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
                    <h3 class="card-title">District List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="districtsTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>District</th>
                                <th>District (Bengali)</th>
                                <th>Division</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($districts as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->name_bn ?? 'N/A' }}</td>
                                <td>{{ $d->division }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-btn"
                                            data-id="{{ $d->id }}"
                                            data-division-id="{{ $d->division_id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Edit District</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    <input type="hidden" id="district_id">
                    <div class="form-group">
                        <label>Division <span class="text-danger">*</span></label>
                        <select class="form-control" id="division_id" required>
                            <option value="">Select Division</option>
                            @foreach($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label>Name (Bengali)</label>
                        <input type="text" class="form-control" id="name_bn">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveBtn">Save Changes</button>
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
    // Initialize DataTable
    $("#districtsTable").DataTable({
        pageLength: 20,
        responsive: true,
        order: [[0, 'asc']]
    });

    // Edit button click
    $('.edit-btn').on('click', function() {
        const id = $(this).data('id');

        $.get(`/admin/district/edit/${id}`, function(data) {
            $('#district_id').val(data.id);
            $('#name').val(data.name);
            $('#name_bn').val(data.name_bn);
            $('#division_id').val(data.division_id);
            $('#editModal').modal('show');
        });
    });

    // Save button click
    $('#saveBtn').on('click', function() {
        const id = $('#district_id').val();
        const data = {
            _token: '{{ csrf_token() }}',
            name: $('#name').val(),
            name_bn: $('#name_bn').val(),
            division_id: $('#division_id').val()
        };

        $.ajax({
            url: `/admin/district/update/${id}`,
            method: 'PUT',
            data: data,
            success: function(response) {
                toastr.success(response.message);
                $('#editModal').modal('hide');
                location.reload();
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    for (let field in errors) {
                        toastr.error(errors[field][0]);
                    }
                } else {
                    toastr.error('An error occurred');
                }
            }
        });
    });
});
</script>
@endsection
