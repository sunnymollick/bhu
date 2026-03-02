@extends('backend.layouts.default')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add New Service</h1>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary float-right">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
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

        <div class="card">
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title (English) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title') }}"
                                       placeholder="Enter service title" required>
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title_bn">Title (Bengali)</label>
                                <input type="text" class="form-control @error('title_bn') is-invalid @enderror"
                                       id="title_bn" name="title_bn" value="{{ old('title_bn') }}"
                                       placeholder="Enter Bengali title">
                                @error('title_bn')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Description (English) <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="5"
                                          placeholder="Enter service description" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description_bn">Description (Bengali)</label>
                                <textarea class="form-control @error('description_bn') is-invalid @enderror"
                                          id="description_bn" name="description_bn" rows="5"
                                          placeholder="Enter Bengali description">{{ old('description_bn') }}</textarea>
                                @error('description_bn')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="icon">FontAwesome Icon Class</label>
                                <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                       id="icon" name="icon" value="{{ old('icon') }}"
                                       placeholder="e.g., fa-briefcase">
                                <small class="form-text text-muted">
                                    Visit <a href="https://fontawesome.com/icons" target="_blank">FontAwesome</a> for icons
                                </small>
                                @error('icon')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="order">Display Order <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror"
                                       id="order" name="order" value="{{ old('order', 0) }}"
                                       placeholder="0" min="0" required>
                                <small class="form-text text-muted">Lower numbers appear first</small>
                                @error('order')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select class="form-control @error('status') is-invalid @enderror"
                                        id="status" name="status" required>
                                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Create Service
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
