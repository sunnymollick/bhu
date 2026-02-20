@extends('backend.layouts.default')

@section('stylesheet')
<style>
    .edit-profile-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        overflow: hidden;
        margin-bottom: 2rem;
        border: none;
    }

    .edit-profile-header {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        padding: 1.5rem;
        color: #fff;
    }

    .profile-preview-wrapper {
        text-align: center;
        margin-bottom: 2rem;
        padding: 2rem;
        background: linear-gradient(135deg, rgba(220, 138, 69, 0.05) 0%, rgba(92, 85, 85, 0.05) 100%);
        border-radius: 15px;
    }

    .profile-preview-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 6px solid #fff;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        background: #f8f9fa;
    }

    .btn-choose-photo {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        border: none;
        color: #fff;
        padding: 0.6rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        margin-top: 1rem;
        transition: all 0.3s;
    }

    .btn-choose-photo:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(220, 138, 69, 0.3);
        color: #fff;
    }

    .btn-save-profile {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        border: none;
        color: #fff;
        padding: 0.75rem 3rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 5px 15px rgba(220, 138, 69, 0.25);
    }

    .btn-save-profile:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(220, 138, 69, 0.35);
        color: #fff;
    }

    .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .form-control {
        border: 2px solid #ecf0f1;
        border-radius: 10px;
        padding: 0.65rem 1rem;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #dc8a45;
        box-shadow: 0 0 0 0.2rem rgba(220, 138, 69, 0.15);
    }

    .section-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #2c3e50;
        margin: 2rem 0 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 3px solid #dc8a45;
        display: inline-block;
    }

    .document-preview {
        display: block;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 12px;
        margin-top: 1rem;
        border: 2px dashed #dc8a45;
        text-align: center;
    }

    .document-preview img {
        max-width: 100%;
        max-height: 250px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .document-preview .file-info {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        font-size: 1.1rem;
        color: #2c3e50;
    }

    @media (max-width: 768px) {
        .profile-preview-img { width: 120px; height: 120px; }
    }
</style>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.profile') }}">Profile</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="edit-profile-card">
                    <div class="edit-profile-header">
                        <h3 class="mb-0"><i class="fas fa-user-edit mr-2"></i>Update Your Profile</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.user.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Profile Picture Section -->
                            <div class="profile-preview-wrapper">
                                <img id="profilePreview" class="profile-preview-img" src="{{ $user->profile_pic ? asset('backend/uploads/user/' . $user->profile_pic) : asset('frontend/assets/img/man-avatar.png') }}" alt="Profile Picture">
                                <div class="mt-3">
                                    <label for="profile_pic" class="btn btn-choose-photo">
                                        <i class="fas fa-camera mr-2"></i>Choose Photo
                                    </label>
                                    <input type="file" id="profile_pic" name="profile_pic" class="d-none" accept="image/*">
                                    <small class="d-block text-muted mt-2">Allowed: JPG, JPEG, PNG, GIF (Max: 2MB)</small>
                                </div>
                            </div>

                            <!-- Personal Information -->
                            <h4 class="section-title"><i class="fas fa-user mr-2"></i>Personal Information</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                        @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_no" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control @error('contact_no') is-invalid @enderror" id="contact_no" name="contact_no" value="{{ old('contact_no', $user->contact_no) }}">
                                        @error('contact_no')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

            </div>

            <!-- Location Details -->
            <h4 class="section-title"><i class="fas fa-map-marker-alt mr-2"></i>Location Details</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                        <select class="form-control @error('country') is-invalid @enderror" id="country" name="country" required>
                            @include('partials.country-select')
                        </select>
                        @error('country')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="division_id" class="form-label">Division <small class="text-muted">(Bangladesh only)</small></label>
                        <select class="form-control @error('division_id') is-invalid @enderror" id="division_id" name="division_id" {{ old('country', $user->country) != 'Bangladesh' ? 'disabled' : '' }}>
                            <option value="">Select Division</option>
                            @foreach($divisions as $division)
                                <option value="{{ $division->id }}" {{ old('division_id', $user->division_id) == $division->id ? 'selected' : '' }}>
                                    {{ $division->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('division_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="district_id" class="form-label">District <small class="text-muted">(Bangladesh only)</small></label>
                        <select class="form-control @error('district_id') is-invalid @enderror" id="district_id" name="district_id" {{ old('country', $user->country) != 'Bangladesh' ? 'disabled' : '' }}>
                            <option value="">Select District</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ old('district_id', $user->district_id) == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('district_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="upazila_id" class="form-label">Upazila <small class="text-muted">(Bangladesh only)</small></label>
                        <select class="form-control @error('upazila_id') is-invalid @enderror" id="upazila_id" name="upazila_id" {{ old('country', $user->country) != 'Bangladesh' ? 'disabled' : '' }}>
                            <option value="">Select Upazila</option>
                            @foreach($upazilas as $upazila)
                                <option value="{{ $upazila->id }}" {{ old('upazila_id', $user->upazila_id) == $upazila->id ? 'selected' : '' }}>
                                    {{ $upazila->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('upazila_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="street_address_1" class="form-label">Street Address</label>
                        <input type="text" class="form-control @error('street_address_1') is-invalid @enderror" id="street_address_1" name="street_address_1" value="{{ old('street_address_1', $user->street_address_1) }}" placeholder="House/Flat No, Street Name">
                        @error('street_address_1')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $user->city) }}">
                        @error('city')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{ old('state', $user->state) }}">
                        @error('state')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="zipcode" class="form-label">ZIP Code</label>
                        <input type="text" class="form-control @error('zipcode') is-invalid @enderror" id="zipcode" name="zipcode" value="{{ old('zipcode', $user->zipcode) }}">
                        @error('zipcode')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

                            <!-- Identity Documents -->
                            <h4 class="section-title"><i class="fas fa-id-card mr-2"></i>Identity Documents</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nid" class="form-label"><i class="fas fa-id-card mr-1"></i> NID Document</label>
                                        <input type="file" class="form-control @error('nid') is-invalid @enderror" id="nid" name="nid" accept=".pdf,.jpg,.jpeg,.png">
                                        @if($user->nid)
                                            <small class="text-success d-block mt-2">
                                                <i class="fas fa-check-circle"></i> Current:
                                                <a href="{{ asset('backend/uploads/users/documents/' . $user->nid) }}" target="_blank" class="text-primary">View Document</a>
                                            </small>
                                        @endif
                                        <small class="text-muted d-block mt-1">Allowed: PDF, JPG, JPEG, PNG (Max: 2MB)</small>
                                        @error('nid')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passport" class="form-label"><i class="fas fa-passport mr-1"></i> Passport Document</label>
                                        <input type="file" class="form-control @error('passport') is-invalid @enderror" id="passport" name="passport" accept=".pdf,.jpg,.jpeg,.png">
                                        @if($user->passport)
                                            <small class="text-success d-block mt-2">
                                                <i class="fas fa-check-circle"></i> Current:
                                                <a href="{{ asset('backend/uploads/users/documents/' . $user->passport) }}" target="_blank" class="text-primary">View Document</a>
                                            </small>
                                        @endif
                                        <small class="text-muted d-block mt-1">Allowed: PDF, JPG, JPEG, PNG (Max: 2MB)</small>
                                        @error('passport')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-4 pt-3 border-top">
                                <div class="d-flex justify-content-between align-items-center flex-wrap" style="gap: 10px;">
                                    <a href="{{ route('admin.user.profile') }}" class="btn btn-secondary btn-lg">
                                        <i class="fas fa-arrow-left mr-2"></i>Back to Profile
                                    </a>
                                    <button type="submit" class="btn btn-save-profile btn-lg">
                                        <i class="fas fa-save mr-2"></i>Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>

                        <script>
                        // Profile picture preview
                        document.getElementById('profile_pic').addEventListener('change', function(e) {
                            const file = e.target.files[0];
                            if (file && file.type.match('image.*')) {
                                const reader = new FileReader();
                                reader.onload = function(event) {
                                    document.getElementById('profilePreview').src = event.target.result;
                                };
                                reader.readAsDataURL(file);
                            }
                        });

                        // NID document preview
                        document.getElementById('nid').addEventListener('change', function(e) {
                            const file = e.target.files[0];
                            let existingPreview = document.getElementById('nidPreview');
                            if (existingPreview) existingPreview.remove();

                            if (file) {
                                const preview = document.createElement('div');
                                preview.id = 'nidPreview';
                                preview.className = 'document-preview';

                                if (file.type.match('image.*')) {
                                    const reader = new FileReader();
                                    reader.onload = function(event) {
                                        preview.innerHTML = '<img src="' + event.target.result + '" alt="NID Preview">';
                                    };
                                    reader.readAsDataURL(file);
                                } else if (file.type === 'application/pdf') {
                                    preview.innerHTML = '<div class="file-info"><i class="fas fa-file-pdf text-danger fa-3x"></i><div><strong>PDF Document</strong><br><small>' + file.name + '</small></div></div>';
                                } else {
                                    preview.innerHTML = '<div class="file-info"><i class="fas fa-file text-secondary fa-3x"></i><div><strong>Document</strong><br><small>' + file.name + '</small></div></div>';
                                }

                                this.closest('.form-group').appendChild(preview);
                            }
                        });

                        // Passport document preview
                        document.getElementById('passport').addEventListener('change', function(e) {
                            const file = e.target.files[0];
                            let existingPreview = document.getElementById('passportPreview');
                            if (existingPreview) existingPreview.remove();

                            if (file) {
                                const preview = document.createElement('div');
                                preview.id = 'passportPreview';
                                preview.className = 'document-preview';

                                if (file.type.match('image.*')) {
                                    const reader = new FileReader();
                                    reader.onload = function(event) {
                                        preview.innerHTML = '<img src="' + event.target.result + '" alt="Passport Preview">';
                                    };
                                    reader.readAsDataURL(file);
                                } else if (file.type === 'application/pdf') {
                                    preview.innerHTML = '<div class="file-info"><i class="fas fa-file-pdf text-danger fa-3x"></i><div><strong>PDF Document</strong><br><small>' + file.name + '</small></div></div>';
                                } else {
                                    preview.innerHTML = '<div class="file-info"><i class="fas fa-file text-secondary fa-3x"></i><div><strong>Document</strong><br><small>' + file.name + '</small></div></div>';
                                }

                                this.closest('.form-group').appendChild(preview);
                            }
                        });

                        // Set current country value on page load
                        const currentCountry = "{{ old('country', $user->country) }}";
                        if (currentCountry) {
                            document.getElementById('country').value = currentCountry;
                        }

                        // Country change handler
                        document.getElementById('country').addEventListener('change', function() {
                            const divisionSelect = document.getElementById('division_id');
                            const districtSelect = document.getElementById('district_id');
                            const upazilaSelect = document.getElementById('upazila_id');

                            if (this.value === 'Bangladesh') {
                                divisionSelect.disabled = false;
                                districtSelect.disabled = false;
                                upazilaSelect.disabled = false;
                            } else {
                                divisionSelect.disabled = true;
                                districtSelect.disabled = true;
                                upazilaSelect.disabled = true;
                                divisionSelect.value = '';
                                districtSelect.value = '';
                                upazilaSelect.value = '';
                                districtSelect.innerHTML = '<option value="">Select District</option>';
                                upazilaSelect.innerHTML = '<option value="">Select Upazila</option>';
                            }
                        });

                        // Division change handler - load districts
                        document.getElementById('division_id').addEventListener('change', function() {
                            const divisionId = this.value;
                            const districtSelect = document.getElementById('district_id');
                            const upazilaSelect = document.getElementById('upazila_id');

                            districtSelect.innerHTML = '<option value="">Loading...</option>';
                            districtSelect.disabled = true;
                            upazilaSelect.innerHTML = '<option value="">Select Upazila</option>';
                            upazilaSelect.value = '';

                            if (divisionId) {
                                fetch(`/api/get-districts/${divisionId}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        districtSelect.innerHTML = '<option value="">Select District</option>';
                                        if (data.success && data.districts) {
                                            data.districts.forEach(district => {
                                                const option = document.createElement('option');
                                                option.value = district.id;
                                                option.textContent = district.name;
                                                districtSelect.appendChild(option);
                                            });
                                        }
                                        districtSelect.disabled = false;
                                    })
                                    .catch(error => {
                                        console.error('Error loading districts:', error);
                                        districtSelect.innerHTML = '<option value="">Error loading districts</option>';
                                    });
                            } else {
                                districtSelect.innerHTML = '<option value="">Select District</option>';
                                districtSelect.disabled = false;
                            }
                        });

                        // District change handler - load upazilas
                        document.getElementById('district_id').addEventListener('change', function() {
                            const districtId = this.value;
                            const upazilaSelect = document.getElementById('upazila_id');

                            upazilaSelect.innerHTML = '<option value="">Loading...</option>';
                            upazilaSelect.disabled = true;

                            if (districtId) {
                                fetch(`/api/get-upazilas/${districtId}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        upazilaSelect.innerHTML = '<option value="">Select Upazila</option>';
                                        if (data.success && data.upazilas) {
                                            data.upazilas.forEach(upazila => {
                                                const option = document.createElement('option');
                                                option.value = upazila.id;
                                                option.textContent = upazila.name;
                                                upazilaSelect.appendChild(option);
                                            });
                                        }
                                        upazilaSelect.disabled = false;
                                    })
                                    .catch(error => {
                                        console.error('Error loading upazilas:', error);
                                        upazilaSelect.innerHTML = '<option value="">Error loading upazilas</option>';
                                    });
                            } else {
                                upazilaSelect.innerHTML = '<option value="">Select Upazila</option>';
                                upazilaSelect.disabled = false;
                            }
                        });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
