<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Department;
use App\Models\Region;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Department Blade Data
     */
    public function getDepartment()
    {
        $region = Region::where('active', 1)->get();
        $Department = Department::get();
        return view('site.master.department', compact('region', 'Department'));
    }
    /**
     * ADDING NEW Department 
     */
    public function addDepartmentData(Request $request)
    {
        $addDepartment = new Department();
        $addDepartment->name = $request->name;
        $addDepartment->created_by = $request->created_by;
        // $addDepartment->active = $request->status;
        $addDepartment->save();
        return response()->json(['message' => 'DEPARTMENT ADDED SUCCESSFULLY']);
    }
    /**
     * CHANGE THE STATUS OF Department 
     */
    public function changeStatus(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $Department = Department::find($id);
        if (!$Department) {
            return response()->json(['message' => 'Department not found'], 404);
        } else {
            $Department->active = !$Department->active;
            $Department->save();
            return response()->json(['message' => 'Status changed successfully']);
        }
    }
    /**
     * EDIT THE Department NAME AND CODE
     */
    public function editDepartment(Request $request)
    {
        $id = $request->id;
        $Department = Department::find($id);
        if (!$Department) {
            return response()->json(['message' => 'Department not found'], 404);
        } else {
            return response()->json(['success' => true, 'Department' => $Department]);
        }
    }
    /**
     * UPDATE THE CURRENT Department
     */
    public function editDepartmentData(Request $request)
    {
        $id = $request->id;
        $Department = Department::find($id);
        $Department->update([
            'name' => $request->name,
            'created_by' => $request->created_by,
        ]);
        return response()->json(['message' => 'REGION UPDATED SUCCESSFULLY']);
    }
}
