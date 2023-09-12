<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function getRegion()
    {
        $region = Region::get();
        return view('site.Masters.region', compact('region'));
    }
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
    public function changeStatusApproved(Request $request)
    {
        $id = $request->id;
        $region = Region::find($id);
        if (!$region) {
            return response()->json(['message' => 'Region not found'], 404);
        }
        $region->active = $region->active === 1 ? 0 : 1;
        $region->save();
        return response()->json(['message' => 'Status changed successfully']);
    }
    public function addRegion(Request $request)
    {
        // dd($request->all());
        $region = new Region();
        $region->name = $request->name;
        $region->code = $request->code;
        $region->active = $request->status;
        $region->save();
        return response()->json(['message' => 'REGION ADDEDD SUCCESSFULLY']);
    }
}
