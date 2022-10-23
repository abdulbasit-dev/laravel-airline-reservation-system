@yield('css')
@yield('plugin-css')

<!-- Sweet Alert-->
<link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
{{-- select2 --}}
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
{{-- cutsom css --}}
<link href="{{ URL::asset('/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

@if (App::getLocale() == 'ar' || App::getLocale() == 'ku')
  <link href="{{ URL::asset('/assets/css/bootstrap.rtl.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="{{ URL::asset('/assets/css/icons.rtl.css') }}" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="{{ URL::asset('/assets/css/app.rtl.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@else
  <!-- Bootstrap Css -->
  <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@endif
