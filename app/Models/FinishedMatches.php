<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinishedMatches extends Model
{
    use HasFactory;

    protected $fillable = ['leaguesId', 'houseOwner', 'away', 'score1', 'score2'];

    public function teamsAway()
    {
        return $this->belongsTo(Teams::class, 'away', 'id');
    }

    public function teamsOwner()
    {
        return $this->belongsTo(Teams::class, 'houseOwner', 'id');
    }
}
