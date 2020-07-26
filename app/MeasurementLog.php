<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasurementLog extends Model
{

    protected $fillable = [
        'device_id', 'physical_property_id', 'value',
    ];

    public function device(){
        return $this->hasOne('App\Device');
    }

    public function physicalProperty(){
        return $this->hasOne('App\PhysicalProperty');
    }

}
