<?php

namespace Amirsahra\Larasetting\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method findOrFail($id)
 * @method create(array $data)
 * @method where(array $data)
 */
class Larasetting extends Model
{
    protected $table = 'settings';
    protected $fillable = [
        'key',
        'value',
        'is_active',
    ];
}
