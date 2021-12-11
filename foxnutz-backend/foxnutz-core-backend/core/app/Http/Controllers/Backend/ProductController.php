<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Media;
use App\Models\Subscription;

class ProductController extends Controller
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
                    $products = Product::where('name', 'LIKE', "%$keyword%")
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
                    $products = Product::latest()->paginate($perPage);
                }

                return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medias = [];

         $data = Product::create([
         
            'name' =>$request->name,
            'speciality' =>$request->speciality,
            'cuisine' =>$request->cuisine,
            'gng' =>$request->gng,
            'status' =>$request->status,
            'varient' =>$request->varient,
            'mrp' =>$request->mrp,
            'special_offer' =>$request->special_offer,
            'is_published' =>$request->is_published,
            'media_ids' => json_encode($medias),
            'delivery_cost' =>$request->delivery_cost,
            'description' =>$request->description,
            'preference' =>$request->preference,
        ]);

        if($request->has('media_ids')){
            foreach($request->media_ids as $item){
                $image = $item;
                $path = 'assets/images/product/';
                $filename = 'FXProduct'.'-'.date("dmY").'-'.time() .'-'.\Str::random(5) . '.' . $image->getClientOriginalExtension();
                $image->move($path, $filename);

                $temp = Media::create([
                    'type' => "Product",
                    'type_id' => $data->id,
                    'src' => $filename,
                ]);

                $medias[] = $temp->id;
            }
            // return $medias;
            $data->update(['media_ids'=>json_encode($medias)]);
        }
         return redirect()->back()->with('success', 'Product Store Successfully');
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
        $products = Product::findOrFail($id);

        return view('products.edit', compact('products'));
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
              $medias = [];

              $data = \App\Models\Product::whereId($request->id)->first();
              $data->name = $request->name;
              $data->speciality = $request->speciality;
              $data->cuisine = $request->cuisine;
              $data->gng = $request->gng;
              $data->status = $request->status;
              $data->varient = $request->varient;
              $data->mrp = $request->mrp;
              $data->special_offer = $request->special_offer;
              $data->is_published = $request->is_published;
              $data->media_ids = json_encode($medias);
              $data->delivery_cost = $request->delivery_cost;
              $data->description = $request->description;
              $data->preference = $request->preference;
              $data->save();

              if($request->has('media_ids')){
                foreach($request->media_ids as $item){
                    $image = $item;
                    $path = 'assets/images/product/';
                    $filename = 'FXProduct'.'-'.date("dmY").'-'.time() .'-'.\Str::random(5) . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $filename);

                    $temp = Media::create([
                        'type' => "Product",
                        'type_id' => $data->id,
                        'src' => $filename,
                    ]);

                    $medias[] = $temp->id;
                }
                // return $medias;
                $data->update(['media_ids'=>json_encode($medias)]);
            }
              return redirect()->back()->with('success', "Product Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::whereId($id)->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }

    
}
