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
            'user_id' => 4,
            'private' => false,
            'subcategory_id' => 1
        ],[
            'id' => 2,
            'name' => 'ZestawEdytoraPubliczny',
            'user_id' => 2,
            'private' => false,
            'subcategory_id' => 2
        ],[
            'id' => 3,
            'name' => 'ZestawEdytoraPrywatny',
            'user_id' => 2,
            'private' => true,
            'subcategory_id' => 2
        ],[
            'id' => 4,
            'name' => 'ZestawSuperEdPubliczny',
            'user_id' => 3,
            'private' => false,
            'subcategory_id' => 3
        ],[
            'id' => 5,
            'name' => 'ZestawSuperEdPrywatny',
            'user_id' => 3,
            'private' => true,
            'subcategory_id' => 3
        ],[
            'id' => 6,
            'name' => 'ZestawAdminaPrywatny',
            'user_id' => 4,
            'private' => true,
            'subcategory_id' => 4
        ]
        ]);
    }
}
