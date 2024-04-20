<?php

namespace App\Repos;

use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class EmployeeRepository
{
    public static function create(array $data, array $photos): Employee
    {
        $data['photos'] = [];
        $employee = Employee::create($data);

        $employee->photos = static::managePhotos($employee, $photos);
        $employee->update();

        return $employee;
    }

    public static function update(Employee $employee, array $data, array $photos): Employee
    {
        $data['photos'] = static::managePhotos($employee, $photos);
        $employee->update($data);

        return $employee;
    }

    private static function managePhotos(Employee $employee, array $photos): array
    {
        $photos = array_map(
            function ($photo) use ($employee) {
                if (is_string($photo)) return $photo;
                return $photo->storePublicly("employees/{$employee->id}/", "public");
            },
            $photos
        );

        array_map(
            fn ($photo) => Storage::disk("public")->delete($photo),
            array_diff((array) $employee->photos, $photos)
        );

        return $photos;
    }
}
