@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php
            $email=Auth::user()->email;
            if( $email == "james@gmail.com"){
            ?>
                <a class="nav-link" href="{{route('manageuser')}}">Manage users</a>
            <?php
                }
            ?>

            <br>


            <div class="card">
                <div class="card-header">{{Auth::user()->name}}'s stuff<div>
                <div class="card-body">
                    @foreach ($User as $item)
                        

                    <div  class="card" style="width:500px">
                        <div class="card" style="width:500px," >
                            <img src="{{asset('images/'. $item->image) }}" alt="">
                            <div class="card-body">
                                <h4>{{$item['title']}}</h4>
                              <h4 class="card-title"><a href="/klab/{{$item->id}}">{{$item->name}}</a></h4>
                              <p class="card-text">{{$item['content']}}.</p>
                              <form action="{{ route('like.post', $item->id) }}"
                                method="post">
                                @csrf
                                <button
                                    class="{{ $item->liked() ? 'bg-blue-600' : '' }} btn btn-secondary">
                                    <i class="fas fa-heart"></i> {{ $item->likeCount }}
                                </button>
                            </form>
                              <a href="/klab/{{$item->id}}/edit" class="btn btn-secondary">Edit</a>
                            <form action="/klab/{{$item->id}}" method="POST">
                                @csrf
                                @method('delete')
                              <input type="submit"  class="btn btn-danger" value="Delete">
                          </div>
                          <br>

                        
                    </div>
                    </div>   
                            </div>

                    
                @endforeach
                </div>    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              
                </div>
                <div class="card-body">
                    <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <label>Update Profile</label><br>
                        <input type="file" name="image">
                        <input type="submit" value="Upload">
                    </form>
                </div>

                <div class="card-body">
                    <a href="{{url('deletemyaccount')}}/{{Auth::user()->id}}"><button class="btn btn-danger" onclick='return confirm("Do u want to delete this acount ?")'>Delete your account</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
