<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mpociot\Teamwork\Traits\UserHasTeams;

class TeamUser extends Model
{
    use HasFactory,UserHasTeams;
    use SoftDeletes;
    
    protected $table = 'team_user';
}
