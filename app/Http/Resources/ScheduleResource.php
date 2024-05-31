<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
            'subject' => $this->subject->only('id', 'name'),
            'employee' => $this->employee->only('id', 'fullname'),
            'classroom' => $this->classroom->only('id', 'name'),
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'day' => $this->day,
        ];
    }
}
