<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

    public function userRelation(){
        return $this->belongsTo('App\User','user_id','id');
        // return $this->belongsTo(User::class);
    }

    public function physicalPropertiesRelation(){
        return $this->belongsToMany('App\PhysicalProperty');
    }

    public function measurementLogsRelation(){
        return $this->hasMany('App\MeasurementLog','device_id','id');
    }
}
