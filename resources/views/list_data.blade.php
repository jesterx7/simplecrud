@extends('includes.mainlayout')
@section('content')

<div class="container-fluid">
	<h1 class="mt-4">List Data</h1>
	<br>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">Date of Birth</th>
				<th scope="col">Phone</th>
				<th scope="col">Gender</th>
			</tr>
		</thead>
		<tbody>
			@foreach($list_data as $data)
				<tr>
			      <th scope="row">{{ $data[0] }}</th>
			      <td>{{ $data[1] }}</td>
			      <td>{{ $data[2] }}</td>
			      <td>{{ $data[3] }}</td>
			      <td>{{ $data[4] }}</td>
			    </tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection