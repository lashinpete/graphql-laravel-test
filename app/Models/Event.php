<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Event
 * @package App\Models
 */
class Event extends Model
{
    /**
     * @var string
     */
    protected $table = 'events';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'event_datetime',
        'duration',
        'registrations',
        'category_id',
        'kind_id'
    ];

    /**
     * @return BelongsTo
     */
    public function kind()
    {
        return $this->belongsTo(Kind::class, 'kind_id');
    }

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
