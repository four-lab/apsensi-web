<?php

namespace App\Repos;

use App\Models\Excuses;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ExcusesRepository
{
    public static function show()
    {
        return Excuses::all();
    }
    public static function create(object $data) : object
    {
        try{
            $validator = Validator::make($data,
            [
               'type' => 'required',
               'status' => 'required',
               'description' => 'required|max:225',
            ]);

            if($validator->fails()) return response(422)->json($validator->errors(), 422);

            $file = $data->file('document');
            $file->storageAs('public/documents', $data->name);

            $excuses = Excuses::create($data);

            return $excuses;

        }catch (\Exception $error){
            return  response(400)->json($error->getMessage(), 400);
        }
    }
}