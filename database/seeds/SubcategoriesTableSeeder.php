<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
        [
            'id' => 1,
            'name' => 'Rzeczowniki',
            'language_id' => DB::table('languages')->where('shortcut', 'EN')->pluck('id')->first()
        ],[
            'id' => 2,
            'name' => 'Czasowniki',
            'language_id' => DB::table('languages')->where('shortcut', 'EN')->pluck('id')->first()
        ],[
            'id' => 3,
            'name' => 'Przymiotniki',
            'language_id' => DB::table('languages')->where('shortcut', 'EN')->pluck('id')->first()
        ],[
            'id' => 4,
            'name' => 'Rzeczowniki',
            'language_id' => DB::table('languages')->where('shortcut', 'ES')->pluck('id')->first()
        ]
        ]);
    }
}
