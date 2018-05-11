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
            'word1' => 'Kolorowy',
            'word2' => 'Colorful'
        ],[
            'set_id' => 2,
            'word1' => 'Ładny',
            'word2' => 'Pretty'
        ],[
            'set_id' =>2,
            'word1' => 'Przezroczysty',
            'word2' => 'Transparent'
        ],[

            'set_id' => 3,
            'word1' => 'Dobry',
            'word2' => 'Kind'
        ],[
            'set_id' => 3,
            'word1' => 'Użyteczny',
            'word2' => 'Useful'
        ],[
            'set_id' => 3,
            'word1' => 'Dziwny',
            'word2' => 'Weird'
        ],[
            'set_id' => 3,
            'word1' => 'Mądry',
            'word2' => 'Smart'
        ],[
            'set_id' => 4,
            'word1' => 'Chodzić',
            'word2' => 'Walk'
        ],[
            'set_id' => 4,
            'word1' => 'Uśmiechać się',
            'word2' => 'Smile'
        ],[
            'set_id' => 4,
            'word1' => 'Jeść',
            'word2' => 'Eat'
        ],[
            'set_id' => 5,
            'word1' => 'Siedzieć',
            'word2' => 'Sit'
        ],[
            'set_id' => 5,
            'word1' => 'Jeździć',
            'word2' => 'Drive'
        ],[
            'set_id' => 5,
            'word1' => 'Uczyć się',
            'word2' => 'Learn'
        ],[
            'set_id' => 6,
            'word1' => 'żółty',
            'word2' => 'Amarillo'
        ],[

            'set_id' => 6,
            'word1' => 'Niebieski',
            'word2' => 'Azul'
        ],[

            'set_id' => 6,
            'word1' => 'Różowy',
            'word2' => 'Rosa'
        ],[

            'set_id' => 6,
            'word1' => 'Czerwony',
            'word2' => 'Rojo'
        ]
        ]);
    }
}
