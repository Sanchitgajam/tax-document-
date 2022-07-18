<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\Task;
use App\Models\Team;
use App\Http\Controllers\Controller;
use App\Models\TeamInvite;
use App\Models\TeamUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Mpociot\Teamwork\Facades\Teamwork;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Input\Input;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $invite = null;

        $role = TeamInvite::paginate();

        if ($request->invitation_token) {
            $invite = Teamwork::getInviteFromAcceptToken($request->invitation_token);
            if (! $invite) {
                throw ValidationException::withMessages(['token' => 'Bad token']);
            }

            $isUserExist = User::where('email',$invite->email)->count();
            if($isUserExist){
                  return redirect()->route('login', ['invitation_token' => $request->invitation_token]);
             }
        }

        return view('auth.register',compact('role'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//        dd($request);
        $roleID = $request->role_id;
        $invite = null;


        if ($request->invitation_token) {
            $invite = Teamwork::getInviteFromAcceptToken($request->invitation_token);
            if (! $invite) {
                throw ValidationException::withMessages(['token' => 'Bad token']);
            }
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);

        if ($invite) {
//            dd("Inside if");
            $user->attachTeam($invite->team, ['role_id' => $roleID]);
            $invite->delete();
//            Teamwork::acceptInvite($invite,['role_id' => 34]);
        } else {
            $team = Team::create([
                'owner_id' => $user->id,
                'name' => $user->name . "'s Team",
            ]);

            $user->attachTeam($team,['role_id' => 35]);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
