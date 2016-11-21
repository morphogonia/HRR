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
$id = 1;
$content = @mysql_query("SELECT * FROM tb_contacto WHERE id = '$id'");
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

<h3>Estás editando la sección de contacto</h3>
<h3 class="mt10">Actualiza la información y cuando hayas terminado da click en editar</h3>

<form enctype="multipart/form-data" id="login" action="ap_contacto_ed.php" method="post">
	<label>Contacto:</label>
	<div class="clearfix"></div><!-- /clearfix -->
	<textarea id="statement" name="statement" class="large"><? echo utf8_encode($var_content['texto']); ?></textarea>
		
	<input type="submit" value="Editar" name="submit" id="submit" />
	<div class="clearfix"></div><!-- /clearfix -->

</form>


<!-- ************************************************************************ -->
<div class="clearfix"></div><!-- /clearfix -->
</div><!-- /wrapper -->

</body>
</html>
