<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'phoneNumber',
        'university',
        'level',
        'course',
        'year',
        'regno',
        'location',
        'company',
        'department',
        'profileImage',
        'fieldStart',
        'fieldEnd',
    ];



    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

