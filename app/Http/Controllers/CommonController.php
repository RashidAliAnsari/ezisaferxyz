<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    public function screenMode($is_dark_mode)
    {
        if ($is_dark_mode == 1) {
            $this->updateUserMode($is_dark_mode);
        }
        if ($is_dark_mode == 0) {
            $this->updateUserMode($is_dark_mode);
        }
        return back();
    }

    private function updateUserMode($is_dark_mode)
    {
        return User::where('id', Auth::user()->id)->update(['is_dark_mode' => $is_dark_mode]);
    }

    public function changeLang(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
}
