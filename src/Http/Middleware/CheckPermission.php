<?php

namespace MahdiawanNK\PermissionGroup\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        $user = $request->user();

        if (!$user) {
            abort(403, 'Unauthorized');
        }

        foreach ($permissions as $permission) {
            if ($user->hasPermission($permission)) {
                return $next($request);
            }
        }

        abort(403, 'Forbidden - Permission denied');
    }
}