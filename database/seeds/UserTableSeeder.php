<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Amelia Kwiatkowska',
                'email' => 'a_kwiatkowska@gmail.com',
                'password' => bcrypt('haslo'),
               'role_id' => 1
            ],[
                'name' => 'Karol Kropek',
                'email' => 'k_kropek@gmail.com',
                'password' => bcrypt('haslo'),
               'role_id' =>2
            ],[
                'name' => 'Tomek Dąbek',
                'email' => 't_dabek@gmail.com',
                'password' => bcrypt('haslo'),
               'role_id' =>3
            ],[
                'name' => 'Monika Fiołkowska',
                'email' => 'm_fiolkowska@gmail.com',
                'password' => bcrypt('haslo'),
               'role_id' =>4
                // DB::table('roles')->where('name', 'admin')->pluck('id')->first()
            ]
        ]);
    }
}
