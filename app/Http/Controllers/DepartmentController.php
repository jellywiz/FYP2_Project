<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class DepartmentController extends Controller
{

    public function __construct()
    {
        View::share([
            "title" => "Department"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depts = Department::orderByDesc("created_at")->paginate(10);
        return view("departments.index", compact("depts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("departments.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            "name" => ['required', 'string', 'unique:departments,name']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Department::create([
            "name" => $request->name
        ]);

        return redirect()->route('departments.index')->with([
            "message" => "Department Created Successfully",
            "title" => "Created",
            "icon" => "success",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view("departments.edit", compact("department"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $validator =  Validator::make($request->all(), [
            "name" => ['required', 'string', "unique:departments,name,". $department->id.",id" ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $department->update([
            "name" => $request->name
        ]);

        return redirect()->route('departments.index')->with([
            "message" => "Department Updated Successfully",
            "title" => "Updated",
            "icon" => "success",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with([
            "message" => "Department Deleted Successfully",
            "title" => "Deleted",
            "icon" => "success",
        ]);
    }
}
