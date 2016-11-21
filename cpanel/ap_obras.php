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

<h3>Estás editando las series</h3>
<h3 class="mt10">Selecciona la serie que quieres editar o agrega una nueva</h3>
<br/>

<ul id="seriePanel">
<?php
$resultado = @mysql_query('SELECT * FROM tb_categorias ORDER BY id ASC');
while ($fila = mysql_fetch_array($resultado)) {
	echo('<li><a href="ap_serie.php?id='.utf8_encode($fila['id']).'" target="_self">'.utf8_encode($fila['title']).'</a></li>');
}
?>
<li><a href="ap_nueva_serie.php" target="_self" id="new">Agregar nueva serie</a></li>
<div class="clearfix"></div>
</ul>




<!-- ************************************************************************ -->
<div class="clearfix"></div><!-- /clearfix -->
</div><!-- /wrapper -->

</body>
</html>
