<?php

use Illuminate\Database\Seeder;

class ToDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ToDo'::class,7)->create();
    }
}
