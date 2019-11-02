<?php

namespace App\Repository;

use App\Contracts\AdvertisementContract;
use App\Http\Resources\AdvertisementCollection;
use App\Http\Resources\Advertisement as AdvertisementsResource;
use App\Models\Advertisement;
use Auth;

class AdvertisementRepository
{

    /**
     * Return Advertisemetns of current user
     *
     * @return void
     */
    public function getMyAdvertisements()
    {
        $user = Auth::user();
        $advertisements = Advertisement::where('created_by', $user->id)
            ->orderByDesc('id')
            ->paginate(20);

        return new AdvertisementCollection($advertisements);
    }

    /**
     * Create an Advertisement
     *
     * @param array $data
     * @param AdvertisementContract $advertisement
     * @return void
     */
    public function create(array $data, AdvertisementContract $advertisement)
    {
        $response = $advertisement->create($data);

        return $response;
    }


    /**
     * Update an Advertisement
     *
     * @param array $data
     * @param integer $id
     * @param AdvertisementContract $advertisement
     * @return void
     */
    public function update(array $data, int $id, AdvertisementContract $advertisement)
    {
        $response = $advertisement->update($data, $id);

        return $response;
    }

    /**
     * get an advertisement data
     *
     * View Logics
     * If advertisement found,
     * 1. If created by me, or requesting user is admin, then > I can see any ad
     * 2. if not created by me,
     * 2.1 if published == true and visibility == public, then > view
     * 2.2 else return access denied 403
     *
     * @param integer $id
     * @return mixed
     */
    public function view(int $id)
    {
        $advertisement = Advertisement::find($id);

        if ($advertisement) {
            if ($advertisement->created_by == Auth::user()->id ||
                Auth::user()->is_admin == true
            ) {
                return [
                    'status_code' => 200,
                    'message' => 'Success',
                    'data' => new AdvertisementsResource($advertisement)
                ];
            } else {
                if ($advertisement->is_published == true &&
                    $advertisement->visibility == \VISIBILITY_PUBLIC) {
                    return [
                        'status_code' => 200,
                        'message' => 'Success',
                        'data' => new AdvertisementsResource($advertisement)
                    ];
                } else {
                    return [
                        'status_code' => 403,
                        'message' => 'Unauthorized access',
                        'data' => null
                    ];
                }
            }
        } else {
            return null;
        }
    }

    /**
     * get an advertisement data
     *
     * View Logics
     * If advertisement found,
     * 1. If created by me, or requesting user is admin, then > Delete
     * 1.1 return access denied 403
     * 2.2 else return access denied 403
     *
     * @param integer $id
     * @return mixed
     */
    public function delete($id)
    {
        $advertisement = Advertisement::find($id);

        if ($advertisement) {
            if ($advertisement->created_by == Auth::user()->id ||
                Auth::user()->is_admin == true
            ) {
                $advertisement_type = $advertisement->advertisable();
                $advertisement_type->delete();
                $advertisement->delete();

                return [
                    'status_code' => 204,
                    'message' => 'Success'
                ];
            } else {
                return [
                    'status_code' => 403,
                    'message' => 'Unauthorized access',
                    'data' => null
                ];
            }
        } else {
            return [
                'status_code' => 404,
                'message' => 'Resource not found'
            ];
        }
    }
}
