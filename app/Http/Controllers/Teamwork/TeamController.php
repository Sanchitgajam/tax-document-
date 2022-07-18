<?php

namespace App\Http\Controllers\Teamwork;

use App\Models\Team;
use App\Models\TeamType;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Mpociot\Teamwork\Events\UserJoinedTeam;
use Mpociot\Teamwork\Exceptions\UserNotInTeamException;
use Mpociot\Teamwork\Traits;
use Mpociot\Teamwork\Traits\UserHasTeams;

use Gate;
use Mpociot\Teamwork\Facades\Teamwork;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('teamwork.index')
            ->with('teams', auth()->user()->teams);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()//$id
    {
        // team_create
         abort_if(Gate::denies('team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $teamroles = TeamType::paginate();
        $emails = User::paginate();
        $teamModel = config('teamwork.team_model');
//        $team = $teamModel::findOrFail($id);

        return view('teamwork.create',compact('teamroles','emails'));//->withTeam($team);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        dd($request);
        $email = $request->email;
        $userTable= DB::table('users');
        $usersId=$userTable->where('email','=',$email)->get();
        $usersIdCount=$userTable->get('id')->count();

        $teamTypeId = $request->type_id;
        $request->validate([
            'name' => 'required|string',
        ]);
        $teamModel = config('teamwork.team_model');

        if ($usersIdCount){
            $emailId = $usersId[0]->id;
            $teams = $teamModel::create([
                'name' => $request->name,
                'owner_id' => $emailId,
                'teamtype_id'=>$teamTypeId,
            ]);

            $request->user()->attachTeam($teams);

            return redirect(route('teams.index',compact('emailId')));
        }
        else{
            echo "hello ELSE";
            dd("hello sir");

        }
    }
    /**
     * Switch to the given team.
     *
     * @param  int $id
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function switchTeam($id)
    {

        $teamModel = config('teamwork.team_model');
        $team = $teamModel::findOrFail($id);
        try {
            auth()->user()->switchTeam($team);
        } catch (UserNotInTeamException $e) {
            abort(403);
        }

        return redirect(route('teams.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teamModel = config('teamwork.team_model');
        $team = $teamModel::findOrFail($id);

        if (! auth()->user()->isOwnerOfTeam($team)) {
            abort(403);
        }

        return view('teamwork.edit')->withTeam($team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $teamModel = config('teamwork.team_model');

        $team = $teamModel::findOrFail($id);
        $team->name = $request->name;
        $team->save();

        return redirect(route('teams.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $teamModel = config('teamwork.team_model');

        $team = $teamModel::findOrFail($id);
        if (! auth()->user()->isOwnerOfTeam($team)) {
            abort(403);
        }

        $team->delete();

        $userModel = config('teamwork.user_model');
        $userModel::where('current_team_id', $id)
                    ->update(['current_team_id' => null]);

        return redirect(route('teams.index'));
    }
}

