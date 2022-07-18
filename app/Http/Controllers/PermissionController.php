<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Permission;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class PermissionController extends Controller

{
    public function index()
    {

        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $permissions = Permission::paginate();
        
        return view('permissions.index', compact('permissions'));
    }

    public function delete(Request $request)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permission = Permission::find($request->id);
        if(!is_null($permission)){
            $permission->delete();
        }

        return redirect('/permissions');

    }

}
