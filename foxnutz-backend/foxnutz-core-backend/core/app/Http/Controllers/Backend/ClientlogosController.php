<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Clientlogo;
use Illuminate\Http\Request;

class ClientlogosController extends Controller
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
            $clientlogos = Clientlogo::where('name', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $clientlogos = Clientlogo::latest()->paginate($perPage);
        }

        return view('clientlogos.index', compact('clientlogos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('clientlogos.create');
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
			'name' => 'required',
			'image' => 'required'
		]);
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $imageName = 'clientlogo'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('storage/clientlogo/'), $imageName);
            $requestData['image'] = $imageName;
        }

        Clientlogo::create($requestData);

        return redirect('clientlogos')->with('success', 'Client Logo added!');
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
        $clientlogo = Clientlogo::findOrFail($id);

        return view('clientlogos.show', compact('clientlogo'));
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
        $clientlogo = Clientlogo::findOrFail($id);

        return view('clientlogos.edit', compact('clientlogo'));
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
			'name' => 'required',
			'image' => 'required'
        ]);
        $requestData = $request->all();
        $clientlogo = Clientlogo::findOrFail($id);
        
        if ($request->hasFile('image')) {
            $imageName = 'clientlogo'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('storage/clientlogo/'), $imageName);
            $requestData['image'] = $imageName;
        }else{
            $requestData['image'] = $clientlogo->image;
            
        }

        $clientlogo->update($requestData);

        return redirect('clientlogos')->with('success', 'Client Logo updated!');
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
        Clientlogo::destroy($id);

        return redirect('clientlogos')->with('success', 'Client Logo deleted!');
    }
}
