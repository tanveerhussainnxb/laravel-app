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

<h1>Edit {{ $customer->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

<!--Create form using laravel core feature-->	
{{ Form::model($customer, array('route' => array('customers.update', $customer->id), 'method' => 'PUT')) }}


	<!--Create Name field with label-->	
	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<!--Create Email field with label-->	
	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', null, array('class' => 'form-control')) }}
	</div>
    
    <!--Create Address field with label-->	
	<div class="form-group">
		{{ Form::label('address', 'Address') }}
		{{ Form::text('address', null, array('class' => 'form-control')) }}
	</div>
    
    <!--Create City field with label-->	
	<div class="form-group">
		{{ Form::label('city', 'City') }}
		{{ Form::text('city', null, array('class' => 'form-control')) }}
	</div>
    
    <!--Create State field with label-->	
	<div class="form-group">
		{{ Form::label('state', 'State') }}
		{{ Form::text('state', null, array('class' => 'form-control')) }}
	</div>
    
    
    <!--Create Country field with label-->	
	<div class="form-group">
		{{ Form::label('country', 'Country') }}
		{{ Form::text('country', null, array('class' => 'form-control')) }}
	</div>

	<!--Create Customer Level field with label-->	
	<div class="form-group">
		{{ Form::label('customer_level', 'Customer Level') }}
		{{ Form::select('customer_level', array('0' => 'Select a Level', '1' => 'Permanent', '2' => 'Visitor'), null, array('class' => 'form-control')) }}
	</div>

	<!--Create submit button-->	
	{{ Form::submit('Edit the Customer!', array('class' => 'btn btn-primary')) }}

<!--End form-->
{{ Form::close() }}

</div>
</body>
</html>
