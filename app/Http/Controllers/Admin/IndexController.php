<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Log;
class IndexController extends Controller
{
    public function index()
    {
        Log::warning('warning');
        return view('admin.index.index');
    }
    
}
