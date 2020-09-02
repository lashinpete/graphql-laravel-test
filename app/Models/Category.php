<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package Rocketdog\Domain\Catalog\Models
 */
class Category extends Model
{
    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'created_by',
        'created_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
