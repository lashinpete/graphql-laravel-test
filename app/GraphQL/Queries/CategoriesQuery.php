<?php

namespace App\GraphQL\Queries;

use App\Models\Category;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

/**
 * Class CategoriesQuery
 * @package App\GraphQL\Queries
 */
class CategoriesQuery extends Query
{
    protected $attributes = [
        'name' => 'categories'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Category'));
    }

    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function resolve()
    {
        return Category::all();
    }
}
