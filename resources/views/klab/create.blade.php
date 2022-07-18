@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header"><h3>Create Content</h3></div>

              <div class="card-body">
<form action="{{route('klab.index')}}" method="POST" enctype="multipart/form-data">
    @csrf

<label for="title">Title</label>
<input type="text" name="title" class="form-control">
    @error('title')
     <div class="alert alert-danger">{{'min character is 30 and max is 50'}} </div>  
    @enderror
<div class="form-group">
    <label for="content">Content</label>
    <textarea class="ckeditor form-control" name="content"></textarea>
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
    <button type="submit" class="btn btn-primary">save</button>
</div>
</form>
</div>
</div>
      </div>
  </div>

    
@endsection