<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            "Recruiting and staffing",
            "Health and safety",
            "Training and development",
            "Compensation and benefits",
        ];

        foreach ($arr as $dept) {
            Department::create([
                "name"=>$dept
            ]);
        }
    }
}
