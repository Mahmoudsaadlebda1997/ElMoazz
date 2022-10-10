<!--begin::Header-->
<div id="kt_header" style="" class="header align-items-stretch  d-print-none">
    <!--begin::Brand-->
    {{--    bg-white--}}
    <div class="header-brand" style="background: #3895e2;/*4eafff,022b66,3895e2*/">
        <!--begin::Logo-->
        <a href="">
            <h4 class="text-white mb-0" style="font-size: 25px;">KFMRP</h4>
            {{--            <img alt="Logo" src="{{asset('public/metronic/img/logo.png')}}" class="h-45px bg-white h-lg-45px"/>--}}
        </a>
        <!--end::Logo-->
        <!--begin::Aside minimize-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-minimize"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr092.svg-->
            <span class="svg-icon svg-icon-1 me-n1 svg-icon-white minimize-default">
                <svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"/>
                        <path
                            d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                            fill="#000000" opacity="0.3"/>
                    </g>
                </svg>
            </span>
            <!--end::Svg Icon-->
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->
            <span class="svg-icon svg-icon-1 minimize-active">
                <svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"/>
                        <path
                            d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                            fill="#000000" opacity="0.3"/>
                    </g>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside minimize-->
        <!--begin::Aside toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-white svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                            fill="currentColor"/>
                        <path opacity="0.3"
                              d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                              fill="currentColor"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--end::Aside toggle-->
    </div>
    <!--end::Brand-->
    <!--begin::Toolbar-->
    <div class="toolbar d-flex align-items-stretch">
        <!--begin::Toolbar container-->
        <div
            class="container-fluid py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
            <!--begin::Page title-->
            <div class="page-title d-flex justify-content-center flex-column me-5">
                <!--begin::Title-->
                <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">{{__('trans.dashboard')}}</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="#"
                           class="text-muted text-hover-primary">{{__('trans.dashboard')}}</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">@yield('title')</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Action group-->
            <div class="d-flex align-items-stretch overflow-auto pt-3 pt-lg-0">
            @if(getAuthUser('admin')->type == 'supervisor')
                <!--begin::Action wrapper-->
                    <div class="d-flex align-items-center">
                        <!--begin::Label-->
                        <span
                            class="fs-7 fw-bolder text-gray-700 pe-4 text-nowrap d-none d-xxl-block">{{__('trans.resident')}}:</span>
                        <!--end::Label-->
                        <!--begin::Select-->
                        <select class="form-select form-select-sm form-select-solid w-180px w-xxl-125px"
                                id="select_top_residents"
                                data-control="select2" data-placeholder="None" data-hide-search="false">
                            <option value=""></option>
                            @foreach($shared_residents ?? [] as $_resident)
                                <option
                                    @if($_resident->id == ($resident->id ?? null)) selected @endif
                                value="{{route('getHomeResident',['resident_id'=>\Illuminate\Support\Facades\Crypt::encrypt($_resident->id)])}}">{{$_resident->name}}</option>
                            @endforeach
                        </select>
                        <!--end::Select-->
                    </div>
                    <!--end::Action wrapper-->
                    {{--            <!--begin::Action wrapper-->--}}
                    <div class="d-flex align-items-center">
                        <!--begin::Separartor-->
                        <div class="bullet bg-secondary h-35px w-1px mx-5"></div>
                        <!--end::Separartor-->
                    </div>
                    <!--end::Action wrapper-->
                    <!--begin::Action wrapper-->
                    <div class="d-flex align-items-center">
                        <!--begin::Label-->
                        <span
                            class="fs-7 fw-bolder text-gray-700 pe-4 text-nowrap d-none d-xxl-block">{{__('trans.trainer')}}:</span>
                        <!--end::Label-->
                        <!--begin::Select-->
                        <select class="form-select form-select-sm form-select-solid w-180px w-xxl-125px"
                                id="select_top_trainers"
                                data-control="select2" data-placeholder="None" data-hide-search="false">
                            <option value=""></option>
                            @foreach($shared_trainers ?? [] as $_trainer)
                                <option
                                    @if($_trainer->id == ($resident->id ?? null)) selected @endif
                                value="{{route('getHomeTrainer',['trainer_id'=>\Illuminate\Support\Facades\Crypt::encrypt($_trainer->id)])}}">{{$_trainer->name}}</option>
                            @endforeach
                        </select>
                        <!--end::Select-->
                    </div>
                    <!--end::Action wrapper-->
                    <div class="d-flex align-items-center">
                        <!--begin::Separartor-->
                        <div class="bullet bg-secondary h-35px w-1px mx-5"></div>
                        <!--end::Separartor-->
                    </div>
                    <!--end::Action wrapper-->
            @endif
            <!--begin::Action wrapper-->
                <div class="d-flex align-items-center">
                    <!--begin::Label-->
                    <span class="fs-7 text-gray-700 fw-bolder pe-3 d-none d-xxl-block">
                        @if(getAuthUser('admin')->type == 'resident')
                            {{getAuthUser('admin')->name}} /
                            <span class="text-primary">Trainer : <b
                                    class="text-dark">{{getAuthUser('admin')->trainer->name}}</b></span> /
                            <span class="text-primary"> <b
                                    class="text-dark"><span class="text-primary">Batch :</span> {{getAuthUser('admin')->batch->title}}</b></span>
                            /
                            <span class="text-danger"> <b
                                    class="text-dark"><span class="text-primary">Clinic :</span>{{getAuthUser('admin')->clinics->pluck('title')->implode(' - ') ?? 'No Clinics'}}</b></span>
                        @endif
                        @if(getAuthUser('admin')->type == 'trainer')
                            {{getAuthUser('admin')->name}} /
                            <span class="text-danger">Assigned Residents : <b
                                    class="text-dark">{{getAuthUser('admin')->residents()->count()}}</b></span>
                            {{--                                residents()->count()--}}
                        @endif
                        @if(getAuthUser('admin')->type == 'supervisor')
                            {{getAuthUser('admin')->name}}
                        @endif
                    </span>
                    <!--end::Label-->
                    <!--begin::Actions-->
                    <div class="d-flex">
                        <!--begin::Quick links-->
                        <div class="d-flex align-items-center">
                            <!--begin::Menu wrapper-->
                            <a href="{{route('getNotification')}}" data-bs-toggle="tooltip"
                               data-bs-placement="bottom"
                               title="My Notification"
                               class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary position-relative">
                                <div class="bg-danger" style="position: absolute;width: 15px;height: 15px;top: -4px;left: 0;z-index: 99;color: #fff;border-radius: 50%;font-size: 10px;">
                                    {{$pending_notification_count ?? 0}}
                                </div>
                                <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <path
                                                    d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z"
                                                    fill="#000000"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
                                            </g>
                                        </svg>
                                    </span>
                                <!--end::Svg Icon-->
                            </a>
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::Quick links-->
                        <!--begin::Notifications-->
                        <div class="d-flex align-items-center">
                            <!--begin::Menu- wrapper-->
                            <a href="{{route('handleLogoutAdmin')}}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                               title="Logout"
                               class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary">
                                <!--begin::Svg Icon | path: icons/duotune/files/fil005.svg-->
                                <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.3" x="8.5" y="11" width="12" height="2" rx="1" fill="currentColor"></rect>
                    <path
                        d="M10.3687 11.6927L12.1244 10.2297C12.5946 9.83785 12.6268 9.12683 12.194 8.69401C11.8043 8.3043 11.1784 8.28591 10.7664 8.65206L7.84084 11.2526C7.39332 11.6504 7.39332 12.3496 7.84084 12.7474L10.7664 15.3479C11.1784 15.7141 11.8043 15.6957 12.194 15.306C12.6268 14.8732 12.5946 14.1621 12.1244 13.7703L10.3687 12.3073C10.1768 12.1474 10.1768 11.8526 10.3687 11.6927Z"
                        fill="currentColor"></path>
                    <path opacity="0.5"
                          d="M16 5V6C16 6.55228 15.5523 7 15 7C14.4477 7 14 6.55228 14 6C14 5.44772 13.5523 5 13 5H6C5.44771 5 5 5.44772 5 6V18C5 18.5523 5.44771 19 6 19H13C13.5523 19 14 18.5523 14 18C14 17.4477 14.4477 17 15 17C15.5523 17 16 17.4477 16 18V19C16 20.1046 15.1046 21 14 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3H14C15.1046 3 16 3.89543 16 5Z"
                          fill="currentColor"></path>
                </svg>
													</span>
                                <!--end::Svg Icon-->
                            </a>
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::Notifications-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Action wrapper-->
            </div>
            <!--end::Action group-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header-->
