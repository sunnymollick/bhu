@extends('backend.layouts.default')
@section('stylesheet')
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
.preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

        .preview-container img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 2px solid #ccc;
            border-radius: 8px;
            padding: 5px;
        }
</style>
<link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet"/>
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Add User</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.all') }}">All Users</a></li>
            <li class="breadcrumb-item active">Add User</li>
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
                        <h3 class="card-title">Create New User</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""> Name </label>
                                        <input type="text" name="name" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""> Email </label>
                                        <input type="email" name="email" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Contact No</label>
                                        <input type="contact_no" class="form-control" name="contact_no">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="address" class="form-control" name="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Select Role</label>
                                        <select name="role_id" class="form-control" id="">
                                            <option value="">SELECT ROLE</option>
                                            @foreach($roles as $r)
                                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label for="">Website Visibility</label>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" name="in_website">
                                        <label class="form-check-label" for="">Show in Website? </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Picture</label>
                                        
                                        <input type="file" name="image" id="imageInput">
                                        <div id="preview" style="width: 400px; height: 270px; overflow: hidden; background: #f0f0f0; margin-top: 10px;"></div>

                                        <button type="button" id="cropButton" style="margin-top: 15px;">Crop Image</button>

                                        <div id="croppedContainer" style="margin-top: 20px;">
                                            <h3>Cropped Image:</h3>
                                            <img id="croppedResult" style="max-width: 100%; border: 1px solid #ccc;"/>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for=""></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
@endsection
@section('scripts_custom')
<script>
  $(function () {
    $('.select2').select2()
  });
</script>

<script>
    const imageInput = document.getElementById('imageInput');
    const previewContainer = document.getElementById('preview');
    const cropButton = document.getElementById('cropButton');
    const croppedResult = document.getElementById('croppedResult');

    let cropper;

    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file || !file.type.startsWith('image/')) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            previewContainer.innerHTML = '';
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }

            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '100%';
            img.style.display = 'block';
            previewContainer.appendChild(img);

            cropper = new Cropper(img, {
                aspectRatio: 200 / 210,
                viewMode: 1,
                autoCropArea: 1,
                cropBoxResizable: false,
                cropBoxMovable: false,
                dragMode: 'move',
                responsive: true,
                background: false,
            });
        };
        reader.readAsDataURL(file);
    });

    cropButton.addEventListener('click', function () {
        if (cropper) {
            const canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 270,
            });
            croppedResult.src = canvas.toDataURL('image/jpeg');
        }
    });
</script>

@endsection