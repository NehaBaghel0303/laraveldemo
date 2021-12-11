<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SellerService;




class SellerServicesController extends Controller
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
                    $seller_service = SellerService::where('name', 'LIKE', "%$keyword%")
                        ->orWhere('price', 'LIKE', "%$keyword%")
                        ->orWhere('currency_id', 'LIKE', "%$keyword%")
                        ->orWhere('quantity', 'LIKE', "%$keyword%")
                        ->orWhere('address', 'LIKE', "%$keyword%")
                        ->orWhere('country', 'LIKE', "%$keyword%")
                        ->orWhere('state', 'LIKE', "%$keyword%")
                        ->orWhere('city', 'LIKE', "%$keyword%")
                        ->orWhere('pincode', 'LIKE', "%$keyword%")
                        ->latest()->paginate($perPage);
                } else {
                    $seller_service = SellerService::latest()->paginate($perPage);
                }

                return view('seller_service.index', compact('seller_service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('seller_service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if($request->has('image')){   
            $image = $request->file('image');
            $path = 'assets/images/subscription/';
            $filename = \Auth::id().'-'.date("dmY").'-'.time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
            $filepath = $filename;
        }else{
            $filename = null;
        }

         $data = SellerService::create([
         
            'name' =>$request->name,
            'price' =>$request->price,
            'currency_id' =>$request->currency_id,
            'quantity' =>$request->quantity,
            'quantity_type_id' =>$request->quantity_type_id,
            'address' =>$request->address,
            'country' =>$request->country,
            'state' =>$request->state,
            'city' =>$request->city,
            'pincode' =>$request->pincode,
          
        ]);
         return redirect()->back()->with('success', 'Seller Service Store Successfully');
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
        $seller_service = SellerService::findOrFail($id);

        return view('seller_service.edit', compact('seller_service'));
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
            if($request->has('image')){   
                $image = $request->file('image');
                $path = 'assets/images/product/';
                $filename = \Auth::id().'-'.date("dmY").'-'.time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $filename);
                $filepath = $filename;
            }else{
                $filename = null;
            }
              $data = \App\Models\SellerService::whereId($request->id)->first();
              $data->name = $request->name;
              $data->price = $request->price;
              $data->currency_id = $request->currency_id;
              $data->quantity = $request->quantity;
              $data->quantity_type_id = $request->quantity_type_id;
              $data->address = $request->address;
              $data->country = $request->country;
              $data->state = $request->state;
              $data->city = $request->city;
              $data->pincode = $request->pincode;
              //   $data->image = $filename;
              $data->save();
              return redirect()->back()->with('success', "Seller Service Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SellerService::whereId($id)->delete();
        return redirect()->back()->with('success', 'Seller Service Deleted Successfully');
    }
}
