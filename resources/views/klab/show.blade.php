@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{$user->name}}</h3></div>
                <div class="card-body">
@forelse ($user->contents as $item)

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
          
      </div>
</div>
</div>

    
@empty
    
@endforelse
        </div>
    
@endsection