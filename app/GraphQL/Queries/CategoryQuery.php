<?php

namespace App\GraphQL\Queries;

use App\Models\Category;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

/**
 * Class CategoryQuery
 * @package App\GraphQL\Queries
 */
class CategoryQuery extends Query
{
    protected $attributes = [
        'name' => 'category'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('Category');
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
        return Category::findOrFail($args['id']);
    }
}
