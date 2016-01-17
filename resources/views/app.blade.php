<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	{!! Html::style("../boot/css/bootstrap.min.css") !!}
</head>
<body>	
	

	<nav class="navbar navbar-default navbar-inverse">
		<div class="container">
		<div class="navbar-header">
	    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	      	</button>
	      	<a class="navbar-brand" href="/cotblog/public">My Blog</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <form class="navbar-form navbar-left" role="search">
	       		<div class="form-group">
	          		<input type="text" class="form-control" placeholder="Search">
	        	</div>
	        	<button type="submit" class="btn btn-default">Search</button>
	      	</form>
	      	<ul class="nav navbar-nav navbar-right">
	      		@if(Auth::check())
	        		<li><a href="create">Create</a></li>
	        		<li><a href="profile"> {{ Auth::user()->fname }} </a></li>
	        		<li><a href="logout">Logout</a></li>
	        	@else
					<li><a href="register">Sign Up</a></li>
	        		<li><a href="login">Sign In</a></li>
	        	@endif
		    </ul>
	    </div>
	    </div>
	</nav>



	<div class="container">
		@yield('content')

	</div>

	<!--
	<nav class="navbar navbar-default navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<a href="http://cotanz.com" class="navbar-brand">Cotanz.com</a>
		</div>	
	</nav>	
	-->
</body>
</html>