<?php

namespace Amirsahra\Larasetting\Models;

use Illuminate\Database\Eloquent\Model;

class Larasetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'is_active',
    ];
}
