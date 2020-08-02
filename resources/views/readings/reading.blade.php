@extends('layouts.app')

@section('content')

 <div class="container">
 <h6>Todays Readings</h6>   
   <a href="/home" class="btn btn-primary btn-sm"> Back </a>       
      <div class="container"> <br>
         <table class="table table-hover table-sm" >
            <th> ID           </th>
            <th> Device Name  </th>
            <th> Location     </th>
            <th> Property     </th>
            <th> Value        </th>
            <th> Created At   </th>  
               @foreach ($logs as $log)
                  <tr>            
                        <td>{{ $log->id }}</td> 
                        <td> {{$log->deviceRelation->name}} </td> 
                        <td> {{$log->deviceRelation->location}} </td> 
                        <td> {{$log->physicalPropertyRelation->name}} </td>
                        <td> {{ $log->value }} </td> 
                        <td> {{$log->created_at}} </td>
                  </tr>
               @endforeach
         </table>
      </div>
</div>
@endsection
