<?php

namespace App\Http\Controllers;

use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function __invoke()
    {
        return datatables(Classroom::query())
            ->addIndexColumn()
            ->addColumn('action', fn ($cls) => view('pages.classroom.action', compact('cls')))
            ->toJson();
    }
}
