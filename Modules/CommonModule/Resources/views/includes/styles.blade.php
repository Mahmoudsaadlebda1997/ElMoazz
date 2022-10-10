<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
<!--end::Fonts-->
<!--begin::Page Vendor Stylesheets(used by this page)-->
<link href="{{asset('public/metronic/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
      type="text/css"/>
<!--end::Page Vendor Stylesheets-->
@if(app()->getLocale() == 'ar')
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('public/metronic/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('public/metronic/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
@else
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('public/metronic/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('public/metronic/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endif
<!--end::Layout Themes-->

<!--end::Global Stylesheets Bundle-->
<link href="{{asset('public/metronic/css/custom.css')}}" rel="stylesheet" type="text/css"/>
<style media="print">
    .print-m0 {
        margin: 0 !important;
        padding: 0 !important;
        background: #fff;
    }

    .pagebreak {
        page-break-before: always;
    }

    /* page-break-after works, as well */
</style>
<style>

    .card .card-body {
        /*padding: 0 2.25rem!important;*/
    }

    .table  td {
        white-space: nowrap!important;
    }
</style>
