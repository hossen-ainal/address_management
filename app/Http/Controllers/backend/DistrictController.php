<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Division;
use App\Model\District;
use App\Http\Requests\DistrictRequest;

class DistrictController extends Controller
{
    public function view(){
  	$alldata = District::all();
  	return view('backend.district.district-view', compact('alldata') );
  }

  public function add(){
  	$data['divisions'] = Division::all();
  	return view('backend.district.district-add', $data);
  }

  public function store(Request $request){

  	$request->validate([
  			'name' => 'required|unique:divisions,name',
      ],
      [
        'name.required' => 'Write Division Name',
        'name.unique' => 'Division already exsits',
  	]);

  	$district = new District();
  	$district->division_id = $request->division_id;
  	$district->name = $request->name;
  	$district->save();

    Session()->flash('success', ' Data Inserted Successfully ');

  	return redirect()->route('districts.view');

  }

    public function edit($id){
      $data['editData'] = District::find($id);
      $data['divisions'] = Division::all();
      return view('backend.district.district-edit', $data );
    }
    

    public function update(DistrictRequest $request, $id){
	    $district = District::find($id);
      $district->division_id = $request->division_id;
      $district->name = $request->name;
      $district->save();

	    Session()->flash('success', ' Data Updated Successfully ');

	    return redirect()->route('districts.view');

    }

     public function delete($id){
      $deleteData = District::find($id);
       $deleteData->delete(); 

    Session()->flash('success', ' Data Deleted Successfully ');

    return redirect()->route('districts.view');

    
    }
}
