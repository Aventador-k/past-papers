<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('grade_classes')->insert([
            ['name' => 'PP1', 'created_at' => now()],
            ['name' => 'PP2' ,'created_at' => now()],
            ['name' => 'PP3','created_at' => now()],
            ['name' => 'GRADE4', 'created_at' => now()],
            ['name' => 'GRADE5' ,'created_at' => now()],
        ]);
    }
}
