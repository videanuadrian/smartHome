<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Device;
use App\User;
use App\MeasurementLog;
use App\PhysicalProperty;


class MonitorController extends Controller
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

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = $this->measurementLogModel->all()->where('created_at', '>=', date('Y-m-d')." 00:00:00")->sortByDesc('created_at');
        $logs->loadMissing('deviceRelation');
        $logs->loadMissing('physicalPropertyRelation');

  
         return view('readings.reading')->with('logs', $logs);
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deviceId = $request->input('device_id');
        $temp = $request->input('temp');
        $hum = $request->input('hum');
        $lum = $request->input('lum');
        $apiKey = $request->input('api_key');

        if ($apiKey != "MrdP5RXhlA"){
            return response()->json(['response'=>'forbidden'], 403);
        }

        $user = $this->userModel->find(1);

        $device = $this->deviceModel->find($deviceId);

        $tempPhProp = $this->physicalPropertyModel->where("name",'=',"Temperature")->first();
        $humPhProp  = $this->physicalPropertyModel->where("name",'=',"Humidity")->first();
        $lumPhProp  = $this->physicalPropertyModel->where("name",'=',"Luminance")->first();

        $mlTemp = new MeasurementLog();
        $mlTemp->deviceRelation()->associate($device);
        $mlTemp->physicalPropertyRelation()->associate($tempPhProp);
        $mlTemp->value = $temp;
        $mlTemp->save();

        $mlLum = new MeasurementLog();
        $mlLum->deviceRelation()->associate($device);
        $mlLum->physicalPropertyRelation()->associate($lumPhProp);
        $mlLum->value = $lum;
        $mlLum->save();

        $mlHum = new MeasurementLog();
        $mlHum->deviceRelation()->associate($device);
        $mlHum->physicalPropertyRelation()->associate($humPhProp);
        $mlHum->value = $hum;
        $mlHum->save();

        return response()->json(['response'=>'ok'], 200);
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
