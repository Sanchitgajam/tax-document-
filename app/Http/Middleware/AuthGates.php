<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use App\Models\TeamUser;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        
        if (!app()->runningInConsole() && $user) {
            $roles = Role::with('permissions')->get();
        
            
            $permissionsArray = [];

            foreach ($roles as $role) {
                foreach ($role->permissions as $permissions) {
                    $permissionsArray[$permissions->title][] = $role->id;
                }
            }
                    
            foreach ($permissionsArray as $title => $roles) {
                Gate::define($title, function (User $user) use ($roles) {
                    $current_role_id = TeamUser::select('role_id')->where('user_id', $user->id)->where('team_id', $user->currentTeam->id)->get();
            
            
                    return count(array_intersect($current_role_id->pluck('role_id')->toArray(), $roles)) > 0;
                });
            }
            // dd(Gate::abilities(), $user->id, $user->currentTeam->id);
        }

        return $next($request);
    }
}