<?php

namespace App\Http\Resources;

use App\Http\Resources\Users as UsersResource;
use App\Http\Resources\Publisher as PublisherResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GoogleTextAd extends JsonResource
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
            'headline1' => $this->headline_1,
            'headline2' => $this->headline_2,
            'headline3' => $this->headline_3,
            'headline3' => $this->headline_3,
            'description1' => $this->description_1,
            'description2' => $this->description_2,
            'displayUrl' => $this->display_url,
            'sitelink1Title' => $this->sitelink_1_title,
            'sitelink1Desc1' => $this->sitelink_1_desc_1,
            'sitelink1Desc2' => $this->sitelink_1_desc_2,
            'sitelink1Url' => $this->sitelink_1_url,
            'sitelink2Title' => $this->sitelink_2_title,
            'sitelink2Desc1' => $this->sitelink_2_desc_1,
            'sitelink2Desc2' => $this->sitelink_2_desc_2,
            'sitelink2Url' => $this->sitelink_2_url,
            'sitelink3Title' => $this->sitelink_3_title,
            'sitelink3Desc1' => $this->sitelink_3_desc_1,
            'sitelink3Desc2' => $this->sitelink_3_desc_2,
            'sitelink3Url' => $this->sitelink_3_url,
            'sitelink4Title' => $this->sitelink_4_title,
            'sitelink4Desc1' => $this->sitelink_4_desc_1,
            'sitelink4Desc2' => $this->sitelink_4_desc_2,
            'sitelink4Url' => $this->sitelink_4_url,
            'isSellerRatingActive' => $this->is_seller_rating_active ? true : false,
            'sellerRating' => $this->seller_rating,
            'reviewText' => $this->review_text,
            'reviewSource' => $this->review_source,
            'publisher' => new PublisherResource($this->publisher),
            'createdBy' => new UsersResource($this->createdBy),
            'updatedBy' => new UsersResource($this->updatedBy),
        ];
    }
}
