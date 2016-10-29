<?php
namespace App\Http\Controllers\Study;

use App\Http\Controllers\Controller;
use App\Models\Student;
class IndexController extends Controller
{
    public function index()
    {
        $student = new Student();
        $data = $student->getData();
    
        return view('study.index.index',['data' => $data]);
    }
}