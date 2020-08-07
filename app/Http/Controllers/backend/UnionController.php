<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Division;
use App\Model\District;
use App\Model\Upzilla;
use App\Model\Union;
use App\Http\Requests\UpzillaRequest;

class UnionController extends Controller
{
    public function view(){
  	$alldata = Union::all();
  	return view('backend.union.union-view', compact('alldata') );
  }

  public function add(){
  	$data['divisions'] = Division::all();
  	return view('backend.union.union-add', $data);
  }

  public function store(Request $request){
  	$request->validate([
  			'name' => 'required|unique:unions,name',
      ],
      [
        'name.required' => 'Write Unions Name',
        'name.unique' => 'Union already exsits',
  	]);

  	$union = new Union();
  	$union->division_id = $request->division_id;
  	$union->district_id = $request->district_id;
  	$union->upzilla_id = $request->upzilla_id;
  	$union->name = $request->name;
  	$union->save();

    Session()->flash('success', ' Data Inserted Successfully ');

  	return redirect()->route('unions.view');

  }

    public function edit($id){
      $data['editData'] = Union::find($id);
      $data['upzillas'] = Upzilla::all();
      $data['districts'] = District::all();
      $data['divisions'] = Division::all();
      return view('backend.union.union-edit', $data );
    }
    

    public function update(UpzillaRequest $request, $id){
	  $upzilla = Upzilla::find($id);
      $upzilla->division_id = $request->division_id;
      $upzilla->district_id = $request->district_id;
      $upzilla->name = $request->name;
      $upzilla->save();

	    Session()->flash('success', ' Data Updated Successfully ');

	    return redirect()->route('upzillas.view');
	}
}
