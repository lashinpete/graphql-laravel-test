<?php

namespace App\GraphQL\Queries;

use App\Models\Kind;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

/**
 * Class KindQuery
 * @package App\GraphQL\Queries
 */
class KindQuery extends Query
{
    protected $attributes = [
        'name' => 'kind'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('Kind');
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
     * @return mixed
     */
    public function resolve($root, $args)
    {
        return Kind::findOrFail($args['id']);
    }
}
