<?php
include('inc/conection.inc');
$sql = mysql_query("SELECT * FROM tb_noticias ORDER BY id DESC");

while($row = mysql_fetch_array($sql)) {
	$results[] = array(
      'image' => $row['image'],
	);
}
echo json_encode($results);
?>