<?php

namespace App\Factory;

use App\Repository\GoogleTextAdvertisement;
use App\Http\Resources\GoogleTextAd as GoogleTextAdResource;

abstract class AdvertisementFactory
{
    /**
     * return QuotationInterface
     * */
    public static function createAdvertisement($type)
    {
        switch ($type) {
            case "GoogleTextAd":
                return new GoogleTextAdvertisement();
            break;
        }
    }

    /**
     * Return appropriate resource class
     *
     * @param string $type
     * @return JsonResource
     */
    public static function getAdvertisementResource($type, $data)
    {
        switch ($type) {
            case "GoogleTextAd":
                return new GoogleTextAdResource($data);
            break;
        }
    }
}
