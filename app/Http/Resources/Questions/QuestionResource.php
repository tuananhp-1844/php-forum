<?php

namespace App\Http\Resources\Questions;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\UserResource;
use App\Http\Resources\Tags\TagResource;
use App\Http\Resources\Categories\CategoryResource;

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
        return [
            'id' => $this->id,
            'title' => $this->title,
            'user' => new UserResource($this->whenLoaded('user')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'created_at' => $this->created_at->diffForHumans(),
            'view' => $this->view,
            'content' => $this->content,
            'reports' => $this->whenLoaded('reports'),
        ];
    }
}
