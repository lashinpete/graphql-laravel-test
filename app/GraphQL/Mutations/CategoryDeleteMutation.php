<?php

namespace App\GraphQL\Mutations;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

/**
 * Class CategoryDeleteMutation
 * @package App\GraphQL\Mutations
 */
class CategoryDeleteMutation extends Mutation
{
    /**
     * @var string[]
     */
    protected $attributes = [
        'name' => 'delete_category'
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
            'id' => ['required', 'integer']
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

        $deletedCategory = $category;

        $category->delete();

        return $deletedCategory;
    }
}
