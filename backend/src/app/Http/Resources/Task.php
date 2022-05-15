<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category' => $this->category,
            'time' => $this->time,
            'notifications' => $this->notifications,
            'tag' => $this->tag,
            'code' => $this->code,
            'title' => $this->title,
            'project' => $this->project,
            'expected_date' => $this->expected_date,
            'description' => $this->description,
            'expected' => $this->expected,
            'balance' => $this->balance,
            'status' => $this->status,
            'team' => $this->team,
            'order' => $this->order
        ];
    }
}
