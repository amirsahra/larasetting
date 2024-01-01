<?php

namespace Amirsahra\Larasetting\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method findOrFail($id)
 * @method create(array $data)
 * @method where(string $string, $key)
 */
class Larasetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'is_active',
    ];
}
