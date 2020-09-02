<?php

namespace App\GraphQL\Mutations;

use App\Models\Event;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

/**
 * Class EventCreateMutation
 * @package App\GraphQL\Mutations
 */
class EventCreateMutation extends Mutation
{
    /**
     * @var string[]
     */
    protected $attributes = [
        'name' => 'create_event'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('Event');
    }

    /**
     * @return array[]
     */
    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string())
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::string()
            ],
            'event_datetime' => [
                'name' => 'event_datetime',
                'type' => Type::string()
            ],
            'status' => [
                'name' => 'status',
                'type' => Type::boolean()
            ],
            'duration' => [
                'name' => 'duration',
                'type' => Type::int()
            ],
            'kind_id' => [
                'name' => 'kind_id',
                'type' => Type::int()
            ],
            'category_id' => [
                'name' => 'category_id',
                'type' => Type::int()
            ],
            'user_id' => [
                'name' => 'user_id',
                'type' => Type::int()
            ]
        ];
    }

    /**
     * @param array $args
     * @return array
     */
    protected function rules(array $args = []): array
    {
        return [
            'name' => ['required', 'string', 'max:64'],
            'event_datetime' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
            'duration' => ['nullable', 'integer', 'min:1'],
            'category_id' => ['nullable', 'integer'],
            'kind_id' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer']
        ];
    }

    /**
     * @param $root
     * @param $args
     * @return mixed
     */
    public function resolve($root, $args)
    {
        return Event::create($args);
    }
}
