@extends('backend.layouts.default')

@section('stylesheet')
<style>
    :root {
        --primary-gradient: linear-gradient(to right, #dc8a45, #5c5555);
        --card-shadow: 0 10px 40px rgba(0,0,0,0.08);
    }

    .profile-hero-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: var(--card-shadow);
        margin-bottom: 2rem;
        border: none;
        position: relative;
        padding-top: 120px;
    }

    .profile-hero-header {
        background: var(--primary-gradient);
        padding: 2rem;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 140px;
        border-radius: 20px 20px 0 0;
    }

    .profile-avatar-wrapper {
        position: absolute;
        top: 70px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
    }

    .profile-avatar {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        object-fit: cover;
        border: 6px solid #fff;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        background: #f8f9fa;
        display: block;
    }

    .profile-info {
        padding: 1rem 2rem 2rem;
        text-align: center;
        padding-top: 5rem;
    }

    .profile-name {
        font-size: 1.75rem;
        font-weight: 700;
        color: #2c3e50;
        margin: 0.5rem 0 0.5rem;
    }

    .profile-role {
        color: #7f8c8d;
        font-size: 1.1rem;
        margin-bottom: 1rem;
    }

    .btn-edit-profile {
        background: var(--primary-gradient);
        border: none;
        color: #fff;
        padding: 0.65rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 5px 15px rgba(220, 138, 69, 0.25);
    }

    .btn-edit-profile:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(220, 138, 69, 0.35);
        color: #fff;
    }

    .btn-student-toggle {
        background: linear-gradient(135deg, #27ae60, #229954);
        border: none;
        color: #fff;
        padding: 0.65rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 5px 15px rgba(39, 174, 96, 0.25);
    }

    .btn-student-toggle:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(39, 174, 96, 0.35);
        color: #fff;
    }

    .stat-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: var(--card-shadow);
        padding: 1.5rem;
        text-align: center;
        margin-bottom: 1rem;
        border: none;
    }

    .stat-icon {
        width: 55px;
        height: 55px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 0.75rem;
        font-size: 1.4rem;
        color: #fff;
    }

    .stat-icon.email { background: linear-gradient(to right, #dc8a45, #5c5555); }
    .stat-icon.phone { background: linear-gradient(135deg, #e74c3c, #c0392b); }
    .stat-icon.calendar { background: linear-gradient(135deg, #3498db, #2980b9); }

    .stat-label {
        color: #7f8c8d;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        color: #2c3e50;
        font-size: 0.95rem;
        font-weight: 600;
        word-break: break-word;
    }

    .details-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: var(--card-shadow);
        padding: 2rem;
        margin-bottom: 2rem;
        border: none;
    }

    .card-title-modern {
        font-size: 1.4rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 3px solid #dc8a45;
        display: inline-block;
    }

    .detail-item {
        padding: 0.75rem 0;
        border-bottom: 1px solid #ecf0f1;
    }

    .detail-item:last-child { border-bottom: none; }

    .detail-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.35rem;
        font-size: 0.9rem;
    }

    .detail-value {
        color: #7f8c8d;
        font-size: 0.95rem;
    }

    .status-badge {
        display: inline-block;
        padding: 0.4rem 1rem;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        margin: 0.25rem;
    }

    @media (max-width: 768px) {
        .profile-avatar { width: 110px; height: 110px; margin-top: -3rem; }
        .profile-name { font-size: 1.4rem; }
        .profile-hero-header { padding: 2rem 1rem 3rem; }
    }
</style>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>My Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Profile Card -->
            <div class="col-lg-4 col-md-5 col-12">
                <div class="profile-hero-card">
                    <div class="profile-hero-header"></div>
                    <div class="profile-avatar-wrapper">
                        <img class="profile-avatar" src="{{ $user->profile_pic ? asset('backend/uploads/user/' . $user->profile_pic) : asset('frontend/assets/img/man-avatar.png') }}" alt="{{ $user->name }}">
                    </div>
                    <div class="profile-info">
                        <h2 class="profile-name">{{ $user->name }}</h2>

                        <div class="mb-3">
                            @php
                                $userRole = $user->role?->name;
                                $isAdminRole = in_array($userRole, ['Admin', 'Super Admin']);
                            @endphp

                            @if(!$isAdminRole)
                                @if($user->is_verified === null)
                                    <span class="status-badge bg-secondary text-white">Pending Verification</span>
                                @elseif($user->is_verified == 1)
                                    <span class="status-badge bg-success text-white"><i class="fas fa-check"></i> Verified</span>
                                @else
                                    <span class="status-badge bg-danger text-white"><i class="fas fa-times"></i> Not Verified</span>
                                @endif

                                @if($user->is_approved)
                                    <span class="status-badge bg-info text-white"><i class="fas fa-check-circle"></i> Approved</span>
                                @endif

                                @if($user->is_student)
                                    <span class="status-badge bg-primary text-white"><i class="fas fa-graduation-cap"></i> Student</span>
                                @endif
                            @endif
                        </div>

                        <div class="d-flex flex-column" style="gap: 10px;">
                            <a href="{{ route('admin.user.profile.edit') }}" class="btn btn-edit-profile">
                                <i class="fas fa-edit mr-2"></i>Edit Profile
                            </a>
                            @if(!$isAdminRole)
                                <button type="button" class="btn btn-student-toggle" data-toggle="modal" data-target="#studentStatusModal">
                                    <i class="fas fa-graduation-cap mr-2"></i>{{ $user->is_student ? 'Remove Student Status' : 'Mark as Student' }}
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="row">
                    <div class="col-12">
                        <div class="stat-card">
                            <div class="stat-icon email"><i class="fas fa-envelope"></i></div>
                            <div class="stat-label">Email Address</div>
                            <div class="stat-value">{{ $user->email }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card">
                            <div class="stat-icon phone"><i class="fas fa-phone"></i></div>
                            <div class="stat-label">Phone</div>
                            <div class="stat-value">{{ $user->contact_no ?? 'Not set' }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card">
                            <div class="stat-icon calendar"><i class="fas fa-calendar-alt"></i></div>
                            <div class="stat-label">Joined</div>
                            <div class="stat-value">{{ $user->created_at->format('M d, Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Details Section -->
            <div class="col-lg-8 col-md-7 col-12">
                <!-- Personal Information -->
                <div class="details-card">
                    <h3 class="card-title-modern"><i class="fas fa-user-circle mr-2"></i>Personal Information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Full Name</div>
                                <div class="detail-value">{{ $user->name }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Email Address</div>
                                <div class="detail-value">{{ $user->email }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Contact Number</div>
                                <div class="detail-value">{{ $user->contact_no ?? 'Not provided' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Reference Person</div>
                                <div class="detail-value">{{ $user->approver?->name ?? 'Not assigned' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location Details -->
                <div class="details-card">
                    <h3 class="card-title-modern"><i class="fas fa-map-marker-alt mr-2"></i>Location Details</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Country</div>
                                <div class="detail-value">{{ $user->country ?? 'Not provided' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Division</div>
                                <div class="detail-value">{{ $user->division?->name ?? 'Not provided' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">District</div>
                                <div class="detail-value">{{ $user->district?->name ?? 'Not provided' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Upazila</div>
                                <div class="detail-value">{{ $user->upazila?->name ?? 'Not provided' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label">Street Address</div>
                                <div class="detail-value">{{ $user->street_address_1 ?? 'Not provided' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">City</div>
                                <div class="detail-value">{{ $user->city ?? 'Not provided' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">State</div>
                                <div class="detail-value">{{ $user->state ?? 'Not provided' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">ZIP Code</div>
                                <div class="detail-value">{{ $user->zipcode ?? 'Not provided' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Documents Section -->
                <div class="details-card">
                    <h3 class="card-title-modern"><i class="fas fa-file-alt mr-2"></i>Identity Documents</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label"><i class="fas fa-id-card mr-1"></i> NID Document</div>
                                <div class="detail-value">
                                    @if($user->nid)
                                        <a href="{{ asset('backend/uploads/users/documents/' . $user->nid) }}" target="_blank" class="text-primary">
                                            <i class="fas fa-file-pdf"></i> View Document
                                        </a>
                                    @else
                                        <span class="text-muted">Not uploaded</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <div class="detail-label"><i class="fas fa-passport mr-1"></i> Passport Document</div>
                                <div class="detail-value">
                                    @if($user->passport)
                                        <a href="{{ asset('backend/uploads/users/documents/' . $user->passport) }}" target="_blank" class="text-primary">
                                            <i class="fas fa-file-pdf"></i> View Document
                                        </a>
                                    @else
                                        <span class="text-muted">Not uploaded</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Student Status Modal -->
<div class="modal fade" id="studentStatusModal" tabindex="-1" role="dialog" aria-labelledby="studentStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px; border: none;">
            <div class="modal-header" style="background: linear-gradient(135deg, #27ae60, #229954); border-radius: 20px 20px 0 0; border: none;">
                <h5 class="modal-title text-white" id="studentStatusModalLabel">
                    <i class="fas fa-graduation-cap mr-2"></i>Confirm Student Status
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                @if($user->is_student)
                    <div class="text-center mb-3">
                        <i class="fas fa-user-graduate text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <p class="text-center mb-3">Are you sure you want to <strong>remove your student status</strong>?</p>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <strong>Note:</strong> You will lose access to the "My Career" section if you remove your student status.
                    </div>
                @else
                    <div class="text-center mb-3">
                        <i class="fas fa-graduation-cap text-success" style="font-size: 3rem;"></i>
                    </div>
                    <p class="text-center mb-3">Are you sure you want to <strong>mark yourself as a student</strong>?</p>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle mr-2"></i>
                        <strong>Note:</strong> As a student, you'll get access to the "My Career" section where you can manage your career information.
                    </div>
                @endif
            </div>
            <div class="modal-footer" style="border: none; padding: 1rem 1.5rem;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 50px; padding: 0.5rem 1.5rem;">
                    <i class="fas fa-times mr-2"></i>Cancel
                </button>
                <button type="button" class="btn btn-confirm-student" style="background: linear-gradient(135deg, #27ae60, #229954); border: none; color: white; border-radius: 50px; padding: 0.5rem 1.5rem;">
                    <i class="fas fa-check mr-2"></i>Confirm
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const confirmBtn = document.querySelector('.btn-confirm-student');
    const isStudent = {{ $user->is_student ? 'true' : 'false' }};

    if (confirmBtn) {
        confirmBtn.addEventListener('click', function() {
            const newStatus = !isStudent;

            // Show loading state
            this.disabled = true;
            this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';

            fetch('{{ route('admin.user.toggle.student') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    is_student: newStatus
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Close modal
                    $('#studentStatusModal').modal('hide');

                    // Show success message
                    if (typeof toastr !== 'undefined') {
                        toastr.success(data.message);
                    } else {
                        alert(data.message);
                    }

                    // Reload page after short delay
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    throw new Error(data.message || 'Something went wrong');
                }
            })
            .catch(error => {
                if (typeof toastr !== 'undefined') {
                    toastr.error(error.message || 'Failed to update student status');
                } else {
                    alert(error.message || 'Failed to update student status');
                }
                this.disabled = false;
                this.innerHTML = '<i class="fas fa-check mr-2"></i>Confirm';
            });
        });
    }
});
</script>

@endsection
