@extends('layouts.app')

@section('content')
    <h1>به صفحه ویو خوش امدید</h1>

    <h3>ای دی:{{$id}}</h3>
    <h3>نام:{{$name}}</h3>
    <h3>پسوورد:{{{$password}}}</h3>
@endsection

@section('footer')
    <p>در این قسمت فوتر قرار میگیرد.</p>
@endsection
