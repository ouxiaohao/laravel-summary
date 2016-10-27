@extends('home.layout')


@section('title', '学习摘要')

@section('main')
    @parent
    <main>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>姓名</th>
                <th>班级</th>
                <th>分数</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->name }}</td>
                    <td>三（{{ $v->class }}）</td>
                    <td>{{ $v->score }}</td>
                    <td>
                        <a href="" class="btn btn-info">修改</a>
                        <a href="" class="btn btn-danger">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
@endsection