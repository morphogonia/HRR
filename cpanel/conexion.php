<?php
function conectarse(){
		if(!($link=mysql_connect('localhost','root','root'))){
			echo 'el servidor no se ha conectado';
			exit();		
			}
		if(!mysql_select_db('dbhriosrodriguez',$link)){
			echo 'la base de datos no se ha conectado';
			exit();
			}
		return $link;		
		}
		$link= conectarse();
		
		mysql_close($link);
?>