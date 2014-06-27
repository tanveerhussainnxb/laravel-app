<!DOCTYPE html>
<html>
<head>
	<!--Web page title-->
	<title>Look! I'm CRUDding</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<!--Navigation links for customer-->
<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('customers') }}">Customer Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('customers') }}">View All Customers</a></li>
		<li><a href="{{ URL::to('customers/create') }}">Create a Customer</a>
	</ul>
    <ul class="nav navbar-nav" style="float:right">
        <li><a href="{{URL::to('user/logout')}}">Logout</a></li>
	</ul>
</nav>

<h1>All the Customers</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td>Customer Level</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>    
    @if($customers)
    @foreach($customers as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->email }}</td>
			<td>{{ $value->customer_level }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the customer (uses the destroy method DESTROY /customers/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->
				{{ Form::open(array('url' => 'customers/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Customer', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the customer (uses the show method found at GET /customers/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('customers/' . $value->id) }}">Show this Customer</a>

				<!-- edit this customer (uses the edit method found at GET /customers/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('customers/' . $value->id . '/edit') }}">Edit this Customer</a>

			</td>
		</tr>
	@endforeach
	@endif
    
	</tbody>
</table>

</div>
</body>
</html>
