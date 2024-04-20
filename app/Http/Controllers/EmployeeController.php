<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __invoke()
    {
        return datatables(Employee::query())
            ->addIndexColumn()
            ->addColumn('action', fn ($emp) => view('pages.employee.action', compact('emp')))
            ->toJson();
    }
}
