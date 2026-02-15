<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null, $routes = null)
    {

        if (!auth()->check()) {
            \Log::warning('PermissionMiddleware: User not authenticated, redirecting to login');
            return redirect()->route('login');
        }

        $user = auth()->user();
        $role_has_permissions = Permission::where('role_id', $user->role_id)->pluck('permission')->toArray();

        $role_has_permissions = array_unique($role_has_permissions);

        \Log::info('PermissionMiddleware: Checking permission', [
            'user_id' => $user->id,
            'role_id' => $user->role_id,
            'requested_permission' => $permission,
            'requested_route' => $routes,
            'user_permissions' => $role_has_permissions
        ]);

        if (in_array($permission, $role_has_permissions)) {

            $permission_has_routes = Permission::where('role_id', $user->role_id)->where('permission', $permission)->pluck('routes')->toArray();

            if ($routes == null) {
                \Log::info('PermissionMiddleware: Access granted (no specific route required)');
                return $next($request);
            } else if (in_array($routes, $permission_has_routes)) {
                \Log::info('PermissionMiddleware: Access granted (route matched)');
                return $next($request);
            } else {
                \Log::warning('PermissionMiddleware: Access denied - route not in permission', [
                    'requested_route' => $routes,
                    'allowed_routes' => $permission_has_routes
                ]);
                abort(403, 'unauthorized access');
            }

        } else {
            \Log::warning('PermissionMiddleware: Access denied - permission not found', [
                'requested_permission' => $permission,
                'user_permissions' => $role_has_permissions
            ]);
            abort(403, 'unauthorized access');

        }

        return $next($request);
    }
}