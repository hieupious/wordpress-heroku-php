(function( $, window, document, undefined ) {
	if( $('.easy-profile-tabs').length > 0 ){
		$('.easy-profile-tabs').tabs({ active: 0 });
	}
	$(document).on('widget-updated widget-added', function(e, widget){
    	if( $('.easy-profile-tabs').length > 0 ){
			$('.easy-profile-tabs').tabs({ active: 0 });
		}
	});

})( jQuery, window, document );