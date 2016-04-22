<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert(['name' => 'admin','label' => 'admin1@admin1.com','password' => 'pass']);
    }
}
