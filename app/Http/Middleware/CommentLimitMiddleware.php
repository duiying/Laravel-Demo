<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CommentLimitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $commentAt = cache('comment_at_' . Auth::id());
        if ($commentAt) {
            if (($commentAt + 10) > time()) {
                return back()->withErrors('10秒内只能发表1次评论');
            }
        }
        return $next($request);
    }
}
