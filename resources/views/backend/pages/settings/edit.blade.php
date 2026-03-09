@extends('backend.layouts.default')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Site Settings</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf
            @method('PUT')

            <!-- Email & Phone -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Email & Phone</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primary_email">Primary Email</label>
                                <input type="email" class="form-control" id="primary_email" name="primary_email"
                                       value="{{ old('primary_email', $setting->primary_email) }}"
                                       placeholder="e.g. info@example.com">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="secondary_email">Secondary Email</label>
                                <input type="email" class="form-control" id="secondary_email" name="secondary_email"
                                       value="{{ old('secondary_email', $setting->secondary_email) }}"
                                       placeholder="e.g. support@example.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="primary_phone">Primary Phone</label>
                                <input type="text" class="form-control" id="primary_phone" name="primary_phone"
                                       value="{{ old('primary_phone', $setting->primary_phone) }}"
                                       placeholder="e.g. +1 123 456 7890">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="secondary_phone">Secondary Phone</label>
                                <input type="text" class="form-control" id="secondary_phone" name="secondary_phone"
                                       value="{{ old('secondary_phone', $setting->secondary_phone) }}"
                                       placeholder="e.g. +1 987 654 3210">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="2"
                                  placeholder="e.g. 14/A, Street Name, City, Country">{{ old('address', $setting->address) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Social Links -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Social Links</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook_url"><i class="fab fa-facebook-f mr-1"></i> Facebook URL</label>
                                <input type="url" class="form-control" id="facebook_url" name="facebook_url"
                                       value="{{ old('facebook_url', $setting->facebook_url) }}"
                                       placeholder="https://facebook.com/yourpage">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="linkedin_url"><i class="fab fa-linkedin-in mr-1"></i> LinkedIn URL</label>
                                <input type="url" class="form-control" id="linkedin_url" name="linkedin_url"
                                       value="{{ old('linkedin_url', $setting->linkedin_url) }}"
                                       placeholder="https://linkedin.com/company/yourpage">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="x_url"><i class="fab fa-twitter mr-1"></i> X (Twitter) URL</label>
                                <input type="url" class="form-control" id="x_url" name="x_url"
                                       value="{{ old('x_url', $setting->x_url) }}"
                                       placeholder="https://x.com/yourprofile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="youtube_url"><i class="fab fa-youtube mr-1"></i> YouTube URL</label>
                                <input type="url" class="form-control" id="youtube_url" name="youtube_url"
                                       value="{{ old('youtube_url', $setting->youtube_url) }}"
                                       placeholder="https://youtube.com/yourchannel">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Embed -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Map Embed</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="map_embed">Map Embed URL</label>
                        <textarea class="form-control" id="map_embed" name="map_embed" rows="3"
                                  placeholder="Paste Google Maps embed URL here (the src value from the iframe)">{{ old('map_embed', $setting->map_embed) }}</textarea>
                        <small class="form-text text-muted">Paste only the URL from the Google Maps iframe <code>src</code> attribute.</small>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Update Settings</button>
            </div>
        </form>
    </div>
</section>
@endsection
