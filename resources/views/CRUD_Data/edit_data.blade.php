@extends('includes.mainlayout')
@section('content')
<div class="container-fluid">
	@include('includes.messages')
	<h1 class="mt-4">Edit Data</h1>
	<br>
	<form action="/edit_data/{{ $data_id }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
	    <div class="form-group">
	      <label for="name">Name:</label>
	      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ $data[0] }}" readonly>
	    </div>
	    <div class="form-group">
	      <label for="email">Email:</label>
	      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ $data[1] }}">
	    </div>
	    <div class="form-group">
	    	<div class="row">
		    	<div class="column">
		    		<label for="dob">Date Of Birth:</label>
		      		<input type="date" class="form-control" id="dob" placeholder="Enter Date" name="dob" value="{{ $data[2] }}">
		    	</div>
		    	<div class="column">
		    		<label for="phone">Phone</label>
		      		<input type="number" class="form-control" id="phone" placeholder="Enter Number" name="phone" value="{{ $data[3] }}">
		    	</div>
		    </div>
	    </div>
	    <div class="form-group">
	    	<div class="form-check-inline">
		      <label class="form-check-label" for="radio1">
		        @if($data[4] == "male")
		        	<input type="radio" class="form-check-input" id="maleradio" name="gender" value="male" checked>Male
		        @else
		        	<input type="radio" class="form-check-input" id="maleradio" name="gender" value="male">Male
		        @endif
		      </label>
		    </div>
		    <div class="form-check-inline">
		      <label class="form-check-label" for="radio2">
		        @if($data[4] == "female")
		        	<input type="radio" class="form-check-input" id="femaleradio" name="gender" value="female" checked>Female
		        @else
		        	<input type="radio" class="form-check-input" id="femaleradio" name="gender" value="female">Female
		        @endif
		      </label>
		    </div>
	    </div>
	    <input type="text" name="imagefilename" hidden="true" value="{{ $data[5] }}" />
	    <div class="form-group">
	      <label for="photo">Image:</label><br>
	      <img src="<?php echo asset('storage/images/' .  $data[5]) ?>" class="displayImage" alt="default image">
	      <br>
	      <br>
	      <input type="file" class="form-control" id="editPhotoData" name="image">
	    </div>
	    <input type="submit" class="btn btn-success btn-table" value="Update Data" />  <input type="reset" class="btn btn-danger" value="Reset" />
  	</form>
</div>
@endsection