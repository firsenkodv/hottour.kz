<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNextTour extends Model
{
  protected $table = 'user_next_tours';
    protected $fillable = [
        'ip',
        'cookie',
        'user_id',
    ];

}
