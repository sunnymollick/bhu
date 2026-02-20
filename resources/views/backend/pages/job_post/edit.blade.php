@extends('backend.layouts.default')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Job Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.job_post.all') }}">All Job Posts</a></li>
                    <li class="breadcrumb-item active">Edit Job Post</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="card card-warning">
        <div class="card-header"><h3 class="card-title">Edit Job Post</h3></div>
        <form method="POST" action="{{ route('admin.job_post.update', $job->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Company</label>
                        <input type="text" name="company" class="form-control" required value="{{ old('company', $job->company) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Job Title</label>
                        <input type="text" name="job_title" class="form-control" required value="{{ old('job_title', $job->job_title) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Job Category</label>
                        <select name="job_category_id" class="form-control" required>
                            <option value="">Select</option>
                            @foreach($jobCategories as $cat)
                                <option value="{{ $cat->id }}" {{ old('job_category_id', $job->job_category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Job Industry</label>
                        <select name="job_industry_id" class="form-control" required>
                            <option value="">Select</option>
                            @foreach($jobIndustries as $ind)
                                <option value="{{ $ind->id }}" {{ old('job_industry_id', $job->job_industry_id) == $ind->id ? 'selected' : '' }}>{{ $ind->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Job Type</label>
                        <select name="job_type" class="form-control" required>
                            <option value="">Select</option>
                            <option value="full_time" {{ old('job_type', $job->job_type)=='full_time'?'selected':'' }}>Full Time</option>
                            <option value="part_time" {{ old('job_type', $job->job_type)=='part_time'?'selected':'' }}>Part Time</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Work Mode</label>
                        <select name="work_mode" class="form-control" required>
                            <option value="">Select</option>
                            <option value="remote" {{ old('work_mode', $job->work_mode)=='remote'?'selected':'' }}>Remote</option>
                            <option value="in_person" {{ old('work_mode', $job->work_mode)=='in_person'?'selected':'' }}>In-person</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Division</label>
                        <select name="division_id" id="division_id" class="form-control">
                            <option value="">Select Division</option>
                            @foreach($divisions as $division)
                                <option value="{{ $division->id }}" {{ old('division_id', $job->division_id)==$division->id?'selected':'' }}>{{ $division->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>District</label>
                        <select name="district_id" id="district_id" class="form-control">
                            <option value="">{{ count($districts) > 0 ? 'Select District' : 'Select Division First' }}</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ old('district_id', $job->district_id)==$district->id?'selected':'' }}>{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label>About</label>
                    <textarea name="about" class="form-control summernote">{{ old('about', $job->about) }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Requirements and Qualifications</label>
                    <textarea name="requirements" class="form-control summernote">{{ old('requirements', $job->requirements) }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Preferred Experience and Skills</label>
                    <textarea name="preferred_experience" class="form-control summernote">{{ old('preferred_experience', $job->preferred_experience) }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Responsibilities</label>
                    <textarea name="responsibilities" class="form-control summernote">{{ old('responsibilities', $job->responsibilities) }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Why Join Us</label>
                    <textarea name="why_join_us" class="form-control summernote">{{ old('why_join_us', $job->why_join_us) }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Application Deadline</label>
                    <input type="date" name="deadline" class="form-control" value="{{ old('deadline', $job->deadline) }}">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('admin.job_post.all') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts_plugin')
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection
@section('scripts_custom')
<script>
    $(function () {
        $('.summernote').summernote({height: 150});

        // Load districts when division is selected
        $('#division_id').on('change', function() {
            var divisionId = $(this).val();
            var districtSelect = $('#district_id');
            var currentDistrictId = '{{ old("district_id", $job->district_id) }}';

            // Clear current districts
            districtSelect.html('<option value="">Loading...</option>');

            if (divisionId) {
                $.ajax({
                    url: '/admin/get-districts/' + divisionId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        districtSelect.html('<option value="">Select District</option>');
                        $.each(data, function(key, district) {
                            var selected = (district.id == currentDistrictId) ? 'selected' : '';
                            districtSelect.append('<option value="' + district.id + '" ' + selected + '>' + district.name + '</option>');
                        });
                    },
                    error: function() {
                        districtSelect.html('<option value="">Error loading districts</option>');
                    }
                });
            } else {
                districtSelect.html('<option value="">Select Division First</option>');
            }
        });
    });
</script>
@endsection
