<?php

namespace App\Http\Controllers\Study;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /*
     * 查询数据
     */
    public function index()
    {
        $student = Student::paginate(6);

        return view('study.student.index',['data' => $student]);

    }

    /*
     * 添加数据
     */
    public function add(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $this->validate($request, [
                'Student.name' => 'required|max:4|unique:students,name',
                'Student.class' => 'required',
                'Student.score' => 'required|max:150|integer',
            ],[
                'required' => ':attribute 必填',
                'max' => ':attribute 不能超过:max',
                'unique' => ':attribute 已存在',
                'integer' => ':attribute 必须为数字',
            ],[
                'Student.name' => '姓名',
                'Student.class' => '班级',
                'Student.score' => '分数',
            ]);
            $data = $request->input('Student');
            $res = Student::create($data);
            if ($res) return back()->withInput()->with('success','添加成功');
//            如果出错，将上次请求输入存储到一次性session
            return back()->withInput()->with('error','添加失败');
        }

        return view('study.student.add');
    }
    /*
     * 修改数据
     */
    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post'))
        {
            $data  = $request->input('Student');
            $res = Student::where('id',$id)->update($data);
            if ($res)  return back()->withInput()->with('success','修改成功');
//            如果出错，将上次请求输入存储到一次性session
            return back()->withInput()->with('error','修改失败');

        }
        $data = Student::find($id);

        return view('study.student.edit',['data' => $data]);
    }
    /*
     * 删除数据
     */
    public function del($id)
    {
        Student::destroy($id);
        return back();
    }








}