<?php

namespace App\Http\Resources;

use App\Http\Resources\SubjectCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->resource->load('subjects');

        return [
            'id'       => $this->id,
            'name'     => $this->name,
            'subjects' => new SubjectCollection($this->subjects),
        ];
    }
}
