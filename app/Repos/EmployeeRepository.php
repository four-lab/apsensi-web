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

    public static function delete(Employee $employee): void
    {
        Storage::disk("public")->deleteDirectory("employees/{$employee->id}");
        $employee->delete();
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

        Storage::disk("public")->delete(
            array_diff((array) $employee->photos, $photos)
        );

        return $photos;
    }
}
