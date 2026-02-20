@extends('backend.layouts.default')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Banners</h1>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('admin.banner.create') }}" class="btn btn-primary float-right">Add Banner</a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Banner Text</th>
                            <th>Page</th>
                            <th>Sort Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $banner)
                        <tr>
                            <td>
                                @if($banner->image_name)
                                    <img src="{{ asset('backend/uploads/banner/'.$banner->image_name) }}" style="max-width:80px;">
                                @endif
                            </td>
                            <td>{{ $banner->banner_text }}</td>
                            <td>{{ $banner->page->title ?? '' }}</td>
                            <td>{{ $banner->sort_order }}</td>
                            <td>
                                @if($banner->status)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.banner.edit', $banner->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('admin.banner.destroy', $banner->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this banner?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection