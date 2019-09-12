@extends('includes.mainlayout')
@section('content')
<div class="container-fluid">
	@include('includes.messages')
	<h1 class="mt-4">Add Data</h1>
	<br>
	<form action="/add_data" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
	    <div class="form-group">
	      <label for="name">Name:</label>
	      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
	    </div>
	    <div class="form-group">
	      <label for="email">Email:</label>
	      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
	    </div>
	    <div class="form-group">
	    	<div class="row">
		    	<div class="column">
		    		<label for="dob">Date Of Birth:</label>
		      		<input type="date" class="form-control" id="dob" placeholder="Enter Date" name="dob">
		    	</div>
		    	<div class="column">
		    		<label for="phone">Phone</label>
		      		<input type="number" class="form-control" id="phone" placeholder="Enter Number" name="phone">
		    	</div>
		    </div>
	    </div>
	    <div class="form-group">
	    	<div class="form-check-inline">
		      <label class="form-check-label" for="radio1">
		        <input type="radio" class="form-check-input" id="maleradio" name="gender" value="male">Male
		      </label>
		    </div>
		    <div class="form-check-inline">
		      <label class="form-check-label" for="radio2">
		        <input type="radio" class="form-check-input" id="femaleradio" name="gender" value="female">Female
		      </label>
		    </div>
	    </div>
	    <div class="form-group">
	      <label for="photo">Image:</label><br>
	      <img src="<?php echo('storage/images/defaultimage.jpg') ?>" class="displayImage" alt="default image">
	      <br>
	      <br>
	      <input type="file" class="form-control" id="photoData" name="image">
	    </div>
	    <input type="submit" class="btn btn-primary btn-table" value="Add Data" />  <input type="reset" class="btn btn-danger" value="Reset" />
  	</form>
</div>
@endsection