<? 
session_start();
if (!isset($_SESSION['logged_admin_in'])) {
	header('Location: index.php');
}
?>

<html>
<head>
	<title>Humberto Ríos » Fotografía</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="../favicon.ico" />
	<meta name="author" content="Sandra Bermudez @ bulabe.com" />
	<link rel="stylesheet" href="../style.css" type="text/css" />
	
</head>

<body>
<?php include('../inc/conection.inc'); ?>	

<div id="wrapper">
<!-- ************************************************************************ -->
<div id="headerPanel">
<h1 id="titulo"><a href="private.php" target="_self">humberto ríos rodríguez</a></h1>
<h1 id="titulo"><a href="private.php" target="_self">administrador de contenidos</a></h1>
<div class="clearfix"></div>
<ul id="menuPanel">
	<li><a href="ap_humbertorios.php" target="_self">Bio</a></li>
	<li><a href="ap_obras.php" target="_self">Obras</a></li>
	<li><a href="ap_noticias.php" target="_self">Noticias</a></li>
	<li><a href="ap_contacto.php" target="_self">Contacto</a></li>	
	<li><a href="logout.php" target="_self">Salir</a></li>
	<div class="clearfix"></div>
</ul>
<div class="clearfix"></div>
</div><!-- / HEADER -->
<!-- ************************************************************************ -->

<a href="private.php" target="_self" id="cancel">Cancelar acción</a>
<div class="clearfix"></div>

<h3>Estás editando las noticias</h3>
<h3>Si deseas eliminar una noticia da click en eliminar</h3>
<h3>Para agregar una nueva noticia utiliza el formulario de abajo</h3>
<br/>

<ul id="noticias">
<?php
$resultado = @mysql_query('SELECT * FROM tb_noticias ORDER BY id DESC');
$num_rows = 0;
while ($fila = mysql_fetch_array($resultado)) {
	echo('<li><div class="ov"><img src="../photos/'.utf8_encode($fila['thumb']).'"/></div>');
	echo('<a href="ap_noticias_del.php?id='.utf8_encode($fila['id']).'" target="_self" onclick="return confirm(\'&iquest;Seguro que deseas eliminar esta noticia? Esta acción no se puede revertir\');">ELIMINAR</a>');
	echo('</li>');
	$num_rows++;
}
?>
<div class="clearfix"></div>
</ul>

<div id="footer">
<h3>Cada noticia consta de dos imágenes:</h3>
<h3>la imagen completa debe medir máximo 920px de ancho por lo que de proporcionalmente de alto.</h3>
<h3>La imagen pequeña, llamada thumbnail, es la que aparece en la zona inferior.</h3>
<h3>Debe medir 175px de ancho por 120px de alto.</h3>
<h3>* Las imágenes deben tener una resolución de 72 ppi. Los formatos posibles son: jpg, gif, png</h3>

<form enctype="multipart/form-data" id="login" action="ap_noticias_add.php?ord=<? echo utf8_encode($num_rows); ?>" method="post">
	<label>Imagen completa:</label>
	<input type="file" id="ufile[]" name="ufile[]" class="requerido"/>
	
	<label>Thumbnail:</label>
	<input type="file" id="ufile[]" name="ufile[]" class="requerido"/><br/>
		
	<div class="clearfix"></div><!-- /clearfix -->
	<input type="submit" value="Agregar" name="submit" id="submit" />
	<div class="clearfix"></div><!-- /clearfix -->
</form>


</div>



<!-- ************************************************************************ -->
<div class="clearfix"></div><!-- /clearfix -->
</div><!-- /wrapper -->

</body>
</html>
