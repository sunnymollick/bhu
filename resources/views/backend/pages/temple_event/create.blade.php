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
        <h1>Add Temple Event</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.temple_event.all') }}">All Events</a></li>
            <li class="breadcrumb-item active">Add Event</li>
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
                        <h3 class="card-title">Create New Event</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.temple_event.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="temple_id">Temple <span class="text-danger">*</span></label>
                                        <select name="temple_id" id="temple_id" class="form-control select2 @error('temple_id') is-invalid @enderror" required>
                                            <option value="">Select Temple</option>
                                            @foreach($temples as $temple)
                                                <option value="{{ $temple->id }}" {{ old('temple_id') == $temple->id ? 'selected' : '' }}>
                                                    {{ $temple->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('temple_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="event_name">Event Name <span class="text-danger">*</span></label>
                                        <input type="text" name="event_name" id="event_name" class="form-control @error('event_name') is-invalid @enderror" value="{{ old('event_name') }}" required>
                                        @error('event_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="banner_image">Banner Image</label>
                                        <input type="file" name="banner_image" id="banner_image" class="form-control @error('banner_image') is-invalid @enderror" accept="image/*">
                                        <small class="text-muted">Recommended size: 1200x600px</small>
                                        @error('banner_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div id="banner-preview" class="mt-2"></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" placeholder="e.g., Dhaka, Bangladesh">
                                        @error('location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="event_date">Event Start Date <span class="text-danger">*</span></label>
                                        <input type="date" name="event_date" id="event_date" class="form-control @error('event_date') is-invalid @enderror" value="{{ old('event_date') }}" required>
                                        @error('event_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="event_date_end">Event End Date <small class="text-muted">(Optional for multi-day events)</small></label>
                                        <input type="date" name="event_date_end" id="event_date_end" class="form-control @error('event_date_end') is-invalid @enderror" value="{{ old('event_date_end') }}">
                                        @error('event_date_end')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="event_time_start">Event Start Time</label>
                                        <input type="time" name="event_time_start" id="event_time_start" class="form-control @error('event_time_start') is-invalid @enderror" value="{{ old('event_time_start') }}">
                                        @error('event_time_start')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="event_time_end">Event End Time</label>
                                        <input type="time" name="event_time_end" id="event_time_end" class="form-control @error('event_time_end') is-invalid @enderror" value="{{ old('event_time_end') }}">
                                        @error('event_time_end')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="schedule">Schedule</label>
                                        <textarea name="schedule" id="schedule" class="form-control @error('schedule') is-invalid @enderror" rows="3">{{ old('schedule') }}</textarea>
                                        @error('schedule')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="short_description">Short Description</label>
                                        <textarea name="short_description" id="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="2" maxlength="500">{{ old('short_description') }}</textarea>
                                        <small class="text-muted">Maximum 500 characters</small>
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="summernote">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="gallery_images">Event Gallery Images</label>
                                        <input type="file" name="gallery_images[]" id="gallery_images" class="form-control @error('gallery_images') is-invalid @enderror @error('gallery_images.*') is-invalid @enderror" multiple accept="image/*">
                                        <small class="text-muted">You can select multiple images for the event gallery</small>
                                        @error('gallery_images')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @error('gallery_images.*')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div id="image-preview" class="row mt-2"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="status" name="status" {{ old('status', true) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="status">Active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create Event</button>
                            <a href="{{ route('admin.temple_event.all') }}" class="btn btn-default">Cancel</a>
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
@endsection
@section('scripts_custom')
<script>
    $(function () {
        $('.select2').select2();
        $('.summernote').summernote({
            height: 200
        });

        // Banner image preview
        $('#banner_image').on('change', function(e) {
            $('#banner-preview').empty();
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#banner-preview').html(`
                        <img src="${e.target.result}" class="img-thumbnail" style="max-height: 200px; width: 100%; object-fit: contain;">
                    `);
                }
                reader.readAsDataURL(file);
            }
        });

        // Gallery images preview
        $('#gallery_images').on('change', function(e) {
            $('#image-preview').empty();
            const files = e.target.files;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    $('#image-preview').append(`
                        <div class="col-md-3 mb-2">
                            <img src="${e.target.result}" class="img-thumbnail" style="height: 150px; width: 100%; object-fit: cover;">
                        </div>
                    `);
                }

                reader.readAsDataURL(file);
            }
        });
    });

    // Scroll to first error field
    @if($errors->any())
    $(document).ready(function() {
        if ($('.is-invalid').length > 0) {
            $('html, body').animate({
                scrollTop: $('.is-invalid:first').offset().top - 100
            }, 500);
            $('.is-invalid:first').focus();
        }
    });
    @endif
</script>
@endsection
