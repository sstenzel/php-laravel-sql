<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([[
            'id' => 1,
            'name' => 'user',
            'description' => 'Default, add own sets, save results'
        ],[
            'id' => 2,
            'name' => 'editor',
            'description' => 'Like user, add/edit/delete sets with permission'
        ],[
            'id' => 3,
            'name' => 'supereditor',
            'description' => 'Like supereditior, add/edit all sets'
        ],[
            'id' => 4,
            'name' => 'admin',
            'description' => 'All permissions'
        ]
        ]);
    }
}
