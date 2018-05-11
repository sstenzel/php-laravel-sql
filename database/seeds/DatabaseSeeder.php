<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call( RolesTableSeeder::class );
        $this->call( UserTableSeeder::class );
        $this->call( LanguagesTableSeeder::class );
        $this->call( SubcategoriesTableSeeder::class );
        $this->call( SetsTableSeeder::class );
        $this->call( WordsTableSeeder::class );
        $this->call( Subcategory_userTableSeeder::class );
        $this->call( ResultsTableSeeder::class );
    }
}
