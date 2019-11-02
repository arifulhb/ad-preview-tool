<?php

namespace App\Contracts;

use Illuminate\Foundation\Http\FormRequest;

interface AdvertisementContract
{
    public function index();
    public function view(int $id);
    public function create(array $data);
    public function update(array $data, int $id);
    public function delete(int $id);
}
