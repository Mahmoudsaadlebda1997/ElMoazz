@if(session()->has('success'))
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered text-white" style="z-index: 0!important;">
        {{--<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>--}}
        {{--</button>--}}
        <b class="text-semibold">

            @if(config('app')['locale'] == 'en')
                Info!
            @else
                معلومه!
            @endif

        </b>
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered text-white" style="z-index: 0!important;">
        {{--<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>--}}
        {{--</button>--}}
        <b class="text-semibold">خطأ!</b>
        {{ session()->get('error') }}
    </div>
@endif
