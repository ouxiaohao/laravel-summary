<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index()
    {

        $res = exec('ffmpeg -i https://himalayaimg.b0.upaiyun.com/test/mov.mp4 -y -f image2 -t 0.003 -vframes 1 -s 352x240 ~/Desktop/3.jpg');
        p($res);die;
    }




}