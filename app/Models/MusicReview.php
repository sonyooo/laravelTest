<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_name',
        'instrument_id'
    ];
}
