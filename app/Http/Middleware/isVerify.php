<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\SweetAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isVerify
{
    use SweetAlert;
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(Auth::user()->is_verified);
        if (Auth::user()->is_verified) {
            return $next($request);
        }

        $this->realRashidToast('Sorry! Your Email is not verified.', 'error');
        return redirect()->route('verify.email');
        
    }
}
