<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'province',
        'city',
        'address',
        'phone',
        'sex',
        'has_whatsapp',
        'has_telegram',
    ];

    /**
     * Get the user that owns the UserDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
