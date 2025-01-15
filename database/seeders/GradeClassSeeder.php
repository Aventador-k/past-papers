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
            ['name' => 'GRADE 1', 'created_at' => now()],
            ['name' => 'GRADE 2' ,'created_at' => now()],
            ['name' => 'GRADE 3','created_at' => now()],
            ['name' => 'GRADE 4', 'created_at' => now()],
            ['name' => 'GRADE 5' ,'created_at' => now()],
            ['name' => 'GRADE 6' ,'created_at' => now()],
            ['name' => 'GRADE 7' ,'created_at' => now()],
            ['name' => 'GRADE 8' ,'created_at' => now()],
            ['name' => 'GRADE 9' ,'created_at' => now()],
        ]);

        
    }
}
