<!DOCTYPE html>
<html>
<head>
	<title>About | Cotanz College Connect</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="#">Cotanz College Connect</a>
    		</div>
    		<ul class="nav navbar-nav navbar-right">
      			<li class="active">
      				<a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
      			</li>
    		</ul>
  		</div>
	</nav>
	


	<div class="container">
		@foreach($questions as $question)
			<div class="well">
				{{ $question['question']}}<br/>
					A. {{ $question['optiona'] }}
					B. {{ $question['optionb'] }}
					C. {{ $question['optionc'] }}
					D. {{ $question['optiond'] }}
			</div>
		@endforeach
		

	</div>
		
</body>
</html>