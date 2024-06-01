<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nik' => $this->nik,
            'email' => $this->email,
            'username' => $this->username,
            'fullname' => $this->fullname,
            'birthplace' => $this->birthplace,
            'birthdate' => $this->birthdate->format('Y-m-d'),
            'photos' => [
                'front' => asset("storage/{$this->photos->front}"),
                'left' => asset("storage/{$this->photos->left}"),
                'right' => asset("storage/{$this->photos->right}"),
            ],
            'gender' => $this->gender->value,
            'address' => $this->address,
            'created_at' => $this->created_at->timestamp,
            'updated_at' => $this->updated_at->timestamp,
        ];
    }
}
