<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Job;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $usersCount;
    public $deptsCount;
    public $jobsCount;
    public $users;
    public function render()
    {
        $this->usersCount  = User::where('is_admin','!=',1)->count();
        $this->deptsCount  = Department::count();
        $this->jobsCount  = Job::count();
        $this->users = User::with('job', 'job.department')->whereIsAdmin(0)->orderByDesc("created_at")->take(6)->get();
        return view('dashboard');
    }
}
