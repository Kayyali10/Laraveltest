<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
   protected $fillable = [
        'name',
        'user_id'
    ];

    public function user()
    {
        // هذه العلاقة تعني أن كل Skill يتبع User واحد.
        return $this->belongsTo(User::class);
    }
}
