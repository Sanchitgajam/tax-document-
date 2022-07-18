<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mpociot\Teamwork\Traits\UsedByTeams;

class Task extends Model
{
    use UsedByTeams;
    use SoftDeletes;

    protected $fillable = ['user_id', 'team_id', 'name'];
}
