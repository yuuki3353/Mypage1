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
        DB::table('categories')->insert([
             [
                'id'=>1,
                'name'=>"学校連絡",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>2,
                'name'=>"保護者宛て連絡",
                'created_at'=>now(),
                'updated_at'=>now(),
                
            ],
            ]
                );
    }
}
