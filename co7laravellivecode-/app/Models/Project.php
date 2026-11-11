<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // تحدد الأعمدة المسموح بتعبئتها جماعياً باستخدام create() وupdate() في Laravel.
    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id'
    ];

    public function user()
    {
        // هذه العلاقة تعني أن كل Project يتبع User واحد.
        return $this->belongsTo(User::class);
    }
}
