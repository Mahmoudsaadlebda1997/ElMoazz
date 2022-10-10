@if(session()->has('info'))
    <div class="alert alert-primary" role="alert">
        <div class="alert-body"><strong>{{__('trans._info')}}
                ! </strong> {{__('trans._info_msg')}} {{session()->get('info')}}</div>
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        <div class="alert-body"><strong>{{__('trans.success')}}
                ! </strong> {{__('trans.success_msg')}} {{session()->get('success')}}</div>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        <div class="alert-body"><strong>{{__('trans.error')}}
                ! </strong> {{__('trans.error_msg')}} {{session()->get('error')}}</div>
    </div>
@endif
