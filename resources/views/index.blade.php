@extends('includes.mainlayout')
@section('content')

<div class="container-fluid">
  <h1 style="font-family: 'Oxygen'; font-weight: bold;" class="mt-4">{{ Session::get('name') }}</h1>
  <br>
  <h3 style="font-family: 'Libre Baskerville', serif; font-weight: bold;">{{ Session::get('level') }}</h3>
  <hr><br>
  <div class="list-group user-feature">
	<p><i class="fa fa-envelope fa-fw feature" aria-hidden="true"></i>&nbsp; &nbsp; {{ Session::get('email') }}</p>
	<p><i class="fa fa-phone fa-fw feature" aria-hidden="true"></i>&nbsp; &nbsp; {{ Session::get('phone') }}</p>
	<p><i class="fa fa-map-marker fa-fw feature" aria-hidden="true"></i>&nbsp; &nbsp; {{ Session::get('address') }}</p>
  </div>

</div>

@endsection