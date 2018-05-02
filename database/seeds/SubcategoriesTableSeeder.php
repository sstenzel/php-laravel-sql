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
            'name' => 'Adjectives',
            'description' => '',
            'language_id' => DB::table('languages')->where('shortcut', 'EN')->pluck('id')->first()
        ],[
            'id' => 2,
            'name' => 'Nouns',
            'description' => '',
            'language_id' => DB::table('languages')->where('shortcut', 'EN')->pluck('id')->first()
        ],[
            'id' => 3,
            'name' => 'Verbs',
            'description' => '',
            'language_id' => DB::table('languages')->where('shortcut', 'EN')->pluck('id')->first()
        ],[
            'id' => 4,
            'name' => 'Adjectives',
            'description' => '',
            'language_id' => DB::table('languages')->where('shortcut', 'ES')->pluck('id')->first()
        ],[
            'id' => 5,
            'name' => 'Nouns',
            'description' => '',
            'language_id' => DB::table('languages')->where('shortcut', 'ES')->pluck('id')->first()
        ],[
            'id' => 6,
            'name' => 'Verb',
            'description' => '',
            'language_id' => DB::table('languages')->where('shortcut', 'ES')->pluck('id')->first()
        ]
        ]);
    }
}
