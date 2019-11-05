<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvertiseController extends Controller
{

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
     *
     * @return void
     */
    public function preview()
    {
        return view('pages.preview');
    }
}
