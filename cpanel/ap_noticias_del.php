<? 
session_start();
if (!isset($_SESSION['logged_admin_in'])) {
	header('Location: index.php');
}
?>


<?
require('conexion.php');
$link = conectarse();
$id = $_GET['id'];

mysql_query("DELETE FROM tb_noticias WHERE id = '$id'", $link);
print '<meta http-equiv="refresh" content="1; url=ap_noticias.php">';
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

<img src="../images/ajax-loader.gif" />


<!-- ************************************************************************ -->
<div class="clearfix"></div><!-- /clearfix -->
</div><!-- /wrapper -->

</body>
</html>
