<?php

namespace App\GraphQL\Types;

use App\Models\Event;
use Carbon\Carbon;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class EventType
 * @package App\GraphQL\Types
 */
class EventType extends GraphQLType
{
    /**
     * @var string[]
     */
    protected $attributes = [
        'name' => 'Event',
        'description' => 'Event',
        'model' => Event::class
    ];

    /**
     * @return array[]
     */
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of event',
                'alias' => 'id'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of event'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The name of event'
            ],
            'event_datetime' => [
                'type' => Type::string(),
                'description' => 'The name of event'
            ],
            'event_timezone' => [
                'type' => Type::string()
            ],
            'event_month' => [
                'type' => Type::string(),
            ],
            'status' => [
                'type' => Type::boolean(),
                'description' => 'Status of event'
            ],
            'duration' => [
                'type' => Type::int(),
                'description' => 'Duration of event'
            ],
            'registrations' => [
                'type' => Type::int(),
                //'privacy' => function(array $args): bool {
               // }
            ],
            'category' => [
                'type' => GraphQL::type('Category'),
                'description' => 'Event category'
            ],
            'kind' => [
                'type' => GraphQL::type('Kind'),
                'description' => 'Event kind'
            ],
            'user_id' => [
                'type' => Type::int(),
                'description' => 'Event user id'
            ]
        ];
    }

    /**
     * @param $root
     * @return string
     */
    protected function resolveEventMonthField($root)
    {
        if ($root->event_datetime) {
            $dateObject = Carbon::create($root->event_datetime);
            return $dateObject->localeMonth;
        } else {
            return null;
        }
    }

    /**
     * @param $root
     * @return string
     */
    protected function resolveEventTimezoneField($root)
    {
        if ($root->event_datetime) {
            $dateObject = Carbon::create($root->event_datetime);
            return $dateObject->getTimezone();
        } else {
            return null;
        }
    }
}
