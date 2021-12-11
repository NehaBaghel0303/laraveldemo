<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.home.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = UserLocation::whereUserId(auth()->id())->first();
        $address = json_decode($location->address);
        echo $address->{'type'};
        return view('home.index',compact('address'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

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
    public function store(Request $request)
    {

        // return $request->all();
         try{
            // $location = UserLocation::whereUserId(auth()->id())->first();

            
            $data = [ 
                'type'=>$request->type,
                'address_line_one'=>$request->address_line_one,
                'address_line_two'=>$request->address_line_two
            ];
    
            if($location){
                $location->update(['address'=> $data]);                
            }
            else{
                UserLocation::create([
                    'address'=> json_encode($data)
                ]); 
            }

           
            return redirect()->back()->with('success', 'Address updated succesfully!');
            }catch (\Exception $e) {
                $bug = $e->getMessage();
                return redirect()->back()->with('error', $bug);
    
            }
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
