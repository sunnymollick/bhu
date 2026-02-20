@extends('backend.layouts.default')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Banner</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card card-warning">
            <form method="POST" action="{{ route('admin.banner.update', $banner->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Banner Image</label>
                        <input type="file" name="image_name" class="form-control">
                        @if($banner->image_name)
                            <div class="mt-2">
                                <img src="{{ asset('backend/uploads/banner/'.$banner->image_name) }}" style="max-width:120px;">
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Banner Text</label>
                        <input type="text" name="banner_text" class="form-control" value="{{ old('banner_text', $banner->banner_text) }}">
                    </div>
                    <div class="form-group">
                        <label>Page</label>
                        <select name="page_id" class="form-control">
                            <option value="">Select Page</option>
                            @foreach($pages as $page)
                                <option value="{{ $page->id }}" {{ $banner->page_id == $page->id ? 'selected' : '' }}>{{ $page->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $banner->sort_order) }}">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="status" class="form-check-input" id="status" value="1" {{ $banner->status ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="{{ route('admin.banner.all') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection