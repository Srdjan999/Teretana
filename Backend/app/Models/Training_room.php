<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training_room extends Model
{
    use HasFactory;

    protected $fillable = [
        'duration', 'date', 'room_id', 'training_id'
        ];

        protected $table = 'training_rooms';

}
