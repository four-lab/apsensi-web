<?php

namespace App\Http\Controllers;

use App\Repos\ChartRepository;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function __invoke()
    {
        return response()->json(
            (new ChartRepository)->getData(5)
        );
    }
}
