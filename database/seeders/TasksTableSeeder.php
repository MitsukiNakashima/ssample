<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(2, 4) as $num) {
            DB::table('tasks')->insert([
                'folder_id' => 2,
                'title' => "サンプルタスク {$num}",
                'status' => $num,
                'due_date' => Carbon::now()->addDay($num),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]); 
        }
    }
}