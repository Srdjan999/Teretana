<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach', 'date', 'room_id' //Obrisati date i room_id, ako ne radi
    ];

    protected $table = 'trainings';

    public function room()
    {
        return $this->hasOne(Room::class);
        //return $this->belongsToMany(Room::class)->withPivot(['date', 'duration']);
    }



    public function member()
    {
        
        return $this->belongsToMany(Member::class);
    }

}