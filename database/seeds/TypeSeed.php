<?php

use Illuminate\Database\Seeder;
use App\Models\Type;

/**
 * Class TypeSeed
 */
class TypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items[] = [
            'name' => 'Webinar',
            'created_by' => 'admin',
        ];

        $items[] = [
            'name' => 'Meetup',
            'created_by' => 'admin',
        ];

        $items[] = [
            'name' => 'Conference',
            'created_by' => 'admin',
        ];

        $items[] = [
            'name' => 'Mentor meeting',
            'created_by' => 'admin',
        ];

        foreach ($items as $item) {
            Type::create($item);
        }
    }
}
