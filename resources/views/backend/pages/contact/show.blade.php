@extends('backend.layouts.default')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Contact Message Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Contact Messages</a></li>
                    <li class="breadcrumb-item active">Message Details</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <!-- Message Details Card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-envelope mr-2"></i>
                            Message from {{ $contact->full_name }}
                        </h3>
                        <div class="card-tools">
                            @if($contact->status === 'unread')
                                <span class="badge badge-warning">Unread</span>
                            @elseif($contact->status === 'read')
                                <span class="badge badge-info">Read</span>
                            @else
                                <span class="badge badge-success">Replied</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong><i class="fas fa-user mr-2"></i>Full Name:</strong><br>
                                <p class="text-muted ml-4">{{ $contact->full_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-envelope mr-2"></i>Email Address:</strong><br>
                                <p class="text-muted ml-4">
                                    <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                </p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong><i class="fas fa-calendar mr-2"></i>Received On:</strong><br>
                                <p class="text-muted ml-4">{{ $contact->created_at->format('F d, Y \a\t h:i A') }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-info-circle mr-2"></i>Status:</strong><br>
                                <p class="text-muted ml-4">
                                    <select class="form-control form-control-sm d-inline-block"
                                            style="width: auto;"
                                            onchange="updateStatus({{ $contact->id }}, this.value)">
                                        <option value="unread" {{ $contact->status === 'unread' ? 'selected' : '' }}>Unread</option>
                                        <option value="read" {{ $contact->status === 'read' ? 'selected' : '' }}>Read</option>
                                        <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Replied</option>
                                    </select>
                                </p>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <strong><i class="fas fa-tag mr-2"></i>Subject:</strong><br>
                            <p class="text-muted ml-4">{{ $contact->subject }}</p>
                        </div>

                        <div class="mb-3">
                            <strong><i class="fas fa-comments mr-2"></i>Conversation History:</strong>
                            <div class="ml-4 mt-3">
                                @if(is_array($contact->message))
                                    @foreach($contact->message as $index => $msg)
                                        <div class="card mb-3 {{ $msg['sender'] === 'user' ? 'border-primary' : 'border-success' }}">
                                            <div class="card-header {{ $msg['sender'] === 'user' ? 'bg-primary text-white' : 'bg-success text-white' }}">
                                                <strong>
                                                    <i class="fas {{ $msg['sender'] === 'user' ? 'fa-user' : 'fa-user-shield' }} mr-2"></i>
                                                    {{ $msg['sender'] === 'user' ? $contact->full_name : 'Admin' }}
                                                </strong>
                                                <span class="float-right">
                                                    <i class="fas fa-clock mr-1"></i>
                                                    {{ \Carbon\Carbon::parse($msg['timestamp'])->format('M d, Y h:i A') }}
                                                </span>
                                            </div>
                                            <div class="card-body">
                                                @if(isset($msg['subject']) && $msg['sender'] === 'admin')
                                                    <p class="mb-2"><strong>Subject:</strong> {{ $msg['subject'] }}</p>
                                                @endif
                                                <p style="white-space: pre-wrap; line-height: 1.8; margin: 0;">{{ $msg['message'] }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="card mb-3 border-primary">
                                        <div class="card-header bg-primary text-white">
                                            <strong>
                                                <i class="fas fa-user mr-2"></i>
                                                {{ $contact->full_name }}
                                            </strong>
                                            <span class="float-right">
                                                <i class="fas fa-clock mr-1"></i>
                                                {{ $contact->created_at->format('M d, Y h:i A') }}
                                            </span>
                                        </div>
                                        <div class="card-body">
                                            <p style="white-space: pre-wrap; line-height: 1.8; margin: 0;">{{ is_string($contact->message) ? $contact->message : 'No message content' }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.contact.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-left mr-2"></i>Back to List
                        </a>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ urlencode($contact->email) }}&su={{ urlencode('Re: ' . $contact->subject) }}"
                           target="_blank"
                           class="btn btn-primary">
                            <i class="fas fa-reply mr-2"></i>Reply via Webmail
                        </a>
                        <button type="button" class="btn btn-danger float-right" onclick="deleteContact({{ $contact->id }})">
                            <i class="fas fa-trash mr-2"></i>Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Info Sidebar -->
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Quick Actions</h3>
                    </div>
                    <div class="card-body">
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ urlencode($contact->email) }}&su={{ urlencode('Re: ' . $contact->subject) }}"
                           target="_blank"
                           class="btn btn-block btn-primary mb-2">
                            <i class="fas fa-reply mr-2"></i>Reply via Webmail
                        </a>
                        {{-- <a href="mailto:{{ $contact->email }}?subject={{ urlencode('Re: ' . $contact->subject) }}"
                           class="btn btn-block btn-outline-secondary mb-2">
                            <i class="fas fa-envelope mr-2"></i>Open in Email Client
                        </a> --}}
                        <button type="button" class="btn btn-block btn-outline-danger" onclick="deleteContact({{ $contact->id }})">
                            <i class="fas fa-trash mr-2"></i>Delete Message
                        </button>
                    </div>
                </div>

                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Message Info</h3>
                    </div>
                    <div class="card-body">
                        <strong><i class="fas fa-hashtag mr-2"></i>Message ID</strong>
                        <p class="text-muted">{{ $contact->id }}</p>
                        <hr>

                        <strong><i class="fas fa-clock mr-2"></i>Received</strong>
                        <p class="text-muted">{{ $contact->created_at->diffForHumans() }}</p>
                        <hr>

                        <strong><i class="fas fa-sync mr-2"></i>Last Updated</strong>
                        <p class="text-muted">{{ $contact->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reply Modal - Removed (Using Webmail Instead) -->

<!-- Delete Form -->
<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@section('scripts_custom')
<script>
    // Delete contact function
    function deleteContact(id) {
        if (confirm('Are you sure you want to delete this contact message? This action cannot be undone.')) {
            $('#deleteForm').attr('action', '/admin/contact/' + id);
            $('#deleteForm').submit();
        }
    }

    // Update status function
    function updateStatus(id, status) {
        $.ajax({
            url: '/admin/contact/' + id + '/status',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                status: status
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    location.reload();
                } else {
                    toastr.error('Failed to update status');
                }
            },
            error: function() {
                toastr.error('An error occurred');
            }
        });
    }

    // Auto dismiss alerts
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
</script>
@endsection
