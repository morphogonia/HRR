<?php
include('inc/conection.inc');
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM tb_images WHERE cat='$id' ORDER BY id ASC");

while($row = mysql_fetch_array($sql)) {
	$results[] = array(
      'image' => $row['image'],
      'desc' => utf8_encode($row['description']),
	);
}
echo json_encode($results);
?>