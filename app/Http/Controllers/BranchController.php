<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Branch Blade Data
     */
    public function getBranch()
    {
        $region = Region::where('active', 1)->get();
        $branch = Branch::get();
        return view('site.masters.branch', compact('region', 'branch'));
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
     * ADDING NEW Branch 
     */
    public function addBranchData(Request $request)
    {
        $addBranch = new Branch();
        $addBranch->name = $request->name;
        $addBranch->region = $request->region;
        $addBranch->country = $request->country;
        $addBranch->code = $request->code;
        $addBranch->active = $request->status;
        $addBranch->save();
        return response()->json(['message' => 'REGION ADDEDD SUCCESSFULLY']);
    }
    /**
     * CHANGE THE STATUS OF Branch 
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $branch = Branch::find($id);
        if (!$branch) {
            return response()->json(['message' => 'Branch not found'], 404);
        } else {
            $branch->active = !$branch->active;
            $branch->save();
            return response()->json(['message' => 'Status changed successfully']);
        }
    }
    /**
     * EDIT THE Branch NAME AND CODE
     */
    public function editBranch(Request $request)
    {
        $id = $request->id;
        $branch = Branch::find($id);
        if (!$branch) {
            return response()->json(['message' => 'Branch not found'], 404);
        } else {
            return response()->json(['success' => true, 'Branch' => $branch]);
        }
    }
    /**
     * UPDATE THE CURRENT Branch
     */
    public function editBranchData(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $branch = Branch::find($id);
        $branch->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return response()->json(['message' => 'REGION UPDATED SUCCESSFULLY']);
    }
}