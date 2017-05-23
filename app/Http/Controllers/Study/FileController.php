<?php
/**
 * Created by PhpStorm.
 * User: hp-14
 * Date: 2016/11/5
 * Time: 4:31
 */

namespace App\Http\Controllers\Study;


use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
//            获取扩展名
            $extension = $request->thumb->extension();
//            拼接文件名
            $name= 'ouhao_'.date('ymdhis'). '.' .$extension;
//            保存文件，获取路径
            $path = $request->thumb->storeAs('thumb',$name);
//            输入数据库
            $file = new File();
            $file->thumb = $path;
            $file->save();
        }

        $files = File::all();

        return view('study.file.index',['files'=>$files]);
    }














}