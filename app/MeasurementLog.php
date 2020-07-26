<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasurementLog extends Model
{

    public function deviceRelation(){
        return $this->belongsTo('App\Device','device_id','id');
    }

    public function physicalPropertyRelation(){
        return $this->belongsTo('App\PhysicalProperty','physical_property_id','id');
    }

}
