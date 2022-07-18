<?php

namespace App\Models;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mpociot\Teamwork\Traits\UsedByTeams;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class task_metadata extends Model
{
    use HasFactory;
    use SoftDeletes;

}




