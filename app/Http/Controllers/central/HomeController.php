<?php

namespace App\Http\Controllers\central;

use session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    
    public function home(){
        return view('central.backend.home');
    }

    
}
