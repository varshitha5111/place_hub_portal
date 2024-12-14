<?php

namespace App\Http\Middleware;

use App\Models\subscription;
use Closure;
use Illuminate\Http\Request;

class package
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $subscriptions = subscription::withTrashed()->with('packages')
            ->where('user_id', auth()->user()->id)->first();
        if ($subscriptions) {
            return $next($request);
        }
        return redirect()->route('user.dashboard');
    }
}
