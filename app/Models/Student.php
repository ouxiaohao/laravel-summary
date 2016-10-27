<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function add()
    {
        $this->save();
    }
    public function getData()
    {
        return self::all();
    }
    public function edit($id)
    {
        $this->update($data);
    }
    public function del($id)
    {
        self::destroy($id);
    }




}