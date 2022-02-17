<?php

/**
*
* @version 1.0
*
* @author Milan Gotera <milangotera@gmail.com>
* @copyright milangotera@gmail.com
*
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{

    public function __construct()
    {

    }

    public function list(Request $request)
    {
        $employees = Employee::select('*')->get();

        return response()->json([
            'employees' => $employees,
        ],200);
    }

    public function new(Request $request)
    {
        $error = [];

        if(!$request->name){
            $error['name'] = "El campo nombre es obligatorio";
        }

        if(!$request->age){
            $error['age'] = "El campo edad es obligatorio";
        }

        if(!$request->position){
            $error['position'] = "El campo cargo es obligatorio";
        }

        if(!$request->date){
            $error['date'] = "El campo fecha es obligatorio";
        }

        if(count($error) > 0){
            return response()->json([
                'message'    => 'Parece que faltaron algunos datos',
                'errors'     => $error,
                'data'     => $request->all()
            ], 403);
        }

        $employee = new Employee;

        $employee->name     = $request->name;
        $employee->age      = $request->age;
        $employee->position = $request->position;
        $employee->date     = $request->date;
        $employee->save();

        return response()->json([
            'id'       => $employee->id,
            'name'     => $employee->name,
            'age'      => $employee->age,
            'position' => $employee->position,
            'date'     => $employee->date,
        ], 201);
    }

    public function delete(Request $request, $id)
    {
        $employees = Employee::find($id);
        $employees->delete();

        return response()->json([
            'messages' => 'Se ha eliminado el emppleado correctamente',
        ],200);
    }
}
