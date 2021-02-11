(function($) {
	$(document).ready(function(){
		var select_nastavnici = $('.s2');
		if(select_nastavnici)
		{
			select_nastavnici.select2({
				width: '100%',
      			placeholder: 'Kliknite ovdje za odabir nastavnika'
			});
		}
	});
})(jQuery);