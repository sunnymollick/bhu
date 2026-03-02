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
        @if(session('success'))
            <div class="alert alert-dismissible fade show" role="alert" style="background-color: #dc8a45; color: #fff; border-color: #c77835;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Button 1</th>
                            <th>Button 2</th>
                            <th>Sort Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($banners as $banner)
                        <tr>
                            <td>
                                @if($banner->image_name)
                                    <img src="{{ asset('backend/uploads/banner/'.$banner->image_name) }}" style="max-width:80px;" class="img-thumbnail">
                                @endif
                            </td>
                            <td>
                                <strong>{{ $banner->title ?: 'N/A' }}</strong>
                                @if($banner->subtitle)
                                    <br><small class="text-muted">{{ Str::limit($banner->subtitle, 50) }}</small>
                                @endif
                            </td>
                            <td>
                                @if($banner->button_text_1)
                                    <span class="badge badge-info">{{ $banner->button_text_1 }}</span>
                                    @if($banner->button_link_1)
                                        <br><small class="text-muted">{{ $banner->button_link_1 }}</small>
                                    @endif
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($banner->button_text_2)
                                    <span class="badge badge-info">{{ $banner->button_text_2 }}</span>
                                    @if($banner->button_link_2)
                                        <br><small class="text-muted">{{ $banner->button_link_2 }}</small>
                                    @endif
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td><span class="badge badge-secondary">{{ $banner->sort_order }}</span></td>
                            <td>
                                @if($banner->status)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.banner.edit', $banner->id) }}" class="btn btn-sm btn-primary mb-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-danger mb-1" onclick="showDeleteModal({{ $banner->id }}, 'Banner', '{{ route('admin.banner.destroy', $banner->id) }}')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No banners found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
