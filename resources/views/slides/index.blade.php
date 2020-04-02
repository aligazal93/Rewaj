@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    <div class="col-sm-12">
      <a class="add" href="{{Route('slides.create')}}" style="padding:10px;background-color:#707070";margin-bottom:20px > Add New Slide </a>
    </div>

    <div class="col-sm-12">
      <h3 class="text-center" style="background-color:#cccacae6;padding:10px" >Slides</h3>
      @if(Session::has('success'))
        <p class="alert alert-info">{{ Session::get('success') }}</p>
      @endif
    </div>

    <div class="col-sm-12">
      @if($slides -> count() > 0 )
      <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Option</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ( $slides as $slide )
                <th scope="row"><img style="height:100px" src="{{asset('storage/'. $slide->image )}}"</th>
                <td>  {{ $slide -> title }} </td>
                <td>  {{ $slide -> description }} </td>
                <td>
                  <a href="{{route('slides.show' , $slide -> id)}}"class='link-view'>View</a>
                  <a href="{{route('slides.edit' , $slide -> id)}}" class='link-edit'>Edit</a>
                  <a href="">
                    <form action="{{route('slides.destroy' , $slide->id) }}" method="post">
                      @csrf
                      @method('delete')
                       <button class="btn btn-danger" style="width:100%;padding:4px;"> Delete </button>
                    </form>
                  </a>

                </td>

              </tr>
              @endforeach


            </tbody>
          </table>
          @else
          <h2 class="border text-center" style="padding:10px;">No Slides Yet</h2>
          @endif
    </div>




  </div>
</div>

<style>
.add
{
display: block;
width: 250px;
float: right;
text-decoration: none;
text-align: center;
margin-bottom: 15px;
color: #fff
}
.link-edit
{
  margin-right:10px;
  display:inline-block;
  width:100%;
  background:#c4d62b;
  color: #fff;
  text-align:center;
  padding: 4px;
  margin-bottom: 5px;
}
.link-view
{
  display:inline-block;
  width:100%;
  background:green;
  color: #fff;
  text-align:center;
  padding: 4px;
  margin-bottom: 5px;
}

</style>

@endsection
