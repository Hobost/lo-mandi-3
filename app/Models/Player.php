<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Player extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'osu_id',
        'username',
        'country',
        'pp',
        'rank',
        'profile_pic_url',
    ];

    public function matchesAsPlayer1()
    {
        return $this->hasMany(Tmatch::class, 'player1_id');
    }

    public function matchesAsPlayer2()
    {
        return $this->hasMany(Tmatch::class, 'player2_id');
    }
    
}
