<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beatmap extends Model
{
    use HasFactory;

    public $timestamps = false; // no

    protected $fillable = [
        'mod_id',
        'beatmap_id',
        'beatmapset_id',
        'title',
        'version',
        'artist',
        'creator',
        'cover_card_url',
        'bpm',
        'difficulty_rating',
        'ar',
        'cs',
        'accuracy',
        'drain',
        'total_length', // song length ?????? api docs unclear change later or dont use
        'stage_id',
    ];

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}