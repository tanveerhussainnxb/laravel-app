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

<!--Display informaton related to customer-->
<h1>Showing {{ $customer->name }}</h1>

	<div class="jumbotron text-center">
        <table>
        	<tr>
            	<td align="right" valign="top" width="10%">Name:&nbsp;</td>	
                <td align="left" valign="top" width="90%">{{ $customer->name }}</td>	
            </tr>
            <tr>
            	<td align="right" valign="top" width="10%">Email:&nbsp;</td>	
                <td align="left" valign="top" width="90%">{{ $customer->email }}</td>	
            </tr>
            <tr>
            	<td align="right" valign="top" width="10%">Address:&nbsp;</td>	
                <td align="left" valign="top" width="90%">{{ $customer->address }}</td>	
            </tr>
            <tr>
            	<td align="right" valign="top" width="10%">City:&nbsp;</td>	
                <td align="left" valign="top" width="90%">{{ $customer->city }}</td>	
            </tr>
            <tr>
            	<td align="right" valign="top" width="10%">State:&nbsp;</td>	
                <td align="left" valign="top" width="90%">{{ $customer->state }}</td>	
            </tr>
            <tr>
            	<td align="right" valign="top" width="10%">Country:&nbsp;</td>	
                <td align="left" valign="top" width="90%">{{ $customer->country }}</td>	
            </tr>
            <tr>
            	<td align="right" valign="top" width="10%">Level:&nbsp;</td>	
                <td align="left" valign="top" width="90%">{{ $customer->customer_level }}</td>	
            </tr>
            <tr>
            	<td align="right" valign="top" width="10%">&nbsp;</td>	
                <td align="left" valign="top" width="90%"><a class="btn btn-small btn-info" href="{{ URL::to('customers/' . $customer->id . '/edit') }}">Edit this Customer</a></td>	
            </tr>
        </table>
	</div>

</div>
</body>
</html>
