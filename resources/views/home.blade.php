@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    
                    @foreach ($devices as $device)
                    
                    <a href="{{route('reading' ,['did'=>$device->id])}}" class="btn btn-primary btn-sm"> Today Readings </a><br>
                    
                    <table>
                        <tr>
                           <td>DeviceName: </td>     
                            <td>{{$device->name}}</td>
                        </tr>
                        <tr>
                            <td>Location: </td>
                            <td>{{$device->location}}</td>
                        </tr>
                        <tr>
                            <td>Measures: </td>
                             <td>
                                    @foreach ($device->physicalPropertiesRelation as $phProp) 
                                        {{$phProp->name}} /
                                    @endforeach
                             </td> 
                        </tr>
                        <tr>
                            <td>Owner: </td>
                            <td>{{$device->userRelation->name}}</td>
                        </tr>
                    </table>
                    

                    @endforeach
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
