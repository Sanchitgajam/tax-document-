<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Mpociot\Teamwork\TeamworkTeam;
use Mpociot\Teamwork\Traits\UsedByTeams;
use Mpociot\Teamwork\Traits\UserHasTeams;

class Team extends TeamworkTeam
{
    use UsedByTeams, UserHasTeams;
    use SoftDeletes;

//    protected $table = 'teams';

}
