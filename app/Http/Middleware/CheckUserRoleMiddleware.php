<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\Permission;
use Auth;
use Closure;

class CheckUserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (auth()->check()) {

            $user = auth()->user();

            $role_has_permissions = Permission::where('role_id', $user->role_id)->pluck('routes')->toArray();

            $role_has_permissions = array_unique($role_has_permissions);

            $users = User::join('role', 'role.id', '=', 'users.role_id')->where('users.id', '=', $user->id)->select('role.role_name as roleName')->first();

            if ($users) {
                session(['user_role' => $users->roleName, 'user_permissions' => json_encode($role_has_permissions)]);

                \Log::info('CheckUserRoleMiddleware: Session setup', [
                    'user_id' => $user->id,
                    'role_id' => $user->role_id,
                    'role_name' => $users->roleName,
                    'permissions_count' => count($role_has_permissions)
                ]);
            } else {
                \Log::error('CheckUserRoleMiddleware: Role not found for user', [
                    'user_id' => $user->id,
                    'role_id' => $user->role_id
                ]);
            }

        }
        return $next($request);
    }
}