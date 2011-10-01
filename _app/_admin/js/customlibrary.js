/**
 * --------------------------------------------------------------------
 * Custom Library
 * Version: 0,1, 08 2011
 * by Jesse Burcsik, jesseburcsik@gmail.com
 *  
 */

function fixPngs(){
        $(document).pngFix(); 
}

// Script to run alldropdown.php - http://actafoo.com/pages/scripts/alldropdown.php
//
// Need to abstract the URL so it can be generic!
//
function scriptlinks(scriptname){
	$('#'+ scriptname +' button').click(function(){
//	alert(scriptname);
  	$.get('/pages/scripts/scriptstamp.php', { scriptrun: scriptname});
 
	$('#'+ scriptname +' p').html("<img src='/pages/_app/lib/img/loader.gif' title='loader' />");
	$.get('/pages/scripts/'+ scriptname +'.php')
//	.success(function() { alert("finished running script"); })
  	.error(function() { alert("error"); })
  	.complete(function() { $('#'+ scriptname +' p').html('Task completed') });
	return false;
 });
 
 }