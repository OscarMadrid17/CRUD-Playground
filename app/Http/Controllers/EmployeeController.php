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
        $employeeData =request()->except('_token');

        $employeeData = $request -> validate([

            'name'          => 'required|string|max:255',
            'middle_name'   => 'required|string|max:255',
            'email'         => 'required|email|unique:employees,email|max:255',
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

    public function edit($id)
    {
        $employees = Employee::findOrFail($id);
        return view('employee.edit', [
            'employees' =>$employees
        ]);
    }

    public function update(Request $employees, $id)
    {
        $employees->validate([
            'name'      =>  'required|string|min:3',
            'email'     =>  'required|string|email|max:250|unique:employees',
            'password'  =>  'required|string|min:8|max:250'
        ]);

        $employees = request()->except(['_token','_method']);
        Employee::where('id','=',$id)->update($employees);

        $employees = Employee::findOrFail($id);
        return view('employee.edit',[
            'employees' => $employees
        ]);

    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->route('employee.index');
    }
}
