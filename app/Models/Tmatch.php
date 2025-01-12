<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

# laravel doesnt allow a class to be named 'match', T is for tournament

class Tmatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_number',
        'player1_id',
        'player2_id',
        'match_datetime',
        'player1_score',
        'player2_score',
        'match_url',
        'stage_id',
    ];

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function player1()
    {
        return $this->belongsTo(Player::class, 'player1_id');
    }

    public function player2()
    {
        return $this->belongsTo(Player::class, 'player2_id');
    }
}