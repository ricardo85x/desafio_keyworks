<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number_of_tasks_to_create = 12;

        // Run the database factory in sync mode(not async)
        foreach(range(1,$number_of_tasks_to_create) as $_i) {
            \App\Models\Task::factory(1)->create();
        }    
    }
}

