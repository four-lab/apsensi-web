<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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
            'classroom' => $this->classroom->name,
            'employee' => $this->employee->fullname,
            'subject' => $this->subject->name,
            'date' => $this->date,
            'start' => $this->subject_start,
            'end' => $this->subject_end,
            'start_attempt' => $this->time_start,
            'end_attempt' => $this->time_end,
            'status' => $this->status,
        ];
    }
}
