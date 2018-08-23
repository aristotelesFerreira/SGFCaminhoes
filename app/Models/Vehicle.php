<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Vehicle extends Model
{

    public static function boot()
    {   
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }

    public static function getDefaultRules($forUpdate = false) {

        $createRules = [

            'mark' => "string|required",
            'model' => "string|required",
            'type' => 'string|required',
            'km_current' => 'numeric|required',
            'year' => 'string|nullable',
            'plate' => 'string|required',
            'chassis_number' => 'string|nullable',
            'purchase_price' => 'string|nullable',
            'sale_value' => 'string|nullable',
            'purchase_date' => 'string|nullable',
            'observation' => 'string|nullable'
        ];

        $updateRules = [

            'mark' => "string|required",
            'model' => "string|required",
            'type' => 'string|required',
            'km_current' => 'double|required',
            'year' => 'string|nullable',
            'plate' => 'string|required',
            'chassis_number' => 'string|nullable',
            'purchase_price' => 'string|nullable',
            'sale_value' => 'string|nullable',
            'purchase_date' => 'string|nullable',
            'observation' => 'string|nullable'
        ];

        return $forUpdate ? $updateRules : $createRules;
    }

    public function fillByRequest(Array $data) {
        $this->mark = (array_key_exists('mark', $data)) ? $data['mark'] : $this->mark;
        $this->model = (array_key_exists('model', $data)) ? $data['model'] : $this->model;
        $this->type = (array_key_exists('type', $data)) ? $data['type'] : $this->type;
        $this->km_current = (array_key_exists('km_current', $data)) ? $data['km_current'] : $this->km_current;
        $this->year = (array_key_exists('year', $data)) ? $data['year'] : $this->year;
        $this->plate = (array_key_exists('plate', $data)) ? $data['plate'] : $this->plate;
        $this->chassis_number = (array_key_exists('chassis_number', $data)) ? $data['chassis_number'] : $this->chassis_number;
        $this->purchase_price = (array_key_exists('purchase_price', $data)) ? $data['purchase_price'] : $this->purchase_price;
        $this->sale_value = (array_key_exists('sale_value', $data)) ? $data['sale_value'] : $this->sale_value;
        $this->purchase_date = (array_key_exists('purchase_date', $data)) ? $data['purchase_date'] : $this->purchase_date;
        $this->observation = (array_key_exists('observation', $data)) ? $data['observation'] : $this->observation;
    }
}
