<?php

namespace App\Http\Resources;

use App\Http\Resources\ChoiceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->resource->load('choices');

        return [
            'content' => $this->content,
            'choices' => new ChoiceCollection($this->choices),
        ];
    }
}
