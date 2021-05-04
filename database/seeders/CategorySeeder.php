<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id'            => 1,
                'name'          => 'T-Shirt',
                'slug'          => 't-shirt',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 2,
                'name'          => 'Shirt',
                'slug'          => 'shirt',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 3,
                'name'          => 'Jacket',
                'slug'          => 'jacket',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 4,
                'name'          => 'Short Pants',
                'slug'          => 'short-pants',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 5,
                'name'          => 'Shoes',
                'slug'          => 'shoes',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ]
        ];

        Category::insert($categories);
    }
}
