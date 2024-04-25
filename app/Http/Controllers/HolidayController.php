<?php

namespace App\Http\Controllers;

use App\Http\Resources\HolidayResource;
use App\Repos\HolidayRepository;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function json(Request $request)
    {
        $month = intval($request->month ?? date('m'));
        $year = intval($request->year ?? date('Y'));

        return response()->json(HolidayResource::collection(
            HolidayRepository::get($month, $year)
        ));
    }
}
