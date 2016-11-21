
$(document).ready(function(){

/*************************************/

$('ul#menuSeries, img#foto, div.desv').hide();
$('img#foto, div.desv').fadeIn(700);


/*************************************/
/* 	NAVEGACIÓN */

$('ul#menuSeries').hide();

$('ul#menuObra li a#noticias, ul#menuObra li a#blog').hover(function(){
	$('ul#menuSeries').fadeOut(500);
});

$('ul#menuObra li a#obra').hover(function(){
	$('ul#menuSeries').fadeIn(800);
});

$('ul#menuSeries').mouseleave(function(){
	$(this).fadeOut(500);
});

}); /* / document ready */



