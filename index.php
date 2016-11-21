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

<div id="pieza">
<?php
	$img = @mysql_query("SELECT * FROM tb_index WHERE id=1");
	$fila = mysql_fetch_array($img);
	echo ('<img src="photos/'.utf8_encode($fila['image']).'"/>');
?>
</div>

<!-- ******************************************************** -->
</div><!-- Wrapper -->

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
	$('div#pieza').hide();
	$('div#pieza').fadeIn(600);
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
