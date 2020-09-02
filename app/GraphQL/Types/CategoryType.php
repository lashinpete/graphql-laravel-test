<?php

namespace App\GraphQL\Types;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class CategoryType
 * @package App\GraphQL\Types
 */
class CategoryType extends GraphQLType
{
    /**
     * @var string[]
     */
    protected $attributes = [
        'name' => 'Category',
        'description' => 'Categories of events',
        'model' => Category::class
    ];

    /**
     * @return array[]
     */
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of category',
                'alias' => 'id',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of category'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of category',
                'resolve' => function($root, $args) {
                    return stripslashes($root->description);
                }
            ],
            'events' => [
                'type' => Type::listOf(GraphQL::type('Event')),
                'description' => 'The category events',
                'always' => ['id', 'name'],
            ],
            'status' => [
                'type' => Type::boolean()
            ],
            'created_by' => [
                'type' => Type::string(),
                'description' => 'created_by field'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'created_at field'
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'updated_at field'
            ],
            'query_at' => [
                'type' => Type::string()
            ]
        ];
    }

    /**
     * @param $root
     * @param $args
     * @return string
     */
    protected function resolveQueryAtField($root, $args)
    {
        return now()->toDateTimeString();
    }
}
