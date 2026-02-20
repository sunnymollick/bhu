@extends('backend.layouts.default')
<style>
fieldset.scheduler-border {
    border: 1px groove #72cce0 !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
    width:auto;
    padding:0 10px;
    border-bottom:none;
}
</style>
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Create News</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.temple.all') }}">All News</a></li>
            <li class="breadcrumb-item active">Create News</li>
        </ol>
        </div>
    </div>
    </div>
</section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Create New News</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Title of the Incident</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="location">Location (District, City, Village)</label>
                                        <input type="text" name="location" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date_time">Date & Time of Incident</label>
                                        <input type="datetime-local" name="date_time" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Details</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>What happened?</label>
                                            <textarea name="what" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>When did it happen?</label>
                                            <textarea name="when" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Why did it happen?</label>
                                            <textarea name="why" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Who was involved?</label>
                                            <textarea name="who" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Where did it happen?</label>
                                            <textarea name="where" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>How did it happen?</label>
                                            <textarea name="how" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="victim_testimony">Victim's Testimony or Comment</label>
                                        <textarea name="victim_testimony" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="opposition_reaction">Opposition Reaction (if known)</label>
                                        <textarea name="opposition_reaction" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="media_coverage">Media Coverage (if any)</label>
                                        <textarea name="media_coverage" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Contact (can be anonymous or encrypted)</label>
                                        <input type="text" name="contact" class="form-control">
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="is_confidential" class="form-check-input" id="is_confidential" value="1">
                                        <label class="form-check-label" for="is_confidential">Keep my information confidential</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="witness_statement">Witness Statement (optional)</label>
                                        <textarea name="witness_statement" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="government_response">Government Response (if any)</label>
                                        <textarea name="government_response" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="attachments">Attachments (photo, video, documents)</label>
                                        <input type="file" name="attachments[]" multiple class="form-control">
                                    </div>
                                </div>
                            </div>  
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Final News (Optional)</legend>
                                <div class="form-group">
                                    <label for="final_news">Final News (Optional)</label>
                                    <textarea name="final_news" class="form-control textarea" rows="10"></textarea>
                            </fieldset>
                        </div>
                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{ route('admin.news.all') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts_plugin')
<script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endsection
@section('scripts_custom')
<script>
  $(function () {
    $('.select2').select2()
  });
  $(function () {
    $('.textarea').summernote()
  })
</script>
@endsection