<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

    public function user(){
        return $this->belongsTo('App\User');
    }


    public function physicalProperties(){
        return $this->belongsToMany('App\PhysicalProperty');
    }

    public function measurementLogs(){
        return $this->belongsTo('App\MeasurementLog');
    }
}
