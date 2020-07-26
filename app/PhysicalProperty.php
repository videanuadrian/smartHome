<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalProperty extends Model
{

    public function devicesRelation(){
        return $this->belongsToMany('App\Device');
    }

    public function measurementLogRelation(){
        return $this->hasMany('App\MeasurementLog');
    }
}
