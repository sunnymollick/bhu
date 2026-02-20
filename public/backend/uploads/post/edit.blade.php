@extends('backend.layouts.default')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Post</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card card-warning">
            <form method="POST" action="{{ route('admin.post.update', $post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Page</label>
                                <select name="page_id" class="form-control">
                                    <option value="">Select Page</option>
                                    @foreach($pages as $page)
                                        <option value="{{ $page->id }}" {{ $post->page_id == $page->id ? 'selected' : '' }}>{{ $page->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" required value="{{ old('title', $post->title) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Short Title</label>
                                <input type="text" name="short_title" class="form-control" value="{{ old('short_title', $post->short_title) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Short Description 1</label>
                                <input type="text" name="short_description1" class="form-control" value="{{ old('short_description1', $post->short_description1) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Short Description 2</label>
                                <input type="text" name="short_description2" class="form-control" value="{{ old('short_description2', $post->short_description2) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description 1</label>
                                <textarea name="description1" class="form-control" rows="3">{{ old('description1', $post->description1) }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description 2</label>
                                <textarea name="description2" class="form-control" rows="3">{{ old('description2', $post->description2) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                @if($post->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('backend/uploads/post/'.$post->image) }}" style="max-width:120px;">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gallery Images</label>
                                <input type="file" name="gallery_images[]" class="form-control" multiple>
                                @if(isset($post->galleries) && count($post->galleries))
                                    <div class="mt-2">
                                        @foreach($post->galleries as $gallery)
                                            <div style="display:inline-block; margin:2px; position:relative;">
                                                <img src="{{ asset('backend/uploads/post/gallery/'.$gallery->image_location) }}" style="max-width:70px; border:1px solid #ccc;">
                                                <!-- Optionally, add a delete button for each gallery image -->
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group form-check">
                                <input type="checkbox" name="status" class="form-check-input" id="status" value="1" {{ $post->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="{{ route('admin.post.all') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection