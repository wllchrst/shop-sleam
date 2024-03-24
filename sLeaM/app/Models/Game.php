<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $primaryKey = 'game_id';

    protected $fillable = [
        'game_name', 'price', 'description', 'image_url'
    ];
}
