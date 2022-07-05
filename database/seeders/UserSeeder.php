<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //get random name
        $json = file_get_contents(base_path() . "/names.json");
        $array = json_decode($json, true);

        DB::table("users")->insert([
            'first_name' => 'admin',
            'last_name' => 'User',
            'email' => 'admin@test.com',
            'is_admin' => 1,
            "gender" => 1,
            'number' => "750 425 8891",
            'address' => "Erbil, center",
            'password' => bcrypt("password"),
        ]);

        foreach (range(1, 10) as $item) {
            $fname =  Str::lower($array[rand(0, count($array) - 1)]);
            $lname =  Str::lower($array[rand(0, count($array) - 1)]);

            User::create([
                'first_name' => $fname,
                'last_name' => $lname,
                'job_id' => Job::inRandomOrder()->first()->id,
                'email' => $fname . "_" . $lname . '@test.com',
                'gender' => $item % 2 == 0 ? 0 : 1,
                'number' => "750 425 8891",
                'address' => "Erbil, center",
                'sallary' => rand(500,1000),
                'password' => bcrypt("password"),
            ]);
        }
    }
}
