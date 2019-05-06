<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(UsersProfilesTableSeeder::class);
         $this->call(UsersRolesTableSeeder::class);
         $this->call(UsersRolesRelationsTableSeeder::class);
    }

}
