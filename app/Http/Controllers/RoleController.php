<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\document_metadata;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Roletype;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index(){

        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::paginate();
        $roletypes = Roletype::paginate();
        return view('Roles.index',compact('roles','roletypes'));
    }

    public function delete(Request $request){

        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role = Role::find($request->id);
        if(!is_null($role)){
            $role->delete();
        }

        return redirect('/roles');

    }   


}
