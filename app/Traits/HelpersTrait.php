<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait HelpersTrait {

    public function getHost(Request $request){
        return request()->getHost();
    }
    
}