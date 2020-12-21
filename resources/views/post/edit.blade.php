@extends('layouts.app')

@section("content")
    <h3>ویرایش فرم</h3>

    @can('update',$post)
{{--    @if(\Illuminate\Support\Facades\Auth::user()->can('update',$post))--}}
    <form method="post" action="/posts/{{$post->id}}">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <input type="text" name="title" placeholder="عنوان مطلب" value="{{$post->title}}">
        <br/>
        <textarea type="text" name="description" placeholder="توضیح مطلب">{{$post->content}}</textarea>
        <br/>
        <button type="submit" name="submit">بروزرسانی</button>

    </form>

    <form method="post" action="/posts/{{$post->id}}">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <br/>
        <button type="submit" name="submit">حذف</button>

    </form>
{{--    @endif--}}
    @endcan

@endsection
