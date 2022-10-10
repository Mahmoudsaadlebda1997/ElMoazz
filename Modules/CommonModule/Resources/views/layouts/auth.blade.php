<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale() == "ar" ? "rtl": "ltr"}}"
      direction="{{app()->getLocale() == "ar" ? "rtl": "ltr"}}"
      style="direction:{{app()->getLocale() == "ar" ? "rtl": "ltr"}};">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/metronic/img/logo.png')}}">
    <link rel="icon" type="image/png" href="{{asset('public/metronic/img/logo.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('commonmodule::includes.styles')
    @yield('styles')
</head>
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

@yield('content')
{{--<main class="main-content mt-1 border-radius-lg overflow-hidden">--}}
{{--    @include('commonmodule::includes.navbar')--}}
{{--    @yield('content')--}}
{{--</main>--}}

@include('commonmodule::includes.scripts')
{{--@include('commonmodule::includes.loader')--}}
@yield('scripts')
</body>
</html>
