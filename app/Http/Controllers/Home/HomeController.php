<?php

namespace App\Http\Controllers\Home;

use App\QiDian;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    public function index()
    {
        $data = 112;
        return $data;
    }

    public function testdata()
    {
        return response()->json(['return_code'=>'3','return_message'=>'fuck!you','data'=>Input::get(),'get'=>$_GET]);
    }
}
