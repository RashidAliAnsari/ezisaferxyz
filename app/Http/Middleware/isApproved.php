<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\SweetAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isApproved
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
        if (Auth::user()->is_approved == 1) {
            return $next($request);
        }

        $this->realRashidToast('Sorry! Your profile not approved yet.', 'error');
        return redirect()->route('not-approved');
    }
}
