<?php

namespace App\Http\Resources;

use App\Http\Resources\QuestionCollection;
use Illuminate\Http\Resources\Json\JsonResource;
class QuizResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->resource->load('courses', 'questions');

        return [
            'title'     => $this->title,
            'questions' => new QuestionCollection($this->questions),
        ];
    }
}
