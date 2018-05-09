<?php

use Illuminate\Database\Seeder;

class SetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sets')->insert([
        [
            'id' => 1,
            'name' => 'Zwierzęta',
            'user_id' => 1,
            'private' => false,
            'subcategory_id' => 1
        ],[
            'id' => 2,
            'name' => 'Zabawki',
            'user_id' => 2,
            'private' => false,
            'subcategory_id' => 2
        ],[
            'id' => 3,
            'name' => 'Kolory',
            'user_id' => 3,
            'private' => false,
            'subcategory_id' => 3
        ],[
            'id' => 4,
            'name' => 'Kolory',
            'user_id' => 4,
            'private' => false,
            'subcategory_id' => 4
        ]
        ]);
    }
}
