<?php

use Illuminate\Database\Seeder;

class mailstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('mails')->insert([
            [
                'id'=>1,
                'title'=>"学校連絡",
                'body'=>"学校",
                'created_at'=>now(),
                'updated_at'=>now(),
                'user_id'=>1,
                'category_id'=>1,
               ],
            [
                'id'=>2,
                'title'=>"学校連絡",
                'body'=>"学校",
                'created_at'=>now(),
                'updated_at'=>now(),
                'user_id'=>1,
                'category_id'=>1,
               ],
            ]);
            
    }
}
