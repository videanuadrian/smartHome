@extends('layouts.app')

@section('content')
 
 <table class="table" >

 <th> ID    </th>
 <th> Value </th>
 <th> Name  </th>
 <th> Location </th>
 <th> Name </th>
 <th> Created At </th>  
    @foreach ($logs as $log)
       <tr>            
            <td>{{ $log->id }}</td> 
            <td> {{ $log->value }} </td> 
            <td> {{$log->deviceRelation->name}} </td> 
            <td> {{$log->deviceRelation->location}} </td> 
            <td> {{$log->physicalPropertyRelation->name}} </td>
            <td> {{$log->created_at}} </td>
       </tr>
     @endforeach
 </table>
@endsection
