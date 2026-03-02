@extends('backend.layouts.default')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Services Management</h1>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary float-right">
                    <i class="fas fa-plus"></i> Add New Service
                </a>
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

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Services</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="5%">Icon</th>
                            <th width="20%">Title</th>
                            <th width="40%">Description</th>
                            <th width="8%">Order</th>
                            <th width="10%">Status</th>
                            <th width="12%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $index => $service)
                        <tr>
                            <td>{{ ($services->currentPage() - 1) * $services->perPage() + $index + 1 }}</td>
                            <td class="text-center">
                                @if($service->icon)
                                    <i class="fas {{ $service->icon }} fa-2x text-primary"></i>
                                @else
                                    <i class="fas fa-info-circle fa-2x text-muted"></i>
                                @endif
                            </td>
                            <td><strong>{{ $service->title }}</strong></td>
                            <td>{{ \Illuminate\Support\Str::limit($service->description, 100) }}</td>
                            <td class="text-center">
                                <span class="badge badge-secondary">{{ $service->order }}</span>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.services.toggle-status', $service->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $service->status ? 'btn-success' : 'btn-secondary' }}">
                                        {{ $service->status ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" onclick="showDeleteModal({{ $service->id }}, 'Service', '{{ route('admin.services.destroy', $service->id) }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No services found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($services->hasPages())
            <div class="card-footer clearfix">
                {{ $services->links() }}
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
