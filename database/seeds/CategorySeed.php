<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

/**
 * Class CategorySeed
 */
class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $items[] = [
            'name' => 'JS',
            'description' => 'All JS related topics - native JS, JQuery, React, Angular, Nodejs',
            'status' => 1,
            'created_by' => 'admin',
        ];

        $items[] = [
            'name' => '.NET',
            'description' => 'All .NET related events - ASP.NET, C#',
            'status' => 1,
            'created_by' => 'admin',
        ];

        $items[] = [
            'name' => 'PHP',
            'description' => 'All PHP related events - Symfony, Laravel, Zend',
            'status' => 1,
            'created_by' => 'admin',
        ];

        $items[] = [
            'name' => 'Frontend an design',
            'description' => 'All frontend and desing related events - HTML, CSS, Bootstrap, Photoshop, Material design',
            'status' => 0,
            'created_by' => 'admin',
        ];

        foreach ($items as $item) {
            Category::create($item);
        }
    }
}
