@extends('layouts/app')

@section('title', 'Users')

@section('sidebar')
    @parent
	<nav>
	    <ul>
	    	<li>1</li>
	    	<li>2</li>
	    	<li>3</li>
	    	<li>4</li>
	    	<li>5</li>
	    	<li>6</li>
	    </ul>
	</nav>
@endsection

@section('content')

	<h2>Crud With Vue JS</h2>
	<div id="UserController">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Address</th>
					<th>Phone</th>
				</tr>
			</thead>

			<tbody>
				<tr v-for="user in users">
					<td>@{{ user.id }}</td>
					<td>@{{ user.name }}</td>
					<td>@{{ user.email }}</td>
					<td>@{{ user.address }}</td>
					<td>@{{ user.phone }}</td>
				</tr>
			</tbody>
		</table>
	</div>

@endsection

@push('scripts')

	<script src="/js/user.js"></script>

@endpush