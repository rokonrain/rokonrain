<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;



class DropdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $divisions = Division::select('id', 'name')->get();


        return view('dropdown', compact('divisions'));
    }

    /**
     * return ditricts list.
     *
     * @return json
     */
    public function getDistricts(Request $request)
    {
        $districts = \DB::table('districts')
            ->where('division_id', $request->division_id)
            ->get();

        if (count($districts) > 0) {
            return response()->json($districts);
        }
    }

    /**
     * return thanas list
     *
     * @return json
     */
    public function getThanas(Request $request)
    {
        $thanas = \DB::table('thanas')
            ->where('district_id', $request->district_id)
            ->get();

        if (count($thanas) > 0) {
            return response()->json($thanas);
        }
    }

    /**
     * return unions list
     *
     * @return json
     */
    public function getUnions(Request $request)
    {
        $unions = \DB::table('unions')
            ->where('thana_id', $request->thana_id)
            ->get();

        if (count($unions) > 0) {
            return response()->json($unions);
        }
    }
}
