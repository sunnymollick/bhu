@extends('backend.layouts.default')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>About Page Management</h1>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('admin.about.create') }}" class="btn btn-primary float-right">
                    <i class="fas fa-plus"></i> Add About Content
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
                <h3 class="card-title">All About Content</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Title</th>
                            <th width="15%">Subtitle</th>
                            <th width="30%">Short Description</th>
                            <th width="10%">Gallery</th>
                            <th width="10%">Status</th>
                            <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($abouts as $index => $about)
                        <tr>
                            <td>{{ ($abouts->currentPage() - 1) * $abouts->perPage() + $index + 1 }}</td>
                            <td><strong>{{ $about->title }}</strong></td>
                            <td>{{ $about->subtitle ?? '-' }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($about->short_description ?? '-', 80) }}</td>
                            <td class="text-center">
                                @if($about->gallery && count($about->gallery) > 0)
                                    <span class="badge badge-info">{{ count($about->gallery) }} images</span>
                                @else
                                    <span class="badge badge-secondary">No images</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.about.toggle-status', $about->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $about->status ? 'btn-success' : 'btn-secondary' }}">
                                        {{ $about->status ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" onclick="showDeleteModal({{ $about->id }}, 'About Content', '{{ route('admin.about.destroy', $about->id) }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No about content found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($abouts->hasPages())
            <div class="card-footer clearfix">
                {{ $abouts->links() }}
            </div>
            @endif
        </div>
    </div>
</section>

@include('backend.includes.delete-modal')
@endsection
