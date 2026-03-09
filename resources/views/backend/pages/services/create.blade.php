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
                                <label for="icon">FontAwesome Icon Class <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="icon-preview">
                                            <i class="fas fa-icons"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                           id="icon" name="icon" value="{{ old('icon') }}"
                                           placeholder="e.g., fa-briefcase" required>
                                    @error('icon')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">Type to search or click an icon below</small>
                            </div>

                            <!-- Icon Picker -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm mb-2"
                                       id="icon-search" placeholder="Search icons...">
                                <div id="icon-grid" style="max-height: 200px; overflow-y: auto; border: 1px solid #dee2e6; border-radius: 4px; padding: 8px;">
                                </div>
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

@section('scripts_custom')
<style>
    .icon-picker-btn {
        width: 42px; height: 42px; display: inline-flex; align-items: center; justify-content: center;
        border: 1px solid #dee2e6; border-radius: 4px; cursor: pointer; margin: 2px;
        background: #fff; transition: all 0.2s;
    }
    .icon-picker-btn:hover { background: #e9ecef; border-color: #adb5bd; }
    .icon-picker-btn.selected { background: #dc8a45; color: #fff; border-color: #dc8a45; }
</style>
<script>
$(function() {
    const icons = [
        'fa-home','fa-briefcase','fa-users','fa-handshake','fa-building','fa-graduation-cap',
        'fa-heart','fa-star','fa-globe','fa-phone','fa-envelope','fa-map-marker-alt',
        'fa-calendar','fa-clock','fa-book','fa-bullhorn','fa-camera','fa-chart-bar',
        'fa-check-circle','fa-cog','fa-comment','fa-database','fa-edit','fa-file',
        'fa-flag','fa-gift','fa-hand-holding-heart','fa-hands-helping','fa-hospital',
        'fa-id-card','fa-info-circle','fa-key','fa-laptop','fa-leaf','fa-lightbulb',
        'fa-link','fa-list','fa-lock','fa-medal','fa-microphone','fa-money-bill',
        'fa-music','fa-newspaper','fa-paint-brush','fa-paper-plane','fa-pencil-alt',
        'fa-people-carry','fa-place-of-worship','fa-plane','fa-pray','fa-project-diagram',
        'fa-puzzle-piece','fa-question-circle','fa-ribbon','fa-rocket',
        'fa-school','fa-search','fa-seedling','fa-server','fa-shield-alt','fa-shopping-cart',
        'fa-sign-language','fa-sitemap','fa-smile','fa-solar-panel','fa-spa',
        'fa-store','fa-sun','fa-sync','fa-tasks','fa-thumbs-up','fa-tools',
        'fa-trophy','fa-truck','fa-umbrella','fa-university','fa-user','fa-user-friends',
        'fa-user-graduate','fa-user-shield','fa-users-cog','fa-utensils','fa-video',
        'fa-volleyball-ball','fa-wallet','fa-wrench','fa-cross','fa-church','fa-om',
        'fa-dharmachakra','fa-donate','fa-dove','fa-feather','fa-fist-raised'
    ];

    function renderIcons(filter) {
        const grid = $('#icon-grid');
        grid.empty();
        const selected = $('#icon').val();
        const q = (filter || '').toLowerCase();
        icons.forEach(function(icon) {
            if (q && icon.toLowerCase().indexOf(q) === -1) return;
            const btn = $('<span class="icon-picker-btn' + (selected === icon ? ' selected' : '') + '" title="' + icon + '"><i class="fas ' + icon + '"></i></span>');
            btn.on('click', function() {
                $('#icon').val(icon);
                $('#icon-preview').html('<i class="fas ' + icon + '"></i>');
                grid.find('.selected').removeClass('selected');
                $(this).addClass('selected');
            });
            grid.append(btn);
        });
    }

    renderIcons();

    $('#icon-search').on('input', function() {
        renderIcons($(this).val());
    });

    $('#icon').on('input', function() {
        const val = $(this).val();
        $('#icon-preview').html('<i class="fas ' + (val || 'fa-icons') + '"></i>');
        $('#icon-grid .icon-picker-btn').removeClass('selected')
            .filter('[title="' + val + '"]').addClass('selected');
    });
});
</script>
@endsection
