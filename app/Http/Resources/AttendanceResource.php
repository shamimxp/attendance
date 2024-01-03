<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sector' => $this->sector,
            'shift' => $this->shift,
            'attendance' => json_decode($this->attendance),
            'date' => $this->date,
            'status' => $this->status,
        ];
    }
}
