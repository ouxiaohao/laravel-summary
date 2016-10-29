@extends('study.student.partials.layout')

@section('main')
    @parent
    <main>
        <form class="form-horizontal" role="form" action="{{ url('student/add') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-10">
                    <input name="Student[name]" type="text" class="form-control" id="firstname" placeholder="请输入名字">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">班级</label>
                <div class="col-sm-10">
                    <select class="form-control" name="Student[class]">
                        <option value="1">1班</option>
                        <option value="2">2班</option>
                        <option value="3">3班</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">分数</label>
                <div class="col-sm-10">
                    <input name="Student[score]" type="text" class="form-control" id="lastname" placeholder="请输入姓">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
            </div>
        </form>
    </main>
@endsection