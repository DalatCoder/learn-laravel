<?php

namespace Database\Seeders;

use App\Http\Controllers\TodosController;
use App\Models\Todo;
use Database\Factories\TodoFactory;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Todo::factory(10)->create();
    }
}
