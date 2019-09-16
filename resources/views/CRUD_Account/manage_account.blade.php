@extends('includes.mainlayout')
@section('content')

<div class="container-fluid">
	@include('includes.messages')
	<h1 class="mt-4">Manage Account</h1>
	<br>
	<a class="btn btn-primary" href="/add_account"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 15px; color: white;"></i> Add Data</a>
	<table class="table fixed-table" style="margin-top: 10px;">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Username</th>
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">Phone</th>
				<th scope="col">Address</th>
				<th scope="col">Level</th>
				<th scope="col">Change / Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
			      <th scope="row">{{ $user->username }}</th>
			      <td>{{ $user->name }}</td>
			      <td>{{ $user->email }}</td>
			      <td>{{ $user->phone }}</td>
			      <td>{{ $user->address }}</td>
			      <td>{{ $user->level }}</td>
			      <td><a href="/edit_account/{{ $user->id }}" class="btn btn-success btn-table same-btn-size">Edit</a>  
			      <a href="/delete_account/{{ $user->id }}" class="btn btn-danger same-btn-size" onclick="return confirm('Are you sure want to delete ?')">Delete</a></td>
			    </tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection