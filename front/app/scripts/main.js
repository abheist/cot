console.log('\'Allo \'Allo!');
$(document).ready(function() {
	$('.signInBox').hide('fast', function() {});
	$('.helloButtonLogin').click(function(event) {
		/* Act on the event */
		$('.signInBox').show('fast', function() {
			
		});
		$('.signUpBox').hide('fast', function() {
			
		});
	});	
	$('.helloButtonSignup').click(function(event) {
		/* Act on the event */
		$('.signUpBox').show('fast', function() {
			
		});
		$('.signInBox').hide('fast', function() {
			
		});
	});
});