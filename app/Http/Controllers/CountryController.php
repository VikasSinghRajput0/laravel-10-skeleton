<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getCountries()
    {
        $country = Country::get();
        return view('site.Masters.country', compact('country'));
    }
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
    public function addcountry(Request $request)
    {
        // dd($request->all());
        $country = new country();
        $country->name = $request->name;
        $country->code = $request->code;
        $country->active = $request->status;
        $country->save();
        return response()->json(['message' => 'Country ADDEDD SUCCESSFULLY']);
    }
}
