@extends('backend.layouts.default')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Upazila List</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Upazila</li>
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
                    <h3 class="card-title">Upazila List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="upazilasTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Upazila</th>
                                <th>Upazila (Bengali)</th>
                                <th>District</th>
                                <th>Division</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($upazilas as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->upazila }}</td>
                                <td>{{ $d->name_bn ?? 'N/A' }}</td>
                                <td>{{ $d->district }}</td>
                                <td>{{ $d->division }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-btn"
                                            data-id="{{ $d->id }}"
                                            data-division-id="{{ $d->division_id }}"
                                            data-district-id="{{ $d->district_id }}">
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
                <h5 class="modal-title">Edit Upazila</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    <input type="hidden" id="upazila_id">
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
                        <label>District <span class="text-danger">*</span></label>
                        <select class="form-control" id="district_id" required>
                            <option value="">Select District</option>
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
    $("#upazilasTable").DataTable({
        pageLength: 20,
        responsive: true,
        order: [[0, 'asc']]
    });

    // Division change - load districts
    $('#division_id').on('change', function() {
        const divisionId = $(this).val();
        $('#district_id').html('<option value="">Loading...</option>');

        if (divisionId) {
            $.get(`/admin/get-districts/${divisionId}`, function(data) {
                let options = '<option value="">Select District</option>';
                data.forEach(district => {
                    options += `<option value="${district.id}">${district.name}</option>`;
                });
                $('#district_id').html(options);
            });
        } else {
            $('#district_id').html('<option value="">Select District</option>');
        }
    });

    // Edit button click
    $('.edit-btn').on('click', function() {
        const id = $(this).data('id');
        const divisionId = $(this).data('division-id');
        const districtId = $(this).data('district-id');

        $.get(`/admin/upazila/edit/${id}`, function(data) {
            $('#upazila_id').val(data.id);
            $('#name').val(data.name);
            $('#name_bn').val(data.name_bn);
            $('#division_id').val(divisionId);

            // Load districts for selected division
            $.get(`/admin/get-districts/${divisionId}`, function(districts) {
                let options = '<option value="">Select District</option>';
                districts.forEach(district => {
                    const selected = district.id == districtId ? 'selected' : '';
                    options += `<option value="${district.id}" ${selected}>${district.name}</option>`;
                });
                $('#district_id').html(options);
                $('#editModal').modal('show');
            });
        });
    });

    // Save button click
    $('#saveBtn').on('click', function() {
        const id = $('#upazila_id').val();
        const data = {
            _token: '{{ csrf_token() }}',
            name: $('#name').val(),
            name_bn: $('#name_bn').val(),
            division_id: $('#division_id').val(),
            district_id: $('#district_id').val()
        };

        $.ajax({
            url: `/admin/upazila/update/${id}`,
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
