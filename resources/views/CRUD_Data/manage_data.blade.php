@extends('includes.mainlayout')
@section('content')

<div class="container-fluid">
	@include('includes.messages')
	<h1 class="mt-4">Manage Data</h1>
	<br>
	<a class="btn btn-primary" href="/add_data"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 15px; color: white;"></i> Add Data</a>
	<table class="table" style="margin-top: 10px;">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">Date of Birth</th>
				<th scope="col">Phone</th>
				<th scope="col">Gender</th>
				<th scope="col">Edit / Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($list_data as $data)
				<tr>
			      <th scope="row"><img src="<?php echo asset('storage/images/'. str_replace(' ', '', $data[5])) ?>" class="circleImage" alt="default image">{{ $data[0] }}</th>
			      <td>{{ $data[1] }}</td>
			      <td>{{ $data[2] }}</td>
			      <td>{{ $data[3] }}</td>
			      <td>{{ $data[4] }}</td>
			      <td><a href="edit_data/{{ $data[6] }}" class="btn btn-success btn-table">Edit</a>  
			      <a href="/delete_data/{{ $data[6] }}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')">Delete</a></td>
			    </tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection