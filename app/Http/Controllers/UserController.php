<?php

namespace App\Http\Controllers;

use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class UserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::paginate();
        
        return view('users.index', compact('users'));
        
    }
}
