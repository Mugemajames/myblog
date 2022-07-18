@extends('layouts.app')
@section('content')
@php
use App\Models\follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

@endphp
<div class="container">
    <table class="table table-bordered table-striped text-center">
        <thead  style="background-color: teal;color:white;">
          <tr>
            <th>image</th>
            <th>Names</th>
            <th>Blogs</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody  class="text-white">
            @foreach ($User as $item)
          <tr>
            <td><img src="{{asset('images/'. $item->image) }}" alt="" class="mr-3 mt-3 rounded-circle" style="width:60px;height:60px;"></td>
            <td>{{$item->name}}</td>
            <td><a href="/klab/{{$item->id}}" class="btn btn-primary">Content</td>
                <td><?php
                    $follow=follow::all()->where('follow',1)->where('user',Auth::user()->id)->where('following',$item->id);
                    $count=collect($follow)->count();
                    if($count == 0){
                    ?>
                        <a href="{{route('follow',$item->id)}}"><button class="card-text btn btn-primary">follow</button>
                    <?php
                        }else{
                    ?>
                        <a href="{{route('unfollow',$item->id)}}"><button class="card-text btn btn-danger">Unfollow</button>
                    <?php
                    }
                 ?></td>
          </tr>
          <tr>
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