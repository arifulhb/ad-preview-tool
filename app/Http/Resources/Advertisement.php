<?php

namespace App\Http\Resources;

use App\Factory\AdvertisementFactory;
use App\Http\Resources\Created as UsersResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Auth;

class Advertisement extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $type = getAdvertisementType($this->advertisable_type);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'isPublished' => $this->is_published ? true : false,
            'advertisementType' => $type,
            'advertisement' => AdvertisementFactory::getAdvertisementResource($type, $this->advertisable),
            'visibility' => getVisibility($this->visibility),
            'lastUpdate' => $this->updated_at->diffForHumans(),
            'createdBy' => new UsersResource($this->createdBy),
            'updatedBy' => new UsersResource($this->updatedBy),
            'isAuth' => Auth::check()
        ];
    }
}
