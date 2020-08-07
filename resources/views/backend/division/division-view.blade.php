@extends('backend.layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	    <div class="content-header bg-secondary text-white">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0"> Manage Division</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6 ">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item text-white"><a href="#">division</a></li>
	              <li class="breadcrumb-item active text-white">View</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-6">
              <h3 class="bg-success text-center"> View Division List</h3>          
            </div>
            <div class="col-6 text-right">
              <h3><a href="{{ route('division.add') }}" type="button" class="btn btn-primary">Add Division</a></h3>          
            </div>
      </div>
        <div class="row">
            @if(Session::has('success'))
              <div class="alert alert-success">
                  <p>{{ Session::get('success')}}</p>
              </div>      
             @endif
          <div class="col-md-12">
              <table class="table table-bordered table-dark text-center">
                <thead>
                  <tr>
                    <th scope="col">Sl.No#</th>
                    <th scope="col">Division Name</th>
                    <th scope="col">Action</th>               
                  </tr>
                </thead>
                <tbody>
                  @foreach($alldata as $key => $division)
                      <tr>
                        <th># {{ $key+1 }}</th>
                        <td>{{ $division->name}}</td>
                        <td>
                          <a title="Edit" href="{{ route('division.edit', $division->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                          <a title = "Delete" href="{{ route('division.delete', $division->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div><!-- ./col -->
        </div> <!-- End row div -->
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 </div>
 @endsection