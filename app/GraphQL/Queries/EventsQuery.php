<?php

namespace App\GraphQL\Queries;

use App\Models\Event;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

/**
 * Class EventsQuery
 * @package App\GraphQL\Queries
 */
class EventsQuery extends Query
{
    protected $attributes = [
        'name' => 'events'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Event'));
    }

    /**
     * @param $root
     * @param $args
     * @param $context
     * @param ResolveInfo $info
     * @param Closure $getSelectFields
     * @return mixed
     */
    public function resolve($root, $args, $context, ResolveInfo $info, SelectFields $getSelectFields)
    {
        $fields = $getSelectFields;
        $with = $fields->getRelations();

        return Event::with($with)->get();
    }
}
