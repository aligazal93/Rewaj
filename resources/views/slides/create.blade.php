@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    <div class="col-sm-12">
      <h3 class="text-center" style="background-color:#cccacae6;padding:10px" >Create New Service</h3>
    </div>

    <div class="col-sm-12">
        <form action="{{Route('services.store')}}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label> Title </label>
            @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" class="form-control" name="title" placeholder="Enter Title Here" class="@error('title') is-invalid @enderror" >
          </div>

          <div class="form-group">
            <label>Description</label>
            @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <textarea class="form-control" name="description" rows="8" cols="80"  placeholder="Enter Description here" class="@error('description') is-invalid @enderror"></textarea>
          </div>


          <div class="form-group">
            <label> image </label>
            @error('image')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="file" class="form-control" name="image"  class="@error('image') is-invalid @enderror" >
          </div>


        <div class="form-group">
          <button type="submit" class="btn btn-primary">Add Slide</button>
        </div>

      </form>
    </div>


@endsection
