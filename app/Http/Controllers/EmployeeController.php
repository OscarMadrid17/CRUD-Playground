<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::get();
        return view('employee.index', [
            'employees' => $employees
        ]);
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        // $employeeData = request()->all();
        $employeeData =request()->except('_token');

        $employeeData = $request -> validate([

            'name'          => 'required|string|max:255',
            'middle_name'   => 'required|string|max:255',
            'email'         => 'required|string|max:255',
            'password'      => 'required|min:8'
        ]);

        $employeeData = Employee::create([
            'name'          =>$employeeData['name'],
            'middle_name'   =>$employeeData['middle_name'],
            'email'         =>$employeeData['email'],
            'password'      =>$employeeData['password']
        ]);

        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
