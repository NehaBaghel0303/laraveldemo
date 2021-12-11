<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $data = new Testimonial;
        $data->name= $request->name;
        $data->role= $request->role;
        $data->description= $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = storage_path('app/public/backend/testimonial');
            $imageName = 'testimonial' . $data->id.rand(000, 999).'.' . $image->getClientOriginalExtension();
            $image->move($path, $imageName);
            $data->image=$imageName;
        }
        else{
            $data->image = $request->image;
        }
        $data->save();

        return redirect()->route('testimonial.index')->with('success','testimonial created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonials = Testimonial::whereId($id)->firstorfail();
        return view('admin.testimonial.edit',compact('testimonials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $data = new Testimonial;
        $data->name= $request->name;
        $data->role= $request->role;
        $data->description= $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = storage_path('app/public/backend/testimonial');
            $imageName = 'testimonial' . $data->id.rand(000, 999).'.' . $image->getClientOriginalExtension();
            $image->move($path, $imageName);
            $data->image=$imageName;
        }
        else{
            $data->image = $request->image;
        }
        $data->update();

        return redirect()->route('testimonial.index')->with('success','testimonial created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
