<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Order;
use App\Models\Subscriber;

class OrderController extends Controller
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
                    $orders = Order::where('product_id', 'LIKE', "%$keyword%")
                        ->orWhere('user_id', 'LIKE', "%$keyword%")
                        ->orWhere('quantity', 'LIKE', "%$keyword%")
                        ->orWhere('price', 'LIKE', "%$keyword%")
                        ->orWhere('status', 'LIKE', "%$keyword%")
                        ->orWhere('paid_amount', 'LIKE', "%$keyword%")
                        ->orWhere('coupoun', 'LIKE', "%$keyword%")
                        ->latest()->paginate($perPage);
                } else {
                    $orders = Order::latest()->paginate($perPage);
                }

                return view('orders.index', compact('orders'));
         }


        public function subscriberIndex(Request $request)
         {
                $keyword = $request->get('search');
                $perPage = 25;

                if (!empty($keyword)) {
                    $subscriber_index = Subscriber::where('product_id', 'LIKE', "%$keyword%")
                        ->orWhere('user_id', 'LIKE', "%$keyword%")
                        ->orWhere('quantity', 'LIKE', "%$keyword%")
                        ->orWhere('price', 'LIKE', "%$keyword%")
                        ->orWhere('status', 'LIKE', "%$keyword%")
                        ->orWhere('paid_amount', 'LIKE', "%$keyword%")
                        ->orWhere('coupoun', 'LIKE', "%$keyword%")
                        ->latest()->paginate($perPage);
                } else {
                    $subscriber_index = Subscriber::latest()->paginate($perPage);
                }

                return view('subscriber.index', compact('subscriber_index'));
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
        //
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
        //
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
