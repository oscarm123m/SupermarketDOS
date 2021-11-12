<?php
define('SERVER', 'localhost');
define('DBNAME', 'proyecto');
define('USER', 'postgres');
define('PASSWORD', '1234');

class Conexion{
	function Conectar(){
		
		try {
			$conexion=new PDO("pgsql:host=".SERVER.";port=5432;dbname=".DBNAME, USER, PASSWORD);
			return $conexion;	
		} catch (Exception $e) {
			die("el error de conexion es: ".$e->getMessage());
		}
	}
}



?>