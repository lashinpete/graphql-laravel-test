<?php

namespace App\GraphQL\Mutations;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

/**
 * Class CategoryCreateMutation
 * @package App\GraphQL\Mutations
 */
class CategoryCreateMutation extends Mutation
{
    /**
     * @var string[]
     */
    protected $attributes = [
        'name' => 'create_category'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('Category');
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
            'status' => [
                'name' => 'status',
                'type' => Type::boolean()
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
            'description' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean']
        ];
    }

    /**
     * @param $root
     * @param $args
     * @return mixed
     */
    public function resolve($root, $args)
    {
        return Category::create($args);
    }
}
