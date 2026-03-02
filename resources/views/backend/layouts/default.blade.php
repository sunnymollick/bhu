<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RR | Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  @yield('stylesheet')
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/developer.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    @include('backend.includes.nav')
    @include('backend.includes.aside')
    <div class="content-wrapper">
      @yield('content')
    </div>
    @include('backend.includes.footer')
  </div>

  <!-- Common Delete Modal -->
  @include('backend.includes.delete-modal')

  <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  @yield('scripts_plugin')
  <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
  <script src="{{ asset('backend/dist/js/demo.js') }}"></script>
  <!-- Common JS (includes toastr configuration) -->
  <script src="{{ asset('backend/dist/js/common.js') }}"></script>
  @yield('scripts_custom')

  <!-- Toastr Messages -->
  <script>
    // Check for login success from sessionStorage (for AJAX login from frontend)
    $(document).ready(function() {
      if (sessionStorage.getItem('loginSuccess') === 'true') {
        var userName = sessionStorage.getItem('loginUserName') || '';
        toastr.success('Welcome back, ' + userName + '! You have successfully logged in.', 'Success');
        // Clear the flags
        sessionStorage.removeItem('loginSuccess');
        sessionStorage.removeItem('loginUserName');
      }
    });

    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif
    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif
    @if(session('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif
    @if(session('info'))
        toastr.info("{{ session('info') }}");
    @endif
  </script>
</body>
</html>
