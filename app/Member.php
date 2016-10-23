<?php
/**
 * Created by PhpStorm.
 * User: hp-14
 * Date: 2016/10/24
 * Time: 1:31
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public static function getMember()
    {
        return 'member model';
    }
}