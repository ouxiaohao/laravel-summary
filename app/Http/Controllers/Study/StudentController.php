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
            $data = $request->input('Student');
            $res = Student::create($data);
            if ($res) return redirect('student/index');
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
            if ($res)  return redirect('student/index');

            return back();

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