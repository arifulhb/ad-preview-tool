<?php

namespace App\Contracts;

use Illuminate\Foundation\Http\FormRequest;

interface AdvertisementContract
{
    public function create(array $data);
    public function update(array $data, int $id);
}
