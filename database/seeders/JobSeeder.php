<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            "Cleaner",
            "Back-End Devloper",
            "Front-End Devaloper",
            "Project Manager",
            "Project Coordinator",
            "IOS Devloper",
            "Android Developer",
            "Fluter Developer",
        ];

        foreach ($arr as $job) {
            Job::create(
                [
                    'title' => $job,
                    'department_id' => Department::inRandomOrder()->first()->id,
                ]
            );
        }
    }
}
