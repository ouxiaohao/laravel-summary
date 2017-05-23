<?php
/**
 * Created by PhpStorm.
 * User: hp-14
 * Date: 2016/11/5
 * Time: 23:30
 */

namespace App\Http\Controllers\Study;


use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //最根本的邮件发送方式
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $to = $request->input('email');
//            发送邮件
            Mail::to($to)->send(new OrderShipped());
        }

        return view('study.mail.index');
    }
}