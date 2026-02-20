@extends('backend.layouts.default')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Add Organization</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.organization.all') }}">All Organizations</a></li>
            <li class="breadcrumb-item active">Add Organization</li>
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
                        <h3 class="card-title">Create New Organization</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.organization.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Organization Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Website</label>
                                        <input type="text" name="website" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Division</label>
                                        <select name="division_id" id="division_id" class="form-control select2">
                                            <option value="">Select Division</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">District</label>
                                        <select name="district_id" id="district_id" class="form-control select2">
                                            <option value="">Select District</option>
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}" data-division-id="{{ $district->division_id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Organization Type <span class="text-danger">*</span></label>
                                        <select name="organization_type" id="organization_type" class="form-control" required>
                                            <option value="">Select Organization Type</option>
                                            <option value="business">Business</option>
                                            <option value="religious">Religious</option>
                                            <option value="both">Both</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <fieldset class="scheduler-border" id="business-categories-section" style="display: none;">
                                <legend class="scheduler-border">Business Categories & Activities</legend>
                                <div class="row">
                                    @foreach ($businessCategories as $category)
                                        <div class="col-sm-6 col-md-4 mb-4">
                                            <div class="p-3 border rounded shadow-sm h-100">
                                                <h5 class="fw-bold">
                                                    {{ $category->name }}
                                                    @if($category->name_bn)
                                                        <small class="text-muted">({{ $category->name_bn }})</small>
                                                    @endif
                                                </h5>
                                                <hr>
                                                @if($category->businesses->count())
                                                    @foreach ($category->businesses as $business)
                                                        <div class="form-check mb-1">
                                                            <input
                                                                class="form-check-input"
                                                                type="checkbox"
                                                                name="business_ids[]"
                                                                value="{{ $business->id }}"
                                                                id="business-{{ $business->id }}"
                                                            >
                                                            <label class="form-check-label" for="business-{{ $business->id }}">
                                                                {{ $business->title }}
                                                                @if($business->title_bn)
                                                                    <small class="text-muted">({{ $business->title_bn }})</small>
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

                            <fieldset class="scheduler-border" id="religious-categories-section" style="display: none;">
                                <legend class="scheduler-border">Religious Categories & Activities</legend>
                                <div class="row">
                                    @foreach ($religiousCategories as $category)
                                        <div class="col-sm-6 col-md-4 mb-4">
                                            <div class="p-3 border rounded shadow-sm h-100">
                                                <h5 class="fw-bold">
                                                    {{ $category->name }}
                                                    @if($category->name_bn)
                                                        <small class="text-muted">({{ $category->name_bn }})</small>
                                                    @endif
                                                </h5>
                                                <hr>
                                                @if($category->businesses->count())
                                                    @foreach ($category->businesses as $business)
                                                        <div class="form-check mb-1">
                                                            <input
                                                                class="form-check-input"
                                                                type="checkbox"
                                                                name="business_ids[]"
                                                                value="{{ $business->id }}"
                                                                id="business-{{ $business->id }}"
                                                            >
                                                            <label class="form-check-label" for="business-{{ $business->id }}">
                                                                {{ $business->title }}
                                                                @if($business->title_bn)
                                                                    <small class="text-muted">({{ $business->title_bn }})</small>
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
                            <!-- End Business Category and Business as checkboxes -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" name="address" id="address" class="form-control">
                                        <input type="hidden" id="latitude" name="latitude" />
                                        <input type="hidden" id="longitude" name="longitude" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Registration No</label>
                                        <input type="text" name="registration_no" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Established Date</label>
                                        <input type="date" name="established_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Contact Person Name</label>
                                        <input type="text" name="contact_person_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Contact Person Role</label>
                                        <input type="text" name="contact_person_role" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Logo</label>
                                        <input type="file" name="logo" class="form-control">
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
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.organization.all') }}" class="btn btn-secondary">Cancel</a>
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
  $(function () {
    $('.summernote').summernote({
        height: 200
    });

    // Initialize select2
    $('#division_id').select2();
    $('#district_id').select2();

    // Store all districts for filtering
    var allDistricts = [];
    $('#district_id option').each(function() {
        if ($(this).val() !== '') {
            allDistricts.push({
                id: $(this).val(),
                text: $(this).text(),
                divisionId: $(this).data('division-id')
            });
        }
    });

    // Filter districts based on selected division
    $('#division_id').on('change', function() {
        var divisionId = $(this).val();
        var $districtSelect = $('#district_id');

        // Destroy select2
        $districtSelect.select2('destroy');

        // Clear all options except the first one
        $districtSelect.empty().append('<option value="">Select District</option>');

        if (divisionId) {
            // Add only districts that belong to selected division
            allDistricts.forEach(function(district) {
                if (district.divisionId == divisionId) {
                    $districtSelect.append(new Option(district.text, district.id));
                }
            });
        } else {
            // Add all districts if no division selected
            allDistricts.forEach(function(district) {
                $districtSelect.append(new Option(district.text, district.id));
            });
        }

        // Reinitialize select2
        $districtSelect.select2();
    });
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
    // Handle organization type change to show/hide category sections
    $(document).ready(function() {
        $('#organization_type').on('change', function() {
            var orgType = $(this).val();

            if (orgType === 'business') {
                $('#business-categories-section').show();
                $('#religious-categories-section').hide();
            } else if (orgType === 'religious') {
                $('#business-categories-section').hide();
                $('#religious-categories-section').show();
            } else if (orgType === 'both') {
                $('#business-categories-section').show();
                $('#religious-categories-section').show();
            } else {
                $('#business-categories-section').hide();
                $('#religious-categories-section').hide();
            }
        });
    });
</script>
@endsection
