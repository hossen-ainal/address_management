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
	              <li class="breadcrumb-item active text-white">Edit</li>
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
        <div class="row mt-3">
            <div class="col-6">
              <h3 class="bg-success text-center"> Edit Division </h3>          
            </div>
            <div class="col-6 text-right">
              <h3><a href="{{ route('division.view') }}" type="button" class="btn btn-primary">View Division</a></h3>          
            </div>
      </div>
        <div class="row">
          <div class="col-md-6 m-auto">
             <form action="{{ route('division.update', $editData->id ) }}" method="POST">
              @csrf
                  <div class="form-group">
                    <label>Division Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Write Division Name" value="{{ $editData->name }}">
                  </div>
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <br>
                  <button type="submit" class="btn btn-primary">Update</button>
              </form>
          </div><!-- ./col -->
        </div> <!-- End row div -->
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 </div>
 @endsection