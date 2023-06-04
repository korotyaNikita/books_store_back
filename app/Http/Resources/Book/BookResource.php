<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Genre\GenreResource;
use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'name' => $this->name,
            'annotation' => $this->annotation,
            'public_start' => $this->public_start,
            'author' => new UserResource($this->users),
            'genre' => new GenreResource($this->genre),
            'images' => ImageResource::collection($this->images)
        ];
    }
}
