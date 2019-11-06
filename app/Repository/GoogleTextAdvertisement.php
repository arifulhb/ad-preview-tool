<?php

namespace App\Repository;

use App\Contracts\AdvertisementContract;
use App\Http\Resources\Advertisement as AdvertisementsResource;
use App\Models\Advertisement;
use App\Models\GoogleTextAd;
use App\Models\Publisher;
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
        $publisher = Publisher::where('slug', 'google')->first();

        $ad = new Advertisement();
        $ad->title = $data['title'];
        $ad->created_by = $user->id;
        $ad->updated_by = $user->id;
        $ad->visibility = \VISIBILITY_NONE;

        $googleAdText = GoogleTextAd::create($data);
        $googleAdText->created_by = $user->id;
        $googleAdText->updated_by = $user->id;
        $googleAdText->advertise()->save($ad);
        $googleAdText->publisher_id = $publisher->id;
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
