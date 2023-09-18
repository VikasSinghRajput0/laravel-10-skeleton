<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * GET THE COUNTRY BLADE VIEW
     */
    public function getCountries()
    {
        $country = Country::get();
        return view('site.masters.country', compact('country'));
    }
    /**
     * CHANGE THE STATUS OF COUNTRY ACTIVE OR INACTIVE
     */
    public function changeStatus(Request $request)
    {

        $id = $request->id;
        $country = country::find($id);
        if (!$country) {
            return response()->json(['message' => 'country not found'], 404);
        }else{
            $country->active = !$country->active;
            $country->save();
            return response()->json(['message' => 'Status changed successfully']);
        }
    }
    
}