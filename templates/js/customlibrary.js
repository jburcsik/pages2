/**
 * --------------------------------------------------------------------
 * Custom Library
 * Version: 0,1, 14.11.2009
 * by Jesse Burcsik, jesseburcsik@gmail.com
 *  
 */

function fixPngs(){
        $(document).pngFix(); 
}

function optionsarelinks(){
		$('.optionlinks').click(function(){
			var optionlinkto = $(this).attr('value');
			alert(optionlinkto);
			window.location = optionlinkto;
		});
}

