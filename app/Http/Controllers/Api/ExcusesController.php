<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repos\ExcusesRepository;
class ExcusesController extends Controller
{

    public function index(Request $request)
    {
        
    }
    public function create(Request $request)
    {
        $excuses = ExcusesRepository::create($request);

        return response(200)->json([
            'message' => 'Successfully created!',
            'data' => $excuses
        ]);

    }
}
