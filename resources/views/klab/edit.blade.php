@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header"><h3>Update Content</h3></div>

              <div class="card-body">
<form action="{{route('klab.index')}}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- @forelse ($user->contents as $item) --}}
<label for="title">Title</label>
<input type="text" name="title" value="" class="form-control">
    @error('title')
     <div class="alert alert-danger">{{'min character is 30 and max is 50'}} </div>  
    @enderror
<div class="form-group">
    <label for="content">Content</label>
    <textarea class="ckeditor form-control" name="content" value=""></textarea>
    @error('content')
    <div>{{'min character is 30'}}
    </div>  
   @enderror
</div>
<label for="title">Image</label>
<input type="file" name="image" class="form-control">
    @error('title')
     <div class="alert alert-danger">{{'min character is 30 and max is 50'}} </div>  
    @enderror
<div class="form-group text-center">
    {{-- @empty --}}
    
{{-- @endforelse --}}
</div>
<button type="submit" class="btn btn-primary">save</button>
</form>
</div>
</div>
      </div>
  </div>

    
@endsection