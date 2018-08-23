<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{

    public function toArray($request)
    {
        //$request = $request->toArray();
        $response = [
            'id' => $this->id,
            'name'=> $this->name,
            'email'=> $this->email,
            'role'=> $this->role,
            'status'=> $this->status,
            //'password'=> $this->password
        ];

       // $response = $this->addIncludes($response, $request);
        return $response;
    }
}
