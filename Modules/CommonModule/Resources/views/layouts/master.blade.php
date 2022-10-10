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
<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">

<div id="loader" style="display:none;">
    <div style="display: flex;width: 100%;height: 100%;position: fixed;z-index: 9999;background: rgba(255,255,255,0.7);top: 0;left: 0;right: 0;bottom: 0;justify-content: center;align-items: center">
        <h2>LOADING ...</h2>
    </div>
</div>
<!--begin::Root-->
<div class="d-flex flex-column flex-root print-m0">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid print-m0">
    @include('commonmodule::includes.sidebar')
    <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid print-m0" id="kt_wrapper">
        @include('commonmodule::includes.subheader')
        <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid print-m0" id="kt_content">
                <div class="post d-flex flex-column-fluid">
                    @yield('content')
                </div>
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="footer py-4 d-flex flex-lg-column d-print-none" id="kt_footer">
                <!--begin::Container-->
                <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted fw-bold me-1">2022©</span>
                        <a href="https://approc.com" target="_blank" class="text-gray-800 text-hover-primary">Approc
                            Inc</a>
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Menu-->
                    <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                        <li class="menu-item">
                            <a href="#" target="_blank" class="menu-link px-2">About</a>
                        </li>
                    </ul>
                    <!--end::Menu-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->


@include('commonmodule::includes.scripts')
@yield('scripts')
</body>
</html>
