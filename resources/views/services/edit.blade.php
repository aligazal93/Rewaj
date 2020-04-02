@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    <div class="col-sm-12">
      <h3 class="text-center" style="background-color:#cccacae6;padding:10px" >Edit Service</h3>
    </div>

    <div class="col-sm-12">
        <form action="{{route('services.update' , $service->id ) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label> Title </label>
            @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" class="form-control" name="title" value="{{$service -> title}}" class="@error('title') is-invalid @enderror" >
          </div>

          <div class="form-group">
            <label>Description</label>
            @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <textarea class="form-control" name="description" rows="8" cols="80" class="@error('description') is-invalid @enderror">{{$service -> description}}
            </textarea>
          </div>


          <div class="form-group">
            <label style="display:block"> image </label>
            @error('image')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <img style="width:100px;" src="{{asset('storage/'. $service ->image )}}" style="width:100%">

            <input type="file" class="form-control" name="image"  class="@error('image') is-invalid @enderror" >
          </div>


        <div class="form-group">
          <button type="submit" class="btn btn-primary">Add Service</button>
        </div>

      </form>
    </div>


@endsection
