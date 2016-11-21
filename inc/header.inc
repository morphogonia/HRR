
<?php include('inc/conection.inc'); ?>	

<div id="wrapper">

<div id="header">

<h1 id="titulo"><a href="index.php" target="_self">humberto ríos rodríguez</a></h1>

<ul id="menuObra">
	<li><a href="#" target="_self" id="obra">Obra</a></li>
	<li><a href="noticias.php" target="_self" id="noticias">Noticias</a></li>
	<li><a href="http://humbertoriosfotografo.blogspot.mx" target="_blank" id="blog">Blog</a></li>
	<li><a href="http://www.juancano68.com/" target="_blank">Galería Patricia Conde</a></li>
</ul>

<ul id="menuSeries">
	<div class="w160 floatl">
<?php
$i=0;
$resultado = @mysql_query('SELECT * FROM tb_categorias ORDER BY id DESC');
while ($fila = mysql_fetch_array($resultado)) {
	echo('<li><a href="serie.php?id='.utf8_encode($fila['id']).'" target="_self">'.utf8_encode($fila['title']).'</a></li>');
	$i++;
	if($i>4){
		echo('</div><div class="w160 floatl">');
		$i=0;
	}
}
?>
	</div><div class="clearfix"></div>
</ul>

<div class="clearfix"></div>

<ul id="menuBio">
	<li><a href="humbertorios.php" target="_self">Bio</a></li>
	<li><a href="contacto.php" target="_self">Contacto</a></li>
	<div class="clearfix"></div>
</ul>

<div class="clearfix"></div>
</div><!-- / HEADER -->

