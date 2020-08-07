<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Division;
use App\Model\District;
use App\Model\Upzilla;
use App\Http\Requests\UpzillaRequest;

class UpzillaController extends Controller
{
    public function view(){
  	$alldata = Upzilla::all();
  	return view('backend.upzilla.upzilla-view', compact('alldata') );
  }

  public function add(){
  	$data['divisions'] = Division::all();
  	return view('backend.upzilla.upzilla-add', $data);
  }

  public function store(Request $request){
  	$request->validate([
  			'name' => 'required|unique:upzillas,name',
      ],
      [
        'name.required' => 'Write Upazilla Name',
        'name.unique' => 'Upazilla already exsits',
  	]);

  	$upzilla = new Upzilla();
  	$upzilla->division_id = $request->division_id;
  	$upzilla->district_id = $request->district_id;
  	$upzilla->name = $request->name;
  	$upzilla->save();

    Session()->flash('success', ' Data Inserted Successfully ');

  	return redirect()->route('upzillas.view');

  }

    public function edit($id){
      $data['editData'] = Upzilla::find($id);
      $data['districts'] = District::all();
      $data['divisions'] = Division::all();
      return view('backend.upzilla.upzilla-edit', $data );
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

     public function delete($id){
      $deleteData = Upzilla::find($id);
       $deleteData->delete(); 

    Session()->flash('success', ' Data Deleted Successfully ');

    return redirect()->route('upzillas.view');

    
    }
}
