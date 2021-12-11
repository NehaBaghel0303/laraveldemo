<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Paragraphcontent;
use Illuminate\Http\Request;

class ParagraphcontentsController extends Controller
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
            $paragraphcontents = Paragraphcontent::where('code', 'LIKE', "%$keyword%")
                ->orWhere('remarks', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $paragraphcontents = Paragraphcontent::latest()->paginate($perPage);
        }

        return view('paragraphcontents.index', compact('paragraphcontents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('paragraphcontents.create');
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
			'code' => 'required',
			'description' => 'required'
		]);
        $requestData = $request->all();
        
        Paragraphcontent::create($requestData);

        return redirect('paragraphcontents')->with('flash_message', 'Paragraphcontent added!');
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
        $paragraphcontent = Paragraphcontent::findOrFail($id);

        return view('paragraphcontents.show', compact('paragraphcontent'));
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
        $paragraphcontent = Paragraphcontent::findOrFail($id);

        return view('paragraphcontents.edit', compact('paragraphcontent'));
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
			'code' => 'required',
			'description' => 'required'
		]);
        $requestData = $request->all();
        
        $paragraphcontent = Paragraphcontent::findOrFail($id);
        $paragraphcontent->update($requestData);

        return redirect('paragraphcontents')->with('flash_message', 'Paragraphcontent updated!');
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
        Paragraphcontent::destroy($id);

        return redirect('paragraphcontents')->with('flash_message', 'Paragraphcontent deleted!');
    }
}
