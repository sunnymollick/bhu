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
        <div class="card card-warning">
            <form method="POST" action="{{ route('admin.banner.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Banner Image <span class="text-danger">*</span></label>
                        <input type="file" name="image_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Banner Text</label>
                        <input type="text" name="banner_text" class="form-control" value="{{ old('banner_text') }}">
                    </div>
                    <div class="form-group">
                        <label>Page</label>
                        <select name="page_id" class="form-control">
                            <option value="">Select Page</option>
                            @foreach($pages as $page)
                                <option value="{{ $page->id }}">{{ $page->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
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