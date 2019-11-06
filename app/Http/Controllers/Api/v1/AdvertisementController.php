<?php

namespace App\Http\Controllers\Api\v1;

use App\Contracts\AdvertisementContract;
use App\Factory\AdvertisementFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGoogleTextAdRequest;
use App\Http\Requests\UpdateGoogleTextAdRequest;
use App\Repository\AdvertisementRepository;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisementRepo = new AdvertisementRepository();
        $response = $advertisementRepo->getMyAdvertisements();

        return response()->json($response);

    }

    /**
     * Create an advertisement
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $advertisementRepo = new AdvertisementRepository();

        $data = $request->all();

        // this code ensure open/close principal of SOLID principal.
        // when add new ad-type, we don't need to change the code,
        // only need to add new AdType class that implements Advertisement Contract,
        // and add the class in Advertisement factory.
        $advertisementType = AdvertisementFactory::createAdvertisement($data['type']);
        $response = $advertisementRepo->create($data, $advertisementType);

        return response()->json($response, 201);
    }


    /**
     * Update and Advertisement
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function update(Request $request, int $id)
    {

        $advertisementRepo = new AdvertisementRepository();

        $data = $request->all();

        $advertisementType = AdvertisementFactory::createAdvertisement($data['type']);
        $response = $advertisementRepo->update($data, $id, $advertisementType);

        if ($response !== null) {
            return response()->json($response, 200);
        } else {
            return response()->json(['message' => 'Resource not found'], 404);
        }
    }

    /**
     * Preview will get the list if ids and return maximum 3 latest results from ids
     * @param Request $request
     *
     * @return void
     */
    public function preview(Request $request) {

        $advertisementRepo = new AdvertisementRepository();
        $ids = $request->input('ids');

        $response = $advertisementRepo->getAdvertisementsForPreview($ids);

        if ($response->count() > 0) {
            return response()->json($response, 200);
        } else {
            return response()->json(['message' => 'Resource not found'], 404);
        }

    }

    /**
     * View a specific advertisement
     *
     * @param int $id
     * @return void
     */
    public function view(int $id)
    {
        $advertisementRepo = new AdvertisementRepository();

        $response = $advertisementRepo->view($id);

        if ($response !== null) {
            return response()->json($response['data'], $response['status_code']);
        } else {
            return response()->json(['message' => 'Resource not found'], 404);
        }

    }

    /**
     * Delete an advertisement
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        $advertisementRepo = new AdvertisementRepository();

        $response = $advertisementRepo->delete($id);

        return response()->json($response['message'], $response['status_code']);
    }
}
