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
<div id="epigrafe">

<?php
$id = $_GET['id'];
$resultado = @mysql_query("SELECT * FROM tb_categorias WHERE id='$id'");
$fila = mysql_fetch_array($resultado);
echo ( utf8_encode($fila['epigrafe']) );
?>
</div><!-- epigrafe -->

<div id="footer">	
<?php echo('<a href="obra.php?id='.$id.'" id="ver" class="floatr">Ver fotos</a>'); ?>
<div class="clearfix"></div>
</div><!-- footer -->

</div><!-- /desv -->


<!-- ******************************************************** -->
</div><!-- Wrapper -->

</body>
</html>

<script type="text/javascript">
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