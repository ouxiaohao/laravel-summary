<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    public function index()
    {
        $data = DB::table('student')->truncate();
        p($data);die;
        
        return view('home.index');
    }
}