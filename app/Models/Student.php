<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    // 设置时间戳
    public $timestamps = true;
    protected $dateFormat = 'U';
    // 批量赋值
    protected $fillable = ['name','class','score'];

    public function add()
    {

    }
    public function getData()
    {

    }
    public function edit($id)
    {

    }
    public function del($id)
    {

    }




}