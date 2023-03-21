<?php
function conectar(){
	$servername = "db4free.net";
	$database = "registro_libros";
	$username = "root123456";
	$password = "root1234";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection
	if (!$conn) {
		//echo mysqli_connect_error();
		die("Connection failed: " . mysqli_connect_error());
	}
	//echo "Connected successfully";
	
	
	return $conn;
}
?>