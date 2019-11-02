<?php

namespace App\Repository;

use App\Http\Resources\Advertisement as AdvertisementsResource;
use App\Contracts\AdvertisementContract;
use App\Models\Advertisement;
use App\Models\GoogleTextAd;
use Auth;

class GoogleTextAdvertisement implements AdvertisementContract
{
    /**
     * Store the data in appropriate model
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        $user = Auth::user();

        $ad = new Advertisement();
        $ad->title = $data['headline_1'];
        $ad->created_by = $user->id;
        $ad->updated_by = $user->id;
        $ad->visibility = \VISIBILITY_NONE;

        $googleAdText = GoogleTextAd::create($data);
        $googleAdText->created_by = $user->id;
        $googleAdText->updated_by = $user->id;
        $googleAdText->advertise()->save($ad);
        $googleAdText->save();

        return new AdvertisementsResource($ad);
    }

    /**
     * Update an Advertisement Data
     *
     * @param array $data
     * @param integer $id
     * @return void
     */
    public function update(array $data, int $id)
    {

        $advertisement = Advertisement::find($id);

        if ($advertisement) {
            $user = Auth::user();
            $googleTextAd = $advertisement->advertisable;

            $googleTextAd->update($data);
            $googleTextAd->updated_by = $user->id;
            $googleTextAd->save();

            return new AdvertisementsResource($advertisement);
        } else {
            return null;
        }
    }
}
