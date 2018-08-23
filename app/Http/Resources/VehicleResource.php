<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class VehicleResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       
         //$request = $request->toArray();
         $response = [
            'mark' => $this->mark,
            'model' => $this->model,
            'type' => $this->type,
            'km_current' => $this->km_current,
            'year' =>  $this->year,
            'plate' => $this->plate,
            'chassis_number' => $this->chassis_number,
            'purchase_price' => $this->purchase_price,
            'sale_value' => $this->sale_value,
            'purchase_date' => $this->purchase_date,
            'observation' => $this->observation
        ];

       return $response;
    }
}
