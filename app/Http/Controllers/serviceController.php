<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\serviceRequest;
use App\Http\Requests\updateServiceRequest;

use App\Service;
class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Service $service)
    {
      return view ('services.index')->with('services' , Service::all());;
    }

    public function create()
    {
      return view ('services.create');
      $request->session()->flash('success', 'Service added was successful!');
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(serviceRequest $request)
    {
      // dd($request->all());
      $service = Service::create([
        "title" => $request -> title ,
        "description" => $request -> description ,
        "image" => $request -> image -> store('images' , 'public'),
      ]);

      $request->session()->flash('success', 'Service added was successful!');
      return redirect(Route('services.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
      return view ('services.show')->with('service' , $service);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(Service $service)
     {
       return view ('services.edit')->with('service' , $service);
     }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(updateServiceRequest $request , Service $service)
     {
       $data = $request -> only([ 'title' , 'description' ]);
       if ($request -> hasFile('image'))
       {
       $image = $request ->image -> store ('images' , 'public');
       $data['image']=$image;
       }
       $service -> update($data);
       session()->flash('success', 'Service Updated successful!');
       return redirect (route('services.index'));
     }
     public function destroy($service)
     {
       $service = Service::find($service);
       $service -> delete();
       session()->flash('success', 'Service Deleted was successful!');
       return redirect('services');
     }
}
