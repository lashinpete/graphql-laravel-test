<?php

namespace App\GraphQL\Mutations;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

/**
 * Class CategoryUpdateMutation
 * @package App\GraphQL\Mutations
 */
class CategoryUpdateMutation extends Mutation
{
    /**
     * @var string[]
     */
    protected $attributes = [
        'name' => 'update_category'
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
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int())
            ],
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
            'id' => ['required', 'integer'],
            'name' => ['sometimes', 'string', 'max:64'],
            'description' => ['sometimes', 'string'],
            'status' => ['sometimes', 'boolean']
        ];
    }

    /**
     * @param $root
     * @param $args
     * @return mixed
     */
    public function resolve($root, $args)
    {
        $category = Category::findOrFail($args['id']);

        if (isset($args['name'])) {
            $category->name = $args['name'];
        }

        if (isset($args['description'])) {
            $category->description = $args['description'];
        }

        if (isset($args['status'])) {
            $category->status = $args['status'];
        }

        $category->save();

        return $category;
    }
}
