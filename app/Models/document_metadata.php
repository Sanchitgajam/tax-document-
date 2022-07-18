<?php

namespace App\Models;


//use App\Model\Document;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mpociot\Teamwork\Traits\UsedByTeams;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class document_metadata extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadesDeletes,CascadeSoftDeletes;

    use UsedByTeams;
//    protected $cascadeDeletes = ['metadata'];
    public function Metadata(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

//    public static function boot() {
//        parent::boot();
//
//        static::deleting(function($user) { // before delete() method call this
//            $user->metadata()->delete();
//            // do the rest of the cleanup...
//        });
//    }


}

