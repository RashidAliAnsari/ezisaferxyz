<?php

namespace App\Traits;

use RealRashid\SweetAlert\Facades\Alert;

trait SweetAlert {

    public function realRashidAlert($title, $message, $type) {
        Alert::alert($title, $message, $type);
        return true;
    }

    public function realRashidToast($message, $type){
        Alert::toast($message, $type);
        return true;
    }
    
}