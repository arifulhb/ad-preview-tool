<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvertiseController extends Controller
{

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
