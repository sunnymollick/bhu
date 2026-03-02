@extends('backend.layouts.default')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Banner</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please fix the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card card-warning">
            <form method="POST" action="{{ route('admin.banner.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Banner Image <span class="text-danger">*</span></label>
                        <input type="file" name="image_name" id="image_name" class="form-control" accept="image/*" required>
                        <div id="image-preview" class="mt-2" style="display:none;">
                            <img id="preview-img" src="" alt="Image preview" style="max-width: 300px; max-height: 200px;" class="img-thumbnail">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title (English)</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter banner title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title (Bengali)</label>
                                <input type="text" name="title_bn" class="form-control" value="{{ old('title_bn') }}" placeholder="Enter Bengali title">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Subtitle (English)</label>
                                <textarea name="subtitle" class="form-control" rows="3" placeholder="Enter banner subtitle">{{ old('subtitle') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Subtitle (Bengali)</label>
                                <textarea name="subtitle_bn" class="form-control" rows="3" placeholder="Enter Bengali subtitle">{{ old('subtitle_bn') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5>Button 1</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Button 1 Text</label>
                                <input type="text" name="button_text_1" class="form-control" value="{{ old('button_text_1') }}" placeholder="e.g., Join Today">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Button 1 Link</label>
                                <input type="text" name="button_link_1" class="form-control" value="{{ old('button_link_1') }}" placeholder="e.g., /contact-us">
                            </div>
                        </div>
                    </div>

                    <h5>Button 2</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Button 2 Text</label>
                                <input type="text" name="button_text_2" class="form-control" value="{{ old('button_text_2') }}" placeholder="e.g., View Services">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Button 2 Link</label>
                                <input type="text" name="button_link_2" class="form-control" value="{{ old('button_link_2') }}" placeholder="e.g., /services">
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                        <small class="form-text text-muted">Lower numbers appear first</small>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="status" class="form-check-input" id="status" value="1" checked>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="{{ route('admin.banner.all') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('scripts_custom')
<script>
$(document).ready(function() {
    // Image preview
    $('#image_name').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                $('#preview-img').attr('src', event.target.result);
                $('#image-preview').show();
            }
            reader.readAsDataURL(file);
        } else {
            $('#image-preview').hide();
        }
    });
});
</script>
@endsection
