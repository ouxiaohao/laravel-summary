@extends('study.layout')

@section('title', '上传文件')

@section('main')
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="upload">
            <p>缩略图：</p>
            <input type="file" name="thumb">
        </div>
        <div class="submit" style="margin-top: 30px;">
            <input type="submit">
        </div>
    </form>
    @foreach($files as $file)
    <div class="show">
        <img src="{{ asset('storage/'. $file->thumb) }}" alt="">
    </div>
    @endforeach
@endsection