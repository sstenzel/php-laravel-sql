<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
        [
            'id' => 1,
            'name' => 'English',
            'shortcut' => 'EN'
        ], [
            'id' => 2,
            'name' => 'Spanish',
            'shortcut' => 'ES'
        ]
        ]);
    }
}
