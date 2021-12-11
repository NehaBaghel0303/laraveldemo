<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Media;


class SubscriptionsController extends Controller
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
                    $subscriptions = Subscription::where('sub_name', 'LIKE', "%$keyword%")
                        ->orWhere('product_name', 'LIKE', "%$keyword%")
                        ->latest()->paginate($perPage);
                } else {
                    $subscriptions = Subscription::latest()->paginate($perPage);
                }

                return view('subscription.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscription.create');
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

         $data = Subscription::create([
         
            'sub_name' =>$request->sub_name,
            'product_name' =>$request->product_name,
            'product_description' =>$request->product_description,
            'media_ids' => json_encode($medias),
            'varient' =>$request->varient,
            'delivery_cost' =>$request->delivery_cost,
            'special_offer' =>$request->special_offer,
            'is_published' =>$request->is_published,
            'is_verified' =>$request->is_verified,
            'in_stock' =>$request->in_stock,
          
        ]);

            if($request->has('media_ids')){
                foreach($request->media_ids as $item){
                    $image = $item;
                    $path = 'assets/images/subscription/';
                    $filename = 'FXSubscription'.'-'.date("dmY").'-'.time() .'-'.\Str::random(5) . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $filename);

                    $temp = Media::create([
                        'type' => "Subscription",
                        'type_id' => $data->id,
                        'src' => $filename,
                    ]);

                    $medias[] = $temp->id;
                }
            // return $medias;
            $data->update(['media_ids'=>json_encode($medias)]);
        }
         return redirect()->back()->with('success', 'Subscription Store Successfully');
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
        $subscriptions = Subscription::findOrFail($id);

        return view('subscription.edit', compact('subscriptions'));
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

              $data = \App\Models\Subscription::whereId($request->id)->first();
              $data->sub_name = $request->sub_name;
              $data->product_name = $request->product_name;
              $data->product_description = $request->product_description;
              $data->media_ids = json_encode($medias);
              $data->varient = $request->varient;
              $data->delivery_cost = $request->delivery_cost;
              $data->special_offer = $request->special_offer;
              $data->is_published = $request->is_published;
              $data->is_verified = $request->is_verified;
              $data->in_stock = $request->in_stock;
              $data->save();

              if($request->has('media_ids')){
                foreach($request->media_ids as $item){
                    $image = $item;
                    $path = 'assets/images/subscription/';
                    $filename = 'FXSubscription'.'-'.date("dmY").'-'.time() .'-'.\Str::random(5) . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $filename);

                    $temp = Media::create([
                        'type' => "Subscription",
                        'type_id' => $data->id,
                        'src' => $filename,
                    ]);

                    $medias[] = $temp->id;
                }
                // return $medias;
                $data->update(['media_ids'=>json_encode($medias)]);
            }

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
        Subscription::whereId($id)->delete();
        return redirect()->back()->with('success', 'Subscription Deleted Successfully');
    }
}
