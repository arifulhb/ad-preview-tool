<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * This Controller is to nevigate pages only.
 */
class AdvertiseController extends Controller
{

    /**
     * New Advertisement page
     *
     * @return void
     */
    public function add () {
        return view ('pages.add');
    }

    /**
     * Edit Advertisement
     *
     * @return void
     */
    public function edit(int $id)
    {
        return view('pages.edit', ['id' => $id]);
    }

    /**
     * Preview an advertisement
     * @param Request $request
     *
     * @return void
     */
    public function preview(Request $request)
    {
        $dataFromUrl = explode(',', $request->input('ids'));

        $ids = [];
        foreach($dataFromUrl as $id)
        {
            if (is_numeric($id)) {
                array_push($ids, $id);
            }
        }

        return view('pages.preview', ['ids' => implode(",", $ids)]);
    }
}
