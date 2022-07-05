<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{

    public function __construct()
    {
        View::share([
            "title" => "Employee"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('job', 'job.department')->whereIsAdmin(0)->orderByDesc("created_at")->paginate(15);
        return view("users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::pluck('title', 'id');
        return view("users.create", compact("jobs"));
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
                "first_name" => ['required', 'string'],
                "last_name" => ['required', 'string'],
                "email" => ['required', 'email'],
                "password" => ['required'],
                "job" => ['required'],
                "gender" => ['required', 'string'],
                "sallary" => ['required'],
                "address" => ['required', 'string'],
                "number" => ['required', 'string'],
            ],
        );


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "job_id" => $request->job,
            "gender" => $request->gender,
            "sallary" => $request->sallary,
            "address" => $request->address,
            "number" => $request->number,
        ]);

        return redirect()->route('users.index')->with([
            "message" => "Employee Created Successfully",
            "title" => "Created",
            "icon" => "success",
        ]);
    }

    public function show(User $user)
    {
        return view("users.show", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {        
        $jobs = Job::pluck('title', 'id');
        return view("users.edit", compact("jobs", 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if ($request->has("first_name")) {
            $user->first_name = $request->first_name;
        }

        if ($request->has("last_name")) {
            $user->last_name = $request->last_name;
        }

        if ($request->has("email")) {
            $user->email = $request->email;
        }

        if ($request->has("password")) {
            $user->password = bcrypt($request->password);
        }

        if ($request->has("job")) {
            $user->job_id = $request->job;
        }
        
        if ($request->has("sallary")) {
            $user->sallary = $request->sallary;
        }

        if ($request->has("address")) {
            $user->address = $request->address;
        }

        if ($request->has("number")) {
            $user->number = $request->number;
        }

        if ($request->has("gender")) {
            $user->gender = $request->gender;
        }

        $user->save();

        return redirect()->route('users.index')->with([
            "message" => "User Updated Successfully",
            "title" => "Updated",
            "icon" => "success",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with([
            "message" => "User Deleted Successfully",
            "title" => "Deleted",
            "icon" => "success",
        ]);
    }
}
