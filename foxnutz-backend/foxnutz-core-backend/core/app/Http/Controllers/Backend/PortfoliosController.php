<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfoliosController extends Controller
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
            $portfolios = Portfolio::where('title', 'LIKE', "%$keyword%")
                ->orWhere('short_description', 'LIKE', "%$keyword%")
                ->orWhere('client', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('banner', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $portfolios = Portfolio::latest()->paginate($perPage);
        }

        return view('portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('portfolios.create');
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
			'title' => 'required',
			'short_description' => 'required',
			'banner' => 'required'
		]);
        $requestData = $request->all();
        if ($request->hasFile('banner')) {
            $imageName = 'portfolio'.time().'.'.$request->banner->extension();  
            $request->banner->move(public_path('storage/portfolio/'), $imageName);
            $requestData['banner'] = $imageName;
        }
        

        Portfolio::create($requestData);

        return redirect('portfolios')->with('success', 'Portfolio added!');
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
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolios.show', compact('portfolio'));
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
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolios.edit', compact('portfolio'));
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
			'title' => 'required',
			'short_description' => 'required',
			'banner' => 'required'
		]);
        $requestData = $request->all();
        $portfolio = Portfolio::findOrFail($id);
        if ($request->hasFile('image')) {
            $imageName = 'portfolio'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('storage/portfolio/'), $imageName);
            $requestData['image'] = $imageName;
        }else{
            $requestData['image'] = $portfolio->image;
            
        }
        $portfolio->update($requestData);

        return redirect('portfolios')->with('success', 'Portfolio updated!');
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
        Portfolio::destroy($id);

        return redirect('portfolios')->with('success', 'Portfolio deleted!');
    }
}
