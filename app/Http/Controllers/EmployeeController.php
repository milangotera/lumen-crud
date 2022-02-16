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
}
