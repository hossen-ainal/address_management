@extends('backend.layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	    <div class="content-header bg-secondary text-white">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0"> Manage Upzilla</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6 ">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item text-white"><a href="#">Upzilla</a></li>
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
              <h3 class="bg-success text-center"> Edit Upzilla </h3>          
            </div>
            <div class="col-6 text-right">
              <h3><a href="{{ route('upzillas.view') }}" type="button" class="btn btn-primary">View Upzilla</a></h3>          
            </div>
      </div>
        <div class="row">
          <div class="col-md-6 m-auto">
             <form action="{{ route('upzillas.update', $editData->id)}}" method="POST">
              @csrf
                  <div class="form-group">
                    <label>Division Name</label>
                   <select name="division_id" id="division_id" class="form-control" required>
                     <option value="">Select Division</option>
                     @foreach( $divisions as $division)
                      <option value="{{ $division->id }}" {{ ( $editData->division_id == $division->id)?"selected":"" }}>{{ $division->name }}</option>
                     @endforeach
                   </select>
                  </div>
                  <div class="form-group">
                    <label>District Name</label>
                    <select name="district_id" id="district_id" class="form-control" required>
                      <option value="">Select District</option>
                   </select>
                  </div>
                  <div class="form-group">
                    <label>Upzilla Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Write Upzilla Name" value="{{ $editData->name }}">
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


<script>  
    $(function(){
      $(document).on('change','#division_id',function(){
         var division_id = $(this).val();
         $.ajax({
            type:"GET",
            url:"{{ route('default.get-district') }}",
            data:{division_id:division_id},           
            success:function(data){
              var html = '<option value="">Select District</option>';
              $.each(data, function(key,v){
                html += '<option value="'+v.id+'">'+v.name+'</option>';
              });
              $('#district_id').html(html);

              var district_id = "{{ $editData->district_id }}";
              if(district_id !=''){
                $('#district_id').val(district_id);
              }
            }
         });
      });
    });
</script>

<script>
  $(function(){
    var division_id = "{{ $editData->division_id }}";
    if(division_id){
      $("#division_id").val(division_id).trigger('change');
    }
  });
</script>





 @endsection