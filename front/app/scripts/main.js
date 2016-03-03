console.log('\'Allo \'Allo!');

function readURL(input, nextEl) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $(nextEl).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$("#pp-input-image").change(function() {
	/* Act on the event */
	nextEl = "#prof-pic-form";
	readURL(this, nextEl);
});

$("#education-input-image").change(function() {
	/* Act on the event */
	nextEl = "#education-pic-form";
	readURL(this, nextEl);
});

$("#professional-input-image").change(function() {
	/* Act on the event */
	nextEl = "#professional-pic-form";
	readURL(this, nextEl);
});

$("#project-input-image").change(function() {
	/* Act on the event */
	nextEl = "#project-pic-form";
	readURL(this, nextEl);
});





