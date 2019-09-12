@extends('includes.mainlayout')
@section('content')
<div class="container-fluid">
	<ul>
		@foreach($data as $d)
			<li>{{ $d }}</li>
		@endforeach
	</ul>
</div>
@endsection