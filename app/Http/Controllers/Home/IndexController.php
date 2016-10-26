<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    public function index()
    {
        $data = DB::table('student')->where('id',1)->value('name');
        return view('home.index.index',array('name'=>$data));
    }
}