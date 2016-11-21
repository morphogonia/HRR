<html>
<head>
	<title>Humberto Ríos » Fotografía</title>
	<?php include('inc/head.inc'); ?>	
</head>
<body>

<!-- ******************************************************** -->
<!-- ******************************************************** -->
<?php 
include('inc/header.inc');
?>

<div class="desv">

<div id="pieza">
	<img src="images/ajax-loader.gif" />
</div>

<div id="footer">
	<a href="#" id="prev"><</a> <span id="contador"></span> <a href="#" id="next">></a>	
	<div class="clearfix"></div>
</div><!-- footer -->

</div><!-- /desv -->

<?php
$thumb = @mysql_query("SELECT * FROM tb_noticias ORDER BY id DESC");
$c=0;
$b=0;
while ($fila = mysql_fetch_array($thumb)) {
	echo('<a href="#" rel="'. $b .'" class="thb">'); $b++;
	if ($c<4) {
		echo('<img src="photos/'. utf8_encode($fila['thumb']) .'" class="mr10 mb10"/>');
		$c++;
	} else {
		echo('<img src="photos/'. utf8_encode($fila['thumb']) .'" class="mb10"/>');
		$c=0;	
	}
	echo('</a>');
}
?>

<!-- ******************************************************** -->
</div><!-- Wrapper -->

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){

var counter=0;
var images=[];

function carga(){
	$('html:not(:animated),body:not(:animated)').animate({ scrollTop: 0}, 500);	
	$('div#pieza').html('<img src="images/ajax-loader.gif" />');
	var loadImg = 'photos/' + images[counter];
	var img = new Image();
	$(img).load(function () {	
		$('div#pieza').hide();
		$('div#pieza').html(this);
		$('span#contador').html((counter+1)+' / '+images.length);
		$('div#pieza').fadeIn(600);
	}).attr('src', loadImg);
}

$(function(){
	$.ajax({                                      
		url: 'datan.php',
		dataType: 'json',
		success: function(data) {
			$.each(data, function() {
				images.push(this['image']);
			});
			carga();
     	} 
    });
}); 

$('.thb').hover(function(){
	$(this).animate({ opacity: 1}, 300);
}, function(){
	$(this).animate({ opacity: 0.4}, 500);
});

$('.thb').click(function(){
	counter=$(this).attr('rel');
	counter = parseInt(counter);
	carga();
});


$('#next').click(function(){
	counter++;
	if(counter>=images.length) {
		counter=0;
	}
	carga();
});
 
$('#prev').click(function(){
	counter--;
	if(counter<0) {
		counter=(images.length-1);
	}
	carga();
});

 
});


/* -- ANALYTICS -- */
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-45549261-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
</script>  
  
  