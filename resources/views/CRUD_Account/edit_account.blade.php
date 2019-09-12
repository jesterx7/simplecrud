@extends('includes.mainlayout')
@section('content')
<div class="container-fluid">
	@include('includes.messages')
	<h1 class="mt-4">Edit Account</h1>
	<br>
	<form action="/edit_account/{{ $userdata->id }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
	      <label for="name">Name:</label>
	      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ $userdata->name }}">
	    </div>
	    <div class="form-group">
	      <label for="username">Username:</label>
	      <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" value="{{ $userdata->username }}" readonly>
	    </div>
	    <div class="form-group">
	      <label for="email">Email:</label>
	      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ $userdata->email }}">
	    </div>
	    <div class="form-group">
	      <label for="password">New Password:</label>
	      <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
	    </div>
	    <div class="form-group">
	      <label for="conf_password">Confirm Password:</label>
	      <input type="password" class="form-control" id="conf_password" placeholder="Confirm Password" name="conf_password">
	    </div>
	    <input type="submit" class="btn btn-success btn-table" value="Update Account" />  <input type="reset" class="btn btn-danger" value="Reset" />
	</form>
</div>

@endsection