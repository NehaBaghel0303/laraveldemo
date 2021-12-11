<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
                $keyword = $request->get('search');
                $perPage = 25;

                if (!empty($keyword)) {
                    $review = Review::where('name', 'LIKE', "%$keyword%")
                        ->orWhere('speciality', 'LIKE', "%$keyword%")
                        ->orWhere('cuisine', 'LIKE', "%$keyword%")
                        ->orWhere('gng', 'LIKE', "%$keyword%")
                        ->orWhere('status', 'LIKE', "%$keyword%")
                        ->orWhere('varient', 'LIKE', "%$keyword%")
                        ->orWhere('mrp', 'LIKE', "%$keyword%")
                        ->orWhere('description', 'LIKE', "%$keyword%")
                        ->orWhere('preference', 'LIKE', "%$keyword%")
                        ->latest()->paginate($perPage);
                } else {
                    $review = Review::latest()->paginate($perPage);
                }

                return view('review.index', compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $review = Review::findOrFail($id);

        return view('review.edit', compact('review'));
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
      
              $data = \App\Review::whereId($request->id)->first();
              $data->name = $request->name;
              $data->speciality = $request->speciality;
              $data->cuisine = $request->cuisine;
              $data->description = $request->description;
              $data->preference = $request->preference;
              $data->save();
              return redirect()->back()->with('success', "Subscription Updated Successfully!");
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
