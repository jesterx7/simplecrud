@extends('includes.signlayout')
@section('sign-content')

<form class="login100-form validate-form flex-sb flex-w" method="POST" action="/login">
	{{ csrf_field() }}
	<span class="login100-form-title p-b-51">
		Login
	</span>

	<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
		<input class="input100" type="text" name="username" placeholder="Username">
		<span class="focus-input100"></span>
	</div>
	
	
	<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
		<input class="input100" type="password" name="password" placeholder="Password">
		<span class="focus-input100"></span>
	</div>

	<div class="flex-sb-m w-full p-t-3 p-b-24">
		<div>
			Not Sign Up yet ? 
			<a href="/signup" class="txt1">
			Sign Up Here
			</a>
		</div>
	</div>

	<div class="container-login100-form-btn m-t-17">
		<button class="login100-form-btn">
			Login
		</button>
	</div>

</form>

@endsection