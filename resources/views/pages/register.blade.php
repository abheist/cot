<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="description" content="Woohoo"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Cotanz</title><link rel="icon" href="../front/dist/logoBlack.png"><link rel="apple-touch-icon" href="../front/dist/logoBlack.png"><link rel="stylesheet" href="../front/dist/styles/signup.css"><!-- Place favicon.ico in the root directory --><link rel="stylesheet" href="../front/dist/styles/vendor.css"><link rel="stylesheet" href="../front/dist/styles/main.css"></head><body><!--[if lt IE 10]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]--><div class="outerBox">
    <div class="innerBox"><div class="cotanzLogo" style="background: url(../front/dist/logo_white.png); height: 130px; width: 130px; background-size: contain; background-position: center; margin: 10px auto"></div>
   

	{!! Form::open() !!}
    
    <div class="inputOuterDiv">
    	<div class="inputLogo inputLogo1">
    		<i class="fa fa-user inputIconFa"></i>
    	</div>
    	<div class="inputLogoInside">
    		{!! Form::text('fname',null,['placeholder' => 'First Name','class'=>'inputField inputField1']) !!}
    		<!--<input type="text" placeholder="First Name" class="inputField inputField1">-->
    	</div>
    </div>
    <div class="inputOuterDiv inputOuterDiv2">
    	<div class="inputLogo inputLogo2">
    		<i class="fa fa-smile-o inputIconFa"></i>
    	</div>
    	<div class="inputLogoInside">
    		{!! Form::text('lname',null,['placeholder' => 'Last Name','class'=>'inputField inputField2']) !!}
    		<!--<input type="text" placeholder="Last Name" class="inputField inputField2">-->
    	</div>
    </div>
    <div class="inputOuterDiv inputOuterDiv3">
    	<div class="genderIcon genderIcon1">
    		<div class="genderIconInner genderIconInner1">
    			<i class="fa fa-male fa-2x"></i>
    		</div>
    		<div class="genderIconInner genderIconInner2">
    			{!! Form::radio('gender', '0',false,['class' => 'radioGender']) !!}
    			<!--<input type="radio" name="gender" value="male" class="radioGender">-->
    		</div>
    	</div>
    	<div class="genderIcon genderIcon2">
    		<div class="genderIconInner genderIconInner3">
    			{!! Form::radio('gender', '1', false,['class' => 'radioGender']) !!}
    			<!--<input type="radio" name="gender" value="female" class="radioGender">-->
    		</div>
    		<div class="genderIconInner genderIconInner4">
    			<i class="fa fa-female fa-2x"></i>
    		</div>
    	</div>
    </div>
    <div class="inputOuterDiv inputOuterDiv4">
    	<div class="inputLogo inputLogo3">
    		<i class="fa fa-envelope inputIconFa"></i>
    	</div>
   	 	<div class="inputLogoInside">
   	 		{!! Form::email('email',null,['placeholder' => 'E-mail Id','class'=>'inputField inputField3']) !!}
    		<!--<input type="text" placeholder="E-mail Id" class="inputField inputField3">-->
    	</div>
    </div>
    <div class="inputOuterDiv">
    	<div class="inputLogo inputLogo4">
    		<i class="fa fa-user-secret inputIconFa"></i>
    	</div>
    	<div class="inputLogoInside">
    		{!! Form::password('password',['placeholder' => 'Password','class'=>'inputField inputField4']) !!}
    		<!--<input type="password" placeholder="Password" class="inputField inputField4">-->
    	</div>
    </div>
    <div class="inputOuterDiv">
    	<div class="inputLogo inputLogo4">
    		<i class="fa fa-user-secret inputIconFa"></i>
    	</div>
    	<div class="inputLogoInside">
    		{!! Form::password('cnfrmpassword',['placeholder' => 'Confirm Password','class'=>'inputField inputField4']) !!}
    		<!--<input type="password" placeholder="Password" class="inputField inputField4">-->
    	</div>
    </div>
    <button class="submitButtonInput">Sign Up</button>
   
    {!! Form::close() !!}
    </div></div><!-- Google Analytics: change UA-XXXXX-X to be your site's ID. --><script src="scripts/vendor.js"></script><script src="scripts/main.js"></script></body></html>