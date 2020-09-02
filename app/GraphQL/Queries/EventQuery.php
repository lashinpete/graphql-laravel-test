<?php

namespace App\GraphQL\Queries;

use App\Models\Event;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

/**
 * Class EventQuery
 * @package App\GraphQL\Queries
 */
class EventQuery extends Query
{
    /**
     * @var string[]
     */
    protected $attributes = [
        'name' => 'events'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('Event');
    }

    /**
     * @return array|array[]
     */
    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
        ];
    }

    /**
     * @param $root
     * @param $args
     * @param $context
     * @param ResolveInfo $info
     * @param SelectFields $getSelectFields
     * @return mixed
     */
    public function resolve($root, $args, $context, ResolveInfo $info, SelectFields $getSelectFields)
    {
        $fields = $getSelectFields;
        $with = $fields->getRelations();

        return Event::with($with)
            ->where('id', $args['id'])
            ->first();
    }
}
