<?php
/**
 * Created by PhpStorm.
 * User: hp-14
 * Date: 2016/10/23
 * Time: 10:58
 */

namespace App\Http\Controllers;


use App\Member;

class MemberController extends Controller
{
    public function info()
    {
        return Member::getMember();

        /*return view('member.info',[
            'name'=>'ouhao',
            'age'=> 22,
        ]);*/
    }
}