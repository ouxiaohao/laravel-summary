@extends('study.student.partials.layout')

@section('title', '学生管理系统-添加学生')

@section('main')
    @parent
    <main>
        <form class="form-horizontal" role="form" action="{{ url('student/add') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-8">
                    <input name="Student[name]" value="{{ old('Student')['name'] }}" type="text" class="form-control" id="firstname" placeholder="请输入名字">
                </div>
                <p class="col-sm-2" style="color: red;">{{ $errors->first('Student.name') }}</p>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">班级</label>
                <div class="col-sm-8">
                    <select class="form-control" name="Student[class]">
                        <option value="1" @if(old('Student')['class'] == 1) selected @endif>1班</option>
                        <option value="2" @if(old('Student')['class'] == 2) selected @endif>2班</option>
                        <option value="3" @if(old('Student')['class'] == 3) selected @endif>3班</option>
                    </select>
                </div>
                <p class="col-sm-2" style="color: red;">{{ $errors->first('Student.class') }}</p>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">分数</label>
                <div class="col-sm-8">
                    <input name="Student[score]" value="{{ old('Student')['score'] }}" type="text" class="form-control" id="lastname" placeholder="请输入姓">
                </div>
                <p class="col-sm-2" style="color: red;">{{ $errors->first('Student.score') }}</p>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info">提交</button>
                    <a href="{{ url('student/index') }}" class="btn btn-default">返回</a>
                </div>
            </div>
        </form>

        @include('study.partials.message')
    </main>
@endsection