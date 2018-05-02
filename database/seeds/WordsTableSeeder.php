<?php

use Illuminate\Database\Seeder;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('words')->insert([
        [
            'set_id' => 1,
            'word1' => 'Słoń',
            'word2' => 'Elephant'
        ],[
            'set_id' => 1,
            'word1' => 'Pies',
            'word2' => 'Dog'
        ],[
            'set_id' =>1,
            'word1' => 'Kot',
            'word2' => 'Cat'
        ],[
            'set_id' =>1,
            'word1' => 'Mysz',
            'word2' => 'Mouse'
        ],[
            'set_id' =>1,
            'word1' => 'Ptak',
            'word2' => 'Bird'
        ],[

            'set_id' =>2,
            'word1' => 'Lalka',
            'word2' => 'Doll'
        ],[
            'set_id' => 2,
            'word1' => 'Piłka',
            'word2' => 'Ball'
        ],[
            'set_id' =>2,
            'word1' => 'Miś',
            'word2' => 'Teddy bear'
        ],[
            'set_id' => 2,
            'word1' => 'a',
            'word2' => 'a'
        ],[

            'set_id' => 3,
            'word1' => 'Żółty',
            'word2' => 'Yellow'
        ],[
            'set_id' => 3,
            'word1' => 'Niebieski',
            'word2' => 'Blue'
        ],[
            'set_id' => 3,
            'word1' => 'Różowy',
            'word2' => 'Pink'
        ],[
            'set_id' => 3,
            'word1' => 'Czerwony',
            'word2' => 'red'
        ],[

            'set_id' => 4,
            'word1' => 'żółty',
            'word2' => 'Amarillo'
        ],[

            'set_id' => 4,
            'word1' => 'Niebieski',
            'word2' => 'azul'
        ],[

            'set_id' => 4,
            'word1' => 'Różowy',
            'word2' => 'rosa'
        ],[

            'set_id' => 4,
            'word1' => 'Czerwony',
            'word2' => 'Rojo'
        ]
        ]);
    }
}
