<?php

use Illuminate\Database\Seeder;

class Subcategory_userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategory_user')->insert([
        [
            'user_id' => 2,
            'subcategory_id' => 2,
        ], [
            'user_id' => 3,
            'subcategory_id' => 3,
        ]]);
    }
}
