<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     *GET THE REGIONS BLADE VIEW
     */
    public function getRegion()
    {
        $region = Region::get();
        return view('site.master.region', compact('region'));
    }

    /**
     * CHANGE THE STATUS OF REGION ACTIVE OR INACTIVE
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $region = Region::find($id);
        if (!$region) {
            return response()->json(['message' => 'country not found'], 404);
        } else {
            $region->active = !$region->active;
            $region->save();
            return response()->json(['message' => 'Status changed successfully']);
        }
    }
}
