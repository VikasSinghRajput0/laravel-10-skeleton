<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Site Blade Data
    */
    public function getSite()
    {
        $region = Region::where('active', 1)->get();
        $site = Site::get();
        return view('site.Masters.site', compact('region', 'site'));
    }
    /**
     * COUNTRY DATA ON THE BASIS OF REGIONS
    */
    public function getCountryData(Request $request)
    {
        $regionName = $request->countryName;
        $country = Country::where('active', 1)->where('region', $regionName)->pluck('name');
        return response()->json(['success' => true, 'message' => 'Data Found', 'country' => $country]);
    }
    /**
     * ADDING NEW SITE 
     */
    public function addSiteData(Request $request)
    {
        $addSite = new Site();
        $addSite->name = $request->name;
        $addSite->region = $request->region;
        $addSite->country = $request->country;
        $addSite->code = $request->code;
        $addSite->active = $request->status;
        $addSite->save();
        return response()->json(['message' => 'REGION ADDEDD SUCCESSFULLY']);
    }
    /**
     * CHANGE THE STATUS OF SITE 
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $site = Site::find($id);
        if (!$site) {
            return response()->json(['message' => 'site not found'], 404);
        } else {
            $site->active = !$site->active;
            $site->save();
            return response()->json(['message' => 'Status changed successfully']);
        }
    }
    /**
     * EDIT THE SITE NAME AND CODE
    */
    public function editSite(Request $request)
    {
        $id = $request->id;
        $site = Site::find($id);
        if (!$site) {
            return response()->json(['message' => 'site not found'], 404);
        } else {
            return response()->json(['success' => true, 'site' => $site]);
        }
    }
    /**
     * UPDATE THE CURRENT SITE
    */
    public function editSiteData(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $site = Site::find($id);
        $site->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return response()->json(['message' => 'REGION UPDATED SUCCESSFULLY']);
    }
}
