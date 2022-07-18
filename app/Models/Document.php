<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mpociot\Teamwork\Traits\UsedByTeams;
// use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Document extends Model
{
    use HasFactory;
    use UsedByTeams;
    use SoftDeletes;
    // use CascadesDeletes;

//    protected $fillable = ['user_id', 'team_id', 'name'];
    // public function getMetadata(): \Illuminate\Database\Eloquent\Relations\HasMany
    // {
    //     return $this->hasMany(document_metadata::class);
    // }



}
