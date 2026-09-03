<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'device_token',
        'ip_address',
        'user_agent',
        'last_login_at',
        'expires_at',
    ];

    protected $casts = [
        'last_login_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}