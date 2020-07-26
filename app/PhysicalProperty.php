<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalProperty extends Model
{
    
    
    public function devices(){
        return $this->belongsToMany('App\Device');
    }
    
    public function measurementLog(){
        return $this->belongsTo('App\MeasurementLog');
    }
}
