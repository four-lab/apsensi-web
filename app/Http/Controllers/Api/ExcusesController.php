<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ExcuseRequest;
use Illuminate\Http\Request;
use App\Repos\ExcusesRepository;
use App\Traits\ApiResponser;

class ExcusesController extends Controller
{
    use ApiResponser;
    public function index(Request $request)
    {
        
    }
    public function create(ExcuseRequest $request)
    {
        $excuses = ExcusesRepository::create($request->validated());
        
        return $this->success([
            'excuses' => $excuses,
        ], 'Berhasil menambahkan Izin!');

    }
}
