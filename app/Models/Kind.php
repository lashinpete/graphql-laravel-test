<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Kind
 * @package App\Models
 */
class Kind extends Model
{
    /**
     * @var string
     */
    protected $table = 'types';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description'
    ];
}
