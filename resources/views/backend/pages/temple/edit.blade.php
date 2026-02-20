@extends('backend.layouts.default')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Edit Temple</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.temple.all') }}">All Temples</a></li>
            <li class="breadcrumb-item active">Edit Temple</li>
        </ol>
        </div>
    </div>
    </div>
</section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Temple</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.temple.update', $temple->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Temple Name (মন্দিরের নাম)</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $temple->name) }}">
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="textarea" name="description" placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description', $temple->description) }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Location</legend>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address</label> 
                                            <input type="text" name="address" class="form-control" id="address" value="{{ old('address', $temple->address) }}">
                                            <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude', $temple->latitude) }}" />
                                            <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude', $temple->longitude) }}" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Division (বিভাগ)</label>
                                            <select id="division-select" class="form-control select2" name="division_id" style="width: 100%;">
                                                <option value="">Select Division</option>
                                                @foreach($divisions as $division)
                                                    <option value="{{ $division->id }}" {{ $temple->division_id == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>District (জেলা)</label>
                                            <select id="district-select" class="form-control select2" name="district_id" style="width: 100%;">
                                                <option value="">Select District</option>
                                                @foreach($districts as $district)
                                                    <option value="{{ $district->id }}" {{ $temple->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Upazila (উপজেলা)</label>
                                            <select id="upazila-select" class="form-control select2" name="upazila_id" style="width: 100%;">
                                                <option value="">Select Upazila</option>
                                                @foreach($upazilas as $upazila)
                                                    <option value="{{ $upazila->id }}" {{ $temple->upazila_id == $upazila->id ? 'selected' : '' }}>{{ $upazila->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Union Parishad (ইউনিয়ন পরিষদ)</label>
                                            <input type="text" class="form-control" name="union_parisad" value="{{ old('union_parisad', $temple->union_parisad) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Village (গ্রাম)</label>
                                            <input type="text" class="form-control" name="village" value="{{ old('village', $temple->village) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="city_corp">City Corporation (সিটি কর্পোরেশন)</label>
                                            <input type="text" class="form-control" name="city_corp" value="{{ old('city_corp', $temple->city_corp) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="ward">Ward (ওয়ার্ড)</label>
                                            <input type="text" class="form-control" name="ward" value="{{ old('ward', $temple->ward) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="thana">Thana (থানা)</label>
                                            <input type="text" class="form-control" name="thana" value="{{ old('thana', $temple->thana) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="post_office">Post Office / ডাকঘর</label>
                                            <input type="text" class="form-control" name="post_office" value="{{ old('post_office', $temple->post_office) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="zipcode">Zip Code / পোস্ট কোড</label>
                                            <input type="text" class="form-control" name="zipcode" value="{{ old('zipcode', $temple->zipcode) }}">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Contact Person</legend>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label for="contact_name">Name (ব্যক্তির নাম)</label>
                                            <input type="text" class="form-control" name="contact_name" value="{{ old('contact_name', $temple->contact_name) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Contact No. (মোবাইল নম্বর)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="contact_no" value="{{ old('contact_no', $temple->contact_no) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Designation (পদবী)</label>
                                            <input type="text" class="form-control" name="designation" value="{{ old('designation', $temple->designation) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="nid">NID</label>
                                            <input type="text" class="form-control" name="nid" value="{{ old('nid', $temple->nid) }}">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Activities</legend>
                                <div class="row">
                                @foreach ($categories as $category)
                                    <div class="col-sm-6 col-md-4 mb-4">
                                        <div class="p-3 border rounded shadow-sm h-100">
                                            <h5 class="fw-bold">
                                                {{ $category->name }}
                                                @if($category->name_bn)
                                                    <small class="text-muted">({{ $category->name_bn }})</small>
                                                @endif
                                            </h5>
                                            <hr>
                                            @if($category->activities->count())
                                                @foreach ($category->activities as $activity)
                                                    <div class="form-check mb-1">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            name="activities[]"
                                                            value="{{ $activity->id }}"
                                                            id="activity-{{ $activity->id }}"
                                                            {{ in_array($activity->id, $temple->activities->pluck('activity_id')->toArray()) ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="activity-{{ $activity->id }}">
                                                            {{ $activity->title }}
                                                            @if($activity->title_bn)
                                                                <small class="text-muted">({{ $activity->title_bn }})</small>
                                                            @endif
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-muted">No activities available.</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="main_picture">Main Picture</label>
                                        <input type="file" name="main_picture" class="form-control">
                                        @if($temple->main_picture)
                                            <div class="mt-2">
                                                <img src="{{ asset('backend/uploads/temple/profile/'.$temple->main_picture) }}" style="max-width:120px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Image Gallery</legend>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="file" name="images[]" multiple class="form-control">
                                        @if($temple->gallery && count($temple->gallery))
                                            <div class="mt-3">
                                                <label>Existing Gallery Images:</label>
                                                <div>
                                                    @foreach($temple->gallery as $img)
                                                        <img src="{{ asset('backend/uploads/temple/gallery/'.$img->picture) }}" class="img-thumbnail m-1" style="max-width:80px;">
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.temple.all') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
@endsection
@section('scripts_plugin')
<script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTRqyVq5k6iX60e382PGnio2_vWLd2yCg&libraries=places"></script>
@endsection
@section('scripts_custom')
<script>
$(document).ready(function () {
    $('#division-select').on('change', function () {
        let divisionId = $(this).val();
        $('#district-select').html('<option value="">Loading...</option>');
        $('#upazila-select').html('<option value="">Select Upazila</option>');

        if (divisionId) {
            $.ajax({
                url: '/admin/get-districts/' + divisionId,
                type: 'GET',
                success: function (data) {
                    $('#district-select').html('<option value="">Select District</option>');
                    $.each(data, function (key, district) {
                        $('#district-select').append('<option value="' + district.id + '">' + district.name + '</option>');
                    });
                }
            });
        } else {
            $('#district-select').html('<option value="">Select District</option>');
        }
    });

    $('#district-select').on('change', function () {
        let districtId = $(this).val();
        $('#upazila-select').html('<option value="">Loading...</option>');

        if (districtId) {
            $.ajax({
                url: '/admin/get-upazilas/' + districtId,
                type: 'GET',
                success: function (data) {
                    $('#upazila-select').html('<option value="">Select Upazila</option>');
                    $.each(data, function (key, upazila) {
                        $('#upazila-select').append('<option value="' + upazila.id + '">' + upazila.name + '</option>');
                    });
                }
            });
        } else {
            $('#upazila-select').html('<option value="">Select Upazila</option>');
        }
    });
});
</script>
<script>
  $(function () {
    $('.select2').select2()
  });
</script>
<script>
    let autocomplete;
    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('address'),
            { types: ['geocode'] }
        );
        autocomplete.addListener('place_changed', function() {
            const place = autocomplete.getPlace();
            if (place.geometry) {
                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();
            }
        });
    }
    window.onload = initAutocomplete;
</script>
<script>
    $(function () {
        $('.textarea').summernote()
    })
</script>
@endsection
