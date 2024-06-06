<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ScheduleRequest;
use App\Http\Resources\ScheduleResource;
use App\Repos\ScheduleRepository;
use App\Traits\ApiResponser;

class ScheduleController extends Controller
{
    use ApiResponser;

    public function index(ScheduleRequest $request)
    {
        $date = $request->date ?? date('Y-m-d');

        return $this->success(ScheduleResource::collection(
            ScheduleRepository::getByDate($date, $request->user())
        ));
    }
}
