<? 
session_start();
if (!isset($_SESSION['logged_admin_in'])) {
	header('Location: index.php');
}
?>


<?
require('conexion.php');
$link = conectarse();
$ord = $_GET['ord'];

$f1=$_FILES['ufile']['name'][0];
$f2=$_FILES['ufile']['name'][1];
$path1= "../photos/".$_FILES['ufile']['name'][0];
$path2= "../photos/".$_FILES['ufile']['name'][1];
copy($_FILES['ufile']['tmp_name'][0], $path1);
copy($_FILES['ufile']['tmp_name'][1], $path2);
$filesize1=$_FILES['ufile']['size'][0];
$filesize2=$_FILES['ufile']['size'][1];

if($filesize1 && $filesize2 != 0) {
	mysql_query("INSERT INTO tb_noticias VALUES('', '$f1','$f2','$ord')", $link);
	print '<meta http-equiv="refresh" content="1; url=ap_noticias.php">';
} else {
	echo ('<h1>Error al subir los archivos</h1>');
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
