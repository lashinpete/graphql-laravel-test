<?php

namespace App\GraphQL\Queries;

use App\Models\Kind;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

/**
 * Class KindsQuery
 * @package App\GraphQL\Queries
 */
class KindsQuery extends Query
{
    protected $attributes = [
        'name' => 'kinds'
    ];

    /**
     * @return Type
     */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Kind'));
    }

    /**
     * @return mixed
     */
    public function resolve()
    {
        return Kind::all();
    }
}
