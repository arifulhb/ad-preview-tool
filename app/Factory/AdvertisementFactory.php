<?php

namespace App\Factory;

use App\Repository\GoogleTextAdvertisement;

abstract class AdvertisementFactory
{
    /**
     * return QuotationInterface
     * */
    public static function createAdvertisement($type)
    {
        switch($type)
        {
            CASE "GoogleTextAd":
                return new GoogleTextAdvertisement();
            break;
        }
    }
}
