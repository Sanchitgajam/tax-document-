<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Teamwork\TeamController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Team;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Mpociot\Teamwork\Facades\Teamwork;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('auth.login',['invitation_token' => $request->invitation_token]);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $invite = null;

//        $role_id = TeamController::;

        if ($request->invitation_token) {
            $invite = Teamwork::getInviteFromAcceptToken($request->invitation_token);
            if (! $invite) {
                throw ValidationException::withMessages(['token' => 'Bad token']);
            }
        }

        $request->authenticate();

        $request->session()->regenerate();

        if ($invite) {
            Teamwork::acceptInvite($invite);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
