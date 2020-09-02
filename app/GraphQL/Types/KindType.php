<?php

namespace App\GraphQL\Types;

use App\Models\Kind;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class KindType
 * @package App\GraphQL\Types
 */
class KindType extends GraphQLType
{
    /**
     * @var string[]
     */
    protected $attributes = [
        'name' => 'Kind',
        'description' => 'Kinds of events',
        'model' => Kind::class
    ];

    /**
     * @return array[]
     */
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of event tag',
                'alias' => 'id',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of event tag'
            ],
            'upper_name' => [
                'type' => Type::string()
            ]
        ];
    }


    /**
     * @param $root
     * @param $args
     * @return string
     */
    protected function resolveUpperNameField($root, $args)
    {
        return strtoupper($root->name);
    }
}
