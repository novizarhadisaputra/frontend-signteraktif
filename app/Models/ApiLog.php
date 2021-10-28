<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'request_headers',
        'request_method',
        'request_body',
        'status',
        'ip_address',
        'response'
    ];
}
