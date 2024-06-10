<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ExcuseRequest;
use App\Http\Resources\ExcuseResource;
use App\Models\Excuse;
use App\Repos\ExcusesRepository;
use App\Traits\ApiResponser;

class ExcusesController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $excuses = Excuse::limit(15)->latest()->get();

        return $this->success(
            ExcuseResource::collection($excuses)
        );
    }

    public function store(ExcuseRequest $request)
    {
        $excuse = ExcusesRepository::create($request->validated());

        return $this->success([
            'excuses' => ExcuseResource::make($excuse),
        ], 'Berhasil menambahkan Izin!');
    }
}
