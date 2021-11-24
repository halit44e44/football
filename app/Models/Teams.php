<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;

    protected $fillable = ['leaguesId', 'name'];

    public function teams()
    {
        return $this->belongsTo(Teams::class, 'teamsId', 'id');
    }

    public function leagues()
    {
        return $this->belongsTo(Leagues::class,'leaguesId', 'id');
    }

}
