<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Users extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'account' => $this->account,
            'is_admin' => $this->is_admin ? true : false,
            'is_active' => $this->is_active ? true : false,
            'last_login' => $this->last_login
        ];
    }
}
