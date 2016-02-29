<!DOCTYPE html>
<html>
<head>
	<title>About | Cotanz College Connect</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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

		@if($errors->any())
			<ul class="alert alert-danger">
				@foreach ($errors->all() as $error)

					<li> {{ $error }} </li>
				@endforeach
			</ul>
		@endif
		
		{{ Form::open(array('class' => 'form-horizontal', 'role' => 'form','route' => 'questions.store')) }}
			
			<div class="form-group">
				{{ Form::label('question','Question:',array('class' => 'control-label col-sm-2')) }}
				<div class="col-sm-10">
					{{ Form::textarea('question',NULL,array('class' => 'form-control', 'placeholder' => 'e.g. When did Cotanz mkae its first IPO?', 'required' => 'required')) }}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-1">
					{{ Form::radio('answer','A',FALSE,array('class' => 'control-label')) }}
					{{ Form::label('optiona','A.',array('class' => 'control-label')) }}
				</div>
				<div class="col-sm-4">
					{{ Form::text('optiona',NULL,array('class' => 'form-control', 'placeholder' => 'e.g. 2016', 'required' => 'required','title' => 'Enter Option A')) }}
				</div> 
				<div class="col-sm-1">	
					{{ Form::radio('answer','B',FALSE,array('class' => 'control-label')) }}
					{{ Form::label('optionb','B.',array('class' => 'control-label')) }}
				</div>
				<div class="col-sm-4">
					{{ Form::text('optionb',NULL,array('class' => 'form-control', 'placeholder' => 'e.g. 2018', 'required' => 'required','title' => 'Enter Option B')) }}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-1">
					{{ Form::radio('answer','C',FALSE,array('class' => 'control-label')) }}
					{{ Form::label('optionc','C.',array('class' => 'control-label')) }}
				</div>
				<div class="col-sm-4">
					{{ Form::text('optionc',NULL,array('class' => 'form-control', 'placeholder' => 'e.g. 2016', 'required' => 'required','title' => 'Enter Option C')) }}
				</div> 
				<div class="col-sm-1">	
					{{ Form::radio('answer','D',FALSE,array('class' => 'control-label')) }}
					{{ Form::label('optiond','D.',array('class' => 'control-label')) }}
				</div>
				<div class="col-sm-4">
					{{ Form::text('optiond',NULL,array('class' => 'form-control', 'placeholder' => 'e.g. 2018', 'required' => 'required','title' => 'Enter Option D')) }}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-10">
					{{ Form::submit('Add',array('class' => 'form-control btn btn-primary')) }}
				</div>
			</div>
			
		{{ Form::close() }}
	</div>
</body>
</html>