<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
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
            $blogs = Blog::where('title', 'LIKE', "%$keyword%")
                ->orWhere('short_description', 'LIKE', "%$keyword%")
                ->orWhere('descripton', 'LIKE', "%$keyword%")
                ->orWhere('meta_title', 'LIKE', "%$keyword%")
                ->orWhere('meta_description', 'LIKE', "%$keyword%")
                ->orWhere('banner', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $blogs = Blog::latest()->paginate($perPage);
        }

        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('blogs.create');
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
        return $request->all();
        $this->validate($request, [
			'title' => 'required',
			'short_description' => 'required',
			'description' => 'required',
			'banner' => 'required'
		]);
        if ($request->hasFile('banner')) {
            $imageName = 'blog'.time().'.'.$request->banner->extension();  
            $request->banner->move(public_path('storage/blog/'), $imageName);
            $requestData['banner'] = $imageName;
        }

        Blog::create($request->all());

        return redirect('blogs')->with('success', 'Blog added!');
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
        $blog = Blog::findOrFail($id);

        return view('blogs.show', compact('blog'));
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
        $blog = Blog::findOrFail($id);

        return view('blogs.edit', compact('blog'));
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
        // return $request->all();
        $this->validate($request, [
            'title' => 'required',
			'short_description' => 'required',
			'description' => 'required',
			'banner' => 'required'
            ]);
                $requestData = $request->all();
            //         if ($request->hasFile('banner')) {
                //     $requestData['banner'] = $request->file('banner')
                //         ->store('uploads', 'public');
                // }
                
        if ($request->hasFile('banner')) {
            $imageName = 'blog'.time().'.'.$request->banner->extension();  
            $request->banner->move(public_path('storage/blog/'), $imageName);
            $requestData['banner'] = $imageName;
        }
        $blog = Blog::findOrFail($id);
        $blog->update($requestData);

        return redirect('blogs')->with('success', 'Blog updated!');
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
        Blog::destroy($id);

        return redirect('blogs')->with('success', 'Blog deleted!');
    }
}
