<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponser;

    public function show(Request $request)
    {
        return $this->success(
            message: 'Success get user data',
            data: EmployeeResource::make($request->user())
        );
    }

    public function update(EmployeeRequest $request)
    {
        $request->user()->update($request->validated());

        return $this->success(
            message: 'Berhasil mengupdate profile',
            data: EmployeeResource::make(Employee::find($request->user()->id))
        );
    }
}
