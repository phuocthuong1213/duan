<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'cate_name' => 'iPhone',
                'cate_slug' => Str::slug('Iphone')
            ],
            [
                'cate_name' => 'SamSung',
                'cate_slug' =>  Str::slug('SamSung')
            ],
        ];
        DB::table('categories')->insert($data);
    }
}
