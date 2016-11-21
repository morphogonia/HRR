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

<h3 class="mt20">Bienvenido Humberto</h3>
<h3>Esta es la imagen de la página de inicio</h3><br/>

<?php
	$img = @mysql_query("SELECT * FROM tb_index WHERE id=1");
	$fila = mysql_fetch_array($img);
	echo ('<img src="../photos/'.utf8_encode($fila['image']).'"/>');
?>

<br/><br/>
<h3>Para cambiarla seleccionala y luego da click en subir</h3>
<h3>El tamaño recomendado para la imagen es de 920px de ancho por lo que de proporcionalmente de alto</h3>
<h3>* Las imágenes deben tener una resolución de 72 ppi. Los formatos posibles son: jpg, gif, png</h3>

<form enctype="multipart/form-data" id="login" action="ap_index_ed.php" method="post">
	<label>Imagen:</label>
	<input type="file" id="ufile[]" name="ufile[]" class="requerido"/>

	<div class="clearfix"></div><!-- /clearfix -->
	<input type="submit" value="Subir" name="submit" id="submit" />
	<div class="clearfix"></div><!-- /clearfix -->
</form>



<!-- ************************************************************************ -->
<div class="clearfix"></div><!-- /clearfix -->
</div><!-- /wrapper -->

</body>
</html>
