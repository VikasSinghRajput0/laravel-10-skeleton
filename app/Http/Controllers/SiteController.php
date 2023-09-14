<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getSite(){
        $region = Region::where('active', 1)->get();
        return view('site.Masters.site',compact('region'));
    }
    public function getCountryData(Request $request){
        $regionName = $request->countryName;
        $country = Country::where('active', 1)->where('region', $regionName)->pluck('name');
        return response()->json(['success' => true, 'message' => 'Data Found', 'country' => $country]);
    }
}
