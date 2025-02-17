<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Validateid
{
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id');

        if (!is_numeric($id) || intval($id) <= 0) {
            return response()->json(['error' => 'Invalid ID'], 400);
        }

        return $next($request);
    }
}
