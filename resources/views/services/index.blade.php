@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    <div class="col-sm-12">
      <a class="add" href="{{Route('services.create')}}" style="padding:10px;background-color:#707070";margin-bottom:20px > Add New Service </a>
    </div>

    <div class="col-sm-12">
      <h3 class="text-center" style="background-color:#cccacae6;padding:10px" >Services</h3>
      @if(Session::has('success'))
        <p class="alert alert-info">{{ Session::get('success') }}</p>
      @endif
    </div>

    <div class="col-sm-12">
      @if($services -> count() > 0 )
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
                        @foreach ( $services as $service )
                        <th scope="row"><img style="height:100px" src="{{asset('storage/'. $service->image )}}"</th>
                        <td>  {{ $service -> title }} </td>
                        <td>  {{ $service -> description }} </td>
                        <td>
                          <a href="{{route('services.show' , $service -> id)}}"class='link-view'>View</a>
                          <a href="{{route('services.edit' , $service -> id)}}" class='link-edit'>Edit</a>
                          <a href="">
                            <form action="{{route('services.destroy' , $service->id) }}" method="post">
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
            <h2 class="border text-center" style="padding:10px;">No Services Yet</h2>
            @endif
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
text-decoration: none;
text-align: center;
margin-bottom: 15px;
color: #fff
}
.link-edit
{
  display:inline-block;
  width:100%;
  background:#c4d62b;
  font-size: 12px;
  color: #fff;
  text-align:center;
  padding: 4px;
  margin-bottom: 2px;
}
.link-view
{
  display:inline-block;
  width:100%;
  background:green;
  color: #fff;
  text-align:center;
  padding: 4px;
  margin-bottom: 2px;
}

</style>
