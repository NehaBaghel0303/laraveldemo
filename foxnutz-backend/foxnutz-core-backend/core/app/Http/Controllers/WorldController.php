<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class WorldController extends Controller
{
    public function getStates(Request $request)
    {
        $states = State::whereCountryId($request->country_id)->get();
        $html = '';
        foreach ($states as $index => $state) {
            $html .= '<option value="'.$state->id.'">'.$state->name.'</option>';
        }

        return $html;
    }
    public function getCities(Request $request)
    {
        $cities = City::whereStateId($request->state_id)->get();
        $html = '';
        foreach ($cities as $index => $city) {
            $html .= '<option value="'.$city->id.'">'.$city->name.'</option>';
        }

        return $html;
    }
}
