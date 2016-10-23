<?php
/**
 * Created by PhpStorm.
 * User: hp-14
 * Date: 2016/10/23
 * Time: 10:58
 */

namespace App\Http\Controllers;


class MemberController extends Controller
{
    public function info()
    {
        return view('welcome');
    }
}