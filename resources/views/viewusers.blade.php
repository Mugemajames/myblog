@extends('layouts.app')
@section('content')

@php
  use App\models\User;
@endphp

<div class="container">
  @if(session('delt'))
    <p style="color:white;">{{session('delt')}}</p>
  @endif
  <br>
    <table class="table table-bordered table-striped text-center">
        <thead  style="background-color: teal;color:white;">
          <tr>
            <th>image</th>
            <th>Names</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody  class="text-white">
            @foreach ($User as $item)
                <tr>
                    <td><img src="{{asset('images/'. $item->image) }}" alt="" class="mr-3 mt-3 rounded-circle" style="width:60px;height:60px;"></td>
                    <td>{{$item->name}}</td> 
                    <td>{{$item->email}}</td> 
                    <td><a href="{{url('deleteuseraccount')}}/{{$item->id}}"><button class="btn btn-danger" onclick="return confirm('are u sure ?')">Delete account</button></a></td> 
                </tr>
            @endforeach

            <?php
              $user_id= auth()->user()->id;
              $User= User::all()->where('id','!=',$user_id);
              $countuser=collect($User)->count();
              if($countuser  == 0){
                ?>
                  <td colspan="4" class="text-center">No records found !</td>
                <?php
              }
            ?>
         
        </tbody>
      </table>


    </div>

@endsection