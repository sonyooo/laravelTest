<?php

namespace App\Models;

use App\Models\MusicReview;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MusicInstrument extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
    ];

    public function reviews()
    {
        return $this->hasMany(MusicReview::class, 'instrument_id', 'id');
    }

}
