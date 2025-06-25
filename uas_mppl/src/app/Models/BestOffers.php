<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestOffers extends Model
{
    //
    use HasFactory;

    protected $table = 'best_offers';

    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
    ];
}
