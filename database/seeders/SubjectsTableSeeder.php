<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $subjects = [
            'Mathematics',
            'English',
            'Kiswahili',
            'Science',
            'History'
        ];

        foreach ($subjects as $subject) {
            DB::table('subjects')->insert([
                'name' => $subject,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
}
