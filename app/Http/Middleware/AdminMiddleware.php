<?php

namespace App\Http\Middleware;

use App\Models\statsu;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user()->id;
        if(auth()->check() && statsu::where('status' === 1, 'userid' === $user)) {
            return $next($request);
        }
        return abort(403, 'Ты писькогрыз');
    }
}
