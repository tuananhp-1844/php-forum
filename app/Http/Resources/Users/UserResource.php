<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'full_name' => $this->fullname,
            'avatar' => env('APP_URL') . config('asset.avatar_path') . $this->avatar,
            'email' => $this->email,
            'provider' => $this->provider,
            'active' => !$this->trashed(),
            'verified_email' => $this->hasVerifiedEmail(),
        ];
    }
}
