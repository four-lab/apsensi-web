<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function __invoke()
    {
        return datatables(Subject::query())
            ->addIndexColumn()
            ->addColumn('action', fn ($sbj) => view('pages.subject.action', compact('sbj')))
            ->toJson();
    }
}
