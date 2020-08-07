<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Division;
use App\Http\Requests\DivisionRequest;

class DivisionController extends Controller
{
  public function view(){
  	$alldata = Division::all();
  	return view('backend.division.division-view', compact('alldata') );
  }

  public function add(){
  	return view('backend.division.division-add');
  }

  public function store(Request $request){

  	$request->validate([
  			'name' => 'required|unique:divisions,name',
      ],
      [
        'name.required' => 'Write Division Name',
        'name.unique' => 'Division already exsits',
  	]);

  	$division = new Division();
  	$division->name = $request->name;
  	$division->save();

    Session()->flash('success', ' Data Inserted Successfully ');

  	return redirect()->route('division.view');

  }

    public function edit($id){
      $editData = Division::find($id);
      return view('backend.division.division-edit', compact('editData') );
    }
    

    public function update(DivisionRequest $request, $id){
    $division = Division::find($id);
    $division->name = $request->name;
    $division->save();

    Session()->flash('success', ' Data Updated Successfully ');

    return redirect()->route('division.view');

    }

     public function delete($id){
      $deleteData = Division::find($id);
       $deleteData->delete(); 

    Session()->flash('success', ' Data Deleted Successfully ');

    return redirect()->route('division.view');

    
    }
    



}
