<?php

namespace App\Http\Resources;

use App\Http\Resources\Users as UsersResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Advertisements extends JsonResource
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
            'description' => $this->description,
            'isPublished' => $this->is_published ? true : false,
            'advertisementType' => getAdvertisementType($this->advertisable_type),
            'advertisement' => $this->advertisable,
            'visibility' => getVisibility($this->visibility),
            'createdBy' => new UsersResource($this->createdBy),
            'updatedBy' => new UsersResource($this->updatedBy),
        ];
    }
}
