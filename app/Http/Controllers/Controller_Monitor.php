<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Device;
use App\User;
use App\MeasurementLog;
use App\PhysicalProperty;


class Controller_Monitor extends Controller
{
    
    private User $userModel;
    private Device $deviceModel;
    private PhysicalProperty $physicalPropertyModel;
    private MeasurementLog $measurementLogModel;
    
    public function __construct(Device $deviceModel,User $userModel,PhysicalProperty $physicalPropertyModel,MeasurementLog $measurementLogModel)
    {
        $this->userModel = $userModel;
        $this->deviceModel = $deviceModel;        
        $this->physicalPropertyModel = $physicalPropertyModel;
        $this->measurementLogModel = $measurementLogModel;
    }
    
    public function get(Request $request) {
    
        $deviceId = $request->get('device_id');
        $temp = $request->get('temp');
        $hum = $request->get('hum');
        $lum = $request->get('lum');
        $apiKey = $request->get('api_key');
        
        if ($apiKey != "MrdP5RXhlA"){
            return response()->json(['response'=>'forbidden'], 403);
        }
        
        
        $user = $this->userModel->find(1);
        
        
        $device = $this->deviceModel->find($deviceId);
                
        $tempPhProp = $this->physicalPropertyModel->where("name",'=',"Temperature")->first();
        $humPhProp  = $this->physicalPropertyModel->where("name",'=',"Humidity")->first();
        $lumPhProp  = $this->physicalPropertyModel->where("name",'=',"Luminance")->first();
                
        
        $mlTemp = new MeasurementLog();
        $mlTemp->device_id = $device->id;
        $mlTemp->physical_property_id =$tempPhProp->id;
        $mlTemp->value = $temp;        
        $mlTemp->save();
        
        $mlLum = new MeasurementLog();
        $mlLum->device_id = $device->id;
        $mlLum->physical_property_id =$lumPhProp->id;
        $mlLum->value = $lum;
        $mlLum->save();
        
        $mlHum = new MeasurementLog();
        $mlHum->device_id = $device->id;
        $mlHum->physical_property_id =$humPhProp->id;
        $mlHum->value = $hum;
        $mlHum->save();
        
        return response()->json(['response'=>'ok'], 200);
    }
    
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
