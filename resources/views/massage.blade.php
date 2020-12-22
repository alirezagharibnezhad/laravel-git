@extends('layouts.app')

@section('content')

{{--    <h1>{{__('massage.welcome',['name'=>'علیرضا'])}}</h1>--}}

        <h1>@lang('massage.welcome',['name'=>'علیرضا'])</h1>
{{--        <h1>{{trans('massage.threecar')}}</h1>--}}
{{--        <h1>{{trans_choice('massage.cars',22)}}</h1>--}}
        <h1>{{trans_choice('massage.cars',25,['value'=>25])}}</h1>
@endsection
