@extends('includes.signlayout')
@section('sign-content')

<form class="login100-form validate-form flex-sb flex-w" method="POST" action="/signup">
	{{ csrf_field() }}
	<span class="login100-form-title p-b-51">
		Sign Up
	</span>

	<div class="wrap-input100 validate-input m-b-16" data-validate = "Name is required">
		<input class="input100" type="text" name="name" placeholder="Name">
		<span class="focus-input100"></span>
	</div>

	<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
		<input class="input100" type="text" name="username" placeholder="Username">
		<span class="focus-input100"></span>
	</div>
	
	<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
		<input class="input100" type="email" name="email" placeholder="Email">
		<span class="focus-input100"></span>
	</div>

	<div class="wrap-input100 validate-input m-b-16" data-validate = "Phone is required">
		<input class="input100" type="text" name="phone" placeholder="Phone">
		<span class="focus-input100"></span>
	</div>

	<div class="wrap-input100 validate-input m-b-16" data-validate = "Address is required">
		<input class="input100" type="text" name="address" placeholder="Address">
		<span class="focus-input100"></span>
	</div>

	<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
		<select name="level" class="input100">
			<option value="User">User</option>
			<option value="Admin">Admin</option>
		</select>
		<span class="focus-input100"></span>
	</div>
	
	<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
		<input class="input100" type="password" name="password" placeholder="Password">
		<span class="focus-input100"></span>
	</div>

	<div class="wrap-input100 validate-input m-b-16" data-validate = "Confirm Password is required">
		<input class="input100" type="password" name="conf_password" placeholder="Confirm Password">
		<span class="focus-input100"></span>
	</div>

	<div class="container-login100-form-btn m-t-17">
		<button class="login100-form-btn">
			Sign Up
		</button>
	</div>

</form>


@endsection
	

