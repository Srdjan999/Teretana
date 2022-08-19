<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'last_name', 'adress', 'phone', 'memberships_id'
        ];

        protected $table = 'members';

        public function memberships(){
        return $this->hasOne(Membership::class);
}


}

