<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\District;
use App\Model\Upzilla;

class DefaultController extends Controller
{
    public function getDistrict(Request $request){
    	$division_id = $request->division_id;
    	$allDistrict = District::where('division_id',$division_id)->get();
    	return response()->json($allDistrict); 
    }

    public function getUpzilla(Request $request){
    		$district_id = $request->district_id;
    	$allUpzilla = Upzilla::where('district_id',$district_id)->get();
    	return response()->json($allUpzilla); 
    }


}
