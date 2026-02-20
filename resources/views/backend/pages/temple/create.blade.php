@extends('backend.layouts.default')
@section('stylesheet')
<style>
fieldset.scheduler-border {
    border: 1px groove #72cce0 !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
    width:auto;
    padding:0 10px;
    border-bottom:none;
}
.preview-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 20px;
}

.preview-container img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border: 2px solid #ccc;
    border-radius: 8px;
    padding: 5px;
}
</style>
<link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Add Temple</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.temple.all') }}">All Temples</a></li>
            <li class="breadcrumb-item active">Add Temple</li>
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
                        <h3 class="card-title">Create New Temple</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.temple.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Temple Name (মন্দিরের নাম)</label>
                                            <input type="text" name="name" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                        <textarea name="description" class="form-control summernote" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Location</legend>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <input type="text" name="address" class="form-control" id="address">
                                                <input type="hidden" id="latitude" name="latitude" />
                                                <input type="hidden" id="longitude" name="longitude" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label>Division (বিভাগ)</label>
                                                <select id="division-select" class="form-control select2" name="division_id" style="width: 100%;">
                                                    <option value="">Select Division</option>
                                                    @foreach($divisions as $division)
                                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label>District (জেলা)</label>
                                                <select id="district-select" class="form-control select2" name="district_id" style="width: 100%;">
                                                    <option value="">Select District</option>

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

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label>Union Parishad (ইউনিয়ন পরিষদ)</label>
                                                <input type="text" class="form-control" name="union_parisad">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label>Village (গ্রাম)</label>
                                                <input type="text" class="form-control" name="village">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="">City Corporation (সিটি কর্পোরেশন)</label>
                                                <input type="text" class="form-control" name="city_corp">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="">Ward (ওয়ার্ড)</label>
                                                <input type="text" class="form-control" name="ward">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="">Thana (থানা)</label>
                                                <input type="text" class="form-control" name="thana">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="">Post Office / ডাকঘর</label>
                                                <input type="text" class="form-control" name="post_office">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="">Zip Code / পোস্ট কোড</label>
                                                <input type="text" class="form-control" name="zipcode">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Contact Person</legend>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="">Name (ব্যক্তির নাম)</label>
                                                <input type="text" class="form-control" name="contact_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label>Contact No. (মোবাইল নম্বর)</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="contact_no">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label>Designation (পদবী)</label>
                                                <input type="text" class="form-control" name="designation">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label for="">NID</label>
                                                <input type="text" class="form-control" name="nid">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" name="residential_facility" id="residential_facility" value="1">
                                                <label class="form-check-label" for="residential_facility">
                                                    Residential Facility
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="main_picture">Main Picture</label>
                                            <input type="file" name="main_picture" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Image Galley</legend>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="file-upload-wrapper">
                                                <!-- <label for="imageInput">Choose Images</label> -->
                                                <span id="fileCount">No images selected</span>
                                            </div>
                                            <input type="file" name="images[]" id="imageInput" multiple>

                                            <div class="preview-container" id="preview"></div>
                                        </div>
                                    </div>
                                </fieldset>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
    $('.select2').select2();
    $('.summernote').summernote({height: 200});
  });
</script>
<script>
    const imageInput = document.getElementById('imageInput');
    const previewContainer = document.getElementById('preview');
    const fileCountLabel = document.getElementById('fileCount');

    imageInput.addEventListener('change', function () {
        const selectedFiles = Array.from(this.files);

        selectedFiles.forEach(file => {
            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                previewContainer.appendChild(img);

                // Update label after image is added
                fileCountLabel.textContent = `${previewContainer.children.length} image${previewContainer.children.length > 1 ? 's' : ''} selected`;
            };
            reader.readAsDataURL(file);
        });

        // this.value = '';
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

    // Initialize autocomplete when the page loads
    window.onload = initAutocomplete;
</script>
<script>
    $(function () {
        $('.textarea').summernote()
    })
</script>
@endsection
