<?php

if(!function_exists('optionCanChecker')){
    function optionCanChecker($permission){
        $role = \Auth::user()->roles[0];
        if ($permission != null || $permission != ''){
            if ($role->hasPermissionTo($permission)){
                return true;
            } else {
                return false;
            }
        }
        return true;
    }
}

// Blog Categories
if(!function_exists('blogCategory')){
    function blogCategory(){
      return $arr = [
           'Snacks',
           'Nutrition',
           'How_to',
       ];
    }
}

if(!function_exists('blogBanner')){
    function blogBanner($src){
        return asset('/'.$src);
    }
}

if(!function_exists('productBanner')){
    function productBanner($src){
        return asset('/assets/images/product/'.$src);
    }
}

if(!function_exists('subscriptionBanner')){
    function subscriptionBanner($src){
        return asset('/assets/images/subscription/'.$src);
    }
}

if(!function_exists('NameById')){
    function NameById($id){
        return \App\User::whereId($id)->first()->name ?? 'N/A';
    }
}

if(!function_exists('CurrencyNameById')){
    function CurrencyNameById($id){
        return \App\Models\Currency::whereId($id)->first()->name ?? 'N/A';
    }
}

if(!function_exists('CountryNameById')){
    function CountryNameById($id){
        return \App\Models\Country::whereId($id)->first()->name ?? 'N/A';
    }
}
if(!function_exists('StateNameById')){
    function StateNameById($id){
        return \App\Models\State::whereId($id)->first()->name ?? 'N/A';
    }
}
if(!function_exists('CityNameById')){
    function CityNameById($id){
        return \App\Models\City::whereId($id)->first()->name ?? 'N/A';
    }
}

if(!function_exists('QuantityNameById')){
    function QuantityNameById($id){
        return \App\Models\Quantitytype::whereId($id)->first()->name ?? 'N/A';
    }
}

