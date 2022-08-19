<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members_training extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'training_id'
        ];

        protected $table = 'members_trainings';

}
