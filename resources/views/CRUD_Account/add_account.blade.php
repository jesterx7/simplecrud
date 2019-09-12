@extends('includes.mainlayout')
@section('content')
<div class="container-fluid">
	@include('includes.messages')
	<h1 class="mt-4">Add Account</h1>
	<br>
	<form action="/add_account" method="POST">
		{{ csrf_field() }}
	    <div class="form-group">
	      <label for="name">Name:</label>
	      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
	    </div>
	    <div class="form-group">
	      <label for="username">Username:</label>
	      <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
	    </div>
	    <div class="form-group">
	      <label for="email">Email:</label>
	      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
	    </div>
	    <div class="form-group">
	      <label for="phone">Phone:</label>
	      <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
	    </div>
	    <div class="form-group">
	      <label for="address">Address:</label>
	      <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
	    </div>
	    <div class="form-group">
	      <label for="level">Level:</label>
	      <br>
	      <select name="level">
	      	<option value="Admin">Admin</option>
	      	<option value="User">User</option>
	      </select>
	    </div>
	    <div class="form-group">
	      <label for="password">Password:</label>
	      <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
	    </div>
	    <div class="form-group">
	      <label for="conf_password">Confirm Password:</label>
	      <input type="password" class="form-control" id="conf_password" placeholder="Confirm Password" name="conf_password">
	    </div>
	    <input type="submit" class="btn btn-primary btn-table" value="Add Account" />  <input type="reset" class="btn btn-danger" value="Reset" />
	</form>
</div>

@endsection