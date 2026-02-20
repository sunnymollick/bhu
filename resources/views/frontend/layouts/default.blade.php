<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bengali Hindu Unity')</title>
    @include('frontend.includes.links')
    @yield('stylesheet')
  </head>

  <body>

    <div class="sigma_preloader">
      <img src="{{ asset('frontend/assets/img/om.svg') }}" alt="preloader">
    </div>

    @include('frontend.includes.mobile_nav')

    @include('frontend.includes.header')

    @yield('subheader')

    @yield('content')

    @include('frontend.includes.footer')

    @include('frontend.includes.scripts')

    @yield('custom_scripts')

  </body>

</html>
