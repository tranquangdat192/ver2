<?php

use Illuminate\Database\Seeder;
use App\Model\Brand;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Brand::count() == 0) {
            Brand::create([
                'name'           => 'Apple (iPhone)',
                'slug'           => 'apple-iphone',
                'category_id'    => '1'
            ]);
            Brand::create([
                'name'           => 'Samsung',
                'slug'           => 'samsung',
                'category_id'    => '1'
            ]);
            Brand::create([
                'name'           => 'Huawei',
                'slug'           => 'huawei',
                'category_id'    => '1'
            ]);
            Brand::create([
                'name'           => 'Oppo',
                'slug'           => 'opppo',
                'category_id'    => '1'
            ]);
            Brand::create([
                'name'           => 'Xiaomi',
                'slug'           => 'xiaomi',
                'category_id'    => '1'
            ]);
            Brand::create([
                'name'           => 'Apple (Macbook)',
                'slug'           => 'apple-macbook',
                'category_id'    => '3'
            ]);
            Brand::create([
                'name'           => 'Dell',
                'slug'           => 'dell',
                'category_id'    => '3'
            ]);
            Brand::create([
                'name'           => 'HP',
                'slug'           => 'hp',
                'category_id'    => '3'
            ]);
            Brand::create([
                'name'           => 'Asus',
                'slug'           => 'asus',
                'category_id'    => '3'
            ]);
            Brand::create([
                'name'           => 'Acer',
                'slug'           => 'acer',
                'category_id'    => '3'
            ]);
            Brand::create([
                'name'           => 'Alienware',
                'slug'           => 'alienware',
                'category_id'    => '2'
            ]);
        }
    }
}
