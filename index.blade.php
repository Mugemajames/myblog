@extends('layouts.app')
@section('content')

<div class="jumbtron text-center">
    <h1>welcome to my webpage</h1>
    <p><a class="btn btn-primary btn-lg" href="/create" role="button">create</a><a class="btn btn-primary btn-lg" href="/create" role="button">login</a></p>
</div>
<div>
    @if (count($contents)>1)
    @foreach ($contents as $content)
    <div class="well">
        <h3><a href="/contents/{{$content->id}}">{{$content->title}}</a></h3>
    </div>
        
    @endforeach

        
    @else
        <h4>there is no content</h4>
        
    @endif

</div>
    
@endsection