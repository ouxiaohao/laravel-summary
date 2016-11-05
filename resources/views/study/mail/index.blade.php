@extends('study.layout')

@section('title', '发送邮件')

@section('main')
    <div>
        <form action="" method="post">
            {{ csrf_field() }}
            e-mail: <input type="text" name="email"><button type="submit">发送</button>
        </form>
    </div>
@endsection