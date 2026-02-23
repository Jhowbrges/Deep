<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    protected $fillable = [
        'user_id',
        'route_name',
        'path',
        'method',
        'ip',
        'user_agent',
    ];
}
