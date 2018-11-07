<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Category::count() == 0) {
            Category::create([
                'name'           => 'Smart Phone',
                'slug'           => 'smart-phone',
            ]);
            Category::create([
                'name'           => 'Desktop',
                'slug'           => 'desktop',
            ]);
            Category::create([
                'name'           => 'Laptop',
                'slug'           => 'laptop',
            ]);
            Category::create([
                'name'           => 'Accessories',
                'slug'           => 'accessories',
            ]);
            Category::create([
                'name'           => 'Networking',
                'slug'           => 'networking',
            ]);
        }
    }
}
