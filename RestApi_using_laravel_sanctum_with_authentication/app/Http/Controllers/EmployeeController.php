<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        
        if($employees)
        {
            return $employees;
        }else{
            $message = "No Employees";
            return $message;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'post' => 'required',
            'salary' => 'required',
        ]);

        $create = Employee::create($request->all());
        if($create)
        {
            $message = "Employee created successfully";
            return $message;
        }else{
            $message = "Something Error";
            return $message;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $findEmployee = Employee::find($id);
        if($findEmployee)
        {
            return $findEmployee;
        }else{
            $message = "Not found";
            return $message;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $find = Employee::find($id);
        $done = $find->update($request->all());
        if($done)
        {
            $message = "Employee updated successfully";
            return $message;
        }else{
            $message = "Something Error";
            return $message;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Employee::find($id);
        $done = $find->delete();
        if($done)
        {
            $message = "Employee deleted successfully";
            return $message;
        }else{
            $message = "Something Error";
            return $message;
        }
    }
}