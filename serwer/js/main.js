(function($){

	// Sprawdzaj stan na pczątku
	$.post('action.php', {check_state: 1}).done(function(d){

		controls(d.stan);

	});

	 $('input[type=radio]').change(function() {

	 	var state = parseInt(this.value);
	 	var name = $(this).attr("name");

		console.log(name + ' - ' + state);

		$.post('action.php', {name: name, state: state});
	 	
    });

})(jQuery);

function controls(stan) {

	for (var item in stan) {
		if (stan[item]) {
			$('input[type=radio][name=' + item + '][value="1"]').parent().addClass('active');
			$('input[type=radio][name=' + item + '][value="0"]').parent().removeClass('active');
		} else {
			$('input[type=radio][name=' + item + '][value=0]').parent().addClass('active');
			$('input[type=radio][name=' + item + '][value="1"]').parent().removeClass('active');
		}
	}
}