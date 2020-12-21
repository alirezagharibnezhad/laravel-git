@extends('layouts.app')

@section('content')
    <h5><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></h5>
    <div>{{$post->content}}</div>
@endsection
