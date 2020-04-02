<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\slideRequest;
use App\Http\Requests\updateSlideRequest;
use App\Slide;
class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view ('slides.index')->with('slides' , Slide::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view ('slides.create');
    }
    public function store(slideRequest $request)
    {
      // dd($request->all());
      $slide = Slide::create([
        "title" => $request -> title ,
        "description" => $request -> description ,
        "image" => $request -> image -> store('images' , 'public'),
      ]);

      $request->session()->flash('success', 'Slide added was successful!');

      return redirect(Route('slides.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
      return view ('slides.show')->with('slide' , $slide);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
      return view ('slides.edit')->with('slide' , $slide);
    }

    public function update(updateSlideRequest $request , Slide $slide)
    {
      $data = $request -> only([ 'title' , 'description' ]);
      if ($request -> hasFile('image'))
      {
      $image = $request ->image -> store ('images' , 'public');
      $data['image']=$image;
      }
      $slide -> update($data);
      session()->flash('success', 'Slide Updated successful!');
      return redirect (route('slides.index'));
    }
    public function destroy($slide)
    {
      $slide = Slide::find($slide);
      $slide -> delete();
      session()->flash('success', 'Slide deleted was successful!');
      return redirect('slides');
    }
}
