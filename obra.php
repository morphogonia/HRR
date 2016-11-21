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
$id = $_GET['id'];
?>

<div class="desv">

<div id="content">
	<div id="pieza"><img src="images/ajax-loader.gif" /></div>
<?php
	$texto = @mysql_query("SELECT * FROM tb_categorias WHERE id='$id'");
	$fila = mysql_fetch_array($texto);
	echo ('<div id="statement"><a href="#" id="clos">X</a><h3>' . utf8_encode($fila['title']) .' / '. utf8_encode($fila['dat']). '</h3>' . utf8_encode($fila['statement']) . '</div>');
?>
</div>

<div id="footer">
	<div id="caption"></div>
	<a href="#" id="prev"><</a> <span id="contador"></span> <a href="#" id="next">></a>	
	<a href="#" id="state">Statement</a>
	<div class="clearfix"></div>
</div><!-- footer -->

<?php
$thumb = @mysql_query("SELECT * FROM tb_images WHERE cat='$id' ORDER BY id ASC");
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

</div><!-- /desv -->
<a id="s"></a>

<!-- ******************************************************** -->
</div><!-- Wrapper -->

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){

$('#statement').hide();

var counter=0;
var images=[];
var caption=[];

function carga(){
	$('html:not(:animated),body:not(:animated)').animate({ scrollTop: 0}, 500);
	$('div#pieza').html('<img src="images/ajax-loader.gif" />');
	var loadImg = 'photos/' + images[counter];
	var img = new Image();
	$(img).load(function () {	
		$('div#pieza').hide();
		$('div#pieza').html(this);
		$('div#caption').html(caption[counter]);
		$('span#contador').html((counter+1)+' / '+images.length);
		$('div#pieza').fadeIn(600);
	}).attr('src', loadImg);
}

$(function(){
	$.ajax({                                      
		url: 'data.php',
		data: 'id=<?php echo $id; ?>',
		dataType: 'json',
		success: function(data) {
			$.each(data, function() {
				images.push(this['image']);
				caption.push(this['desc']);
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
	$('#statement').fadeOut(500);
	$('#statement').fadeOut(500);
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

/*****************************************************/

$('#state').click(function(){
	$('html:not(:animated),body:not(:animated)').animate({ scrollTop: 0}, 500);	
	$('#statement').fadeIn(600);
	return false;
});

$('#statement').click(function(){
	$(this).fadeOut(500);
});

$('#clos, div#pieza, #next, #prev').click(function(){
	$('html:not(:animated),body:not(:animated)').animate({ scrollTop: 0}, 500);
	$('#statement').fadeOut(500);
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
  
  