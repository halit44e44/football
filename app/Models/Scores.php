<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    use HasFactory;

    public function teams()
    {
        return $this->belongsTo(Teams::class,'teamsId', 'id');
    }

    public function leagues()
    {
        return $this->belongsTo(Leagues::class,'leaguesId', 'id');
    }
}
