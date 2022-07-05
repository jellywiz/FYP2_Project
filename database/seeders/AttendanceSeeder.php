<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendance::truncate();
        $users = User::all();
        foreach ($users as $user) {
            foreach (range(1, 30) as $value) {
                Attendance::create([
                    "user_id" => $user->id,
                    "status" => rand(0,2),
                    "created_at"=> Carbon::today()->subDays($value)
                ]);
            }
        }
    }
}
