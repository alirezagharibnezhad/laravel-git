@extends('layouts.app')

@section("content")

    @if($errors->any())
        <div class="alert alert-message">
            @foreach($errors->all() as $error)
                {{$error}}<br/>
            @endforeach
        </div>
    @endif

    <form method="post" action="/posts" enctype="multipart/form-data">
        @csrf
         عنوان :<input type="text" name="title" placeholder="عنوان مطلب">
        <br/><br/>
         توضیحات :<textarea type="text" name="description" placeholder="توضیح مطلب"></textarea>
        <br/><br/>
         تصویر اصلی :<input type="file" name="file" autocomplete="off">
        <br/><br/>
        <button type="submit" name="submit">ذخیره</button>

    </form>

@endsection
