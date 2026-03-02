@extends('backend.layouts.default')

@section('stylesheet')
<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
    .image-preview-container {
        position: relative;
        display: inline-block;
        margin-top: 10px;
    }
    .image-preview {
        max-width: 200px;
        max-height: 200px;
        border: 2px solid #ddd;
        border-radius: 4px;
        padding: 5px;
    }
    .remove-preview {
        position: absolute;
        top: -10px;
        right: -10px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        cursor: pointer;
        font-size: 18px;
        line-height: 1;
    }
</style>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit About Content</h1>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('admin.about.index') }}" class="btn btn-secondary float-right">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Basic Information -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Basic Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title', $about->title) }}"
                                       placeholder="e.g., We are Bengali Hindu" required>
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                                       id="subtitle" name="subtitle" value="{{ old('subtitle', $about->subtitle) }}"
                                       placeholder="e.g., TOGETHER WE STRONG!">
                                @error('subtitle')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control @error('short_description') is-invalid @enderror"
                                  id="short_description" name="short_description" rows="3"
                                  placeholder="Brief description for the about page">{{ old('short_description', $about->short_description) }}</textarea>
                        @error('short_description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="1" {{ old('status', $about->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $about->status) == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Who We Are Section -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Who We Are Section</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="who_we_are_title">Section Title</label>
                        <input type="text" class="form-control @error('who_we_are_title') is-invalid @enderror"
                               id="who_we_are_title" name="who_we_are_title" value="{{ old('who_we_are_title', $about->who_we_are_title) }}"
                               placeholder="e.g., Who we are">
                        @error('who_we_are_title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="who_we_are_content">Content</label>
                        <textarea class="form-control summernote @error('who_we_are_content') is-invalid @enderror"
                                  id="who_we_are_content" name="who_we_are_content"
                                  placeholder="Describe who you are...">{{ old('who_we_are_content', $about->who_we_are_content) }}</textarea>
                        @error('who_we_are_content')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Mission Section -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mission Section</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="mission_title">Section Title</label>
                        <input type="text" class="form-control @error('mission_title') is-invalid @enderror"
                               id="mission_title" name="mission_title" value="{{ old('mission_title', $about->mission_title) }}"
                               placeholder="e.g., Our Mission">
                        @error('mission_title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mission_content">Content</label>
                        <textarea class="form-control summernote @error('mission_content') is-invalid @enderror"
                                  id="mission_content" name="mission_content"
                                  placeholder="Describe your mission...">{{ old('mission_content', $about->mission_content) }}</textarea>
                        @error('mission_content')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Gallery Section -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gallery Images</h3>
                </div>
                <div class="card-body">
                    @php
                        $gallery = $about->gallery ?? [];
                    @endphp

                    @if(!empty($gallery))
                        <div class="mb-3">
                            <strong>Current Gallery Images:</strong>
                            <div class="row mt-2" id="current-gallery">
                                @foreach($gallery as $index => $imagePath)
                                    <div class="col-md-3 col-sm-4 col-6 mb-3" id="existing-image-{{ $index }}">
                                        <div class="image-preview-container position-relative">
                                            <img src="{{ asset('storage/' . $imagePath) }}" class="image-preview w-100" alt="Gallery Image {{ $index + 1 }}">
                                            <button type="button" class="remove-preview" onclick="removeExistingImage({{ $index }})" title="Remove this image">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" name="existing_gallery[]" value="{{ $imagePath }}" id="existing-path-{{ $index }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                    @endif

                    <div class="form-group">
                        <label for="gallery">Upload New Gallery Images</label>
                        <p class="text-muted">Select multiple images to add to the gallery (JPG, PNG, JPEG, GIF, max 2MB each).</p>
                        <input type="file" class="form-control-file @error('gallery.*') is-invalid @enderror"
                               name="gallery[]" id="gallery" accept="image/*" multiple onchange="previewImages(this)">
                        @error('gallery.*')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div id="preview-container" class="row mt-3"></div>
                </div>
            </div>

            <div class="card">
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update About Content
                    </button>
                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('scripts_plugin')
<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection

@section('scripts_custom')
<script>
$(document).ready(function() {
    // Initialize Summernote
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
});

let galleryCount = {{ count($about->gallery ?? []) }};

function previewImages(input) {
    const previewContainer = document.getElementById('preview-container');
    previewContainer.innerHTML = ''; // Clear previous previews

    if (input.files && input.files.length > 0) {
        Array.from(input.files).forEach((file, index) => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const col = document.createElement('div');
                    col.className = 'col-md-3 col-sm-4 col-6 mb-3';
                    col.innerHTML = `
                        <div class="image-preview-container">
                            <img src="${e.target.result}" class="image-preview w-100" alt="Preview ${index + 1}">
                            <div class="text-center mt-1">
                                <small class="badge badge-info">New: ${file.name}</small>
                            </div>
                        </div>
                    `;
                    previewContainer.appendChild(col);
                };

                reader.readAsDataURL(file);
            }
        });
    }
}

function removeExistingImage(index) {
    if (confirm('Are you sure you want to remove this image?')) {
        document.getElementById('existing-image-' + index).remove();
        document.getElementById('existing-path-' + index).remove();
    }
}
</script>
@endsection
