<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class JobController extends Controller
{

    public function __construct()
    {
        View::share([
            "title" => "Job"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::with('department')->orderByDesc("created_at")->paginate(10);
        return view("jobs.index", compact("jobs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $depts = Department::pluck('name', 'id');
        return view("jobs.create", compact("depts"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator =  Validator::make(
            $request->all(),
            [
                "title" => ['required', 'string', 'unique:jobs,title'],
                "department_id" => ['required', 'exists:departments,id']
            ],
            [
                "department_id.required" => "please select a department"
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        Job::create([
            "title" => $request->title,
            "department_id" => $request->department_id
        ]);

        return redirect()->route('jobs.index')->with([
            "message" => "Job Created Successfully",
            "title" => "Created",
            "icon" => "success",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $Job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $depts = Department::pluck('name', 'id');
        return view("jobs.edit", compact("depts", 'job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $Job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $validator =  Validator::make(
            $request->all(),
            [
                "title" => ['required', 'string', "unique:jobs,title," . $job->id . ",id"],
                "department_id" => ['required', 'exists:departments,id']
            ],
            [
                "department_id.required" => "please select a department"
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $job->update([
            "title" => $request->title,
            "department_id" => $request->department_id
        ]);

        return redirect()->route('jobs.index')->with([
            "message" => "Job Updated Successfully",
            "title" => "Updated",
            "icon" => "success",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with([
            "message" => "Job Deleted Successfully",
            "title" => "Deleted",
            "icon" => "success",
        ]);
    }
}
