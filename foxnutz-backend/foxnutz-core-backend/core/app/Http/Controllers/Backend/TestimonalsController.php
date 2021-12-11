<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Testimonal;
use Illuminate\Http\Request;

class TestimonalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $testimonals = Testimonal::where('client_name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $testimonals = Testimonal::latest()->paginate($perPage);
        }

        return view('testimonals.index', compact('testimonals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('testimonals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'client_name' => 'required',
			'description' => 'required'
		]);
        $requestData = $request->all();
        
        Testimonal::create($requestData);

        return redirect('testimonals')->with('success', 'Testimonal added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $testimonal = Testimonal::findOrFail($id);

        return view('testimonals.show', compact('testimonal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $testimonal = Testimonal::findOrFail($id);

        return view('testimonals.edit', compact('testimonal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'client_name' => 'required',
			'description' => 'required'
		]);
        $requestData = $request->all();
        
        $testimonal = Testimonal::findOrFail($id);
        $testimonal->update($requestData);

        return redirect('testimonals')->with('success', 'Testimonal updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Testimonal::destroy($id);

        return redirect('testimonals')->with('success', 'Testimonal deleted!');
    }
}
