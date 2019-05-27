<?php

namespace App\Http\Resources\Profile;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'fullname' => $this->full_name,
            'avatar' => env('APP_URL') . config('asset.avatar_path') . $this->avatar,
            'email' => $this->email,
        ];
    }
}
