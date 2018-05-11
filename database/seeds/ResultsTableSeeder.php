<?php

use Illuminate\Database\Seeder;

class ResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('results')->insert([[
            'user_id' => 1,
            'set_id' => 1,
            'percentage' => 0.2
        ],[
            'user_id' => 1,
            'set_id' => 1,
            'percentage' => 0.6
        ],[
            'user_id' => 1,
            'set_id' => 2,
            'percentage' => 0.9
        ],[
            'user_id' => 1,
            'set_id' => 2,
            'percentage' => 0.1
        ]
        ]);
    }
}
