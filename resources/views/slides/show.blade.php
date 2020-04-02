@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    <div class="col-sm-12">
      <a class="add" href="{{Route('slides.create')}}" > Add New Slide </a>
    </div>

    <div class="col-sm-12">
      <h3 class="text-center" style="background-color:#cccacae6;padding:10px" >The Slide</h3>
    </div>

    <div class="col-sm-12 text-center">
      <div class="card" style="width:100%">
        <img  src="{{asset('storage/'. $slide->image )}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"> {{ $slide -> title }}</h5>
          <p class="card-text">{{ $slide -> description }}</p>
          <a href="{{route('slides.index')}}" class="back">Go To All Slides</a>
        </div>
      </div>




    </div>




  </div>
</div>


@endsection



<style>
.add
{
display: block;
width: 250px;
float: right;
background-color:#707070;
padding: 10px;
text-decoration: none;
text-align: center;
margin-bottom: 15px;
color: #fff
}
.Card img
{
  width: 350px;
  display: block;
  height: 200px;
  margin: 0 auto;
  margin-top: 15px;
}
.back
{
  display: block;
  margin: 0 auto;
  width: 250px;
  background-color:#707070;
  padding: 10px;
  text-decoration: none;
  text-align: center;
  margin-bottom: 15px;
  color: #fff
}
</style>
