<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = true;
    protected $dateFormat = 'U';
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