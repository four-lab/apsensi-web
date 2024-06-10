<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ExcuseRequest;
use App\Http\Resources\ExcuseResource;
use App\Models\Excuse;
use App\Repos\ExcusesRepository;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class ExcusesController extends Controller
{
    use ApiResponser;

    public function index(Request $request)
    {
        $employee = $request->user();
        $excuses = Excuse::where('employee_id', $employee->id)->limit(15)
            ->latest()->get();

        return $this->success(
            ExcuseResource::collection($excuses)
        );
    }

    public function store(ExcuseRequest $request)
    {
        $employee = $request->user();
        $excuse = ExcusesRepository::create($employee, $request->validated());

        return $this->success([
            'excuses' => ExcuseResource::make($excuse),
        ], 'Berhasil menambahkan Izin!');
    }
}
