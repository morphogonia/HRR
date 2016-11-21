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
	<link rel="stylesheet" href="../js/jwysiwyg/default.css" type="text/css" />
	<link rel="stylesheet" href="../js/jwysiwyg/jquery.wysiwyg.css" type="text/css" />
	
	<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="../js/jwysiwyg/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="../js/jwysiwyg/default.js"></script>
	<script type="text/javascript" src="../js/jwysiwyg/wysiwyg.image.js"></script>
	
	<script type="text/javascript" charset="utf-8">
	//<![CDATA[
		$(document).ready(function(){
			$('#epigrafe, #statement').wysiwyg({ });
		});
	//]]>
	</script>		
</head>

<body>

<?php 
include('../inc/conection.inc');
$id = $_GET['id'];
$content = @mysql_query("SELECT * FROM tb_categorias WHERE id = '$id'");
$var_content = mysql_fetch_array($content);
?>

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

<h3 class="mt20">Estás editando: <? echo utf8_encode($var_content['title']); ?></h3>
<h3>Actualiza la información y cuando hayas terminado da click en editar</h3>
<h3>Para agregar fotos a la serie rellena el form de la zona inferior</h3>

<form enctype="multipart/form-data" id="login" action="ap_serie_ed.php?id=<? echo utf8_encode($var_content['id']); ?>" method="post">
	<label>Título:</label>
	<input type="text" id="titulo" name="titulo" class="campo" value="<? echo utf8_encode($var_content['title']); ?>"/><br/>

	<label>Año:</label>
	<input type="text" id="anho" name="anho" class="campo" value="<? echo utf8_encode($var_content['dat']); ?>"/><br/>
	
	<label>Epígrafe:</label>
	<div class="clearfix"></div><!-- /clearfix -->
	<textarea id="epigrafe" name="epigrafe" class="large"><? echo utf8_encode($var_content['epigrafe']); ?></textarea>

	<label>Statement:</label>
	<div class="clearfix"></div><!-- /clearfix -->
	<textarea id="statement" name="statement" class="large"><? echo utf8_encode($var_content['statement']); ?></textarea>
		
	<input type="submit" value="Editar" name="submit" id="submit" />
	<div class="clearfix"></div><!-- /clearfix -->

</form>

<!-- ************************************************************************ -->
<hr>
<h3>Si deseas eliminar toda la serie da click aquí. Esta acción es irreversible. Una vez que la elimines todas las fotos serán borradas</h3><br/>
<a href="ap_serie_del.php?id=<? echo utf8_encode($var_content['id']); ?>" target="_self" id="eliminar" onclick="return confirm('&iquest;Seguro que deseas eliminar esta serie? Esta acción no se puede revertir');">Eliminar toda la serie</a><br/><br/>
<hr>
<!-- ************************************************************************ -->
<h3 class="mt20">Imágenes de la serie</h2>

<ul id="noticias">
<?php
$thumb = @mysql_query("SELECT * FROM tb_images WHERE cat='$id' ORDER BY ord ASC");
$num_rows = 1;
while ($fila = mysql_fetch_array($thumb)) {
	echo('<li><div class="ov"><img src="../photos/'. utf8_encode($fila['thumb']) .'" class="mr10 mb10"/></div>');
	echo('<a href="ap_image_del.php?id='. utf8_encode($fila['id']) .'&ser='. utf8_encode($fila['cat']) .'" target="_self" onclick="return confirm(\'&iquest;Seguro que deseas eliminar esta foto? Esta acción no se puede revertir\');">ELIMINAR</a></li>');
	$num_rows++;
}
?>
<div class="clearfix"></div>
</ul>

<hr>
<!-- ************************************************************************ -->

<h3 class="mt20">Agregar nueva imagen</h3>
<h3 class="mt20">Cada imagen está compuesta por la imagen en grande y un thumbnail:</h3>
<h3>la imagen completa debe medir máximo 920px de ancho por lo que de proporcionalmente de alto.</h3>
<h3>La imagen pequeña, llamada thumbnail, es la que aparece en la zona inferior.</h3>
<h3>Debe medir 175px de ancho por 120px de alto.</h3>
<h3>* Las imágenes deben tener una resolución de 72 ppi. Los formatos posibles son: jpg, gif, png</h3>

<form enctype="multipart/form-data" id="login" action="ap_image_add.php?cat=<? echo utf8_encode($var_content['id']); ?>&ord=<? echo utf8_encode($num_rows); ?>" method="post">
	<label>Imagen</label>
	<input type="file" id="ufile[]" name="ufile[]" class="requerido"/>
	
	<label>Thumbnail</label>
	<input type="file" id="ufile[]" name="ufile[]" class="requerido"/>

	<label>Descripción (este campo es opcional)</label>
	<input type="text" id="description" name="description" class="requerido"/>
		
	<div class="clearfix"></div><!-- /clearfix -->
	<input type="submit" value="Agregar" name="submit" id="submit" />
	<div class="clearfix"></div><!-- /clearfix -->
</form>

<div class="clearfix"></div><!-- /clearfix -->

<!-- ************************************************************************ -->
<div class="clearfix"></div><!-- /clearfix -->
</div><!-- /wrapper -->

</body>
</html>
